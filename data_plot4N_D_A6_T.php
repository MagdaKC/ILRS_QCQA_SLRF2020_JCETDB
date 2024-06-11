<!DOCTYPE html>
<html>
<head>
       <!-- 1. Add these JavaScript inclusions in the head of your page -->
  <link rel="stylesheet" href="css/butt.css" type="text/css" />
  <link rel="stylesheet" href="css/butt2.css" type="text/css" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
        <!-- highcharts-->
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://rawgithub.com/RolandBanguiran/highcharts-scalable-yaxis/master/scalable-yaxis.js"></script>
<script src="highcharts-regression.js"> </script>
<?php
//include_once('./common.php');
//dl_local('pgsql_new.so');
if (!extension_loaded('pgsql')) {
    dl('plpgsql.so');
}
$t=time();
$tt=date("d-M-Y H:i");
$t=date("H:i",$t);
//echo($t . "<br />");
//echo(date("H:i",$t));
$combination_center = $_POST[combination_center];
$analysis_center = $_POST[analysis_center];
$plot= $_POST[PLOTS2];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$solution=$_POST['solution2'];
$y_min=$_POST['y_min'];
$y_max=$_POST['y_max'];
$var0=$_POST['var0'];
$var1=$_POST['var1'];
$var2=$_POST['var2'];
$station_name = $_POST['station_name'];
$split = preg_split("/[\s]/", $station_name);
$station_name = $split[1];
$station_nameN = $split[0];

$color0=$_POST['color0'];
$color1=$_POST['color1'];
$color2=$_POST['color2'];
$marktype0=$_POST['marktype0'];
$marktype1=$_POST['marktype1'];
$marktype2=$_POST['marktype2'];
//echo SOL.'<br/><br/>';
//echo $solution.'<br/><br/>';
//echo $var0.'<br/><br/>';
//echo $var1.'<br/><br/>';
//echo $var2.'<br/><br/>';
//echo $color0.'<br/><br/>';
//echo $color1.'<br/><br/>';
//echo $color2.'<br/><br/>';
//echo $analysis_center.'<br/><br/>';
//echo $marktype0.'<br/><br/>';
//echo $marktype1.'<br/><br/>';
//echo $marktype2.'<br/><br/>';
//echo $tab.'<br/><br/>';
//SYMBOLS
    $mm="radius:6";
    if ($_POST[marktype0]=="circle_e")
{$marktype0="circle";
	    $mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}
if ($_POST[marktype0]=="square_e")
{$marktype0="square";
	$mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}
	if ($_POST[marktype0]=="diamond_e")
{$marktype0="diamond";
	$mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

	if ($_POST[marktype0]=="triangle_e")
{$marktype0="triangle";
	$mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

	if ($_POST[marktype0]=="triangle-down_e")
{$marktype0="triangle-down";
	$mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

	if ($_POST[marktype1]=="circle_e")
{$marktype1="circle";
	$mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}
	if ($_POST[marktype1]=="square_e")
{$marktype1="square";
	    $mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype1]=="diamond_e")
{$marktype1="diamond";
	    $mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype1]=="triangle_e")
{$marktype1="triangle";
	    $mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype1]=="triangle-down_e")
{$marktype1="triangle-down";
	    $mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		if ($_POST[marktype2]=="circle_e")
{$marktype2="circle";
	$mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}
	if ($_POST[marktype2]=="square_e")
{$marktype2="square";
	    $mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype2]=="diamond_e")
{$marktype2="diamond";
	    $mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype2]=="triangle_e")
{$marktype2="triangle";
	    $mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype2]=="triangle-down_e")
{$marktype2="triangle-down";
	    $mm="radius:6,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

//echo $marktype2.'<br/><br/>';
		//echo $mm.'<br/><br/>';
//REGRESION
		    $mva2=$_POST['mva2'];
			    $mulp=$_POST['mulp'];
				//echo $mulp.'<br/><br/>';
				if ($_POST[mulp]!="0")
{}
//REGRESION
$REG=$_POST['var4'];
//echo $REG.'<br/><br/>';

$color3=$_POST['color3'];
if ($_POST[var4]!="REG0")
//if ($mva2=='0')
//{
    if ($REG=="REG1")
{$REG11="regression: true , regressionSettings: { type: 'linear', color:  '$color3' , name : 'Linear regression'}, ";}
    if ($REG=="REG0")
{
	$REG55="regression: true , regressionSettings: { type: 'loess', color:  '$color3',lineWidth:'3', name : 'LOESS Function $mva2 %', loessSmooth: $mva2 },";}

//echo $REG11.'<br/><br/>';
//echo $REG22.'<br/><br/>';
//echo $REG33.'<br/><br/>';
//echo $REG44.'<br/><br/>';
//echo $REG55.'<br/><br/>';

//Scale defult

if ($_POST['y_max']=="Max" or $_POST['y_max']=="")
{
if ($_POST[PLOTS2]=="XYZ")
{$y_max="null";}
if ( $_POST[PLOTS2]=="NEU")
{$y_max="null";}
if ($_POST[PLOTS2]=="eop")
{$y_max="null";}
if ($_POST[PLOTS2]=="eopmean")
{$y_max="null";}
if ($_POST[PLOTS2]=="eopSTD")
{$y_max="null";}
if ($_POST[PLOTS2]=="Txyz")
{$y_max="null";}
if ($_POST[PLOTS2]=="Rxyz")
{$y_max="null";}
if ($_POST[PLOTS2]=="Helmert_Txyz_COM")
{$y_max="null";}
if ($_POST[PLOTS2]=="Helmert_Rxyz_COM")
{$y_max="null";}
}
if ($_POST['y_min']=="Min" or $_POST['y_min']=="")
{
if ($_POST[PLOTS2]=="XYZ")
{$y_min="null";}
if ( $_POST[PLOTS2]=="NEU")
{$y_min="null";}
if ($_POST[PLOTS2]=="eop")
{$y_min="null";}
if ($_POST[PLOTS2]=="eopmean")
{$y_min="null";}
if ($_POST[PLOTS2]=="eopSTD")
{$y_min="null";}
if ($_POST[PLOTS2]=="Txyz")
{$y_min="null";}
if ($_POST[PLOTS2]=="Rxyz")
{$y_min="null";}
if ($_POST[PLOTS2]=="Helmert_Txyz_COM")
{$y_min="null";}
if ($_POST[PLOTS2]=="Helmert_Rxyz_COM")
{$y_min="null";}
}
$titleB="7-day arc daily solution";

if ($_POST[PLOTS2]=="XYZ")
{ $tab = "$_POST[combination_center]_position_$_POST[analysis_center]";
$title1="$station_name $station_nameN AC($analysis_center) CC($combination_center) ";
$type="Offset [mm]";
$plota="X";
$plotaa="X";
$plotb="Y";
$plotbb="Y";
$plotc="Z";
$plotcc="Z";
$splota="sigx";
$splotb="sigy";
$splotc="sigz";}

if ( $_POST[PLOTS2]=="NEU")
{ $tab = "$_POST[combination_center]_euposition_$_POST[analysis_center]";
$title1="$station_name $station_nameN AC($analysis_center) CC($combination_center) ";
$type="Offset [mm]";
$plota="N";
$plotaa="N";
$plotb="E";
$plotbb="E";
$plotc="U";
$plotcc="U";
$splota="sign";
$splotb="sige";
$splotc="sigu";}

if ($_POST[PLOTS2]=="eop")
{ $tab = "$_POST[combination_center]_eop_$_POST[analysis_center]";
$title1="DAILY EOP AC($analysis_center) CC($combination_center ) vs ILRS BULLETIN A";
$type="Polar Motion [\u03BCas]";
$plota="EOPx";
$plotaa="X-pole";
$plotb="EOPy";
$plotbb="Y-pole";
$plotc="EOPlod";
$plotcc="LOD";
$splota="sigeopx";
$splotb="sigeopy";
$splotc="sigeoplod";}

if ($_POST[PLOTS2]=="eopmean")
{ $tab = "$_POST[combination_center]_eopmean_$_POST[analysis_center]";
$title1="WEEKLY MEAN EOP AC($analysis_center) CC($combination_center ) vs ILRS BULLETIN A";
//$title1=" $analysis_center vs IERS BULLETIN A From $combination_center ";
$type="Weighted Mean EOP Offset [\u03BCas]";
$plota="eopmean_x";
$plotaaa="EOPx";
$plotaa="X-pole";
//$plotaa="X-pole";
$plotb="eopmean_y";
$plotbbb="EOPy";
$plotbb="Y-pole";
$plotccc="EOPlod";
$plotc="eopmean_lod";
$plotcc="LOD";}
if ($_POST[PLOTS2]=="eopSTD")
{ $tab = "$_POST[combination_center]_eopstd_$_POST[analysis_center]";
$title1="WEEKLY STD EOP AC($analysis_center) CC($combination_center ) vs ILRS BULLETIN A";
//$title1=" $analysis_center vs IERS BULLETIN A From $combination_center ";
$type="Standard Deviation EOP [\u03BCas]";
$plota="eopstd_x";
$plotaaa="EOPx";
$plotaa="X-pole";
$plotb="eopstd_y";
$plotbbb="EOPy";
$plotbb="Y-pole";
$plotc="eopstd_lod";
$plotccc="EOPlod";
$plotcc="LOD";}
if ($_POST[PLOTS2]=="Txyz")
{$tab = "$_POST[combination_center]_info_$_POST[analysis_center]";
$title1="ORIGIN OFFSETS wrt SLRF2020 AC($analysis_center) CC($combination_center) ";
$type="Origin Offset [mm]";
$plota="Tx";
$plotaa="TX";
$plotb="Ty";
$plotbb="TY";
$plotc="Tz";
$plotcc="TZ";
$splota="txs";
$splotb="tys";
$splotc="tzs";}

if ($_POST[PLOTS2]=="Rxyz")
{$tab = "$_POST[combination_center]_info_$_POST[analysis_center]";
$title1="EULER ROTATIONS wrt SLRF2020 AC($analysis_center) CC($combination_center) ";
$type="Rotation [mas]";
$plota="Rx";
$plotaa="RX";
$plotb="Ry";
$plotbb="RY";
$plotc="Rz";
$plotcc="RZ";
$splota="rxs";
$splotb="rys";
$splotc="rzs";}



if ($_POST[PLOTS2]=="Helmert_Txyz_COM")
{$tab = "$_POST[combination_center]_helemrtinfo_$_POST[analysis_center]";
if ($_POST[combination_center]=="ilrsa")
{$ti="ILRS-A";}
if ($_POST[combination_center]=="ilrsb")
{$ti="ILRS-B";}
$title1="ORIGIN OFFSETS wrt COMBINED SOLUTION AC($analysis_center) CC($combination_center) ";
$type="Origin Offset [mm]";
$plota="Tx";
$plotaa="TX";
$plotb="Ty";
$plotbb="TY";
$plotc="Tz";
$plotcc="TZ";
$splota="txs";
$splotb="tys";
$splotc="tzs";}

if ($_POST[PLOTS2]=="Helmert_Rxyz_COM")
{$tab = "$_POST[combination_center]_helemrtinfo_$_POST[analysis_center]";
if ($_POST[combination_center]=="ilrsa")
{$ti="ILRS-A";}
if ($_POST[combination_center]=="ilrsb")
{$ti="ILRS-B";}
$title1="EULER ROTATIONS wrt COMBINED SOLUTION AC($analysis_center) CC($combination_center) ";
$type="Rotation  [mas]";
$plota="Rx";
$plotcc="Rx";
$plotb="Ry";
$plotcc="Ry";
$plotc="Rz";
$plotcc="Rz";
$splota="rxs";
$splotb="rys";
$splotc="rzs";}

//echo $tab.'<br/><br/>';
//echo $station_id.'<br/><br/>';
//echo $station_nameN.'<br/><br/>';
//echo $plota.'<br/><br/>';

//echo $plota.'<br/><br/>';
$LegendX="false";
$LegendY="false";
$LegendZ="false";
if ($_POST[combination_center]=="ilrsa")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";}
if ($_POST[combination_center]=="ilrsb")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";}
$db_handle = pg_connect($conn_string);
if ($_POST[combination_center]=="ilrsb")
{
	if ($_POST[PLOTS2]=="XYZ")
{$MN=1000;}
if ($_POST[PLOTS2]=="NEU")
{$MN=1;}
if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{$queryS1 = "SELECT distinct STDDEV ($plota *$MN )  from $tab where  observation_date >= '$start_date' and observation_date < '$end_date' and station_id='$station_nameN';";
$queryS2 = "SELECT distinct STDDEV ($plotb *$MN )  from $tab where  observation_date >= '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ;";
$queryS3 = "SELECT distinct STDDEV ($plotc *$MN )  from $tab where  observation_date >= '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ;";}
//mkc
else if ($_POST[PLOTS2]=="eop")
{ $queryS1 = "SELECT distinct STDDEV ($plota *1000 ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' and solution=$solution ;";
 $queryS2 = "SELECT distinct STDDEV ($plotb *1000 ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' and solution=$solution ;";
 $queryS3 = "SELECT distinct STDDEV ($plotc *1000 ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' and solution=$solution ;";}
else
//"eop, Txyz, Rxyz")
{ $queryS1 = "SELECT distinct STDDEV ($plota *1000 ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' ;";
 $queryS2 = "SELECT distinct STDDEV ($plotb *1000 ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' ;";
 $queryS3 = "SELECT distinct STDDEV ($plotc *1000 ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' ;";}}

if ($_POST[combination_center]=="ilrsa")
{if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{$queryS1 = "SELECT distinct STDDEV ($plota)  from $tab where  observation_date >= '$start_date' and observation_date < '$end_date' and station_id='$station_nameN';";
$queryS2 = "SELECT distinct STDDEV ($plotb )  from $tab where  observation_date >= '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ;";
$queryS3 = "SELECT distinct STDDEV ($plotc )  from $tab where  observation_date >= '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ;";}
//mkc
else if ($_POST[PLOTS2]=="eop")
{ $queryS1 = "SELECT distinct STDDEV ($plota *1000 ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' and solution=$solution ;";
 $queryS2 = "SELECT distinct STDDEV ($plotb *1000 ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' and solution=$solution ;";
 $queryS3 = "SELECT distinct STDDEV ($plotc *1000 ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' and solution=$solution ;";}
else
//"eop, Txyz, Rxyz")
{ $queryS1 = "SELECT distinct STDDEV ($plota  ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' ;";
 $queryS2 = "SELECT distinct STDDEV ($plotb  ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' ;";
 $queryS3 = "SELECT distinct STDDEV ($plotc  ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' ;";}}
//echo $queryS1.'<br/>';
//echo $queryS2.'<br/>';
//echo $queryS3.'<br/>';
$resultS1 = pg_query($queryS1) or die("" );
$resultS2 = pg_query($queryS2) or die("" );
$resultS3 = pg_query($queryS3) or die("" );
$std1 = pg_fetch_array($resultS1, 0, PGSQL_NUM);
$std1=number_format($std1[0], 2, '.', '');
$std2 = pg_fetch_array($resultS2, 0, PGSQL_NUM);
$std2=number_format($std2[0], 2, '.', '');
$std3 = pg_fetch_array($resultS3, 0, PGSQL_NUM);
$std3=number_format($std3[0], 2, '.', '');
//echo $std1.'<br/>';
//echo $std2.'<br/>';
//echo $std3.'<br/>';
$limita1=$std1*3.5;
$limita2=$std2*3.5;
$limita3=$std3*3.5;
$limitb1=$std1*(-3.5);
$limitb2=$std2*(-3.5);
$limitb3=$std3*(-3.5);
//echo $limita1.'<br/>';
//echo $limitb1.'<br/>';
//echo $limita2.'<br/>';
//echo $limitb2.'<br/>';
//echo $limita3.'<br/>';
//echo $limitb3.'<br/>';

if ($_POST[combination_center]=="ilrsa" )
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $splota as value4 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' and $plota  < $limita1 and $plota > $limitb1  ORDER BY observation_date;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb as value2, $splotb as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' and $plotb  < $limita2 and $plotb > $limitb2  ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc as value3, $splotc as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' and $plotc  < $limita3 and $plotc > $limitb3 ORDER BY observation_date;";}
//echo $query1;
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $plotb as value2 , $plotc as value3 , $splota as value4, $splotb as value5, $splotc as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN';";}

if ($_POST[combination_center]=="ilrsb" and $_POST[PLOTS2]=="XYZ" )
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";

$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota *1000 as value1, $splota *1000 as value4 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' and $plota *1000 < $limita1 and $plota *1000> $limitb1 ORDER BY observation_date;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb *1000 as value2, $splotb *1000 as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' and $plotb *1000 < $limita2 and $plotb *1000> $limitb2 ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc *1000 as value3, $splotc *1000 as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' and $plotc *1000 < $limita3 and $plotc *1000> $limitb3 ORDER BY observation_date;";}

//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota *1000 as value1, $plotb * 1000 as value2 , $plotc *1000 as value3 , $splota *1000 as value4, $splotb *1000 as value5, $splotc *1000 as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN';";}

if ($_POST[combination_center]=="ilrsb" and $_POST[PLOTS2]=="NEU")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $splota as value4 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' and $plota  < $limita1 and $plota > $limitb1   ORDER BY observation_date;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb as value2, $splotb as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' and $plotb  < $limita2 and $plotb > $limitb2   ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc as value3, $splotc as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' and $plotc  < $limita3 and $plotc > $limitb3   ORDER BY observation_date;";}
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $plotb as value2 , $plotc as value3 , $splota as value4, $splotb as value5, $splotc as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN';";}

if ($_POST[combination_center]=="ilrsa" )
{ if ($_POST[PLOTS2]=="Rxyz" or $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" or $_POST[PLOTS2]=="Helmert_Rxyz_COM")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $splota as value4 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ORDER BY observation_date;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb as value2, $splotb as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotb  < $limita2 and $plotb > $limitb2 ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc as value3, $splotc as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotc  < $limita3 and $plotc > $limitb3 ORDER BY observation_date;";}}


//mkc 
if ($_POST[combination_center]=="ilrsa" )
{ if ($_POST[PLOTS2]=="eop" )
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $splota as value4 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 and solution=$solution  ORDER BY observation_date ;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb as value2, $splotb as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotb  < $limita2 and $plotb > $limitb2 and solution=$solution  ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc as value3, $splotc as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotc  < $limita3 and $plotc > $limitb3 and solution=$solution  ORDER BY observation_date;";}}

if ($_POST[combination_center]=="ilrsb" )
{ if( $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" )
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";

$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota *1000 as value1, $splota *1000 as value4 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plota *1000 < $limita1 and $plota *1000> $limitb1   ORDER BY observation_date;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb *1000 as value2, $splotb *1000 as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotb *1000 < $limita2 and $plotb *1000> $limitb2   ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc *1000 as value3, $splotc *1000 as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotc *1000 < $limita3 and $plotc *1000> $limitb3   ORDER BY observation_date;";}}

//mkc
if ($_POST[combination_center]=="ilrsb" )
{ if( $_POST[PLOTS2]=="eop"  )
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";

$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota *1000 as value1, $splota *1000 as value4 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plota *1000 < $limita1 and $plota *1000> $limitb1  and solution=$solution  ORDER BY observation_date;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb *1000 as value2, $splotb *1000 as value5 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotb *1000 < $limita2 and $plotb *1000> $limitb2 and solution=$solution   ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc *1000 as value3, $splotc *1000 as value6 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotc *1000 < $limita3 and $plotc *1000> $limitb3 and solution=$solution   ORDER BY observation_date;";}}

if ($_POST[combination_center]=="ilrsa" and $_POST[PLOTS2]=="eopmean")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";

$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ORDER BY observation_date;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb as value2 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotb  < $limita2 and $plotb > $limitb2 ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc as value3 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotc  < $limita3 and $plotc > $limitb3 ORDER BY observation_date;";}
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $plotb as value2 , $plotc as value3  from $tab where observation_date > '$start_date' and observation_date < '$end_date' ;";}


if ($_POST[combination_center]=="ilrsb" and $_POST[PLOTS2]=="eopmean")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";

$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota *1000 as value1 from  $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plota *1000 < $limita1 and $plota *1000> $limitb1 ORDER BY observation_date;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb *1000 as value2 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotb *1000 < $limita2 and $plotb *1000> $limitb2 ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc *1000 as value3 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotc *1000 < $limita3 and $plotc *1000> $limitb3 ORDER BY observation_date;";}
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota *1000 as value1, $plotb *1000 as value2 , $plotc *1000 as value3  from $tab where observation_date > '$start_date' and observation_date < '$end_date' ;";}


if ($_POST[combination_center]=="ilrsa" and $_POST[PLOTS2]=="eopSTD")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";

$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ORDER BY observation_date;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb as value2 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotb  < $limita2 and $plotb > $limitb2 ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc as value3 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotc  < $limita3 and $plotc > $limitb3 ORDER BY observation_date;";}
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $plotb as value2 , $plotc as value3  from $tab where observation_date > '$start_date' and observation_date < '$end_date' ;";}


if ($_POST[combination_center]=="ilrsb" and $_POST[PLOTS2]=="eopSTD")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";

$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota *1000 as value1 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plota *1000 < $limita1 and $plota *1000> $limitb1 ORDER BY observation_date;";
$query2 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime2, $plotb *1000 as value2 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotb *1000 < $limita2 and $plotb *1000> $limitb2 ORDER BY observation_date;";
$query3 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime3, $plotc *1000 as value3 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plotc *1000 < $limita3 and $plotc *1000> $limitb3 ORDER BY observation_date;";}
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota *1000 as value1, $plotb *1000 as value2 , $plotc *1000 as value3  from $tab where observation_date > '$start_date' and observation_date < '$end_date' ;";}
//echo $query1.'<br/><br/>';
$db_handle = pg_connect($conn_string);
$ANSWER="";
//$result = pg_query($query1) or die(" " );
$result = pg_query($query1) or die("<br><br><br><br><br><br><br><br><br><center><font color='red' size='24'>$ANSWER </font>");
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
$datetime = $row['datetime1'];
//X
if ($_POST['var0']=="yes")
{$val1  = $row['value1'];
 $val4  = $row['value4'];
 $val7 = $val1  + $val4;
 $val8 = $val1  - $val4;
 $data1[] = "[$datetime, $val1]";
 $data2[] = "[ $datetime,  $val7,  $val8]";}}

//Y

$result = pg_query($query2) or die("<br><br><br><br><br><br><br><br><br><center><font color='red' size='24'>$ANSWER </font>");
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
$datetime = $row['datetime2'];
if ($_POST['var1']=="yes")
{$val2  = $row['value2'];
$val5  = $row['value5'];
$val9  = $val2  + $val5;
$val10 = $val2  - $val5;
$data3[] = "[$datetime, $val2]";
$data4[] = "[ $datetime,  $val9,  $val10]";}}
//print_r($data3);
//Z 
$result = pg_query($query3) or die("<br><br><br><br><br><br><br><br><br><center><font color='red' size='24'>$ANSWER </font>");
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
$datetime = $row['datetime3'];
if ($_POST['var2']=="yes")
{$val3  = $row['value3'];
$val6  = $row['value6'];
$val11 = $val3  + $val6;
$val12 = $val3  - $val6;
$data5[] = "[$datetime, $val3]";
$data6[] = "[ $datetime,  $val11,  $val12]";}
}



//X
if ($_POST['var0']=="yes")
{$LegendX="true";
if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{if ($_POST[combination_center]=="ilrsb")
	{ $queryS = "SELECT distinct AVG ($plota *$MN)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plota *$MN  < $limita1 and $plota *$MN > $limitb1;";}


if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plota  < $limita1 and $plota > $limitb1;";}}

//mkc 
if ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean" or $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" or $_POST[PLOTS2]=="Rxyz" or $_POST[PLOTS2]=="Helmert_Rxyz_COM"  )
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct AVG ($plota *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota *1000  < $limita1 and $plota *1000 > $limitb1 ;";}}
if ($_POST[PLOTS2]=="eop")
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 and solution=$solution ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct AVG ($plota *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota *1000  < $limita1 and $plota *1000 > $limitb1 and solution=$solution ;";}}
//echo $queryS.'<br/><br/>';
$resultS = pg_query($queryS) or die("" );
$avg = pg_fetch_array($resultS, 0, PGSQL_NUM);


///NUM
if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{if ($_POST[combination_center]=="ilrsb")
	{ $queryS = "SELECT count ($plota *$MN)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plota *$MN  < $limita1 and $plota *$MN > $limitb1;";}


if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT count ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plota  < $limita1 and $plota > $limitb1;";}}
//mkc
if ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean" or $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" or $_POST[PLOTS2]=="Rxyz" or $_POST[PLOTS2]=="Helmert_Rxyz_COM"  )
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT count ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT count ($plota *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota *1000  < $limita1 and $plota *1000 > $limitb1 ;";}}
if ($_POST[PLOTS2]=="eop")
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT count ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 and solution=$solution ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT count ($plota *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota *1000  < $limita1 and $plota *1000 > $limitb1 and solution=$solution ;";}}
//echo $queryS.'<br/><br/>';
$resultS = pg_query($queryS) or die("" );
$num = pg_fetch_array($resultS, 0, PGSQL_NUM);

//STD
//mkc
if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct STDDEV ($plota *$MN )  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plota *$MN   < $limita1 and $plota *$MN  > $limitb1;";}
if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plota  < $limita1 and $plota > $limitb1;";}}
if ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean" or $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" or $_POST[PLOTS2]=="Rxyz" or $_POST[PLOTS2]=="Helmert_Rxyz_COM"  )
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct STDDEV ($plota *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota *1000  < $limita1 and $plota *1000 > $limitb1 ;";}}

if ($_POST[PLOTS2]=="eop")
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 and solution=$solution ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct STDDEV ($plota *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota *1000  < $limita1 and $plota *1000 > $limitb1 and solution=$solution ;";}}
$resultS = pg_query($queryS) or die("" );
$std = pg_fetch_array($resultS, 0, PGSQL_NUM);
//echo $queryS.'<br/><br/>';

$avg1=number_format($avg[0],2);
$std1=number_format($std[0],2);
$num1=number_format($num[0],0);
$tilteX=" $plotaa $avg \u00B1 $std ";
//echo $queryS.'<br/><br/>';
}

//echo $LegendX.'<br/><br/>';
//Y
if ($_POST['var1']=="yes")
{$LegendY="true";


if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct AVG ($plotb *$MN )  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plotb *$MN   < $limita2 and $plotb *$MN  > $limitb2;";}
if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plotb)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plotb  < $limita2 and $plotb > $limitb2;";}}
if ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean" or $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" or $_POST[PLOTS2]=="Rxyz" or $_POST[PLOTS2]=="Helmert_Rxyz_COM"  )
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plotb)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotb  < $limita2 and $plotb > $limitb2 ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct AVG ($plotb *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotb *1000  < $limita2 and $plotb *1000 > $limitb2 ;";}}
//mkc
if ($_POST[PLOTS2]=="eop")
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plotb)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotb  < $limita2 and $plotb > $limitb2 and solution=$solution ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct AVG ($plotb *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotb *1000  < $limita2 and $plotb *1000 > $limitb2 and solution=$solution ;";}}
$resultS = pg_query($queryS) or die("" );
$avg = pg_fetch_array($resultS, 0, PGSQL_NUM);

//echo $queryS.'<br/><br/>';

if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct STDDEV ($plotb *$MN )  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plotb *$MN   < $limita2 and $plotb *$MN  > $limitb2;";}
if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plotb)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plotb  < $limita2 and $plotb > $limitb2;";}}
if  ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean" or $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" or $_POST[PLOTS2]=="Rxyz" or $_POST[PLOTS2]=="Helmert_Rxyz_COM"  )
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plotb)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotb  < $limita2 and $plotb > $limitb2 ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct STDDEV ($plotb *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotb *1000  < $limita2 and $plotb *1000 > $limitb2 ;";}}
 
if ($_POST[PLOTS2]=="eop")
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plotb)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotb  < $limita2 and $plotb > $limitb2 and solution=$solution ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct STDDEV ($plotb *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotb *1000  < $limita2 and $plotb *1000 > $limitb2 and solution=$solution ;";}}
$resultS = pg_query($queryS) or die("" );
$std = pg_fetch_array($resultS, 0, PGSQL_NUM);
//echo $queryS.'<br/><br/>';

$avg2=number_format($avg[0],2);
$std2=number_format($std[0],2);
$num2=number_format($num[0],0);
$tilteY=" $plotbb $avg \u00B1 $std ";
//echo $tab.'<br/><br/>';
//echo $queryS.'<br/><br/>';
}
//Z
if ($_POST['var2']=="yes")
{$LegendZ="true";

if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct AVG ($plotc *$MN )  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plotc *$MN   < $limita3 and $plotc *$MN  > $limitb3;";}
if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plotc)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plotc  < $limita3 and $plotc > $limitb3;";}}
if ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean" or $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" or $_POST[PLOTS2]=="Rxyz" or $_POST[PLOTS2]=="Helmert_Rxyz_COM"  )
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plotc)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc  < $limita3 and $plotc > $limitb3 ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct AVG ($plotc *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc *1000  < $limita3 and $plotc *1000 > $limitb3 ;";}}
if ($_POST[PLOTS2]=="eop")
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plotc)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc  < $limita3 and $plotc > $limitb3 and solution=$solution ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct AVG ($plotc *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc *1000  < $limita3 and $plotc *1000 > $limitb3 and solution=$solution ;";}}
$resultS = pg_query($queryS) or die("" );
$avg = pg_fetch_array($resultS, 0, PGSQL_NUM);


if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT count  ($plotc *$MN )  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plotc *$MN   < $limita3 and $plotc *$MN  > $limitb3;";}
if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT count  ($plotc)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plotc  < $limita3 and $plotc > $limitb3;";}}
if ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean" or $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" or $_POST[PLOTS2]=="Rxyz" or $_POST[PLOTS2]=="Helmert_Rxyz_COM"  )
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT count  ($plotc)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc  < $limita3 and $plotc > $limitb3 ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT count  ($plotc *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc *1000  < $limita3 and $plotc *1000 > $limitb3 ;";}}
if ($_POST[PLOTS2]=="eop")
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT count  ($plotc)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc  < $limita3 and $plotc > $limitb3 and solution=$solution ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT count  ($plotc *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc *1000  < $limita3 and $plotc *1000 > $limitb3 and solution=$solution ;";}}
$resultS = pg_query($queryS) or die("" );
$num = pg_fetch_array($resultS, 0, PGSQL_NUM);

if ($_POST[PLOTS2]=="XYZ" or $_POST[PLOTS2]=="NEU")
{if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct STDDEV ($plotc *$MN )  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plotc *$MN   < $limita3 and $plotc *$MN  > $limitb3;";}
if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plotc)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plotc  < $limita3 and $plotc > $limitb3;";}}
if ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean" or $_POST[PLOTS2]=="Txyz" or $_POST[PLOTS2]=="Helmert_Txyz_COM" or $_POST[PLOTS2]=="Rxyz" or $_POST[PLOTS2]=="Helmert_Rxyz_COM"  )
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plotc)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc  < $limita3 and $plotc > $limitb3 ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct STDDEV ($plotc *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc *1000  < $limita3 and $plotc *1000 > $limitb3 ;";}}
if ($_POST[PLOTS2]=="eop")
{if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plotc)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc  < $limita3 and $plotc > $limitb3 and solution=$solution ;";}
if ($_POST[combination_center]=="ilrsb")
{$queryS = "SELECT distinct STDDEV ($plotc *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plotc *1000  < $limita3 and $plotc *1000 > $limitb3 and solution=$solution ;";}}
//echo $query2.'<br/><br/>';

$resultS = pg_query($queryS) or die("" );
$std = pg_fetch_array($resultS, 0, PGSQL_NUM);
//echo $queryS.'<br/><br/>';

$avg3=number_format($avg[0],2);
$std3=number_format($std[0],2);
$num3=number_format($num[0],0);
$tilteZ=" $plotcc $avg \u00B1 $std ";
//echo $queryS.'<br/><br/>';
}

////echo $LegendZ.'<br/><br/>';
//print_r($data1);
//echo $plota.'<br/><br/>';
//print_r($data2);
//echo $plota.'<br/><br/>';
//print_r($data3);
//echo $plota.'<br/><br/>';
//print_r($data4);
//echo $plota.'<br/><br/>';
//print_r($data5);
//echo $plota.'<br/><br/>';
//print_r($data6);
//$newfile="/tmp/${plot}_$t.txt";
#$newfileE="${plot}_${combination_center}_${analysis_center}_$t";
$newfileE1="${plota}_${combination_center}_${analysis_center}";
$newfileE2="${plotb}_${combination_center}_${analysis_center}";
$newfileE3="${plotc}_${combination_center}_${analysis_center}";
$newfile="/tmp/${plot}_${combination_center}_${analysis_center}_${station_nameN}_$t.csv";
if(file_exists("$newfile")) unlink("$newfile");
unlink($newfile);
$file = fopen ($newfile, "a");
//echo $newfile ; //retrieve data
if ($_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="eopmean")
{}
else
{$plotaaa=$plota;
$plotbbb=$plotb;
$plotccc=$plotc;}

?>
<?php
session_start();
//session_register('filename');
$_SESSION['typea'] = $plotaaa; // store session data
$_SESSION['typeb'] = $plotbbb; // store session data
$_SESSION['typec'] = $plotccc; // store session data
$_SESSION['splota'] = $splota; // store session data
$_SESSION['splotb'] = $splotb; // store session data
$_SESSION['splotc'] = $splotc; // store session data
$_SESSION['views'] = $newfilea; // store session data
$_SESSION['filename'] = $newfile; // store session data
$_SESSION['filenamea'] = $newfilea; // store session data
$_SESSION['solution'] = $solution; // store session data
//echo "Pageviews = ". $_SESSION['views']; //retrieve data
//echo "Pag = ". $_SESSION['filename']; //retrieve data
?>
<script>
    //Wait until the document is ready to be processed.
    jQuery(document).ready(function()
    {
        //Init your dialog box.
        $("#dialog").dialog({autoOpen:true,
    position: [20, 20],
    open: function(event, ui) {
        var $dialog  = $(event.target);
        var position = $dialog.dialog('option', 'position');
        $dialog.closest('.ui-dialog').css({
            left: position[0],
            top:  position[1]
        });
    },
    resizable: false,width: 340,height: 80});
		$(".ui-dialog-titlebar").hide();

        //Attach you click handler to the button.
        $("#opener").click(function(event)
        {
            //Stop any default actions on the button.
            event.preventDefault();
            //Open your dialog.
            $("#dialog").dialog("open");
        });
    });
    </script>
<script>
    //Wait until the document is ready to be processed.
    jQuery(document).ready(function()
    {
        //Init your dialog box.
        $("#dialog2").dialog({autoOpen:true,
    position: [20, 750],
    open: function(event, ui) {
        var $dialog  = $(event.target);
        var position = $dialog.dialog('option', 'position');
        $dialog.closest('.ui-dialog').css({
            left: position[0],
            top:  position[1]
        });
    },
    resizable: false,width: 340,height: 80});
		$(".ui-dialog-titlebar").hide();


        //Attach you click handler to the button.
        $("#opener2").click(function(event)
        {
            //Stop any default actions on the button.
            event.preventDefault();
            //Open your dialog.
            $("#dialog2").dialog("open");
        });
    });
    </script>
<script>
    //Wait until the document is ready to be processed.
    jQuery(document).ready(function()
    {
        //Init your dialog box.
        $("#dialog3").dialog({autoOpen:true ,
    position: [20, 1110],
    open: function(event, ui) {
        var $dialog  = $(event.target);
        var position = $dialog.dialog('option', 'position');
        $dialog.closest('.ui-dialog').css({
            left: position[0],
            top:  position[1]
        });
    },
    resizable: false,width: 340,height: 80});
		$(".ui-dialog-titlebar").hide();
        //Attach you click handler to the button.
        $("#opener3").click(function(event)
        {
            //Stop any default actions on the button.
            event.preventDefault();
            //Open your dialog.
            $("#dialog3").dialog("open");
        });
    });
    </script>
<script>
 var chart1, chart2, chart3;
