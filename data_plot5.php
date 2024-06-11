<?php
//include_once('./common.php');
//dl_local('pgsql_new.so');
if (!extension_loaded('pgsql')) {
    dl('plpgsql.so');
}
$t=time();
$tt=date("d-M-Y H:i");
$t=date("H:i",$t);

$combination_center = $_POST[combination_center];
$analysis_center = $_POST[analysis_center];
$plot= $_POST[PLOTS2];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$y_min=$_POST['y_min'];
$y_max=$_POST['y_max'];

//SYMBOLS
    $mm="radius:2";
    if ($_POST[marktype0]=="circle_e")
{$marktype0="circle";
	    $mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}
if ($_POST[marktype0]=="square_e")
{$marktype0="square";
	$mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}
	if ($_POST[marktype0]=="diamond_e")
{$marktype0="diamond";
	$mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

	if ($_POST[marktype0]=="triangle_e")
{$marktype0="triangle";
	$mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

	if ($_POST[marktype0]=="triangle-down_e")
{$marktype0="triangle-down";
	$mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

	if ($_POST[marktype1]=="circle_e")
{$marktype1="circle";
	$mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}
	if ($_POST[marktype1]=="square_e")
{$marktype1="square";
	    $mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype1]=="diamond_e")
{$marktype1="diamond";
	    $mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype1]=="triangle_e")
{$marktype1="triangle";
	    $mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype1]=="triangle-down_e")
{$marktype1="triangle-down";
	    $mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		if ($_POST[marktype2]=="circle_e")
{$marktype2="circle";
	$mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}
	if ($_POST[marktype2]=="square_e")
{$marktype2="square";
	    $mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype2]=="diamond_e")
{$marktype2="diamond";
	    $mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype2]=="triangle_e")
{$marktype2="triangle";
	    $mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}

		    if ($_POST[marktype2]=="triangle-down_e")
{$marktype2="triangle-down";
	    $mm="radius:2,fillColor: 'transparent',lineWidth: 1, lineColor: null";}
// SCALE defult
if ($_POST['y_max']=="Max" or $_POST['y_max']=="")
{
if ($_POST[PLOTS2]=="Scale")
{$y_max="null";}
if($_POST[PLOTS2]=="Scale_COM" )
{$y_max="null";}
if($_POST[PLOTS2]=="GRMS")
{$y_max="null";}
if($_POST[PLOTS2]=="CRMS")
{$y_max="null";}
}
if ($_POST['y_min']=="Min" or $_POST['y_min']=="")
{if ($_POST[PLOTS2]=="Scale")
{$y_min="null";}
if($_POST[PLOTS2]=="Scale_COM" )
{$y_min="null";}
if($_POST[PLOTS2]=="GRMS")
{$y_min="null";}
if($_POST[PLOTS2]=="CRMS")
{$y_min="null";}
}
$Legend="false";
$color0=$_POST['color0'];
$color1=$_POST['color1'];
$color2=$_POST['color2'];
$marktype0=$_POST['marktype0'];
$marktype1=$_POST['marktype1'];
$marktype2=$_POST['marktype2'];



if ($_POST[PLOTS2]=="Scale")
{$tab = "$_POST[combination_center]_info_$_POST[analysis_center]";
$type="SCALE [ppb]";
$title1="vs SLRF2020";
$plota="scal";
$plotaa="SCALE";
$splota="scals";
$title1="SCALE wrt SLRF2020 AC($analysis_center) CC($combination_center)"; } 
if($_POST[PLOTS2]=="Scale_COM" )
{$tab = "$_POST[combination_center]_helemrtinfo_$_POST[analysis_center]";
$type="SCALE [ppb]";
$plota="scale";
$plotaa="SCALE";
$splota="scales";
$title1="SCALE wrt COMBINED SOLUTION  AC($analysis_center) CC($combination_center)";}
if($_POST[PLOTS2]=="GRMS")
{$tab = "$_POST[combination_center]_info_$_POST[analysis_center]";
$type="Global WRMS [mm]";
$title1="vs SLRF2020";
$plota="grms";
$plotaa="WRMS";
$title1="GLOBAL WRMS wrt SLRF2020 AC($analysis_center) CC($combination_center)";}

if($_POST[PLOTS2]=="CRMS")
{$tab = "$_POST[combination_center]_info_$_POST[analysis_center]";
$type="Core WRMS [mm]";
$title1="vs SLRF2020";
$plota="crms";
$plotaa="CRMS";
$title1=" Core WRMS wrt SLRF2020 AC($analysis_center) CC($combination_center)";}


if ($_POST[combination_center]=="ilrsa")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_slrf2020 user=jasongroup  connect_timeout=2";}
if ($_POST[combination_center]=="ilrsb")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_slrf2020 user=jasongroup  connect_timeout=2";}
$db_handle = pg_connect($conn_string);
if ($_POST[combination_center]=="ilrsb")
{if($_POST[PLOTS2]=="GRMS" or $_POST[PLOTS2]=="CRMS")
{$queryS1 = "SELECT distinct STDDEV ($plota *1000 ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' ;";}
else
{$queryS1 = "SELECT distinct STDDEV ($plota ) from $tab where observation_date >= '$start_date' and observation_date < '$end_date' ;";}}
if ($_POST[combination_center]=="ilrsa")
{$queryS1 = "SELECT distinct STDDEV ($plota)  from $tab where  observation_date >= '$start_date' and observation_date < '$end_date' ;";}
//echo $queryS1.'<br/>';
$resultS1 = pg_query($queryS1) or die("" );
$std1 = pg_fetch_array($resultS1, 0, PGSQL_NUM);
$std1=number_format($std1[0], 2, '.', '');
//echo $std1.'<br/>';
//echo $std2.'<br/>';
//echo $std3.'<br/>';
$limita1=$std1*3.5;
$limitb1=$std1*(-3.5);
//echo $limita1.'<br/>';
//echo $limitb1.'<br/>';


if ($_POST[combination_center]=="ilrsa")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_slrf2020 user=jasongroup  connect_timeout=2";
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $splota as value2 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and $plota  < $limita1 and $plota > $limitb1 ;";}
if ($_POST[combination_center]=="ilrsb")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_slrf2020 user=jasongroup  connect_timeout=2";}
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $splota as value2 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and $plota  < $limita1 and $plota > $limitb1 ;";

$db_handle = pg_connect($conn_string);

//echo $query1.'<br/><br/>';
if($_POST[PLOTS2]=="GRMS" or $_POST[PLOTS2]=="CRMS")
{if ($_POST[combination_center]=="ilrsa")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_slrf2020 user=jasongroup  connect_timeout=2";
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and $plota  < $limita1 and $plota > $limitb1 ;"; }
if ($_POST[combination_center]=="ilrsb")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_slrf2020 user=jasongroup  connect_timeout=2";
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota *1000 as value1 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and $plota *1000  < $limita1 and $plota *1000 > $limitb1 ;";}}

//echo $query1.'<br/><br/>';
$result = pg_query($query1) or die("" );
$data1 = array();
$data2 = array();
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
$datetime = $row['datetime1'];
//
$val1  = $row['value1'];
$val2  = $row['value2'];

$val3 = $val1  + $val2;
$val4 = $val1  - $val2;
//
 $data1[] = "[$datetime, $val1]";
 $data2[] = "[ $datetime,  $val3,  $val4]";
}
//print_r($data2);
if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}

if ($_POST[combination_center]=="ilrsb")
{if($_POST[PLOTS2]=="GRMS" or $_POST[PLOTS2]=="CRMS")
{$queryS = "SELECT distinct AVG ($plota *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  *1000 < $limita1 and $plota  *1000 > $limitb1 ;";}
else
{$queryS = "SELECT distinct AVG ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}}

//echo $queryS.'<br/><br/>';
$resultS = pg_query($queryS) or die("" );
$avg = pg_fetch_array($resultS, 0, PGSQL_NUM);

if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}

if ($_POST[combination_center]=="ilrsb")
{if($_POST[PLOTS2]=="GRMS" or $_POST[PLOTS2]=="CRMS")
{$queryS = "SELECT distinct STDDEV ($plota *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  *1000 < $limita1 and $plota  *1000 > $limitb1 ;";}
else
{$queryS = "SELECT distinct STDDEV ($plota)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}}

//echo $queryS.'<br/><br/>';
$resultS = pg_query($queryS) or die("" );
$std = pg_fetch_array($resultS, 0, PGSQL_NUM);

$avg=number_format($avg[0],2);
$std=number_format($std[0],2);
$tilte=" $plotaa $avg \u00B1 $std ";
//$newfile="/tmp/${plota}_$t.txt";
$newfile="/tmp/${plot}_${combination_center}_${analysis_center}_$t.txt";
$newfileE="${plot}_${combination_center}_${analysis_center}";
if(file_exists("$newfile")) unlink("$newfile");
unlink($newfile);
$file = fopen ($newfile, "a");
?>
<?php
session_start();
//session_register('filename');
$_SESSION['type'] = $type; // store session data
$_SESSION['views'] = $newfilea; // store session data
$_SESSION['filename'] = $newfile; // store session data
$_SESSION['filenamea'] = $newfilea; // store session data
//echo "Pageviews = ". $_SESSION['views']; //retrieve data
////echo "Pag = ". $_SESSION['filename']; //retrieve data
?>
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <title> </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.js" type="text/javascript"></script>
    <script src="http://www.highcharts.com/js/highcharts.src.js" type="text/javascript"></script>
    <script src="./errorbars.src.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>

                <script type="text/javascript">
                $(document).ready(function() {
var chart = new Highcharts.Chart({

    chart: { renderTo: 'container',
           type: 'scatter',
 style: {
            color: '#333',
            fontWeight: 'bold',
            fontSize: '24px',
            fontFamily: 'Trebuchet MS, Verdana, sans-serif'

         }  },
    title: { text: '<?php echo $title1 ?> ',
style: {
         color: '#333',
         font: 'bold 24px "Trebuchet MS" '
      } },

subtitle: { text:'<span style="color: <?php echo $color1 ?>">    <?php echo $tilte ?> </span>',y:55,
style: {
         color: '#333',
         font: 'bold 14px "Trebuchet MS" '
      }},
       xAxis : {
                gridLineWidth: 1,
                type : 'datetime',
title: { text: 'DATE' },
                maxZoom : 1 * 24 * 3600000 // 1day
        },
tooltip: {
                    formatter: function () {
                        return '' +
               Highcharts.dateFormat('%d %b %Y', this.point.x ) + '<br/> '+  this.point.y + '<br/> ' ;
                    }
                },
    yAxis: {endOnTick: false, startOnTick: false , title: { text: '<?php echo $type ?>' },min: <?php echo $y_min ?> , max: <?php echo $y_max ?> },
series: [{ 
		name: '<?php echo $type ?>  <?php echo $station_name ?>' , 
showInLegend: true,
marker: { symbol: '<?php echo $marktype1 ?>',<?php echo $mm ?> },
         color: '<?php echo $color1 ?>',
		data: [<?php echo join($data1, ',') ?>] 
},
 {type : 'ErrorBar',showInLegend: false,color: '<?php echo $color1 ?>', name: 'ster1',data: [ <?php echo join($data2, ',') ?> ] },
]

,exporting: {filename: '<?php echo $newfileE ?>'}
                        });
               });
                </script>

        </head>
        <body>

    <script src="./errorbars.src.js"></script>
                <div id="container" style="width:100%; height:100%; overflow: hidden"></div>
        </body>
</html>

<?php
// to file
{ $query2 = "SELECT observation_date as datetime2, to_char($plota, '999999D99') as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;"; }
if ($_POST[combination_center]=="ilrsb")
if($_POST[PLOTS2]=="GRMS" or $_POST[PLOTS2]=="CRMS")
 {{$query2 = "SELECT observation_date as datetime2, to_char($plota *1000, '999999D99') as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;"; }}
else
{ $query2 = "SELECT observation_date as datetime2, to_char($plota, '999999D99') as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;"; }

//echo $query2.'<br/><br/>';
$result = pg_query($query2) or die("" );
$data = array();
$output= $tt. "\n";
fwrite($file, $output);
$output ="  DATE     |" ;
fwrite($file, $output); 
$output= $_SESSION['type']. "\n";
fwrite($file, $output); 
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
//echo $datetime;
//echo $row['value'];
//echo      $row['datetime2'] . "," . $row['value2']. "\n";
$output = $row['datetime2'] . " | " . $row['value']. "\n";
fwrite($file, $output);
}
fclose ($file);
?>
