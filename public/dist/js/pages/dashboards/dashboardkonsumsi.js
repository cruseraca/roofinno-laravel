$(function () {
    "use strict";

    var dataProduksi = null
    var dataKonsumsi = null

    function ajaxDataProd() {
        let XHRprod = jQuery.ajax({
            url: '/dashboard/produksi/get-realtime-data',
            type: 'GET',
            dataType: 'json',
            success: function (res){
                dataProduksi = res
            }
        })
    }

    function ajaxDataKons() {
        let XHRkons = jQuery.ajax({
            url: '/dashboard/konsumsi/get-realtime-data',
            type: 'GET',
            dataType: 'json',
            success: function (res){
                dataKonsumsi = res
            }
        })
        
    }

    var tmpdataProduksi = null
    var tmpdataKonsumsi = null

    let chartHarian = null
    let chartMingguan = null
    let chartBulanan = null
    let chartTahunan = null

    var chartBuilder = function () {

        if (dataKonsumsi != null && dataProduksi != null) {

            if (chartHarian != null && chartMingguan != null && chartBulanan != null && chartTahunan != null) {
                chartHarian.destroy()
                chartMingguan.destroy()
                chartBulanan.destroy()
                chartTahunan.destroy()
            }

            let ctxHarian = document.getElementById('chart-konsumsi-harian').getContext('2d')
            chartHarian = new Chart(ctxHarian, {
                type: 'line',
                data: {
                    labels:  dataProduksi.time,
                    datasets: [
                        {
                            label: 'Beban 1',
                            data: dataKonsumsi.konsumsi_data[0].konsumsi_day1,
                            borderColor: '#cc0000',
                            backgroundColor: "rgba(204,0,0,0.25)",
                            borderWidth: 2,
                        },
                        {
                            label: 'Beban 2',
                            data:  dataKonsumsi.konsumsi_data[0].konsumsi_day2,
                            borderColor: '#00cc00',
                            backgroundColor: "rgba(0,204,0,0.25)",
                            borderWidth: 2,
                        },
                        {
                            label: 'Beban 3',
                            data:  dataKonsumsi.konsumsi_data[0].konsumsi_day3,
                            borderColor: '#8A2BE2',
                            backgroundColor: "rgba(138,43,226,0.25)",
                            borderWidth: 2,
                        }
                    ]
                },
                options: {
                    
                    scales: {
                        xAxes: [{
                            type: 'category',
                            ticks: {
                                sampleSize: 12,
                                autoSkip: true,
                                maxRotation: 0,
                                callback: function (value, index, values) {
                                    return value;
                                }
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                callback: function (value, index, values) {
                                    return value + " Wh";
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
                        point: {
                            radius: 0
                        }
                    },
                    legend: {
                        display: false
                    }
                }

            })

            let ctxMingguan = document.getElementById('stacked-column-mingguan').getContext('2d');
            chartMingguan = new Chart(ctxMingguan, {
                type: 'bar',
                data: {
                    labels: ['1 Agust', '2 Agust', '3 Agust', '4 Agust', '5 Agust', '6 Agust', '7 Agust'],
                    datasets: [
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
                            data:  dataKonsumsi.konsumsi_data[0].konsumsi_week1,
                            backgroundColor: '#cc0000',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 2',
                            stack: 'Konsumsi',
                            data:  dataKonsumsi.konsumsi_data[0].konsumsi_week2,
                            backgroundColor: '#00cc00',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 3',
                            stack: 'Konsumsi',
                            data:  dataKonsumsi.konsumsi_data[0].konsumsi_week3,
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
                                callback: function (value, index, values) {
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
                                callback: function (value, index, values) {
                                    return value + " Wh";
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
                        point: {
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
                    datasets: [
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
                            data:  dataKonsumsi.konsumsi_data[0].konsumsi_month1,
                            backgroundColor: '#cc0000',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 2',
                            stack: 'Konsumsi',
                            data: dataKonsumsi.konsumsi_data[0].konsumsi_month2,
                            backgroundColor: '#00cc00',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 3',
                            stack: 'Konsumsi',
                            data: dataKonsumsi.konsumsi_data[0].konsumsi_month3,
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
                                callback: function (value, index, values) {
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
                                callback: function (value, index, values) {
                                    return value + " Wh";
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
                        point: {
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
                    datasets: [
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
                            data: dataKonsumsi.konsumsi_data[0].konsumsi_year1,
                            backgroundColor: '#cc0000',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 2',
                            stack: 'Konsumsi',
                            data: dataKonsumsi.konsumsi_data[0].konsumsi_year2,
                            backgroundColor: '#00cc00',
                            borderWidth: 1
                        },
                        {
                            label: 'Beban 3',
                            stack: 'Konsumsi',
                            data: dataKonsumsi.konsumsi_data[0].konsumsi_year3,
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
                                callback: function (value, index, values) {
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
                                callback: function (value, index, values) {
                                    return value + " Wh";
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
                        point: {
                            radius: 0
                        }
                    },
                    legend: {
                        display: false
                    }
                }

            })
        }
    }

    async function UpdateGraph() {
        await ajaxDataProd()
        await ajaxDataKons()
        if(!_.isEqual(dataProduksi,tmpdataProduksi) || !_.isEqual(dataKonsumsi, tmpdataKonsumsi)){
            chartBuilder()
            tmpdataProduksi = dataProduksi
            tmpdataKonsumsi = dataKonsumsi
        }
    }

    UpdateGraph()
    setInterval(() => {
        UpdateGraph()
    }, 5000);

})
