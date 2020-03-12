$(function () {
    "use strict";

    function ajaxDataProd(){
        let XHRprod = jQuery.ajax({
            url: '/dashboard/produksi/get-realtime-data',
            type: 'GET',
            dataType: 'json'
        })
        return XHRprod
    }

    function ajaxDataKons(){
        let XHRkons = jQuery.ajax({
            url: '/dashboard/konsumsi/get-realtime-data',
            type: 'GET',
            dataType: 'json'
        })
        return XHRkons
    }

    var dataProduksi = null
    var dataKonsumsi = null


    var chartBuilder = function(){
        let chartMingguan
        let chartBulanan
        let chartTahunan     
        if(dataKonsumsi != null && dataProduksi != null){
            let chartHarian = new Chartist.Line('.grafik-line-harian', {
                labels: dataProduksi.time,
                series: [
                    dataProduksi.power_hour,
                    dataProduksi.power_hour,
                    dataProduksi.power_hour
                ]
            },
                {                         
                    
                    showArea: true,
                    showPoint: true,
                    low: 0,
                    // high: dataProduksi.max[3],
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
                })
        
            let ctxMingguan = document.getElementById('stacked-column-mingguan').getContext('2d');
            chartMingguan = new Chart(ctxMingguan, {
                type: 'bar',
                data: {
                    labels: ['1 Agust', '2 Agust', '3 Agust', '4 Agust', '5 Agust', '6 Agust', '7 Agust'],
                    datasets:[
                        {
                            label: 'Produksi',
                            stack: 'Produksi',
                            data: dataProduksi.power_week,
                            backgroundColor: '#ffbf00',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 1',
                            stack: 'Konsumsi',
                            data: dataProduksi.power_week,
                            backgroundColor: '#cc0000',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 2',
                            stack: 'Konsumsi',
                            data: dataProduksi.power_week,
                            backgroundColor: '#00cc00',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 2',
                            stack: 'Konsumsi',
                            data: dataProduksi.power_week,
                            backgroundColor: '#8A2BE2',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                      xAxes: [{
                        barPercentage: 0.5,
                        stacked: true,
                        type: 'category',
                        
                        ticks: {
                          sampleSize: 12,
                          autoSkip: true,
                          maxRotation: 0,
                          callback: function(value, index, values) {
                              return value;
                          }
                        }
                      }],
                      yAxes: [{
                        stacked: true,
                        ticks: {
                            min: 0,
                            // Include a dollar sign in the ticks
                            // max: data.max[1],
                            callback: function(value, index, values) {
                                return value+" Wh";
                            }
                        }
                      }]
                    },
                    animation: {
                      duration: 0 // general animation time
                    },
                    hover: {
                      animationDuration: 0 // duration of animations when hovering an item
                    },
                    responsiveAnimationDuration: 0, // animation duration after a resize
                    elements: {
                          point:{
                              radius: 0
                          }
                      },
                    legend: {
                    display: false
                    }
                  }
        
            })
        
            let ctxBulanan = document.getElementById('stacked-column-bulanan').getContext('2d');
            chartBulanan = new Chart(ctxBulanan, {
                type: 'bar',
                data: {
                    labels: dataProduksi.time_day,
                    datasets:[
                        {
                            label: 'Produksi',
                            stack: 'Produksi',
                            data: dataProduksi.power_day,
                            backgroundColor: '#ffbf00',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 1',
                            stack: 'Konsumsi',
                            data: dataProduksi.power_day,
                            backgroundColor: '#cc0000',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 2',
                            stack: 'Konsumsi',
                            data: dataProduksi.power_day,
                            backgroundColor: '#00cc00',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 2',
                            stack: 'Konsumsi',
                            data: dataProduksi.power_day,
                            backgroundColor: '#8A2BE2',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                      xAxes: [{
                        barPercentage: 0.7,
                        stacked: true,
                        type: 'category',
                        
                        ticks: {
                          sampleSize: 12,
                          autoSkip: true,
                          maxRotation: 0,
                          callback: function(value, index, values) {
                              return value;
                          }
                        }
                      }],
                      yAxes: [{
                        stacked: true,
                        ticks: {
                            min: 0,
                            // Include a dollar sign in the ticks
                            // max: data.max[1],
                            callback: function(value, index, values) {
                                return value+" Wh";
                            }
                        }
                      }]
                    },
                    animation: {
                      duration: 0 // general animation time
                    },
                    hover: {
                      animationDuration: 0 // duration of animations when hovering an item
                    },
                    responsiveAnimationDuration: 0, // animation duration after a resize
                    elements: {
                          point:{
                              radius: 0
                          }
                      },
                    legend: {
                    display: false
                    }
                  }
        
            })
        
            let ctxTahunan = document.getElementById('stacked-column-tahunan').getContext('2d');
            chartTahunan = new Chart(ctxTahunan, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
                    datasets:[
                        {
                            label: 'Produksi',
                            stack: 'Produksi',
                            data: dataProduksi.power_month,
                            backgroundColor: '#ffbf00',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 1',
                            stack: 'Konsumsi',
                            data: dataProduksi.power_month,
                            backgroundColor: '#cc0000',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 2',
                            stack: 'Konsumsi',
                            data: dataProduksi.power_month,
                            backgroundColor: '#00cc00',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 2',
                            stack: 'Konsumsi',
                            data: dataProduksi.power_month,
                            backgroundColor: '#8A2BE2',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                      xAxes: [{
                        barPercentage: 0.5,
                        stacked: true,
                        type: 'category',
                        
                        ticks: {
                          sampleSize: 12,
                          autoSkip: true,
                          maxRotation: 0,
                          callback: function(value, index, values) {
                              return value;
                          }
                        }
                      }],
                      yAxes: [{
                        stacked: true,
                        ticks: {
                            min: 0,
                            // Include a dollar sign in the ticks
                            // max: data.max[1],
                            callback: function(value, index, values) {
                                return value+" Wh";
                            }
                        }
                      }]
                    },
                    animation: {
                      duration: 0 // general animation time
                    },
                    hover: {
                      animationDuration: 0 // duration of animations when hovering an item
                    },
                    responsiveAnimationDuration: 0, // animation duration after a resize
                    elements: {
                          point:{
                              radius: 0
                          }
                      },
                    legend: {
                    display: false
                    }
                  }
        
            })
        }
        else{
            chartMingguan.update()
            chartBulanan.update()
            chartTahunan.update()
        }

    } 

     async function UpdateGraph(){
        dataProduksi = await ajaxDataProd()
        dataKonsumsi = await ajaxDataKons()
        chartBuilder()
    }

    UpdateGraph()
    setInterval(() => {
        UpdateGraph()
    }, 5000);
    
});

