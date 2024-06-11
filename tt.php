<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/butt.css" type="text/css" />
  <link rel="stylesheet" href="css/butt2.css" type="text/css" />
       <!-- 1. Add these JavaScript inclusions in the head of your page -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
        <!-- highcharts-->
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-more.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="highcharts-regression.js"> </script>
<script src="https://rawgithub.com/RolandBanguiran/highcharts-scalable-yaxis/master/scalable-yaxis.js"></script>


<?php
include_once('./common.php');
dl_local('pgsql_new.so');
$conn_string = "host=perseus.rs.umbc.edu port=5432 dbname=ilrsb user=jasongroup  connect_timeout=2";
$db_handle = pg_connect($conn_string);

$query ="SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime, number_of_stations as value from ilrsb_info_asi where observation_date > '1-1-1983' and observation_date < '1-1-2015' ORDER BY observation_date ;";
//$result = pg_query($query) or die("Could not connect" );
//// Printing results in HTML
//echo "<table border=1>\n";
//while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
//	    echo "\t<tr>\n";
//		    foreach ($line as $col_value) {
//				        echo "\t\t<td width=150>$col_value</td>\n";
//						    }
//			    echo "\t</tr>\n";
//}
//echo "</table>\n";
//echo "$query";
$result = pg_query($query) or die("<br><br><br><br><br><br><br><br><br><center><font color='red' size='24'>$answer </font>" );
$data = array();
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	//$datetime = $row['datetime1']*1000;
	$datetime = $row['datetime1'];
	//echo $datetime;
	echo $row['value'];
	//fwrite($file, $output);
	 $val  = $row['value'];
	  $data[] = "[$datetime, $val]"; }
		  print_r($data);
?>
