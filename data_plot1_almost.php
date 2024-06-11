<?php
//include_once('./common.php');
//dl_local('pgsql_new.so');
if (!extension_loaded('pgsql')) {
    dl('plpgsql.so');
}

//$filename = "/tmp/result.txt";
unlink($filename);
//$newfile='/tmp/result.txt';
//$file = fopen ($newfile, "r");

$combination_center = $_POST[combination_center];
$analysis_center = $_POST[analysis_center];
$plot= $_POST[PLOTS2];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$y_min=$_POST['y_min'];
$y_max=$_POST['y_max'];
$color1=$_POST['color1'];
$marktype1=$_POST['marktype1'];
//echo $color1.'<br/><br/>';
//echo $marktype1.'<br/><br/>';
//echo $tab.'<br/><br/>';

$newfile="/tmp/$plot.txt";
unlink($filename);
$file = fopen ($newfile, "r");

{$tab = "$_POST[combination_center]_info_$_POST[analysis_center]";}
if ($_POST[PLOTS2]=="number_of_stations")
{$type="Number Of Stations";
$title1="Weekly Number Of Stations AC($analysis_center) CC($combination_center)";}
if ($_POST[PLOTS2]=="obs")
{$type="Number Of Observations";
$title1="Weekly Number Of Observations AC($analysis_center) CC($combination_center)";}
if ($_POST[PLOTS2]=="unk")
{$type="NUMBER OF PARAMETERS";
$title1="Weekly Number Of Parameters AC($analysis_center) CC($combination_center)";}
if ($_POST[PLOTS2]=="wssoc")
{$type="SUM OF SQUARED WEIGHTED MISCLOSURES";
$title1="Sum of Squarde Weighted Misclosures AC($analysis_center) CC($combination_center)";}
if ($_POST[PLOTS2]=="vf")
{$type="VARIANCE FACTOR";
$title1="Variance Factor AC($analysis_center) CC($combination_center)";}
if ($_POST[PLOTS2]=="drwrms")
{$tab = "$_POST[combination_center]_position_$_POST[analysis_center]";
$type="3D Position WRMS [mm]";
$title1="3D Position WRMS AC($analysis_center) CC($combination_center)";}
//echo $type.'<br/><br/>';
$answer="Could not connect";
if ($_POST[combination_center]=="ilrsa" )
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_slrf2020 user=jasongroup  connect_timeout=2";
if ($_POST[analysis_center]=="COM")
$answer="NO DATA";}
if ($_POST[combination_center]=="ilrsb" )
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_slrf2020 user=jasongroup  connect_timeout=2";
if ($_POST[PLOTS2]=="unk" or $_POST[PLOTS2]=="wssoc" or $_POST[analysis_center]=="COM")
$answer="NO DATA";
}
$db_handle = pg_connect($conn_string);
$query = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plot as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' ;";
//echo $query.'<br/><br/>';
//$result = pg_query($query) or die("Could not connect" );
$result = pg_query($query) or die("$answer" );
$data = array();
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
//$datetime = $row['datetime1']*1000;
$datetime = $row['datetime1'];
//echo $datetime;
//echo $row['value'];
fwrite($file, $output);
 $val  = $row['value'];
 $data[] = "[$datetime, $val]"; }

$queryS = "SELECT distinct AVG ($plot)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' ;";
$resultS = pg_query($queryS) or die("Could not connect" );
$avg = pg_fetch_array($resultS, 0, PGSQL_NUM);
$avg=number_format($avg[0],2);
$queryS = "SELECT distinct STDDEV ($plot) from $tab where observation_date > '$start_date' and observation_date < '$end_date' ;";
$resultS = pg_query($queryS) or die("Could not connect" );
$std = pg_fetch_array($resultS, 0, PGSQL_NUM);
$std=number_format($std[0],2);
$title2="  $avg \u00B1 $std ";
?>
<?php
session_start(); 
session_register('filename');
$_SESSION['views'] = $new; // store session data
$_SESSION['filename'] = $newfile; // store session data
echo "Pageviews = ". $_SESSION['views']; //retrieve data
echo "Pageviews = ". $_SESSION['filename']; //retrieve data
?>
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <title> </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.js" type="text/javascript"></script>
    <script src="http://www.highcharts.com/js/highcharts.src.js" type="text/javascript"></script>
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
subtitle: { text:' <span style="color: <?php echo $color1 ?>">  <?php echo $title2 ?></span> </b>',
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
    yAxis: { title: { text: '<?php echo $type ?>' } },

series: [{ name: '<?php echo $type ?>  <?php echo $station_name ?>' ,
marker: { symbol: '<?php echo $marktype1 ?>' },
         color: '<?php echo $color1 ?>',
 data: [<?php echo join($data, ',') ?>] }]

                        });
               });
                </script>

        </head>
        <body>

                <div id="container" style="height: 95%;width: 98%"></div>
        </body>
</html>

<?php
session_start();
// to file
$query2 = "SELECT observation_date as datetime2, $plot as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' ;";
$result = pg_query($query2) or die("Could not connect" );
$data = array();
//$output=$_SESSION['views']. "\n";
//fwrite($file, $output);
//$output=$_SESSION['filename']. "\n" ;
//$file=$_SESSION['filename']. "\n" ;
//fwrite($file, $output);
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
//echo $datetime;
//echo $row['value'];
//echo      $row['datetime2'] . "," . $row['value2']. "\n";
$output = $row['datetime2'] . " , " . $row['value']. "\n";
fwrite($file, $output);
}
fclose ($file);
?>
<?php 
echo "<a href=\"test.php\" target=\"_blank\">title</a>"; 
?>
