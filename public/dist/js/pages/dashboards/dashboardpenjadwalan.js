$(function () {
    "use strict"

    var dataKonsumsi = null
    var tmpdataKonsumsi = null

    let chartMonitorKons = null

    function ajaxDataKons() {
        let XHRkons = jQuery.ajax({
            url: '/dashboard/konsumsi/get-realtime-data',
            type: 'GET',
            dataType: 'json',
            success: function (res) {
                dataKonsumsi = res
            }
        })

    }

    var chartBuilder = function () {

        if (dataKonsumsi != null) {
            if (chartMonitorKons != null) {
                chartMonitorKons.destroy()
            }

            let ctxChart = document.getElementById('penjadwalan-chart').getContext('2d')
            chartMonitorKons = new Chart(ctxChart, {
                type: 'line',
                data: {
                    labels: dataKonsumsi[0],
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
                            data: dataKonsumsi.konsumsi_data[0].konsumsi_day2,
                            borderColor: '#00cc00',
                            backgroundColor: "rgba(0,204,0,0.25)",
                            borderWidth: 2,
                        },
                        {
                            label: 'Beban 3',
                            data: dataKonsumsi.konsumsi_data[0].konsumsi_day3,
                            borderColor: '#8A2BE2',
                            backgroundColor: "rgba(138,43,226,0.25)",
                            borderWidth: 2,
                        },
                        {
                            label: 'Beban 4',
                            data: dataKonsumsi.konsumsi_data[0].konsumsi_day_total,
                            borderColor: '#2962FF',
                            backgroundColor: "rgba(41,98,255,0.25)",
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
                                // Include a dollar sign in the ticks
                                // max: data.max[1],
                                callback: function (value, index, values) {
                                    return value + " Wh";
                                },
                            },
                        }]
                    },
                    animation: {
                        duration: 800 // general animation time
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
        await ajaxDataKons()
        if (!_.isEqual(dataKonsumsi, tmpdataKonsumsi)) {
            chartBuilder()
            tmpdataKonsumsi = dataKonsumsi
        }
    }

    UpdateGraph()
    setInterval(() => {
        UpdateGraph()
    }, 5000);

})
