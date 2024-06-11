
<?php
include_once('./common.php');
dl_local('pgsql_new.so');
$conn_string = "host=perseus.rs.umbc.edu port=5432 dbname=ilrsb password=Ichinen user=jasongroup  connect_timeout=2";
$db_handle = pg_connect($conn_string);
$query = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, number_of_stations as value from ilrsa_info_asi where observation_date > '1-1-1983' and observation_date < '1-1-2015' ORDER BY observation_date ;";
echo $query.'<br/><br/>';
$result = pg_query($query) or die("<br><br><br><br><br><br><br><br><br><center><font color='red' size='24'>$answer </font>" );
$data = array();
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
$datetime = $row['datetime1'];
echo $datetime;
echo $row['value'];

//fwrite($file, $output);
 $val  = $row['value'];
 $data[] = "[$datetime, $val]"; }
 ?>
