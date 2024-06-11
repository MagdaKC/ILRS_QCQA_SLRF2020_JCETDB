$(function () {
var $report3 = $('#report');
window.chart3 = new Highcharts.StockChart({
        chart: {
            renderTo: 'container3',
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
            $("#dialog").html(html == "" ? "No results" : html);
// $report.html( 'avgX: ' + dataX.value / dataX.count);
                    }
                }
        },
       xAxis : {
plotLines: [
