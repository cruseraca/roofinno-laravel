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
  var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-produksi-bulanan'));
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
                color: ['#ffbf00'],


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
                        name:'Produksi Mingguan',
                        type:'bar',
                        barWidth: 20,
                        data:[200, 450, 550, 225],
                    }
                ]
                // Add series
                
        };
        stackedbarcolumnChart.setOption(option);
    // ============================================================== 
    // Produksi Tahunan
    // ============================================================== 
    // Bar chart Produksi Tahunan
    var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-produksi-tahunan'));
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
                color: ['#ffbf00'],


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
                        name:'Produksi Tahunan',
                        type:'bar',
                        barWidth: 20,
                        data:[225, 400, 375, 390, 450, 225, 410, 375, 500, 300, 225, 300]
                    }
                ]
                // Add series
                
        };
        stackedbarcolumnChart.setOption(option);
    
});