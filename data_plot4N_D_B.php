],


labels: { style: { color: '#000000', fontSize: '16px' } },
                gridLineWidth: 1,
ordinal: false,
                type : 'datetime',
title: { text: 'DATE',style: { color: '#000000', fontSize: '16px' } },
                maxZoom : 1 * 24 * 3600000 // 1day
        },
tooltip: {
	    	formatter: function() {
				var s = '<b>'+ Highcharts.dateFormat('%A, %b %e, %Y', this.x) +'</b>' + '<br/> '+ '<?php echo $plotaaa ?>  <?php echo $type ?>  '  + this.y + '<br/> ';

            
				return s;
			}
	    },
yAxis: {labels: { style: { color: '#000000', fontSize: '16px' },align:'right', x:15,formatter: function () {return this.value;} },endOnTick: false, startOnTick: false,
 title: { text: '<?php echo $plotaaa ?> <?php echo $type ?>',style: { color: '#000000', fontSize: '16px' },margin: 25 }, min: <?php echo $y_min ?> , max: <?php echo $y_max ?>},
legend: {
enabled: true,
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 500,
                y: -50,
                floating: true,
                backgroundColor: '#FFFFFF',
                borderWidth: 1
            },
navigator: {outlineColor: '<?php echo $color0 ?>',outlineWidth: 2, series: { color: '<?php echo $color0 ?>' } },
rangeSelector: { buttons: [{ type: 'day', count: 3, text: '3d' },
                                             { type: 'week', count: 1, text: '1w' },
                                             { type: 'month', count: 1, text: '1m' },
                                             { type: 'month', count: 6, text: '6m' },
                                             { type: 'year', count: 1, text: '1y' },
                                             { type: 'all', text: 'All' }],
                                             selected: 5 },
title: {
text: '<?php echo $title1 ?><br><?php echo $titleB ?> ',
            margin: 70,
align: 'right',
x: -200
        },
subtitle: {
            useHTML:true,
            text: '<div id="lhsTitle"><img src="https://geodesy.jcet.umbc.edu/ILRS_QCQA/l2.png" /> Data Handling File</div><div id="chsTitle"><img src="https://geodesy.jcet.umbc.edu/ILRS_QCQA/c2.png" />  Discontinuities File</div><div id="rhsTitle"><img src="https://geodesy.jcet.umbc.edu/ILRS_QCQA/r2.png" /> SCH SCI</div>',
            align: 'left',
            x:  5, y: 5
        },
plotOptions:{
turboThreshold: Infinity
            },
series : [
{<?php echo $REG11 ?> <?php echo $REG22 ?> <?php echo $REG33 ?> <?php echo $REG44 ?> <?php echo $REG55 ?> lineWidth : 0, name: '<?php echo $plotaaa ?>  <?php echo $station_name ?>' , showInLegend: true, marker: {enabled : true, symbol: '<?php echo $marktype0 ?>',<?php echo $mm ?> }, color: '<?php echo $color0 ?>', data: [<?php echo join($data1, ',') ?>] },
{type: 'errorbar',stemDashStyle:'ShortDot',color: '<?php echo $color0 ?>', data: [<?php echo join($data2, ',') ?>] },

]
,exporting: {filename: '<?php echo $newfileE1 ?>'}
    });
});
$(function () {
var $report2 = $('#report2');
window.chart2 = new Highcharts.StockChart({
        chart: {
            renderTo: 'container2',
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

html += "<span>Mean/Std. Dev.: " + MEAN + "</span>" + " &plusmn; " + STD2 + " </span>"+ "Count:" +  dataY.count + " </span><br />";
            $("#dialog2").html(html == "" ? "No results" : html);
// $report.html( 'avgX: ' + dataX.value / dataX.count);
                    }
                }
        },

       xAxis : {
plotLines: [
