$(function () {
  "use strict";
  //Data Assignment
  
  var charts_production = {
    init: function () {
      this.ajaxCallGraphProduction();
    },

    ajaxCallGraphProduction: function (){
      var jqXHR = jQuery.ajax({
          url: "/dashboard/produksi/get-realtime-data",
          type: 'GET',
          dataType: "json",
          success: function(data){
            // konsumsi(data.kons);
            console.log("success");
            grafik_week(data);
            grafik_month(data);
            grafik_year(data);
            konsumsi(data);
            grafikku(data);
          },
          error: function(xhr,b,c){
            console.log("xhr=" + xhr + " b=" + b + " c=" + c);
          }
      });
    },
  }
  
  function grafik_week(data) {
    let ctx1 = document.getElementById("produksi-Mingguan");

    let myChart = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
            datasets: [{
                data: data.power_week,
                lineTension: 0.1,
                backgroundColor: "rgba(255, 165, 0, 0.3)",
                borderColor: "rgba(255, 165, 0, 1)",
                borderWidth: 1
            }]
        },
        options: {
          scales: {
            xAxes: [{
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
              ticks: {
                  // Include a dollar sign in the ticks
                  max: data.max[1],
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
    });

      // setTimeout(function(){ charts_production.init();}, 5000);
    
  };
  function grafik_month(data) {
    let ctx1 = document.getElementById("produksi-Bulanan");

    let myChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: data.time_day,
            datasets: [{
                data: data.power_day,
                backgroundColor: "rgba(255, 165, 0, 0.3)",
                borderColor: "rgba(255, 165, 0, 1)",
                borderWidth: 1
            }]
        },
        options: {
          scaleShowVerticalLines: false,
          scales: {
            xAxes: [{
              type: 'category',
              gridLines: false,
              ticks: {
                sampleSize: 12,
                autoSkip: true,
                maxRotation: 0,
                padding: 5,
                callback: function(value, index, values) {
                    return value;
                }
              }
            }],
            yAxes: [{
              ticks: {
                  // Include a dollar sign in the ticks
                  max: data.max[2],
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
    });

      // setTimeout(function(){ charts_production.init();}, 5000);
    
  };
  function grafik_year(data) {
    let ctx1 = document.getElementById("produksi-Tahunan");

    let myChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
            datasets: [{
                data: data.power_month,
                backgroundColor: "rgba(255, 165, 0, 0.3)",
                borderColor: "rgba(255, 165, 0, 1)",
                borderWidth: 1
            }]
        },
        options: {
          scaleShowVerticalLines: false,
          scales: {
            xAxes: [{
              type: 'category',
              gridLines: false,
              ticks: {
                sampleSize: 12,
                autoSkip: true,
                maxRotation: 0,
                padding: 5,
                callback: function(value, index, values) {
                    return value;
                }
              }
            }],
            yAxes: [{
              ticks: {
                  // Include a dollar sign in the ticks
                  max: data.max[3],
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
    });

      // setTimeout(function(){ charts_production.init();}, 5000);
    
  };
  function grafikku(data) {
    let ctx1 = document.getElementById("produksi-Harian");

    let myChart = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: data.time,
            datasets: [{
                data: data.power_hour,
                lineTension: 0.2,
                backgroundColor: "rgba(255, 165, 0, 0.3)",
                borderColor: "rgba(255, 165, 0, 1)",
                borderWidth: 1
            }]
        },
        options: {
          scales: {
            xAxes: [{
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
              ticks: {
                  // Include a dollar sign in the ticks
                  max: data.max[0],
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
    });

    
    setTimeout(function(){ charts_production.init();}, 5000);
    
  };
  
  function konsumsi(data) {
    document.getElementById("realHarian").innerHTML = data.prod[0]+" kWh";
    document.getElementById("TotalHarian").innerHTML = data.prod[1]+" kWh";
    document.getElementById("TotalMingguan").innerHTML = data.prod[2]+" kWh";
    document.getElementById("TotalBulanan").innerHTML = data.prod[3]+" kWh";
    document.getElementById("TotalTahunan").innerHTML = data.prod[4]+" kWh";
  };

  charts_production.init();
  // $(document).ready(function(){
  // });
  
  
});