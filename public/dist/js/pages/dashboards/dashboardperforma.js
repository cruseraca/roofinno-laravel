/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";

    //Color Category
    var chartColors = {
      color1: '#CC0000',
      color2: '#FFBF00',
      color3: '#00CC00'
    };
    //Make array of color background
    function make_background(jml) {
      let arr=[];
      for(let i=0;i<jml;i++){
        arr.push(chartColors.color1);
      }
      return arr;
    }

    // Gauge Performa
    // ============================================================
    var opts = {
      angle: 0, // The span of the gauge arc
      lineWidth: 0.32, // The line thickness
      radiusScale: 1, // Relative radius
      pointer: {
          length: 0.44, // // Relative to gauge radius
          strokeWidth: 0.04, // The thickness
          color: '#000000' // Fill color
      },
      limitMax: false, // If false, the max value of the gauge will be updated if value surpass max
      limitMin: false, // If true, the min value of the gauge will be fixed unless you set it manually
      colorStart: '#0346FF', // Colors
      colorStop: '#0346FF', // just experiment with them
      strokeColor: '#E0E0E0', // to see which ones work best for you
      generateGradient: true,

      highDpiSupport: true // High resolution support
    };
    var target = document.getElementById('foo'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 3000; // set max gauge value
    gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
    gauge.animationSpeed = 45; // set animation speed (32 is default value)
    gauge.set(1850); // set actual value
    // ============================================================== 
    // Performa Mingguan
    // ============================================================== 
    // Bar chart Mingguan
    new Chart(document.getElementById("bar-chart-mingguan"), {
        type: 'bar',
        data: {
          labels: ["1 Agust", "2 Agust", "3 Agust", "4 Agust", "5 Agust", "6 Agust", "7 Agust"],
          datasets: [
            {
              backgroundColor: ["#ffbf00", "#cc0000","#00cc00","#00cc00","#cc0000", "#ffbf00", "#00cc00"],
              data: [28,20,45,70,18,25,60]
            }
          ]
        },
        axisY: {
          onlyInteger: true,
        },

        options: {
          legend: { display:false },
          scales: {
              yAxes: [{
                  ticks: {
                      userCallback: function(item) {
                          return item + '%';
                      },
                  }
              }]
          }
      }
    });

    
    // ============================================================== 
    // Performa Bulanan
    // ============================================================== 
    // Bar chart Bulanan
    var myChart = new Chart(document.getElementById("bar-chart-bulanan"), {
        type: 'bar',
        data: {
          labels: ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
          datasets: [
            {
              backgroundColor: make_background(31),
              data: [38,63,43,18,10,10,10,10,10,20,10,10,10,10,10,10,10,10,50,10,65,10,10,10,60,10,67,10,10,10,40,10,32,10,10]
            }
          ]
        },

        options: {
          legend: { display: false },
          scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    userCallback: function(item) {
                        return item + '%';
                    },
                }
            }]
          }
        }
    });
    var colorChangeValue = 50; //set this to whatever is the deciding color change value
    var dataset = myChart.data.datasets[0];
    for (var i = 0; i < dataset.data.length; i++) {
      if (dataset.data[i] < 30) {
        dataset.backgroundColor[i] = chartColors.color1;
      }
      else if ((dataset.data[i] > 31) && (dataset.data[i] <= 60)){
        dataset.backgroundColor[i] = chartColors.color2;
      }
      else{
      dataset.backgroundColor[i] = chartColors.color3;
      }
    }
    myChart.update();
    // ============================================================== 
    // Performa Tahunan
    // ============================================================== 
    // Bar chart Tahunan
    new Chart(document.getElementById("bar-chart-tahunan"), {
        type: 'bar',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
          datasets: [
            {
              backgroundColor: ["#ffbf00", "#cc0000","#00cc00","#00cc00", "#cc0000", "#ffbf00", "#00cc00", "#ffbf00", "#00cc00", "#ffbf00", "#00cc00", "#cc0000"],
              data: [28,20,43,64,28,25,46,28,42,25,60,18]
            }
          ]
        },
        options: {
          legend: { display: false },
          scales: {
            yAxes: [{
                ticks: {
                    userCallback: function(item) {
                        return item + '%';
                    },
                }
            }]
          }
        }
    });
});