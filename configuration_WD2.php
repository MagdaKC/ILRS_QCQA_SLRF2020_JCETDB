
<html>
<head>
  <link rel="stylesheet" href="css/butt4.css" type="text/css" />
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
  <input type="submit"  name="CASE" id="CASE" value="DAILY PRODUCT" class="Web_OnlineTools4"  checked/>
</td>
<td>
  <input type="submit"  name="CASE" id="CASE" value="WEEKLY PRODUCT" class="Web_OnlineTools4"   />
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
<body>
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

