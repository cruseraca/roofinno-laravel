/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";

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
            scaleMinSpace: 40,
            offset: 60,
            labelInterpolationFnc: function(value) {
                return (value / 1) + 'KWh';
            }
        },

        options: {
          legend: { display: false }
          }
    });

    // ============================================================== 
    // Performa Bulanan
    // ============================================================== 
    // Bar chart Bulanan
    new Chart(document.getElementById("bar-chart-bulanan"), {
        type: 'bar',
        data: {
          labels: ["Minggu 1", "Minggu 2", "Minggu 3", "Minggu 4"],
          datasets: [
            {
              backgroundColor: ["#ffbf00", "#00cc00","#00cc00","#cc0000"],
              data: [38,63,43,18]
            }
          ]
        },

        options: {
          legend: { display: false }
          }
    });

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