$(function () {
  "use strict";
  //Data Assignment
  var ctx1 = document.getElementById("produksi-Harian");
  
  var data = new Object();
  data.labels = ["0am", "2am", "4am", "6am", "8am", "10am", "12am", "2pm", "4pm", "6pm", "8pm", "10pm", "12pm"];
  data.datasets = [{
    data: [50, 75, 85, 25, 50, 75, 105, 198, 80, 30, 103, 100, 10],
    backgroundColor: 'rgba(42, 110, 221, 0.3)',
    borderColor: 'rgba(42, 110, 221, 1)',
    borderWidth: 2,
    lineTension: 0.3
  }];
  
  var myLineChart = new Chart(ctx1, {
    type: 'line',
    data: data,
    options: {
      legend: {
        display: false
      },
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero: true,
                  max: 600,
                  min: 0,
                  stepSize: 200,
                  callback: function(value, index, values) {
                    return value + 'KWh';
                  }
              }
          }]
      }
  }
  });
  var ctx2 = document.getElementById("produksi-Mingguan");
  var myLineChart1 = new Chart(ctx2, {
    type: 'line',
    data: data,
    options: {
      legend: {
        display: false
      },
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero: true,
                  max: 600,
                  min: 0,
                  stepSize: 200,
                  callback: function(value, index, values) {
                    return value + 'KWh';
                  }
              }
          }]
      }
  }
  });
});