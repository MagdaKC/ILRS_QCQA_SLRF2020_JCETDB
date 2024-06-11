
<html>
<head>
  <link rel="stylesheet" href="css/butt3.css" type="text/css" />
</head>
<body>
<form name="contactus" method="post">
<table align="center">
<tbody>

<tr align="center" style="vertical-align: top; text-align: center; width: 53px;">
<font size="4" color=#006600><CENTER>EVALUATION OF WEEKLY ASC PRODUCTS </CENTER></font>

</tr>

<tr>
<td align="center" style="vertical-align: top; text-align: center; width: 53px;">
  <input type="submit"  name="CASE" id="CASE" value="DAILY PRODUCT" class="Web_OnlineTools3"  checked/>
</td>
<td>
  <input type="submit"  name="CASE" id="CASE" value="WEEKLY PRODUCT" class="Web_OnlineTools3"   />
</form>
</td>
</table>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
     (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	     })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79669285-2', 'auto');
    ga('send', 'pageview');

	</script>
	<!-- Default Statcounter code for ILRS_QCQA_SLRF2014_JCETDB
	http://geodesy.jcet.umbc.edu/ILRS_QCQA_SLRF2014_JCETDB/configuration_WD.php
	-->
	<script type="text/javascript">
	var sc_project=12008746; 
	var sc_invisible=1; 
	var sc_security="8ac8a773"; 
	</script>
	<script type="text/javascript"
	src="https://www.statcounter.com/counter/counter.js"
	async></script>
	<noscript><div class="statcounter"><a title="web statistics"
	href="https://statcounter.com/" target="_blank"><img
	class="statcounter"
	src="https://c.statcounter.com/12008746/0/8ac8a773/1/"
	alt="web statistics"></a></div></noscript>
	<!-- End of Statcounter Code -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-79669285-9"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	    function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		    gtag('config', 'UA-79669285-9');
			</script>

</body>
</html>


<?php 

//    echo $_POST['CASE'];
if ($_POST['CASE']=='DAILY PRODUCT') {
//echo '<span style="color:#006600;text-align:center;">Request has been sent. Please wait for my reply!</span>';
//echo '<span style="color:#006600;text-align:right;"> 7-day arc daily solution</span>';
//echo "<div align=centre> <font color=blue>One line simple string in   blue color</font>";

print "<font color=#006600><CENTER>7-day arc daily solution</CENTER></font>"; 
print "<font color=#006600><CENTER>(sliding 1 d/day)</CENTER></font>"; 
include "configuration_D.php";
//include "configuration_W.php";
}
if ($_POST['CASE']=='WEEKLY PRODUCT') 
{
print "<font color=#006600><CENTER>7-day arc weekly solution</CENTER></font>"; 
print "<font color=#006600><CENTER>(one solution/week)</CENTER></font>"; 
//echo '<span style="color:#006600;text-align:center;"> WEEKLY SOLUTION</span>';
//    echo $_POST['CASE'];
include "configuration_W.php";
}
?>

