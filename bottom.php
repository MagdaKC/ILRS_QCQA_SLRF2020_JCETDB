<?php
include_once('./common.php');
dl_local('pgsql_new.so');
$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrs_slrf2014 user=jasongroup  connect_timeout=2";
$db_handle = pg_connect($conn_string);
$query = "select * from lastupdateinfo order by lastmodificationtowebsite desc limit 1 ;";
//echo $query.'<br/><br/>';
$result = pg_query($query) or die("Could not connect" );
$myrow = pg_fetch_assoc($result);
//echo($myrow . "<br />");
$date = $myrow["lastmodificationtowebsite"];
//echo($date . "<br />");
$string = "Last modified: $date";
//echo($string . "<br />");
?>
<style type="text/css">
.left{
  /* Changes on the form */
  color: black !important; 
  font-family: Verdana !important;
  font-size: 9px !important;
}
</style>
<table width="100%" height="50%">
<tr>
<td class="left" align="left">
<img src="UMBC.jpg" alt="Big Boat" width="230" height="57"/>
</td>
<td class="left" align="center">
 
</td>
<td class="left" align="right">
<img src="ILRS.jpg" alt="Big Boat" width="153" height="57"/>
</td>
</tr>
<tr>
<td class="left" align="left">
Responsible GESTAR II Official: <a href="mailto:epavlis@umbc.edu">Dr. Erricos Pavlis</a>
<br>
Created and Maintained by: <a href="mailto:magdak@umbc.edu">Magda Kuzmicz-Cieslak</a>
</td>
<td class="left" align="center">
Last modified <?echo $date;?><br>&#169; Copyright GESTAR II, UMBC.
</td>
<td class="left" align="right">
<a href="http://info.flagcounter.com/ufVB" target="_blank" ><img src="http://s04.flagcounter.com/count/ufVB/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_12/viewers_0/labels_0/pageviews_0/flags_0/" alt="Flag Counter" border="0"></a>
</td>
<tr>
<table>
