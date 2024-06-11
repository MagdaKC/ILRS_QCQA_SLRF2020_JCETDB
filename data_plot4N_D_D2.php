</script>
</head>
<body>
<div class="contentSection">
<div class="contentToPrint">
    <div id="container" style="border: 2px solid #2E4C3D;width: 1000px; height: 720px"></div>
</div> </div>

<div id="dialog" class="ui-dialog1"> Mean/Std. Dev.:  <?php echo $avg1 ?> &#177; <?php echo $std1 ?> Count: <?php echo $num1 ?>  </div>
<table>
<tr>
<td>
<div id="report"</div>
</td>
</tr>

  </div>
<div class="contentSection">
<div class="contentToPrint2">
    <div id="container2" style="border: 2px solid #2E4C3D;width: 1000px; height: 720px"></div>
</div> </div>
<div id="dialog2" class="ui-dialog2"> Mean/Std. Dev.:  <?php echo $avg2 ?> &#177; <?php echo $std2 ?> Count: <?php echo $num2 ?>  </div>
<table>
<tr>
<td>
<div id="report2"</div>
</td>
</tr>
<!--<button id="opener2" class="Web_OnlineTools2">Statistics</button>
  </div>
<div class="contentSection">
<div class="contentToPrint3">
    <div id="container3" style="border: 2px solid #2E4C3D;width: 1000px; height: 720px"></div>
</div> </div>

<div id="dialog3" class="ui-dialog3"  > Mean/Std. Dev.:  <?php echo $avg3 ?> &#177; <?php echo $std3 ?> Count: <?php echo $num3 ?>  </div>
<table>
<tr>
<td>
<div id="report3"</div>
</td>
</tr>-->
<table  style="margin-top:10px; margin-left:0px;" style="text-align: left; height: 24px; width: 293px;" border="3"
cellpadding="0" cellspacing="3">
<tbody>
<tr>
<td style="vertical-align: top; text-align: left; width: 53px;">
<input type="button" text-align="center" value="HOME" class="Web_OnlineTools" onclick="open_winH()">
</td>
<td style="vertical-align: top; text-align: left; width: 53px;">
 <input type="button" text-align="center" value="New Plot" class="Web_OnlineTools" onclick="open_win()">
</td>
</td>
<td style="vertical-align: top; text-align: left; width: 53px;">
 <?php print("<INPUT TYPE=\"BUTTON\" text-align=\"center\"  class=\"Web_OnlineTools\"  VALUE=\"Download Data\" ONCLICK=\"window.open('".$downloadlink."')\">"); ?>
</td>
<td style="vertical-align: top; text-align: left; width: 53px;">
<button id="opener2" class="Web_OnlineTools">Statistics</button>
</td>
<td style="vertical-align: middle; text-align: center; width: 124px;">
    <a href="#" class="Web_OnlineTools"  id="printOut">Print PDF</a>
</td>
</tr>
</tbody>
  </div>
<script type="text/javascript">
    $(function(){
        $('#printOut').click(function(e){
            e.preventDefault();
            var w = window.open();
            var printOne = $('.contentToPrint').html();
            var printOn2 = $('.contentToPrint2').html();
            var printOn3 = $('.contentToPrint3').html();
            var print11  = $('.ui-dialog1').html();
            var print21  = $('.ui-dialog2').html();
            var print31  = $('.ui-dialog3').html();
   w.document.write('<center>')
   w.document.write('EVALUATION OF WEEKLY AWG PRODUCTS')
   w.document.write('<html><head><title> <?php echo $title1 ?> EVALUATION OF WEEKLY AWG PRODUCTS </title></head><body>' + printOne + ' ' + printOn2) + '</body></html>';
   w.document.write('<br>')
   w.document.write('<br>')
   w.document.write('<br>')
   w.document.write('<br>')
   w.document.write('<center>')
   w.document.write('<table border="1" cellspacing="1" cellpadding="5" style="background-color:#C8FFB5;"  >')
   w.document.write('<tr>')
   w.document.write('<td style="vertical-align: middle; text-align: center;"><?php echo $plotaa ?> <?php echo $type ?> <br> <?php echo $title1 ?></td>')
   w.document.write('<td style="vertical-align: middle; text-align: center;"><?php echo $plotbb ?> <?php echo $type ?> <br><?php echo $title1 ?></td>')
   w.document.write('</tr>')
   w.document.write('<tr style="vertical-align: middle; text-align: center;">')
   w.document.write('<td>' + print11 + ' </td>')
   w.document.write('<td>' + print21 + '</td>')
   w.document.write('</tr>')
  w.document.write('</table>')
            w.window.print();
            return false;
        });
    });
</script>
</body>
</html>


<?php
// to file
//if ($_POST[combination_center]=="ilrsb")
if ($_POST[PLOTS2]=="eop" or $_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean" or $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" or $_POST[PLOTS2]=="Rxyz" or $_POST[PLOTS2]=="Helmert_Rxyz_COM"  or $_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{if ($_POST[combination_center]=="ilrsb")

{
if ($_POST[PLOTS2]=="NEU")
{$MN=1;}
	else
	{$MN=1000;}
}
else
{$MN=1;}}
//}

if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{
//X
if ($_POST['var0']=="yes")
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char($splota *$MN , '999999D999')  as value4 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ORDER BY observation_date;";}
//Y
if ($_POST['var1']=="yes")
{$query = "SELECT observation_date as datetime1,  to_char($plotb *$MN , '999999D999') as value2, to_char($splotb *$MN , '999999D999') as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ORDER BY observation_date;";}
//Z
if ($_POST['var2']=="yes")
{$query = "SELECT observation_date as datetime1, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ORDER BY observation_date;";}
//XY
if ($_POST['var0']=="yes" and ($_POST['var1']=="yes"))
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char($plotb *$MN , '999999D999') as value2, to_char($splota *$MN , '999999D999')  as value4, to_char($splotb *$MN , '999999D999') as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ORDER BY observation_date;";}
//XZ
if ($_POST['var0']=="yes" and ($_POST['var2']=="yes"))
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3, to_char($splota *$MN , '999999D999')  as value4, to_char($splotc *$MN , '999999D999') as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ORDER BY observation_date;";}
//YZ
if ($_POST['var1']=="yes" and ($_POST['var2']=="yes"))
{$query = "SELECT observation_date as datetime1, to_char($plotb *$MN , '999999D999') as value2, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3, $to_char(splotb *$MN , '999999D999') as value5,to_char($splotc *$MN , '999999D999') as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ORDER BY observation_date;";}
////XYZ
if ($_POST['var0']=="yes" and $_POST['var1']=="yes" and ($_POST['var2']=="yes"))
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char($splota *$MN , '999999D999')  as value4, to_char($plotb *$MN , '999999D999') as value2, to_char($splotb *$MN , '999999D999') as value5, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3, to_char($splotc *$MN , '999999D999') as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ORDER BY observation_date;";}
}
else
{
//X
if ($_POST['var0']=="yes")
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char($splota *$MN , '999999D999')  as value4 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
//Y
if ($_POST['var1']=="yes")
{$query = "SELECT observation_date as datetime1,  to_char($plotb *$MN , '999999D999') as value2, to_char($splotb *$MN , '999999D999') as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
//Z
if ($_POST['var2']=="yes")
{$query = "SELECT observation_date as datetime1, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3, to_char($splotc *$MN , '999999D999') as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
//XY
if ($_POST['var0']=="yes" and ($_POST['var1']=="yes"))
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char($plotb *$MN , '999999D999') as value2, to_char($splota *$MN , '999999D999')  as value4, to_char($splotb *$MN , '999999D999') as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
//XZ
if ($_POST['var0']=="yes" and ($_POST['var2']=="yes"))
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3, to_char($splota *$MN , '999999D999')  as value4, to_char($splotc *$MN , '999999D999') as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
//YZ
if ($_POST['var1']=="yes" and ($_POST['var2']=="yes"))
{$query = "SELECT observation_date as datetime1, to_char($plotb *$MN , '999999D999') as value2, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3, to_char($splotb *$MN , '999999D999') as value5,to_char($splotc *$MN , '999999D999') as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
////XYZ
if ($_POST['var0']=="yes" and $_POST['var1']=="yes" and ($_POST['var2']=="yes"))
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char($splota *$MN , '999999D999')  as value4, to_char($plotb *$MN , '999999D999') as value2, to_char($splotb *$MN , '999999D999') as value5, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3, to_char($splotc *$MN , '999999D999') as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
}
if ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean")
{

//X
if ($_POST['var0']=="yes")
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
//Y
if ($_POST['var1']=="yes")
{$query = "SELECT observation_date as datetime1,  to_char($plotb *$MN , '999999D999') as value2 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
//Z
if ($_POST['var2']=="yes")
{$query = "SELECT observation_date as datetime1, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
//XY
if ($_POST['var0']=="yes" and $_POST['var1']=="yes")
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char($plotb *$MN , '999999D999') as value2 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
//XZ
if ($_POST['var0']=="yes" and $_POST['var2']=="yes")
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  ORDER BY observation_date;";}
//YZ
if ($_POST['var1']=="yes" and $_POST['var2']=="yes")
{$query = "SELECT observation_date as datetime1, to_char($plotb *$MN , '999999D999') as value2, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  ORDER BY observation_date;";}
////XYZ
if ($_POST['var0']=="yes" and $_POST['var1']=="yes" and $_POST['var2']=="yes")
{$query = "SELECT observation_date as datetime1, to_char($plota *$MN , '999999D999')  as value1, to_char($plotb *$MN , '999999D999') as value2, to_char(COALESCE($plotc,0) *$MN , '999999D999') as value3 from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;";}
}
//echo $query.'<br/><br/>';
$result = pg_query($query) or die(" " );
//$data = array();
$output= $tt. "\n";
fwrite($file, $output);
$output ="\n  DATE     ,         " ;
//fwrite($file, $query);
fwrite($file, $output);
//$output= $_SESSION['typea']. " ,           " . $_SESSION['typeb'] . " ,            " . $_SESSION['typec'] ;
//fwrite($file, $output);
if ($_POST['var0']=="yes")
{$output= $_SESSION['typea']. " ,           ";
fwrite($file, $output);}
if ($_POST['var1']=="yes")
{$output= $_SESSION['typeb']. " ,           ";
fwrite($file, $output);}
if ($_POST['var2']=="yes")
{$output= $_SESSION['typec']. " ,";
fwrite($file, $output);}

if ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean")
{$output=  "\n";
fwrite($file, $output);}
else
//{$output= "     sigma " . $_SESSION['typea']. " ,     sigma " . $_SESSION['typeb'] . ",      sigma " . $_SESSION['typec']. "\n";
//fwrite($file, $output);}
{if ($_POST['var0']=="yes")
{$output="      sigma " . $_SESSION['typea']." ,";
fwrite($file, $output);}
if ($_POST['var1']=="yes")
{$output="      sigma " . $_SESSION['typeb']." ," ;
fwrite($file, $output);}
if ($_POST['var2']=="yes")
{$output="      sigma " . $_SESSION['typec']. "\n";
fwrite($file, $output);}}
{$output=  "\n";
fwrite($file, $output);}
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
if ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="")
{$output = $row['datetime1'] . " , " . $row['value1'].  " , ". $row['value4'].  "\n";
fwrite($file, $output);}
if ($_POST['var1']=="yes" and $_POST['var0']=="" and $_POST['var2']=="")
{$output = $row['datetime1'] . " , " . $row['value2'].  " , ". $row['value5'].  "\n";
fwrite($file, $output);}
if ($_POST['var2']=="yes" and $_POST['var1']=="" and $_POST['var0']=="")
{$output = $row['datetime1'] . " , " . $row['value3'].  " , ". $row['value6'].  "\n";
fwrite($file, $output);}
if ($_POST['var0']=="yes" and $_POST['var1']=="yes" and $_POST['var2']=="")
{$output = $row['datetime1'] . " , " . $row['value1']." , ". $row['value2'].  " , ". $row['value4']." , ". $row['value5'].  "\n";
fwrite($file, $output);}
if ($_POST['var2']=="yes" and $_POST['var1']=="yes" and $_POST['var0']=="")
{$output = $row['datetime1'] . " , " . $row['value2']." , ". $row['value3'].  " , ". $row['value5']." , ". $row['value6'].  "\n";
fwrite($file, $output);}
if ($_POST['var0']=="yes" and $_POST['var2']=="yes" and $_POST['var1']=="")
{$output = $row['datetime1'] . " , " . $row['value1']." , ". $row['value3'].  " , ". $row['value4']." , ". $row['value6'].  "\n";
fwrite($file, $output);}
if ($_POST['var0']=="yes" and $_POST['var1']=="yes" and $_POST['var2']=="yes")
{$output = $row['datetime1'] . " , " . $row['value1']. " , ". $row['value2']. " , ". $row['value3']. " , " . $row['value4']. " , ". $row['value5']. " , " . $row['value6']. "\n";
fwrite($file, $output);}

}
fclose ($file);
?>