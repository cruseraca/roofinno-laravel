<script type="text/javascript">
    var SeriesData = [[],[]];
    var graphData = null;
    
    var callGraph = function () {
          jqXHR = jQuery.ajax({
              url: "{{url('/dashboard/realtime_grafik')}}",
              type: 'GET',
              dataType: "json"
          }).then(function (responseJson) { // ajax success handler
              if (responseJson!='') {
                  // SeriesData.splice(0,SeriesData.length);
                  responseJson[0].forEach(function(item) {
                    SeriesData[0].push({ x: item.x, y: item.y });
                  });
                  responseJson[1].forEach(function(item) {
                    SeriesData[1].push({ x: item.x, y: item.y });
                  });
                  var sum1 = responseJson[4]/10;
                  var sum2 = responseJson[5]/10;
    
    
                  $('#kons').text(responseJson[2].toFixed(2)+"W");
                  $('#prod').text(responseJson[3].toFixed(2)+"W");
                  $('#sum1').text(sum1.toFixed(2)+"Wh");
                  $('#sum2').text(sum2.toFixed(2)+"Wh");
                  graphData.render();
              }
              setTimeout(function() {
                  callGraph();
              }, 5000);
          }, function(jqXHR, textStatus, errorThrown) { // ajax error handler
    
                  setTimeout(function() {
                      callGraph(); // retry with same lastDate as previous ajax call.
                  }, 5000);
    
          });
    
    };
    
    function grafik() {
      // Init Richshaw graph
      graphData = new Rickshaw.Graph({
        element: $('#rickshawGraph').get(0),
        width: $('#rickshawGraph').closest('#aa').width(),
        height: $('#rickshawGraph').height(),
        interpolation: 'linear',
        renderer: 'line',
        series: [
          {
            data: SeriesData[0],
            color: $('#rickshawGraph').data('color1'),
            name: 'Konsumsi'
          }, {
            data: SeriesData[1],
            color: $('#rickshawGraph').data('color2'),
            name: 'Produksi'
          }
        ]
      });
    
      // Add hover info
      var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graphData,
        xFormatter: function(x) { return moment(x*1000).format('LLLL')},
        yFormatter: function(y) { return y.toFixed(2) + " KW" }
      });
    
    
    
      callGraph();
    }
    
    </script>
    