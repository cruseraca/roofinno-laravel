<script type="text/javascript">
    var callGraph = function () {
        jqXHR = jQuery.ajax({
            url: "/test",
            type: 'GET',
            dataType: "json",
            success: function(data){
              konsumsi(data.kons);
              grafikku(data);
            },
            error: function(xhr,b,c){
              console.log("xhr=" + xhr + " b=" + b + " c=" + c);
            }
        });
    };

    function konsumsi(data) {
      document.getElementById("kons").innerHTML = data[0]+" W";
    }
    function grafikku(data) {
        let ctx1 = document.getElementById("myOwnChart");
    
        let myChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: data.time,
                datasets: [{
                    data: data.kwh,
                    lineTension: 0.4,
                    backgroundColor: "rgba(41, 98, 255,0.3)",
                    borderColor: "rgba(41, 98, 255, 1)",
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
                        return ' '+value+'  ';
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

        callGraph();
    }
    </script>
    