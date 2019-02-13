$(document).ready(function(){
    var productBuy = $('#container').data('order');
    var chartData = [];
    productBuy.forEach(function(element){
        var ele = {name : element.name, y : parseFloat(element.y) };
        chartData.push(ele);
    });
    Highcharts.chart('container', {
        chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
        },
        title: {
          text: 'Daily order'
        },
        tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: false
            },
            showInLegend: true
          }
        },
        series: [{
          name: 'Brands',
          colorByPoint: true,
          data: chartData,
        }]
    });    
});
