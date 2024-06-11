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
                var s = '<b>'+ Highcharts.dateFormat('%A, %b %e, %Y', this.x) +'</b>' + '<br/> '+ '<?php echo $plotbbb ?> <?php echo $type ?>  '  + this.y + '<br/> ';


                return s;
            }
        },
yAxis: {labels: { style: { color: '#000000', fontSize: '16px' },align:'right', x:15,formatter: function () {return this.value;} },endOnTick: false, startOnTick: false,
 title: { text: '<?php echo $plotbbb ?> <?php echo $type ?>', style: { color: '#000000', fontSize: '16px' },margin: 25 }, min: <?php echo $y_min ?> , max: <?php echo $y_max ?>},

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
navigator: {outlineColor: '<?php echo $color1 ?>',outlineWidth: 2, series: { color: '<?php echo $color1 ?>' } },
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
            x:  5,y: 5
        },
plotOptions:{
turboThreshold: Infinity
            },
series : [
{<?php echo $REG11 ?> <?php echo $REG22 ?> <?php echo $REG33 ?> <?php echo $REG44 ?> <?php echo $REG55 ?> lineWidth : 0, name: '<?php echo $plotbbb ?>  <?php echo $station_name ?>' , showInLegend: false, marker: {enabled : true, symbol: '<?php echo $marktype1 ?>',<?php echo $mm ?> }, color: '<?php echo $color1 ?>', data: [<?php echo join($data3, ',') ?>] },
{type: 'errorbar',stemDashStyle:'ShortDot',color: '<?php echo $color1 ?>', data: [<?php echo join($data4, ',') ?>] },

]
,exporting: {filename: '<?php echo $newfileE2 ?>'}
    });
});
