var auto_refresh = setInterval(
function () {
  $('#suhu').load('../include/auto_refresh/api.php').fadeIn("slow");
}, 1000);
            
function getData() {
  var data1 = document.getElementById('suhu').innerHTML;
  var data2 = parseInt(data1);

  return data2;
}

function getTime(){
  var today = new Date();
  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

  return time;
}

  $.ajax({
  url: '../include/auto_refresh/data.php',
  type: "POST",
  data: {
    
  },
  dataType: "JSON",
  success: (data) => {
    var datanya = [
      {
        x: data.chart.waktu,
        y: data.chart.suhu,
        type: 'scatter',
        fill: 'tonexty',
        mode:'lines + points',
        line : {
          color : 'blue'
        }
      }
    ];

    var layout = {
       xaxis: {
        color : 'white'
        },
        yaxis :{
         color : 'white',
         range : [0,100]
        },
      autosize: false,
      width: 634,
      height: 354,
      margin: {
        l: 30,
        r: 30,
        b: 30,
        t: 30,
        pad: 4
      },
      paper_bgcolor: '#32325d',
      plot_bgcolor: '#c7c7c7',
     
    };
    Plotly.newPlot('chart', datanya, layout);
    }
  })
  
var cnt = 1;
setInterval(function(){
  Plotly.extendTraces('chart',{ y:[[getData()]], x:[[getTime()]]}, [0]);
  cnt++;
  if(cnt > 10) {
    Plotly.relayout('chart',{
      xaxis: {
        range: [cnt-10,cnt],
        color : 'white'
      }
    });
  }
}, 5000);
