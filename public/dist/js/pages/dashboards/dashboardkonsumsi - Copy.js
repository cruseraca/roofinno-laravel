/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";
    // ============================================================== 
    // Konsumsi Harian
    // ============================================================== 

    // line chart with area

new Chartist.Line('.ct-area-konsumsi-harian', {
  labels: ['0am', '2am', '4am', '6am', '8am', '10am', '12am', '2pm','4pm','6pm','8pm','10pm','12pm'],
  series: [
    [0, 0, 0, 0, 110, 160, 200, 290,305,320,310,122,20],
    [0,0,80,105,180,75,100,8,20,25,80,90,95],
    [195,215,150,20,0,0,0,115,90,170,120,110,185]
  ]
}, {
    low: 0,
    high: 600,
  showArea: true,
  fullwidth: true,

  plugins: [
    Chartist.plugins.tooltip()
  ]
});
    // ============================================================== 
    // Konsumsi Mingguan
    // ============================================================== 
    // Bar chart Mingguan
    var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-mingguan'));
        var option = {
            
             // Setup grid
                grid: {
                    x: 40,
                    x2: 40,
                    y: 45,
                    y2: 25
                },

                // Add tooltip
                tooltip : {
                    trigger: 'axis',
                    axisPointer : {            // Axis indicator axis trigger effective
                        type : 'shadow'        // The default is a straight line, optionally: 'line' | 'shadow'
                    }
                },

                // Add custom colors
                color: ['#ffbf00', '#cc0000', '#00cc00', '#8A2BE2'],


                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    data: ['1 Agust', '2 Agust', '3 Agust', '4 Agust', '5 Agust', '6 Agust', '7 Agust']
                }],

                // Vertical axis
                yAxis: [{
                    type: 'value',
                }],

                // Add series
                series : [
                    
                    {
                        name:'Produksi Panel Surya',
                        type:'bar',
                        barWidth: 20,
                        data:[310, 180, 350, 500, 300, 200, 450],
                    },
                    {
                        name:'Beban A',
                        type:'bar',
                        barWidth : 20,
                        stack: 'Produksi Panel Surya',
                        data:[80, 80, 100, 110, 80, 50, 80]
                    },
                    {
                        name:'Beban B',
                        type:'bar',
                        stack: 'Produksi Panel Surya',
                        data:[60, 60, 100, 190, 80, 170, 140]
                    },
                    {
                        name:'Beban C',
                        type:'bar',
                        stack: 'Produksi Panel Surya',
                        data:[40, 70, 90, 100, 40, 80, 300]
                    }
                ]
                // Add series
                
        };
        stackedbarcolumnChart.setOption(option);



    // ============================================================== 
    // Konsumsi Bulanan
    // ============================================================== 
    // Bar chart Bulanan
  var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-bulanan'));
        var option = {
            
             // Setup grid
                grid: {
                    x: 40,
                    x2: 40,
                    y: 45,
                    y2: 25
                },

                // Add tooltip
                tooltip : {
                    trigger: 'axis',
                    axisPointer : {            // Axis indicator axis trigger effective
                        type : 'shadow'        // The default is a straight line, optionally: 'line' | 'shadow'
                    }
                },

                // Add custom colors
                color: ['#ffbf00', '#cc0000', '#00cc00', '#8A2BE2'],


                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    data: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                }],

                // Vertical axis
                yAxis: [{
                    type: 'value',
                }],

                // Add series
                series : [
                    
                    {
                        name:'Produksi Panel Surya',
                        type:'bar',
                        barWidth: 20,
                        data:[350, 460, 300, 510],
                    },
                    {
                        name:'Beban A',
                        type:'bar',
                        barWidth : 20,
                        stack: 'Produksi Panel Surya',
                        data:[100, 100, 50, 50]
                    },
                    {
                        name:'Beban B',
                        type:'bar',
                        stack: 'Produksi Panel Surya',
                        data:[110, 110, 200, 200]
                    },
                    {
                        name:'Beban C',
                        type:'bar',
                        stack: 'Produksi Panel Surya',
                        data:[80, 170, 120, 150]
                    }
                ]
                // Add series
                
        };
        stackedbarcolumnChart.setOption(option);

    // ============================================================== 
    // Konsumsi Tahunan
    // ============================================================== 
    // Bar chart Tahunan
  var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-tahunan'));
        var option = {
            
             // Setup grid
                grid: {
                    x: 40,
                    x2: 40,
                    y: 45,
                    y2: 25
                },

                // Add tooltip
                tooltip : {
                    trigger: 'axis',
                    axisPointer : {            // Axis indicator axis trigger effective
                        type : 'shadow'        // The default is a straight line, optionally: 'line' | 'shadow'
                    }
                },

                // Add custom colors
                color: ['#ffbf00', '#cc0000', '#00cc00', '#8A2BE2'],


                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    data: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
                }],

                // Vertical axis
                yAxis: [{
                    type: 'value',
                }],

                // Add series
                series : [
                    
                    {
                        name:'Produksi Panel Surya',
                        type:'bar',
                        barWidth: 20,
                        data:[300, 180, 320, 490,290,200,400,125,310,500,280,200]
                    },
                    {
                        name:'Beban A',
                        type:'bar',
                        barWidth : 20,
                        stack: 'Produksi Panel Surya',
                        data:[80, 80, 100, 125, 40, 40, 100, 50, 100, 125, 40, 110]
                    },
                    {
                        name:'Beban B',
                        type:'bar',
                        stack: 'Produksi Panel Surya',
                        data:[70, 70, 110, 175, 85, 170, 190, 60, 100, 165, 70, 80]
                    },
                    {
                        name:'Beban C',
                        type:'bar',
                        stack: 'Produksi Panel Surya',
                        data:[25, 60, 80, 100, 75, 100, 260, 90, 80, 110, 90, 90]
                    }
                ]
                // Add series
                
        };
        stackedbarcolumnChart.setOption(option);

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
          legend: { display: false }
        }
    });
});