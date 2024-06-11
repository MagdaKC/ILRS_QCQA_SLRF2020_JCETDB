<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/butt.css" type="text/css" />
  <link rel="stylesheet" href="css/butt2.css" type="text/css" />
       <!-- 1. Add these JavaScript inclusions in the head of your page -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
        <!-- highcharts-->
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://highslide-software.github.io/export-csv/export-csv.js"></script>
<script src="https://rawgithub.com/RolandBanguiran/highcharts-scalable-yaxis/master/scalable-yaxis.js"></script>
<script src="highcharts-regression.js"> </script>



<?php
//include_once('./common.php');
//dl_local('pgsql_new.so');
if (!extension_loaded('pgsql')) {
    dl('plpgsql.so');
}
$t=time();
//echo($t . "<br />");
//echo(date("h:s",$t));
//$tt=date("d-M-Y H:i");
$tt=date("d-M-Y_H:i");
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

//REGRESION
   $mva2=$_POST['mva2'];
   $mulp=$_POST['mulp'];
  //echo $mulp.'<br/><br/>';
	if ($_POST[mulp]!="0")

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
//		echo $REG55.'<br/><br/>';



////SCALE defult
	$mm="radius:6";
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


//echo $marktype1.'<br/><br/>';
//echo $mm.'<br/><br/>';
////REGRESION
//$REG=$_POST['marktype3'];
//$color3=$_POST['color3'];
//if ($_POST[var4]=="yes")
//{if ($REG=="REG1")
//{$REG11="regression: true , regressionSettings: { type: 'linear', color:  '$color3' },";}
//if ($REG=="REG2")
//{$REG22="regression: true , regressionSettings: { type: 'exponential', color:  '$color3' },";}
//if ($REG=="REG3")
//{$REG33="regression: true , regressionSettings: { type: 'polynomial', color:  '$color3' },";}
//if ($REG=="REG4")
//{$REG44="regression: true , regressionSettings: { type: 'logarithmic', color:  '$color3'},";}
//if ($REG=="REG5")
//{$REG55="regression: true , regressionSettings: { type: 'loess', color:  '$color3' },";}}
//echo $REG11.'<br/><br/>';
//echo $REG22.'<br/><br/>';
//echo $REG33.'<br/><br/>';
//echo $REG44.'<br/><br/>';
//echo $REG55.'<br/><br/>';


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
//{$y_max="0.0005";}
{$y_max="null";}
if ($_POST[PLOTS2]=="vce")
{$y_max="null";}
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
//{$y_min="0.00001";}
{$y_min="null";}
if ($_POST[PLOTS2]=="vce")
{$y_min="null";}
if ($_POST[PLOTS2]=="drwrms")
{$y_min="0";}
}
//echo $y_min.'<br/><br/>';
//echo $y_max.'<br/><br/>';

////SCALE defult

$titleB="7-day arc daily solution";


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
if ($_POST[PLOTS2]=="vce")
{$type="VCE";
$title1="VCE AC($analysis_center) CC($combination_center)";}
if ($_POST[PLOTS2]=="drwrms")
{$tab = "$_POST[combination_center]_position_$_POST[analysis_center]";
$type="3D Position WRMS [mm]";
$title1="3D Position WRMS AC($analysis_center) CC($combination_center)";}
//echo $type.'<br/><br/>';
$answer=" ";
if ($_POST[combination_center]=="ilrsa" )
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";
if ($_POST[analysis_center]=="com")
	$answer="NO INFORMATION AVAILABLE IN DATA BASE";
}
if ($_POST[combination_center]=="ilrsb" )
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_d_slrf2020 password=Ichinen user=jasongroup  connect_timeout=2";
if ($_POST[PLOTS2]=="unk" or $_POST[PLOTS2]=="wssoc" or $_POST[analysis_center]=="com")
	$answer="NO INFORMATION AVAILABLE IN DATA BASE";
}
if ($_POST[PLOTS2]=="drwrms")
{$answer="";}

$db_handle = pg_connect($conn_string);
if ($_POST[PLOTS2]=="drwrms")
{
if ($_POST[combination_center]=="ilrsb" )
{$query = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plot *1000 as value from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and station_id='$station_nameN' and $plot is not null ORDER BY observation_date ;";}
else
{$query = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plot as value from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and station_id='$station_nameN'  and $plot is not null ORDER BY observation_date ;";}
}else{
$query = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plot as value from $tab where observation_date > '$start_date' and observation_date < '$end_date' and $plot is not null ORDER BY observation_date ;";}
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
//print_r($data);
if ($_POST[PLOTS2]=="drwrms")
{
if ($_POST[combination_center]=="ilrsb" )
{$queryS = "SELECT distinct AVG ($plot *1000)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plot is not null;";}
else
{$queryS = "SELECT distinct AVG ($plot )  from $tab where  observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plot is not null;";}
}
else
{$queryS = "SELECT distinct AVG ($plot)  from $tab where  observation_date > '$start_date' and observation_date < '$end_date'  and $plot is not null;";}
$resultS = pg_query($queryS) or die(" " );
$avg = pg_fetch_array($resultS, 0, PGSQL_NUM);
if ($_POST[PLOTS2]=="wssoc" or $_POST[PLOTS2]=="vf" or $_POST[PLOTS2]=="drwrms" or $_POST[PLOTS2]=="vce")
{$avg=number_format($avg[0],4); $FIX='4';}
else
{$avg=number_format($avg[0],0);$FIX='0';}
if ($_POST[PLOTS2]=="drwrms")
{
if ($_POST[combination_center]=="ilrsb" )
{$queryS = "SELECT distinct STDDEV ($plot*1000) from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plot is not null;";}
else
{$queryS = "SELECT distinct STDDEV ($plot) from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plot is not null;";}
}
else
{$queryS = "SELECT distinct STDDEV ($plot) from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plot is not null;";}
$resultS = pg_query($queryS) or die(" " );
$std = pg_fetch_array($resultS, 0, PGSQL_NUM);
$std=number_format($std[0],2);
if ($_POST[PLOTS2]=="drwrms")
{
if ($_POST[combination_center]=="ilrsb" )
{$queryS = "SELECT count ($plot*1000) from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plot is not null;";}
else
{$queryS = "SELECT count ($plot) from $tab where observation_date > '$start_date' and observation_date < '$end_date' and station_id='$station_nameN'  and $plot is not null;";}
}
else
{$queryS = "SELECT count ($plot) from $tab where observation_date > '$start_date' and observation_date < '$end_date'  and $plot is not null;";}
//echo $queryS;
$resultS = pg_query($queryS) or die(" " );
$num = pg_fetch_array($resultS, 0, PGSQL_NUM);
$num=number_format($num[0],0);
//$newfile="/tmp/${plot}_$t.txt";
$newfile2="/tmp/$plot.txt";
$newfileE="${plot}_${combination_center}_${analysis_center}";
$newfile="/tmp/${plot}_${combination_center}_${analysis_center}_${station_nameN}_${t}.csv";
$newfile="/tmp/${plot}_${combination_center}_${analysis_center}_${station_nameN}_$tt.csv";
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
    resizable: false,width: 350,height: 80});
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
        $("#dialog2").dialog({autoOpen:false,
    position: [1000, 300],
    open: function(event, ui) {
        var $dialog  = $(event.target);
        var position = $dialog.dialog('option', 'position');
        $dialog.closest('.ui-dialog').css({
            left: position[0],
            top:  position[1]
        });
    },
    resizable: false,width: 200});
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
        $("#dialog3").dialog({autoOpen:false,
    position: [1000, 400],
    open: function(event, ui) {
        var $dialog  = $(event.target);
        var position = $dialog.dialog('option', 'position');
        $dialog.closest('.ui-dialog').css({
            left: position[0],
            top:  position[1]
        });
    },
    resizable: false,width: 200});
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
$(function () {
window.chart = new Highcharts.StockChart({
        chart: {
            renderTo: 'container',
			zoomType: 'y',
                events: {
                    redraw: function () {
                        var series = this.series[0];
                        var dataY = {value: 0, count: 0};
                        var points = series.points;
                         ppp=0;
                        for (var i = 0; i < points.length; i++) {
                               dataY.value += points[i].y;
                           dataY.count +=1;
                       }
                        MEAN=dataY.value/dataY.count;

                        for (var i = 0; i < points.length; i++) {
                            dataY.value2 = (points[i].y-MEAN)*(points[i].y-MEAN);
                                pp=dataY.value2;
                                ppp=ppp+pp;
                       }

MEAN=dataY.value/dataY.count;
pp2=ppp/dataY.count;
STD2=Math.sqrt(pp2);
//var STD2 = STD2.toFixed(2);
//var MEAN = MEAN.toFixed(2);
var STD2 = STD2.toFixed(<?php echo $FIX ?>);
var MEAN = MEAN.toFixed(<?php echo $FIX ?>);
$('.MEAN').text(MEAN);
$('.STD').html(STD2);
var html = "";

             html += "<span>Mean/Std. Dev.: " + MEAN + "</span>" + " &plusmn; " + STD2 + " </span>"+ "Count:" +  dataY.count + " </span><br />";
            $("#dialog").html(html == "" ? "No results" : html);
// $report.html( 'avgX: ' + dataX.value / dataX.count);
                    }
                }
        },
       xAxis : {labels: { style: { color: '#000000', fontSize: '16px' } },
                gridLineWidth: 1,
ordinal: false,
                type : 'datetime',
title: { text: 'DATE',style: { color: '#000000', fontSize: '16px' } },
                maxZoom : 1 * 24 * 3600000 // 1day
        },
tooltip: {
            formatter: function() {
                var s = '<b>'+ Highcharts.dateFormat('%A, %b %e, %Y', this.x) +'</b>' + '<br/> '+ '<?php echo $type ?> '  + this.y + '<br/> ';

            
                return s;
            }
        },
yAxis: {labels: { style: { color: '#000000', fontSize: '16px' },align:'right', x:15,formatter: function () {return this.value;} },endOnTick: false, startOnTick: false,
 title: { text: '<?php echo $type ?>',style: { color: '#000000', fontSize: '16px' },margin: 25 }, min: <?php echo $y_min ?> , max: <?php echo $y_max ?>},
navigator: {outlineColor: '<?php echo $color1 ?>',outlineWidth: 2, series: { color: '<?php echo $color1 ?>' } },

rangeSelector: { buttons: [
                                             { type: 'week', count: 1, text: '1w' },
                                             { type: 'month', count: 1, text: '1m' },
                                             { type: 'month', count: 6, text: '6m' },
                                             { type: 'year', count: 1, text: '1y' },
                                             { type: 'year', count: 2, text: '2y' },
                                             { type: 'year', count: 3, text: '3y' },
                                             { type: 'all', text: 'All' }],
                                             selected: 7 },
title: {
text: '<?php echo $title1 ?><br><?php echo $titleB ?> ',
            margin: 70,
align: 'right',
x: -100
        },
subtitle: {
            useHTML:true,
//            text: '<div id="lhsTitle"><img src="https://geodesy.jcet.umbc.edu/css/l2.png" /> Data Handling File</div><div id="chsTitle"><img src="https://geodesy.jcet.umbc.edu/css/c2.png" />  Discontinuities File</div><div id="rhsTitle"><img src="https://geodesy.jcet.umbc.edu/css/r2.png" /> SCH SCI</div>',
            align: 'left',
            x:  5
        },
plotOptions:{
turboThreshold: Infinity
            },
series : [
{<?php echo $REG11 ?> <?php echo $REG22 ?> <?php echo $REG33 ?> <?php echo $REG44 ?> <?php echo $REG55 ?> lineWidth : 0, name: '<?php echo $type ?>  <?php echo $station_name ?>' ,
    marker: {enabled : true, symbol: '<?php echo $marktype1 ?>' , <?php echo $mm ?> },
         color: '<?php echo $color1 ?>',
data: [<?php echo join($data, ',') ?>]

            }]
    });
});
</script>
</head>
<body>
<table>
<tr>
<td>

<div class="contentSection">
<div class="contentToPrint">
    <div id="container" style="border: 2px solid #2E4C3D;width: 1000px; height: 720px"></div>
</div> </div>


<div id="dialog" class="ui-dialog1"> Mean/Std. Dev.:  <?php echo $avg ?> &#177; <?php echo $std ?> Count: <?php echo $num ?>  </div>
</div>
</td>
<td>
<table  style="margin-top:10px; margin-left:0px;" style="text-align: center; " border="3" cellpadding="4" cellspacing="3">
    <tr>
    <td >
    <input type="button" text-align="center" value="HOME" style="height:50px; width:122px" class="Web_OnlineTools" onclick="open_winH()">
    </td>
    </tr>
    <tr>
    <td>
<input type="button" text-align="center" value="New Plot" style="height:50px; width:122px" class="Web_OnlineTools" onclick="open_win()">
     </td>
       </tr>
          <tr>
         <td align="center" valign="top" style="vertical-align: top; text-align: center;height:50px; width:52px; ">
    <?php print("<INPUT TYPE=\"BUTTON\" text-align=\"center\"  class=\"Web_OnlineTools\"  VALUE=\"Download Data\" ONCLICK=\"window.open('".$downloadlink."')\">"); ?>
     </td>
    </tr>
     <tr>
          <td align="center" valign="top" style="vertical-align: top; text-align: center;height:30px; width:110px; ">
           <a href="#" style="height:20px; width:100px"  class="Web_OnlineTools"  id="printOut">Print PDF</a>
     </td>
    </tr>
    </table>
</td>
    </tr>
    </table>



  </div>
  </div>
<br/>


<script type="text/javascript">
    $(function(){
        $('#printOut').click(function(e){
            e.preventDefault();
            var w = window.open();
            var printOne = $('.contentToPrint').html();
            var print11 = $('.ui-dialog1').html();
   w.document.write('<center>')
   w.document.write('EVALUATION OF WEEKLY AWG PRODUCTS')
   w.document.write('<html><head><title> <?php echo $title1 ?> EVALUATION OF WEEKLY AWG PRODUCTS</title></head><body>' + printOne ) + '</body></html>';
   w.document.write('<br>')
   w.document.write('<br>')
   w.document.write('<br>')
   w.document.write('<br>')
   w.document.write('<center>')
   w.document.write('<table border="1" cellspacing="1" cellpadding="5" style="background-color:#C8FFB5;"  >')
   w.document.write('<tr>')
   w.document.write('<td  style="vertical-align: middle; text-align: center;"><?php echo $station_nameN ?> <?php echo $title1 ?></td>')
   w.document.write('</tr>')
   w.document.write('<tr style="vertical-align: middle; text-align: center;">')
   w.document.write('<td>' + print11  + '</td>')
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
if ($_POST[PLOTS2]=="wssoc" or $_POST[PLOTS2]=="vf" or $_POST[PLOTS2]=="vce"  )
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

//echo $datetime;

$result = pg_query($query2) or die(" " );
$data = array();
$output= $tt. "\n";
fwrite($file, $output); 
$output ="  DATE     ," ;
fwrite($file, $output); 
$output= $_SESSION['type']. "\n";
fwrite($file, $output); 
while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
//echo $datetime;
//echo $row['value'];
//echo      $row['datetime2'] . "," . $row['value2']. "\n";
$output = $row['datetime2'] . " , " . $row['value']. "\n";
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
