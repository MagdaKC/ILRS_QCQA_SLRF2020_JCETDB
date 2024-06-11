<html>
<head>
  <link rel="stylesheet" href="css/butt3.css" type="text/css" />
</head>
<body>
<form name="contactus" method="post">
<table align="center">
<tbody>

<tr align="center" style="vertical-align: top; text-align: center; width: 53px;">
<font size="4" color=#006600><CENTER>EVALUATION OF WEEKLY ASC PRODUCTS SLRF2020 </CENTER></font>
</tr>

<tr>
<td align="center" style="vertical-align: top; text-align: center; width: 53px;">
  <input type="submit"  name="CASE" id="CASE" value="DAILY PRODUCT" class="Web_OnlineTools3"  checked/>
</td>
<td>
  <input type="submit"  name="CASE" id="CASE" value="WEEKLY PRODUCT" class="Web_OnlineTools3"   />
</td>
</tr>

<tr>
<td colspan="2" align="center">
  <input type="button" name="RETURN" id="RETURN" value="RETURN" class="Web_OnlineTools3" onclick="returnToPage()" />
</td>
</tr>

</tbody>
</table>
</form>

<script>
function returnToPage() {
  window.location.href = "configuration_ALL.php";
}
</script>

</body>
</html>

<?php
if ($_POST['CASE'] == 'DAILY PRODUCT') {
    print "<font color=#006600><CENTER>7-day arc daily solution</CENTER></font>";
    print "<font color=#006600><CENTER>(sliding 1 d/day)</CENTER></font>";
    include "configuration_D.php";
} elseif ($_POST['CASE'] == 'WEEKLY PRODUCT') {
    print "<font color=#006600><CENTER>7-day arc weekly solution</CENTER></font>";
    print "<font color=#006600><CENTER>(one solution/week)</CENTER></font>";
    include "configuration_W.php";
}
?>

