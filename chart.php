 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '현재피해', '이달피해' , '내년피해'],
          ['2004',  1000,      400, 700],
          ['2005',  1170,      460, 399],
          ['2006',  660,       1120, 2832],
          ['2007',  1030,      540, 1722]
        ]);

        var options = {
          title: '보안 피해 사례',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('kpc_chart'));

        chart.draw(data, options);
      }
    </script>
  
    <div class="row">
      <div class="col" id="kpc_chart" style="width: 100%; height: 500px">

      </div>
    </div>


