/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";
    // ============================================================== 
    // Produksi Bulanan
    // ============================================================== 
    // Bar chart Produksi Bulanan
  var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-penghematan-mingguan'));
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
                color: ['#00cc00'],


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
                        name:'Penghematan Mingguan',
                        type:'bar',
                        barWidth: 35,
                        data:[150, 75, 175, 240, 170, 80, 200],
                    }
                ]
                // Add series
                
        };
        stackedbarcolumnChart.setOption(option);
    // ============================================================== 
    // Produksi Bulanan
    // ============================================================== 
    // Bar chart Produksi Bulanan
  var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-penghematan-bulanan'));
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
                color: ['#00cc00'],


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
                        name:'Penghematan Bulanan',
                        type:'bar',
                        barWidth: 55,
                        data:[750, 820, 525, 1100],
                    }
                ]
                // Add series
                
        };
        stackedbarcolumnChart.setOption(option);
    // ============================================================== 
    // Produksi Tahunan
    // ============================================================== 
    // Bar chart Produksi Tahunan
    var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-penghematan-tahunan'));
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
                color: ['#00cc00'],


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
                        name:'Penghematan Tahunan',
                        type:'bar',
                        barWidth: 35,
                        data:[3000, 1800, 1000, 1600, 2800, 2100, 2800, 3100, 3250, 2500, 1000, 2600]
                    }
                ]
                // Add series
                
        };
        stackedbarcolumnChart.setOption(option);
    
});