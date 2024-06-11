<html>
<style type="text/css">
.tbmain{ 
 /* Changes on the form */
 background: #eeeeee; 
}
.left{
  /* Changes on the form */
  color: black !important; 
  font-family: Verdana !important;
  font-size: 12px !important;
}
.head{
  color:#eeeeee;
  font-size:20px;;
  text-decoration:underline;
  font-family:"Verdana";
}
td.left {
  font-family:"Verdana";
  font-size:10px;
  color:black;
}
.pagebreak{
  font-family:"Verdana";
  font-size:12px;
  color:black;
}
.tbmain{
  height:60%;
  background:#eeeeee;
}
span.required{
  font-size: 13px !important;
  color: red !important;
}
 
div.backButton{
	background: transparent url("http://www.jotform.com//images/btn_back.gif") no-repeat scroll 0 0;
	height:16px;
	width:53px;
	float:left;
	margin-bottom:15px;
	padding-right:5px;
}
div.backButton:hover{
	background: transparent url("http://www.jotform.com//images/btn_back_over.gif") no-repeat scroll 0 0;
}
div.backButton:active{
	background: transparent url("http://www.jotform.com//images/btn_back_down.gif") no-repeat scroll 0 0;
}
div.nextButton{
	background: transparent url("http://www.jotform.com//images/btn_next.gif") no-repeat scroll 0 0;
	height:16px;
	width:53px;
	float: left;
	margin-bottom:15px;
	padding-right:5px;
}
div.nextButton:hover{
	background: transparent url("http://www.jotform.com//images/btn_next_over.gif") no-repeat scroll 0 0;
}
div.nextButton:active{
	background: transparent url("http://www.jotform.com//images/btn_next_down.gif") no-repeat scroll 0 0;
}
.pageinfo{
	padding-right:5px;
	margin-bottom:15px;
	float:left;
}
 
</style> 
<script type="text/javascript">
    function xSubmit (frm) {
		                      frm.submit();
							  window.close();
							  return false; }
 </script>
<script>
function formReset()
{
document.getElementById("frm1").reset();
}
</script>

<script type="text/javascript" src="common_D_TEST.js"></script>
<body>
<!--<table width="100%" height="80%" cellpadding="2" cellspacing="0" class="tbmain">-->
<table width="730" height="50%" cellpadding="2" cellspacing="0" class="tbmain">
<tr>
<td class="midleft" width="10">&nbsp;&nbsp;&nbsp;</td>
<td class="midmid" valign="top">
<form  target="_blank" action="generateresults_D.php"  method="post" name="isc" id="frm1" >
<input type="hidden" name="formID" value="91671119608" />
<div id="main"> 
<div class="pagebreak"> 
<input type="hidden" id="spc" name="spc" value="spc" />
<table width="100%" cellpadding="5" cellspacing="0">
 <tr align="center" style="vertical-align: top; text-align: center; width: 53px;">
   <font size="4" color=#006600><CENTER>EVALUATION OF WEEKLY ASC PRODUCTS </CENTER></font>
   <font size="4" color=#006600><CENTER>SLRF2020</CENTER></font>
   <font size="4" color=#006600><CENTER>7-day arc daily solution (sliding 1 d/day)</CENTER></font>

   </tr>
 <tr >
  <td width="150" class="left" valign="top" >
   <label>Combination Center:</label>
  </td>
  <td class="right">
   <input type="radio"  class="other" name="combination_center" id="q9_0" value="ilrsa"  checked/> 
    <label class="left">ILRSA</label> <br /> 
   <input type="radio"  class="other" name="combination_center" id="q9_1" value="ilrsb"   /> 
    <label class="left">ILRSB</label> <br /> 
    </td>
 </tr>
 <tr >
  <td width="150" class="left"  valign="top" >
   <label>Analysis Center:</label>
  </td>
  <td class="right">
   <select class="other" name="analysis_center" id="q12" >
  <option value="asi">ASI</option>
<option value="bkg">BKG</option>
<option value="cnes">CNES</option>
<option value="dgfi">DGFI</option>
<option value="esa">ESA</option>
<option value="ga">GA</option>
<option value="grgs">GRGS</option>
<option value="gfz">GFZ</option>
<option value="jcet">JCET</option>
<option value="nsgf">NSGF</option>
<option value="com">COM</option>
  </select>
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label>Start  (MM-DD-YYYY):</label>
  </td>
  <td class="right">
   <script type="text/javascript" src="datetimepicker.js?v2.0.1035"></script>
  <input type="text" class="text" size="10" name="start_date" id="q10"  /> 
   <a href="javascript:NewCal('q10','mmddyyyy',false,12)">
    <img src="cal.gif"border="0" alt="Pick a date" /></a>
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
      <label>End   &nbsp; (MM-DD-YYYY): </label>
  </td>
  <td class="right">
  <input type="text" class="text" size="10" name="end_date" id="q11"  /> 
   <a href="javascript:NewCal('q11','mmddyyyy',false,12)">
    <img src="cal.gif"border="0" alt="Pick a date" /></a>
  </td>
 </tr>
 <tr >
  <td width="150" class="left"  valign="top" >
   <label>Group of results:</label>
  </td>
  <td class="right">
   <select class="other" onchange=redirect_a(this.options.selectedIndex) name="PLOTS1" id="PLOTS1" >
   <option value=COS2 selected>Choose group</option> 
<option value=info>COMB. STATISTICS</option> 
<option value=ARCS>REL. AC CONTR. STATS.</option>
<option value=SC>SITE COORDINATES</option> 
<option value=info>HELMERT TRANS.</option> 
<option value=eop>EOP</option></select>
  </td>
 </tr>
 <tr >
  <td width="150" class="left"  valign="top" >
   <label>Quantities to display:</label>
  </td>
  <td class="right">
   <select style="width:100px;margin:5px 0 5px 0;" class="other" onchange=redirect_b(this.options.selectedIndex) name="PLOTS2" id="PLOTS2" >
  <option>Choose quantity</option>
    </select>
  </td>
 </tr>
 <tr>
 
 </tr>
 <tr >
  <td width="150" class="left"  valign="top" >
   <label>Station:</label>
  </td>
  <td class="right">
   <select class="other" name="station_name" id="q5" >
  <option></option>
   </select>
  </td>
 </tr>
<tr>
 <td class="right" >
   <div id="myDivleft"> </div>
     </td>
	   <td class="right" >
	     <div id="myDivright"> </div>
		   </td>
		     <td></td>
			   </tr>
			    <tr>
				  <td class="left" >
				    <div id="myDivright2"> </div>
					  </td>
					    </tr>
						  <tr>
						    <td class="left">
							  <font size=2>Plot Size</font>
							    </td>
								  <td class="right" width="150">
								    <font size=2>Minimum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maximum</font>
									  </td>
									    </tr>



  <tr>
  <td class="left">
  <font size=2>Y axis</font>
  </td>
  <td class="right" width="150">
  <input type="text" name="y_min" value="Min" size=8>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="y_max" value="Max" size=8>
  </td>
  </tr>
  <tr>
  <td><font size=2>Regression</td>
<td width="210"><font size=2><br>
   Linear <input type="radio" onclick="javascript:yesnoCheck();" name="var4" id="noCheck"  value="REG1">
             LOESS regression <input type="radio" onclick="javascript:yesnoCheck();" name="var4" id="yesCheck" value="REG0" >
			               <div id="ifYes" style="visibility:hidden"> %: <input type='text' id='yes' name="mva2" value="25" ><br> </div>
</td>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script >function yesnoCheck() {
                             	if (document.getElementById('yesCheck').checked) { document.getElementById('ifYes').style.visibility = 'visible'; }
                                 else document.getElementById('ifYes').style.visibility = 'hidden'; } //# sourceURL=pen.js </script>
<td>
  <select name="color3" id="cl" >
   <option value="#000000">Black</option>
    <option value="#4AA02C">Green</option>
	 <option value="#E41B17">Red</option>
	  <option value="#306EFF">Blue</option>
	   <option value="#893BFF">Purple</option>
	    <option value="#00FFFF">Aqua</option>
		 <option value="#FFFF00">Yellow</option>
		  <option value="#FFA500">Orange</option></select>
</td>


 </tr >
 <tr >
  <td width="150" class="left" >&nbsp;
 
  </td>
  <td class="right">
  <input type="submit" class="btn" value="Submit"/>
<input type="button" onclick="formReset()" value="Reset form">
 </td>
 </tr>
</table>
</div>
</div>

</form>
</td>
<td class="midright" width="10">&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
 <td class="bottomleft" width="10" height="10">&nbsp;</td>
 <td class="bottommid">&nbsp;</td>
 <td class="bottomright" width="10" height="10">&nbsp;</td>
</tr>
</table>
<input type="hidden" value="0" id="theValue" />
<!-- GoStats JavaScript Based Code -->
<script type="text/javascript" src="http://gostats.com/js/counter.js"></script>
<script type="text/javascript">_gos='gostats.com';_goa=751637;
_got=5;_goi=1;_gol='web statistics';_GoStatsRun();</script>
<noscript><a target="_blank" title="web statistics" 
href="http://gostats.com"><img alt="web statistics" 
src="http://gostats.com/bin/count/a_751637/t_5/i_1/counter.png" 
style="border-width:0" /></a></noscript>
<!-- End GoStats JavaScript Based Code -->
<body>
</html>
