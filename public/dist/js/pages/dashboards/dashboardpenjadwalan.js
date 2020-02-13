/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() 
{
    "use strict";
    // ============================================================== 
    // Monitoring Beban
    // ============================================================== 

    // line chart with area

        new Chartist.Line(document.getElementById("penjadwalan-chart"),
        {
          labels: ['0am', '2am', '4am', '6am', '8am', '10am', '12am', '2pm','4pm','6pm','8pm','10pm','12pm'],
          series: [
            [0, 0, 0, 0, 110, 160, 200, 290,305,320,310,122,20],
            [0,0,80,105,180,75,100,8,20,25,80,90,95],
            [600,215,150,20,0,0,0,115,90,170,120,110,185]
          ]
        }, 
        {
            low: 0,
        //   high: 600,
            fullWidth: true,
            chartPadding: {
              left:100
            },
            axisY: 
                {
                    onlyInteger: true,
                    labelInterpolationFnc: function(value) {
                        return (value / 1) + 'KW';
                        }
                },
            plugins: [
                Chartist.plugins.tooltip()
            ],
            chartPadding: {
                left: 20
            }
        });
});