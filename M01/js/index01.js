// 松井さんJSコード 0112版
// ・PHPからのデータ渡し更新

var w = $('.wrapper').width();
var h = $('.wrapper').height();
$('#chartRadar').attr('width', 600);
$('#chartRadar').attr('height', 450);

Chart.defaults.global.legend.display = false;
Chart.defaults.global.defaultFontColor = 'rgba(253,149,28, 1)';


var chartRadarDOM = $('#chartRadar');
var chartRadarOptions = {
  legend: {
      // fontFamily:'Noto Sans JP', 
      display: false
  },
  scale:{
    ticks: {
      beginAtZero: true,
      stepSize: 20,
      max: 100,
      display: false
    }
  },
    gridLines: {
      display: false,
      color: '#000'
    }
  }

var chartRadar = new Chart(chartRadarDOM, {
  type: 'radar',
  data: chartRadarData,
  options: chartRadarOptions
});


