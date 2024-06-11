<?php
 
/* 
 * @author Tommy Ekola
 * @copyright © 2008 by Tommy Ekola (tek@kth.se)
 * @licence GNU General Public Licence 2 or later
 */
 
 
if (! defined( 'MEDIAWIKI' ) ) {
        echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
        die( -1 );
}
 
 
// Extension information
 
$wgExtensionCredits['other'][] = array(
        'name'        => 'JsMath',
        'description' => 'jsMath rendering of math formulas',
        'version'     => '0.9',
        'author'      => 'Tommy Ekola',
        'url'         => 'http://www.mediawiki.org/wiki/Extension:JsMath');
 
 
// Configuration
 
if(! isset( $wgJsMathRoot )) {
        echo( "The root directory of jsMath is not specified. Make sure \$wgJsMathRoot is set in $IP/LocalSettings.php" );
        die( -1 );
}
 
define( 'MW_MATH_JSMATH', 6 );
if( $wgJsMathDefault ) {
        $wgDefaultUserOptions['math'] = MW_MATH_JSMATH;
}
 
 
// Load jsMath on the page
 
$wgExtensionFunctions[] = 'wfJsMathSetup';
 
function wfJsMathSetup() {
  global $wgOut, $wgJsMimeType, $wgJsMathRoot, $wgUseTeX, $wgJsMathPlugins;
 
        if(! $wgUseTeX ) return;
 
        wfJsMathMessages();        
 
        // Put jsMath div tags in the content part of the page
        $wgOut->addInlineScript( "jsMath = {Setup: {DIV: function(id,styles) {\n"
                . "  var div = jsMath.document.createElement('div');\n"
                . "  div.id = 'jsMath_'+id;\n"
                . "  for (var i in styles) {div.style[i]= styles[i]}\n"
                . "  var el = jsMath.document.getElementById('content');\n"
                . "  if(!el) el = jsMath.document.getElementById('globalWrapper');\n"
                . "  if(!el) el = jsMath.document.body;\n"
                . "  if(!el) return;\n"
                . "  if (!el.hasChildNodes) {\n"
                . "    el.appendChild(div);\n"
                . "  }\n"
                . "  else {\n"
                . "    el.insertBefore(div,el.firstChild);\n"
                . "  }\n"
                . "  return div;\n"
                . "}}}" );
        if( isset( $wgJsMathPlugins )) {
                foreach( $wgJsMathPlugins as $plugin ) {
                        $wgOut->addScript( '<script type="' . $wgJsMimeType . '" src="'
                                . $plugin . '"></script>' );
                }
        }
        $wgOut->addScript( '<script type="' . $wgJsMimeType . '" src="'
                . $wgJsMathRoot . '/easy/load.js"></script>' );
}
 
 
// Internationalization
 
function wfJsMathMessages() {
        static $messagesLoaded = false;
        global $wgMessageCache;
        if ( !$messagesLoaded ) {
                $messagesLoaded = true;
 
                require( dirname( __FILE__ ) . '/JsMath.i18n.php' );
                foreach( $messages as $lang => $langMessages ) {
                        $wgMessageCache->addMessages( $langMessages, $lang );
                }
        }
        return true;
}
 
 
// Warn the user if javascript is turned off.
 
$wgHooks['SiteNoticeAfter'][] = 'wfJsMathNotice';
 
function wfJsMathNotice( &$sitenotice ) {
        global $wgUseTeX;
 
        if(! $wgUseTeX ) return true;
        $sitenotice .= "\n<noscript>\n"
                ."  <div style='color:#CC0000; text-align:center'>\n"
                ."    <b>Warning: "
                ."<a href='http://www.math.union.edu/locate/jsMath'>jsMath</a>"
                ." requires JavaScript\n"
                ."    to process the mathematics on this page.<br>\n"
                ."    If your browser supports JavaScript, be sure it"
                ." is enabled.</b>\n"
                ."  </div>\n"
                ."  <hr>\n"
                ."</noscript>";
        return true;
}
 
 
// Add a jsMath option to the math part of the preferences form.
 
$wgHooks['RenderPreferencesForm'][] = 'wfJsMathPreferences';
 
function wfJsMathPreferences( $preferences, $output) {
        global $wgUseTeX;
 
        if(! $wgUseTeX ) return true;
 
        $html = $output->getHTML();
 
        // Create html option for jsMath
        wfJsMathMessages();
        $checked = ( MW_MATH_JSMATH == $preferences->mMath );
        $jsmathopt = Xml::openElement( 'div' )
                . Xml::radioLabel( wfMsg( 'mw_math_jsmath' ), 'wpMath',
                        MW_MATH_JSMATH, "mw-sp-math-" . MW_MATH_JSMATH, $checked )
                . Xml::closeElement( 'div' ) . "\n";
 
        // Insert jsMath option into the form        
        $i = strpos( $html, "<fieldset>\n<legend>" . wfMsg('math') . '</legend>' );
        if( $i !== FALSE ) {
                $newhtml = substr($html,0,$i)
                        . preg_replace( '(</fieldset>)', $jsmathopt . '</fieldset>', substr($html,$i,-1), 1 );
 
                // Replace the old output with the new output        
                $output->clearHTML();
                $output->addHTML( $newhtml );
        }
 
        return true;
}
 
 
// Strip the math tag before the parser does, and associate the
// replacement marker with the corresponding jsMath code.
 
$wgHooks['ParserBeforeStrip'][] = 'wfJsMathParser';
 
function wfJsMathParser(&$parser, &$text, &$state) {
        global $wgUser, $wgContLang;
        if( $parser->mOptions->getUseTeX() && $wgUser->getOption('math') == MW_MATH_JSMATH ) {
                $render = ($parser->mOutputType == OT_HTML);
 
                $uniq_prefix = $parser->mUniqPrefix;
                $commentState = new ReplacementArray;
                $nowikiState = new ReplacementArray;
                $generalItems = array();
 
                $elements = array('math','nowiki');
                $matches = array();
                $text = Parser::extractTagsAndParams( $elements, $text, $matches, $uniq_prefix );
 
                foreach( $matches as $marker => $data ) {
                        list( $element, $content, $params, $tag ) = $data;
                        if( $render ) {
                                $tagName = strtolower( $element );
                                switch( $tagName ) {
                                case '!--':
                                        // Comment
                                        if( substr( $tag, -3 ) == '-->' ) {
                                                $output = $tag;
                                        } else {
                                                // Unclosed comment in input.
                                                // Close it so later stripping can remove it
                                                $output = "$tag-->";
                                        }
                                        break;
                                case 'nowiki':
                                        $output = $tag;
                                        break;
                                case 'math':
                                        $attribs = Sanitizer::validateTagAttributes( $params, $tag );
                                        $attribs = Sanitizer::mergeAttributes( array('class' => 'math'), $attribs );
                                        $output = $wgContLang->armourMath( 
                                                Xml::tags( 'span', $attribs, "\\displaystyle " . $content ));
                                        break;
                                }
                        }
 
                        if( $element == '!--' ) {
                                $commentState->setPair( $marker, $output );
                        } elseif ( $element == 'nowiki' ) {
                                $nowikiState->setPair( $marker, $output );
                        } elseif ( $element == 'math' ) {
                                $generalItems[$marker] = $output;
                        } else {
                                throw new MWException( "Caught invalid tag $element in math strip" );
                        }
                }
                # Add the math items to the state
                $state->general->mergeArray( $generalItems );
 
                # Unstrip nowiki and comments 
                $text = $nowikiState->replace( $text );
                $text = $commentState->replace( $text );
        }
        return true;        
}
