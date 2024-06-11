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
<script src="highcharts-regression.js"> </script>
<script src="https://rawgithub.com/RolandBanguiran/highcharts-scalable-yaxis/master/scalable-yaxis.js"></script>
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
//$marktype0=$_POST['marktype0'];
//$marktype1=$_POST['marktype1'];
//$marktype2=$_POST['marktype2'];


$titleB="7-day arc weekly solution";

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
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_slrf2020 user=jasongroup  password=Ichinen  connect_timeout=2";}
if ($_POST[combination_center]=="ilrsb")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_slrf2020 user=jasongroup  password=Ichinen  connect_timeout=2";}
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
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_slrf2020 user=jasongroup  password=Ichinen  connect_timeout=2";
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $splota as value2 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and $plota  < $limita1 and $plota > $limitb1 order BY observation_date ;";}
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $splota as value2 from $tab where $plota is not null and observation_date > '$start_date' and observation_date < '$end_date' order BY observation_date ;";}
if ($_POST[combination_center]=="ilrsb")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_slrf2020 user=jasongroup  password=Ichinen  connect_timeout=2";}
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $splota as value2 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and $plota  < $limita1 and $plota > $limitb1  order BY observation_date ;";
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1, $splota as value2 from $tab where $plota is not null and observation_date > '$start_date' and observation_date < '$end_date' order BY observation_date ;";

$db_handle = pg_connect($conn_string);

//echo $query1.'<br/><br/>';
if($_POST[PLOTS2]=="GRMS" or $_POST[PLOTS2]=="CRMS")
{if ($_POST[combination_center]=="ilrsa")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsa_slrf2020 user=jasongroup  password=Ichinen  connect_timeout=2";
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and $plota  < $limita1 and $plota > $limitb1 ;"; }
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota as value1 from $tab where $plota is not null and observation_date > '$start_date' and observation_date < '$end_date'  order BY observation_date ;"; }
if ($_POST[combination_center]=="ilrsb")
{$conn_string = "host=jcetdb.rs.umbc.edu port=5432 dbname=ilrsb_slrf2020 user=jasongroup  password=Ichinen  connect_timeout=2";
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, $plota *1000 as value1 from $tab where observation_date > '$start_date' and observation_date < '$end_date' and $plota *1000  < $limita1 and $plota *1000 > $limitb1 ;";}}
//$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, (|/(($plota*$plota)/3))*1000 as value1 from $tab where observation_date > '$start_date' and observation_date < '$end_date'  order BY observation_date ;";}}
$query1 = "SELECT EXTRACT(EPOCH from observation_date at time zone 'utc-00') *1000 as datetime1, (|/(($plota*$plota)/3))*1000 as value1 from $tab where $plota is not null and observation_date > '$start_date' and observation_date < '$end_date'  order BY observation_date ;";}}
//echo " (|/(($plota*$plota)/3))*1000";
//echo $plota.'<br/><br/>';
//echo '<br/><br/>';
//echo '<br/><br/>';
//echo '<br/><br/>';
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
//print_r($data1);
if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct AVG ($plota)  from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}

if ($_POST[combination_center]=="ilrsb")
{if($_POST[PLOTS2]=="GRMS" or $_POST[PLOTS2]=="CRMS")
//{$queryS = "SELECT distinct AVG ((|/(($plota*$plota)/3))*1000)  from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'  and (|/(($plota*$plota)/3))*1000 < $limita1 and (|/(($plota*$plota)/3))*1000 > $limitb1 ;";}
{$queryS = "SELECT distinct AVG ((|/(($plota*$plota)/3))*1000)  from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'   ;";}
else
{$queryS = "SELECT distinct AVG ($plota)  from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}}

//echo $queryS.'<br/><br/>';
$resultS = pg_query($queryS) or die("" );
$avg = pg_fetch_array($resultS, 0, PGSQL_NUM);

if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT count ($plota) from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}

if ($_POST[combination_center]=="ilrsb")
{if($_POST[PLOTS2]=="GRMS" or $_POST[PLOTS2]=="CRMS")
//{$queryS = "SELECT count ((|/(($plota*$plota)/3))*1000)  from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'  and (|/(($plota*$plota)/3))*1000 < $limita1 and (|/(($plota*$plota)/3))*1000 > $limitb1 ;";}
{$queryS = "SELECT count ((|/(($plota*$plota)/3))*1000)  from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'  ;";}
else
{$queryS = "SELECT count ($plota)  from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}}

//echo $queryS.'<br/><br/>';
$resultS = pg_query($queryS) or die("" );
$num = pg_fetch_array($resultS, 0, PGSQL_NUM);
//echo $num.'<br/><br/>';



if ($_POST[combination_center]=="ilrsa")
{$queryS = "SELECT distinct STDDEV ($plota)  from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}

if ($_POST[combination_center]=="ilrsb")
{if($_POST[PLOTS2]=="GRMS" or $_POST[PLOTS2]=="CRMS")
//{$queryS = "SELECT distinct STDDEV ((|/(($plota*$plota)/3))*1000)  from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'  and (|/(($plota*$plota)/3))*1000< $limita1 and (|/(($plota*$plota)/3))*1000 > $limitb1 ;";}
{$queryS = "SELECT distinct STDDEV ((|/(($plota*$plota)/3))*1000)  from $tab where $plota is not null and  observation_date > '$start_date' ;";}
else
{$queryS = "SELECT distinct STDDEV ($plota)  from $tab where $plota is not null and  observation_date > '$start_date' and observation_date < '$end_date'  and $plota  < $limita1 and $plota > $limitb1 ;";}}

//echo $queryS.'<br/><br/>';
$resultS = pg_query($queryS) or die("" );
$std = pg_fetch_array($resultS, 0, PGSQL_NUM);

$avg=number_format($avg[0],2,'.', '');
$std=number_format($std[0],2,'.', '');
$num=number_format($num[0],0,'.', '');
$tilte=" $plotaa $avg \u00B1 $std ";
//echo $avg.'<br/><br/>';
//echo $std.'<br/><br/>';
//echo $num.'<br/><br/>';
//$newfile="/tmp/${plota}_$t.txt";
$newfile="/tmp/${plot}_${combination_center}_${analysis_center}_$t.csv";
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
<script>
    //Wait until the document is ready to be processed.
    jQuery(document).ready(function()
    {
        //Init your dialog box.
        $("#dialog").dialog({autoOpen:true,
    position: [20, 20],
    resizable: false,width: 400,height: 80});
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
var STD2 = STD2.toFixed(2);
var MEAN = MEAN.toFixed(2);
$('.MEAN').text(MEAN);
$('.STD').html(STD2);
var html = "";

html += "<span>Mean/Std. Dev.: " + MEAN + "</span>" + " &plusmn; " + STD2 + " </span>"+ "Count: " +  dataY.count + " </span><br />";
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
				var s = '<b>'+ Highcharts.dateFormat('%A, %b %e, %Y', this.x) +'</b>' + '<br/> '+ '<?php echo $plotaaa ?>'  + this.y + '<br/> ';

           
				return s;
			}
	    },
yAxis: {labels: { style: { color: '#000000', fontSize: '16px' },align:'right', x:15,formatter: function () {return this.value;} },endOnTick: false, startOnTick: false,
 title: { text: '<?php echo $plotaaa ?> <?php echo $type ?>',style: { color: '#000000', fontSize: '16px' },margin: 25 }, min: <?php echo $y_min ?> , max: <?php echo $y_max ?>},
navigator: {outlineColor: '<?php echo $color0 ?>',outlineWidth: 2, series: { color: '<?php echo $color1 ?>' } },
rangeSelector: { buttons: [
                                             { type: 'week', count: 1, text: '1w' },
                                             { type: 'month', count: 1, text: '1m' },
                                             { type: 'month', count: 6, text: '6m' },
                                             { type: 'year', count: 1, text: '1y' },
                                             { type: 'year', count: 2, text: '2y' },
                                             { type: 'year', count: 3, text: '3y' },
                                             { type: 'all', text: 'All' }],
                                             //selected: 7 },
                                              },


title: {
text: '<?php echo $title1 ?><br><?php echo $titleB ?> ',
            margin: 70,
align: 'right',
x: -200
        },

plotOptions:{
//turboThreshold: Infinity
turboThreshold: 100000
            },
series : [
{dataGrouping: { enabled: false },<?php echo $REG11 ?> <?php echo $REG22 ?> <?php echo $REG33 ?> <?php echo $REG44 ?> <?php echo $REG55 ?> lineWidth : 0, name: '<?php echo $plotaaa ?>  <?php echo $station_name ?>' , showInLegend: true, marker: {enabled : true, symbol: '<?php echo $marktype1 ?>',<?php echo $mm ?> }, color: '<?php echo $color1 ?>', data: [<?php echo join($data1, ',') ?>] },
{type: 'errorbar',stemDashStyle:'ShortDot',color: '<?php echo $color1 ?>', data: [<?php echo join($data2, ',') ?>] },

]
,exporting: {filename: '<?php echo $newfileE1 ?>'}
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
<div id="container" style="border: 2px solid #2E4C3D;width: 1000px; height: 720px"></div></div></div>

<div id="dialog" class="ui-dialog1"> Mean/Std. Dev.:  <?php echo $avg ?> &#177; <?php echo $std ?> Count: <?php echo $num ?>  </div>
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
{ $query2 = "SELECT observation_date as datetime2, to_char($plota, '999999D99') as value from $tab where $plota is not null and observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;"; }
if ($_POST[combination_center]=="ilrsb")
if($_POST[PLOTS2]=="GRMS" or $_POST[PLOTS2]=="CRMS")
 {{$query2 = "SELECT observation_date as datetime2, to_char((|/(($plota*$plota)/3))*1000, '999999D99') as value from $tab where $plota is not null and observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;"; }}
else
{ $query2 = "SELECT observation_date as datetime2, to_char($plota, '999999D99') as value from $tab where $plota is not null and observation_date > '$start_date' and observation_date < '$end_date' ORDER BY observation_date ;"; }

//echo $query2.'<br/><br/>';
$result = pg_query($query2) or die("" );
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
?>
