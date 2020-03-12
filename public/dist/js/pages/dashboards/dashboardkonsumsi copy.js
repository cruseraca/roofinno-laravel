$(function () {
    "use strict";

    var charts_konsumsi = {
        init: async function () {
            let res1 = await this.GraphProdCaller();
            let res2 = await this.GraphKonsCaller();        
            this.GraphDrawer(res1, res2);   
        },

        GraphProdCaller: function () {
            var jqXHRProd = jQuery.ajax({
                url: "/dashboard/produksi/get-realtime-data",
                type: 'GET',
                dataType: "json",
            });
            return jqXHRProd
        },

        GraphKonsCaller: function () {
            var jqXHRKons = jQuery.ajax({
                url: "/dashboard/konsumsi/get-realtime-data",
                type: 'GET',
                dataType: "json",
            });
            return jqXHRKons;
        },

        GraphDrawer: function(res1, res2){
            
            grafik_daily(res1, res2)
            grafik_week(res1, res2)
            grafik_month(res1, res2)
            grafik_year(res1, res2)
        }
    };

    function grafik_daily(dataProduksi, dataKonsumsi) {
        var chartSHarian = new Chartist.Line('.grafik-line-harian', {
            labels: ['0am', '2am', '4am', '6am', '8am', '10am', '12am', '2pm', '4pm', '6pm', '8pm', '10pm', '12pm'],
            series: [
                [0, 200, 0, 0, 110, 160, 200, 290, 305, 320, 310, 122, 20],
                [0, 0, 80, 105, 180, 75, 100, 8, 20, 25, 80, 90, 95],
                [195, 215, 150, 20, 0, 0, 0, 115, 90, 170, 120, 110, 185]
            ]
        },

            {                         
                
                showArea: true,
                showPoint: true,
                low: 0,
                high: dataProduksi.max[3],
                fullWidth: true,
                axisY: {
                    onlyInteger: false,
                    scaleMinSpace: 40,
                    offset: 60,
                    labelInterpolationFnc: function (value) {
                        return (value / 1) + 'KWh';
                    }
                },

                plugins: [
                    Chartist.plugins.tooltip(),
                    // Chartist.plugins.ctPointLabels({
                    //     textAnchor: 'middle'
                    //   })
                ],
                chartPadding: {
                    right: 40
                }
            });
    };

    

    function grafik_week(dataProduksi, dataKonsumsi) {
        //     // ============================================================== 
        //     // Konsumsi Mingguan
        //     // ============================================================== 
        //     // Bar chart Mingguan

        // let maxKonsumsi = dataKonsumsi.konsumsi_data[0].konsumsi_week1 + dataKonsumsi.konsumsi_data[0].konsumsi_week2 + dataKonsumsi.konsumsi_data[0].konsumsi_week3
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
            tooltip: {
                trigger: 'axis',
                axisPointer: {            // Axis indicator axis trigger effective
                    type: 'shadow'        // The default is a straight line, optionally: 'line' | 'shadow'
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
                scale: true
            }],

            // Add series
            series: [

                {
                    name: 'Produksi Panel Surya',
                    type: 'bar',
                    barWidth: 20,
                    data: dataProduksi.power_week
                },
                {
                    name: 'Beban A',
                    type: 'bar',
                    barWidth: 20,
                    stack: 'Produksi Panel Surya',
                    data: dataKonsumsi.konsumsi_data[0].konsumsi_week1
                },
                {
                    name: 'Beban B',
                    type: 'bar',
                    stack: 'Produksi Panel Surya',
                    data: dataKonsumsi.konsumsi_data[0].konsumsi_week2
                },
                {
                    name: 'Beban C',
                    type: 'bar',
                    stack: 'Produksi Panel Surya',
                    data: dataKonsumsi.konsumsi_data[0].konsumsi_week3
                }
            ]
            // Add series

        };
        stackedbarcolumnChart.setOption(option);

        // setTimeout(function(){ charts_konsumsi.init();}, 5000);
    };

    //     // ============================================================== 
    //     // Konsumsi Bulanan
    //     // ============================================================== 
    //     // Bar chart Bulanan

    function grafik_month(dataProduksi, dataKonsumsi) {
        var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-bulanan'));
 
        var option = {



            // // Setup grid
            // grid: {
            //     x: 40,
            //     x2: 40,
            //     y: 45,
            //     y2: 25
            // },

            // Add tooltip
            tooltip: {
                trigger: 'axis',
                axisPointer: {            // Axis indicator axis trigger effective
                    type: 'shadow'        // The default is a straight line, optionally: 'line' | 'shadow'
                }
            },

            // Add custom colors
            color: ['#ffbf00', '#cc0000', '#00cc00', '#8A2BE2'],


            // Horizontal axis
            xAxis: [{
                type: 'category',
                data: dataProduksi.time_day
            }],

            // Vertical axis
            yAxis: [{
                type: 'value',
                scale: true

            }],

            // Add series
            series: [

                {
                    name: 'Produksi Panel Surya',
                    type: 'bar',
                    barWidth: 10,
                    data: dataProduksi.power_day
                },
                {
                    name: 'Beban A',
                    type: 'bar',
                    barWidth: 10,
                    stack: 'Produksi Panel Surya',
                    data: [100, 100, 50, 50]
                },
                {
                    name: 'Beban B',
                    type: 'bar',
                    stack: 'Produksi Panel Surya',
                    data: [110, 110, 200, 200]
                },
                {
                    name: 'Beban C',
                    type: 'bar',
                    stack: 'Produksi Panel Surya',
                    data: [80, 170, 120, 150]
                }
            ]
            // Add series

        };
        stackedbarcolumnChart.setOption(option);

    };

    function grafik_year(dataProduksi, dataKonsumsi) {
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
            tooltip: {
                trigger: 'axis',
                axisPointer: {            // Axis indicator axis trigger effective
                    type: 'shadow'        // The default is a straight line, optionally: 'line' | 'shadow'
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
                max: dataProduksi.max[3]
            }],

            // Add series
            series: [

                {
                    name: 'Produksi Panel Surya',
                    type: 'bar',
                    barWidth: 20,
                    data: dataProduksi.power_month
                },
                {
                    name: 'Beban A',
                    type: 'bar',
                    barWidth: 20,
                    stack: 'Produksi Panel Surya',
                    data: [80, 80, 100, 125, 40, 40, 100, 50, 100, 125, 40, 110]
                },
                {
                    name: 'Beban B',
                    type: 'bar',
                    stack: 'Produksi Panel Surya',
                    data: [70, 70, 110, 175, 85, 170, 190, 60, 100, 165, 70, 80]
                },
                {
                    name: 'Beban C',
                    type: 'bar',
                    stack: 'Produksi Panel Surya',
                    data: [25, 60, 80, 100, 75, 100, 260, 90, 80, 110, 90, 90]
                }
            ]
            // Add series

        };
        stackedbarcolumnChart.setOption(option);

        setTimeout(function(){
            charts_konsumsi.init()
        }, 5000)
    };

    //    var f = document.getElementById("dashboard_konsumsi");
    // if ($('#dashboard_konsumsi').length > 0) {
    //     console.log("testt");
    //     charts_konsumsi.init();
    // };
    if (document.getElementById("dashboard_konsumsi")) {
        console.log("konsumsi js");
        charts_konsumsi.init();
    };
    
});



// /*
// Template Name: Admin Pro Admin
// Author: Wrappixel
// Email: niravjoshi87@gmail.com
// File: js
// */
// $(function() {
//     "use strict";
//     new Chartist.Line('.ct-sm-line-chart', {
//   labels: ['0am', '2am', '4am', '6am', '8am', '10am', '12am', '2pm','4pm','6pm','8pm','10pm','12pm'],
//   series: [
//     [0, 0, 0, 0, 110, 160, 200, 290,305,320,310,122,20],
//     [0,0,80,105,180,75,100,8,20,25,80,90,95],
//     [195,215,150,20,0,0,0,115,90,170,120,110,185]
//   ]
// }, 

//     {
//   low: 0,
//   high: 600,
//   fullWidth: true,
//   axisY: {
//             onlyInteger: true,
//             scaleMinSpace: 40,
//             offset: 60,
//             labelInterpolationFnc: function(value) {
//                 return (value / 1) + 'KWh';
//             }
//         },

//   plugins: [
//     Chartist.plugins.tooltip()
//   ],
//   chartPadding: {
//     right: 40
//   }
// });
//     // ============================================================== 
//     // Konsumsi Harian
//     // ============================================================== 

//     // line chart with area 

// new Chartist.Line('.ct-area-ln-chart', {
//   labels: ['0am', '2am', '4am', '6am', '8am', '10am', '12am', '2pm','4pm','6pm','8pm','10pm','12pm'],
//   series: [
//     [0, 0, 0, 0, 110, 160, 200, 290,305,320,310,122,20],
//     [0,0,80,105,180,75,100,8,20,25,80,90,95],
//     [195,215,150,20,0,0,0,115,90,170,120,110,185]
//   ]
// }, {
//     low: 0,
//     high: 600,
//     axisY: {
//             onlyInteger: true,
//             scaleMinSpace: 40,
//             offset: 60,
//             labelInterpolationFnc: function(value) {
//                 return (value / 1) + 'KWh';
//             }
//         },
//   chartPadding: {
//     right: 40
//   },

//   plugins: [
//     Chartist.plugins.tooltip()
//   ]
// });
//     // ============================================================== 
//     // Konsumsi Mingguan
//     // ============================================================== 
//     // Bar chart Mingguan
//     var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-mingguan'));
//         var option = {

//              // Setup grid
//                 grid: {
//                     x: 40,
//                     x2: 40,
//                     y: 45,
//                     y2: 25
//                 },

//                 // Add tooltip
//                 tooltip : {
//                     trigger: 'axis',
//                     axisPointer : {            // Axis indicator axis trigger effective
//                         type : 'shadow'        // The default is a straight line, optionally: 'line' | 'shadow'
//                     }
//                 },

//                 // Add custom colors
//                 color: ['#ffbf00', '#cc0000', '#00cc00', '#8A2BE2'],


//                 // Horizontal axis
//                 xAxis: [{
//                     type: 'category',
//                     data: ['1 Agust', '2 Agust', '3 Agust', '4 Agust', '5 Agust', '6 Agust', '7 Agust']
//                 }],

//                 // Vertical axis
//                 yAxis: [{
//                     type: 'value',
//                 }],

//                 // Add series
//                 series : [

//                     {
//                         name:'Produksi Panel Surya',
//                         type:'bar',
//                         barWidth: 20,
//                         data:[310, 180, 350, 500, 300, 200, 450],
//                     },
//                     {
//                         name:'Beban A',
//                         type:'bar',
//                         barWidth : 20,
//                         stack: 'Produksi Panel Surya',
//                         data:[80, 80, 100, 110, 80, 50, 80]
//                     },
//                     {
//                         name:'Beban B',
//                         type:'bar',
//                         stack: 'Produksi Panel Surya',
//                         data:[60, 60, 100, 190, 80, 170, 140]
//                     },
//                     {
//                         name:'Beban C',
//                         type:'bar',
//                         stack: 'Produksi Panel Surya',
//                         data:[40, 70, 90, 100, 40, 80, 300]
//                     }
//                 ]
//                 // Add series

//         };
//         stackedbarcolumnChart.setOption(option);



//     // ============================================================== 
//     // Konsumsi Bulanan
//     // ============================================================== 
//     // Bar chart Bulanan
//   var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-bulanan'));
//         var option = {

//              // Setup grid
//                 grid: {
//                     x: 40,
//                     x2: 40,
//                     y: 45,
//                     y2: 25
//                 },

//                 // Add tooltip
//                 tooltip : {
//                     trigger: 'axis',
//                     axisPointer : {            // Axis indicator axis trigger effective
//                         type : 'shadow'        // The default is a straight line, optionally: 'line' | 'shadow'
//                     }
//                 },

//                 // Add custom colors
//                 color: ['#ffbf00', '#cc0000', '#00cc00', '#8A2BE2'],


//                 // Horizontal axis
//                 xAxis: [{
//                     type: 'category',
//                     data: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
//                 }],

//                 // Vertical axis
//                 yAxis: [{
//                     type: 'value',
//                 }],

//                 // Add series
//                 series : [

//                     {
//                         name:'Produksi Panel Surya',
//                         type:'bar',
//                         barWidth: 20,
//                         data:[350, 460, 300, 510],
//                     },
//                     {
//                         name:'Beban A',
//                         type:'bar',
//                         barWidth : 20,
//                         stack: 'Produksi Panel Surya',
//                         data:[100, 100, 50, 50]
//                     },
//                     {
//                         name:'Beban B',
//                         type:'bar',
//                         stack: 'Produksi Panel Surya',
//                         data:[110, 110, 200, 200]
//                     },
//                     {
//                         name:'Beban C',
//                         type:'bar',
//                         stack: 'Produksi Panel Surya',
//                         data:[80, 170, 120, 150]
//                     }
//                 ]
//                 // Add series

//         };
//         stackedbarcolumnChart.setOption(option);

//     // ============================================================== 
//     // Konsumsi Tahunan
//     // ============================================================== 
//     // Bar chart Tahunan
//   var stackedbarcolumnChart = echarts.init(document.getElementById('stacked-column-tahunan'));
//         var option = {

//              // Setup grid
//                 grid: {
//                     x: 40,
//                     x2: 40,
//                     y: 45,
//                     y2: 25
//                 },

//                 // Add tooltip
//                 tooltip : {
//                     trigger: 'axis',
//                     axisPointer : {            // Axis indicator axis trigger effective
//                         type : 'shadow'        // The default is a straight line, optionally: 'line' | 'shadow'
//                     }
//                 },

//                 // Add custom colors
//                 color: ['#ffbf00', '#cc0000', '#00cc00', '#8A2BE2'],


//                 // Horizontal axis
//                 xAxis: [{
//                     type: 'category',
//                     data: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
//                 }],

//                 // Vertical axis
//                 yAxis: [{
//                     type: 'value',
//                 }],

//                 // Add series
//                 series : [

//                     {
//                         name:'Produksi Panel Surya',
//                         type:'bar',
//                         barWidth: 20,
//                         data:[300, 180, 320, 490,290,200,400,125,310,500,280,200]
//                     },
//                     {
//                         name:'Beban A',
//                         type:'bar',
//                         barWidth : 20,
//                         stack: 'Produksi Panel Surya',
//                         data:[80, 80, 100, 125, 40, 40, 100, 50, 100, 125, 40, 110]
//                     },
//                     {
//                         name:'Beban B',
//                         type:'bar',
//                         stack: 'Produksi Panel Surya',
//                         data:[70, 70, 110, 175, 85, 170, 190, 60, 100, 165, 70, 80]
//                     },
//                     {
//                         name:'Beban C',
//                         type:'bar',
//                         stack: 'Produksi Panel Surya',
//                         data:[25, 60, 80, 100, 75, 100, 260, 90, 80, 110, 90, 90]
//                     }
//                 ]
//                 // Add series

//         };
//         stackedbarcolumnChart.setOption(option);

//     // ============================================================== 
//     // Performa Tahunan
//     // ============================================================== 
//     // Bar chart Tahunan
//     new Chart(document.getElementById("bar-chart-tahunan"), {
//         type: 'bar',
//         data: {
//           labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
//           datasets: [
//             {
//               backgroundColor: ["#ffbf00", "#cc0000","#00cc00","#00cc00", "#cc0000", "#ffbf00", "#00cc00", "#ffbf00", "#00cc00", "#ffbf00", "#00cc00", "#cc0000"],
//               data: [28,20,43,64,28,25,46,28,42,25,60,18]
//             }
//           ]
//         },
//         options: {
//           legend: { display: false }
//         }
//     });
// });