<?
include_once('./common.php');
dl_local('pgsql_new.so');
$t=time();
//echo($t . "<br />");
//echo(date("h:s",$t));
$tt=date("d-M-Y H:i");
$t=date("H:i",$t);
$combination_center = $_POST[combination_center];
$analysis_center = $_POST[analysis_center];
$plot= $_POST[PLOTS2];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$y_min=$_POST['y_min'];
$y_max=$_POST['y_max'];
$color1=$_POST['color1'];
$marktype1=$_POST['marktype1'];
$station_name = $_POST['station_name'];
//echo $station_name.'<br/><br/>';
$split = preg_split("/[\s]/", $station_name);
$station_name = $split[1];
$station_nameN = $split[0];
//echo $y_min.'<br/><br/>';
//echo $y_max.'<br/><br/>';
//echo $color1.'<br/><br/>';
//echo $marktype1.'<br/><br/>';
//echo $tab.'<br/><br/>';
////SCALE defult
	$mm="radius:2";
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


//echo $marktype1.'<br/><br/>';
//echo $mm.'<br/><br/>';


if ($_POST['y_max']=="Max" or $_POST['y_max']=="")
{
if ($_POST[PLOTS2]=="number_of_stations")
{$y_max="30";}
if ($_POST[PLOTS2]=="obs")
{$y_max="6000";}
if ($_POST[PLOTS2]=="unk")
{$y_max="300";}
if ($_POST[PLOTS2]=="wssoc")
{$y_max="2";}
if ($_POST[PLOTS2]=="vf")
{$y_max="0.0005";}
if ($_POST[PLOTS2]=="drwrms")
{$y_max="300";}
}
if ($_POST['y_min']=="Min" or $_POST['y_min']=="")
{
if ($_POST[PLOTS2]=="number_of_stations")
{$y_min="5";}
if ($_POST[PLOTS2]=="obs")
{$y_min="0";}
if ($_POST[PLOTS2]=="unk")
{$y_min="100";}
if ($_POST[PLOTS2]=="wssoc")
{$y_min="0";}
if ($_POST[PLOTS2]=="vf")
{$y_min="0.00001";}
if ($_POST[PLOTS2]=="drwrms")
{$y_min="0";}
}
//echo $y_min.'<br/><br/>';
//echo $y_max.'<br/><br/>';
////SCALE defult



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
$title1="Sum of Squared Weighted Misclosures AC($analysis_center) CC($combination_center)";}
if ($_POST[PLOTS2]=="vf")
{$type="VARIANCE FACTOR";
$title1="Variance Factor AC($analysis_center) CC($combination_center)";}
if ($_POST[PLOTS2]=="drwrms")
{$tab = "$_POST[combination_center]_position_$_POST[analysis_center]";
$type="3D Position WRMS [mm]";
$title1="3D Position WRMS AC($analysis_center) CC($combination_center)";}
//echo $type.'<br/><br/>';
$answer=" ";
if ($_POST[combination_center]=="ilrsa" )
{$conn_string = "host=perseus.rs.umbc.edu port=5432 dbname=ilrsa user=jasongroup  connect_timeout=2";
if ($_POST[analysis_center]=="com")
	$answer="NO INFORMATION AVAILABLE IN DATA BASE";
}
if ($_POST[combination_center]=="ilrsb" )
{$conn_string = "host=perseus.rs.umbc.edu port=5432 dbname=ilrsb user=jasongroup  connect_timeout=2";
if ($_POST[PLOTS2]=="unk" or $_POST[PLOTS2]=="wssoc" or $_POST[analysis_center]=="com")
	$answer="NO INFORMATION AVAILABLE IN DATA BASE";
}
if ($_POST[PLOTS2]=="drwrms")
{$answer="";}

$db_handle = pg_connect($conn_string);
if ($_POST[PLOTS2]=="drwrms")
{
if ($_POST[combination_center]=="ilrsb" )
{$query = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plot *1000 as value from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and station_id='$station_nameN' ;";}
else
{$query = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plot as value from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and station_id='$station_nameN' ;";}
}else{
$query = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plot as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' ;";}
//echo $query.'<br/><br/>';
//$result = pg_query($query) or die(" " );
$result = pg_query($query) or die("<br><br><br><br><br><br><br><br><br><center><font color='red' size='24'>$answer </font>" );
$data = array();
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
//$datetime = $row['datetime1']*1000;
$datetime = $row['datetime1'];
//echo $datetime;
//echo $row['value'];
//fwrite($file, $output);
 $val  = $row['value'];
 $data[] = "[$datetime, $val]"; }

if ($_POST[PLOTS2]=="drwrms")
{
if ($_POST[combination_center]=="ilrsb" )
{$queryS = "SELECT distinct AVG ($plot *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ;";}
else
{$queryS = "SELECT distinct AVG ($plot )  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ;";}
}
else
{$queryS = "SELECT distinct AVG ($plot)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' ;";}
$resultS = pg_query($queryS) or die(" " );
$avg = pg_fetch_array($resultS, 0, PGSQL_NUM);
if ($_POST[PLOTS2]=="wssoc" or $_POST[PLOTS2]=="vf" or $_POST[PLOTS2]=="drwrms")
{$avg=number_format($avg[0],4);}
else
{$avg=number_format($avg[0],0);}
if ($_POST[PLOTS2]=="drwrms")
{
if ($_POST[combination_center]=="ilrsb" )
{$queryS = "SELECT distinct STDDEV ($plot*1000) from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ;";}
else
{$queryS = "SELECT distinct STDDEV ($plot) from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ;";}
}
else
{$queryS = "SELECT distinct STDDEV ($plot) from $tab where observation_date > '$start_date' and observation_date < '$end_date' ;";}
$resultS = pg_query($queryS) or die(" " );
$std = pg_fetch_array($resultS, 0, PGSQL_NUM);
if ($_POST[PLOTS2]=="wssoc" or $_POST[PLOTS2]=="vf" or $_POST[PLOTS2]=="drwrms")
{$std=number_format($std[0],4);}
else
{$std=number_format($std[0],0);}
$title2="  $avg \u00B1 $std ";
//$newfile="/tmp/${plot}_$t.txt";
$newfile2="/tmp/$plot.txt";
$newfileE="${plot}_${combination_center}_${analysis_center}";
$newfile="/tmp/${plot}_${combination_center}_${analysis_center}_${station_nameN}_${t}";
//$newfile2="/tmp/result.txt";
if(file_exists("$newfile")) unlink("$newfile");
unlink($newfile);
$file = fopen ($newfile, "a");
//echo $newfile ; //retrieve data
//echo $newfile2 ; //retrieve data
?>
<?php
session_start();
//session_register('filename');
$_SESSION['type'] = $type; // store session data
$_SESSION['views'] = $newfilea; // store session data
$_SESSION['filename'] = $newfile; // store session data
//$_SESSION['filename2'] = $newfile; // store session data
//echo "Pageviews = ". $_SESSION['views']; //retrieve data
//echo "Pag = ". $_SESSION['filename']; //retrieve data
//echo "Pag = ". $_SESSION['filename2']; //retrieve data
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
y:55,
style: {
         color: '#333',
         font: 'bold 14px "Trebuchet MS" ',
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

series: [{ name: '<?php echo $type ?>  <?php echo $station_name ?>' ,
	marker: { symbol: '<?php echo $marktype1 ?>' , <?php echo $mm ?> },
         color: '<?php echo $color1 ?>',
 data: [<?php echo join($data, ',') ?>] }]

	 ,exporting: {filename: '<?php echo $newfileE ?>'}
                        });
               });
                </script>

        </head>
        <body>

		                <div id="container" style="width:100%; height:100%; overflow: hidden"></div>
        </body>
</html>

<?php
// to file
if ($_POST[PLOTS2]=="wssoc" or $_POST[PLOTS2]=="vf"  )
{ $query2 = "SELECT observation_date as datetime2, to_char($plot, '999999D999999') as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;"; }
elseif ( $_POST[PLOTS2]=="drwrms" )
{
if ($_POST[combination_center]=="ilrsb" )
{ $query2 = "SELECT observation_date as datetime2, to_char($plot * 1000, '999999D999999') as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ORDER BY observation_date  ;"; }
else
{ $query2 = "SELECT observation_date as datetime2, to_char($plot, '999999D999999') as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN' ORDER BY observation_date  ;"; }
}
else
{ $query2 = "SELECT observation_date as datetime2, to_char($plot, '999999D') as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;"; }


$result = pg_query($query2) or die(" " );
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


 //copy($newfile, $newfile2) or die("Blad przy kopiowaniu2");
//if ($dir = @opendir("/tmp/")) {
//   while($file = readdir($dir)) {
//sort($files);
//      echo "$file\n";
//   }
//   closedir($dir);
//}

//echo $newfile ; //retrieve data
//echo $newfile2 ; //retrieve data
?>
