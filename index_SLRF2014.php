<html>
<head>
<title>Visualization of ILRS System & Technique Analysis Products - Vista-Pro&copy; </title>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="css/281823.css">
<link rel="stylesheet" href="css/butt.css" type="text/css">
<link rel="stylesheet" href="css/grad.css" type="text/css">
  <link rel="stylesheet" href="css/butt2.css" type="text/css" />
  <link rel="stylesheet" href="css/tab.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/base.css">
 <LINK REL="SHORTCUT ICON" HREF="JCET.ico">
</head>
<body>
<?php
// include_once('./common.php');
// dl_local('plpgsql.so');
if (!extension_loaded('pgsql')) {
	dl('plpgsql.so');
}
$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrs user=jasongroup password=Ichinen  connect_timeout=2";
// $conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrs user=jasongroup connect_timeout=2";
$db_handle = pg_connect($conn_string);
$query = "select * from lastupdateinfo order by lastmodificationtowebsite desc limit 1 ;";
////echo $query.'<br/><br/>';
$result = pg_query($query) or die("Could not connect" );
$myrow = pg_fetch_assoc($result);
////echo($myrow . "<br />");
$date = $myrow["lastmodificationtowebsite"];
////echo($date . "<br />");
$string = "Last modified: $date";
////echo($string . "<br />");
?>
 <div id="earthWrapper">
<div id="header">
<table style="text-align: left; height: 75px; width: 100%;" class="left"
align="center" border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td style="vertical-align: middle; text-align: left; width: 100px; height: 70px" >
          <a href="http://ilrs.gsfc.nasa.gov/" class="imageLink" target="_blank"><img src="ILRS_logo_new1.jpg" alt="ILRS Logo, International Laser Ranging Service"  /></a>

</td>
<td style="vertical-align: middle;text-align: left;" width: 341px;"> 
<h3>International Laser Ranging Service</h3>
<br>
<h4>Analysis Standing Committee</h4>
</td>
<td style="vertical-align: middle; width: 91px;">
<a  class="imageLink" target="_blank"><img src="vista7.png" height="72" style="float:right;" alt="IAG-GGOS logo" title="IAG-GGOS logo" /></a><br>
</td>
<td style="vertical-align: middle; width: 91px;">
<a href="http://www.iag-aig.org/" class="imageLink" target="_blank"><img src="ggos_logo.jpg" height="72" style="float:right;" alt="IAG-GGOS logo" title="IAG-GGOS logo" /></a><br>
</td>
</tr>
</tbody>
</table>
</div>

<br>
<br>
<h5>Monitoring of ILRS Analysis SC Products</h5>


 <div id="TAB">
<table >
<tbody>
<tr>
<td style="width: 600px; height: 60px; ">
<dt><button type="submit" id="bouton_help" class="Web_OnlineTools" onclick="window.open('../ILRS_POS+EOP_SLRF2014/configuration_WD.php','nom_popup','directories=no, menubar=no, location=no, status=no, scrollbars=yes, menubar=no, width=800, height=600', '_self');" title="WEEKLY STATION POSITIONS & DAILY EOP SERIES SLRF2014">WEEKLY STATION POSITIONS & DAILY EOP SERIES</button></dt>
</td>
</tr>
<tr>

<td style="width: 600px;  height: 60px; ">
<dt><button type="submit" id="bouton_help" class="Web_OnlineTools" onclick="window.open('../ILRS_QCQA_SLRF2014/configuration_WD.php','nom_popup','directories=no, menubar=no, location=no, status=no, scrollbars=yes, menubar=no, width=800, height=600', '_self');" title="EVALUATION OF WEEKLY ASC PRODUCTS SLRF2014">EVALUATION OF WEEKLY ASC PRODUCTS</button></dt>
</td>
</tr>
<!--<td style="width: 600px;  height: 60px; ">
<dt><button type="submit" id="bouton_help" class="Web_OnlineTools" onclick="window.open('../BIAS_W/configuration.php','nom_popup','directories=no, menubar=no, location=no, status=no, scrollbars=yes, menubar=no, width=800, height=600', '_self');" title="MONITORING SYSTEMATIC ERRORS AT ILRS STATIONS">MONITORING SYSTEMATIC
ERRORS AT ILRS STATIONS</button></dt>
</td>
</tr>
<tr>
<td style="width: 600px;  height: 60px; ">
<dt><button type="submit" id="bouton_help" class="Web_OnlineTools" onclick="window.open('../DATACATS/configuration_W.php','nom_popup','directories=no, menubar=no, location=no, status=no, scrollbars=yes, menubar=no, width=800, height=600', '_self');" title="NETWORK PERFORMANCE ON LAGEOS AND LAGEOS2">NETWORK PERFORMANCE ON LAGEOS AND LAGEOS2 </button></dt>
</td>
</tr>
<tr>
<td style="width: 600px;   height: 60px;">
<dt><button type="submit" id="bouton_help" class="Web_OnlineTools" onclick="window.open('../BIAS_W_v200+v210/configuration.php','nom_popup','directories=no, menubar=no, location=no, status=no, scrollbars=yes, menubar=no, width=800, height=600', '_self');" title="SYSTEMATIC ERROR ESTIMATION PILOT PROJECT">SYSTEMATIC ERROR ESTIMATION PILOT PROJECT</button></dt>
</td>
</tr>
<tr>
<td style="width: 600px;   height: 60px;">
<dt><button type="submit" id="bouton_help" class="Web_OnlineTools" onclick="window.open('../CDDIS_QCQA/configuration.php','nom_popup','directories=no, menubar=no, location=no, status=no, scrollbars=yes, menubar=no, width=800, height=600', '_self');" title="NORMAL POINT DATA MONITORING (CDDIS)">NORMAL POINT DATA MONITORING (CDDIS)</button></dt>
</td>
</tr>-->
</tbody>
</table>

</div>
<div class="footerholder">
<div id="footer">
<table style="text-align: left; height: 57px; width: 100%;" class="left"
align="center" border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td style="vertical-align: top;  text-align: center;"  aglin="justify">
<a href="http://umbc.edu" class="imageLink" target="_blank"><img src="Sealumbc1.png" height="77" style="float:justify;" alt="UMBC logo" title="UMBC logo" /></a><b
</td>
<td style="vertical-align: middle;" class="footer p"><img alt="" src="umbc_gray4.png" vspace="20"></td>
<td style="vertical-align: middle; height: 77px; width: 325px;" class="footer p"> <font color="white">Responsible
GESTAR II Official:&nbsp;
<a href="mailto:epavlis@umbc.edu">Dr.
Erricos Pavlis</a><br>
Web Curator:&nbsp; <a color="white" href="mailto:magdak@umbc.edu">Magda
Kuzmicz-Cieslak</a><br>
<a color="white" href="mailto:magdak@umbc.edu">Contact Us<br>
</td>
<td style="vertical-align: middle; width: 200px;"> <font color="white">Last
Modified: <?echo $date;?><br>&nbsp; <br>
<a href="http://www.nasa.gov/about/highlights/HP_Privacy.html"
target="_blank">Privacy Policy &amp; Important Notice</a>
<br>
</td>
<td style="vertical-align: middle; width: 91px;">
<a href="http://www.nasa.gov" class="imageLink" target="_blank"><img src="NASA1.png"  style="float:left;" alt="NASA logo" title="NASA logo" /></a><b

<img alt="" src="nasa2.gif"><br>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- GoStats JavaScript Based Code -->
<script type="text/javascript" src="http://gostats.com/js/counter.js"></script>
<script type="text/javascript">_gos='c5.gostats.com';_goa=1063876;
_got=5;_goi=1;_gol='free webpage counters';_GoStatsRun();</script>
<noscript><a target="_blank" title="free webpage counters" 
href="http://gostats.com"><img alt="free webpage counters" 
src="http://c5.gostats.com/bin/count/a_1063876/t_5/i_1/counter.png" 
style="border-width:0" /></a></noscript>
<!-- End GoStats JavaScript Based Code -->
</body>
</html>

)))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
