 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['시간', '온도', '습도'],
          <?php
            $sql = "select count(*) as cnt from iot where sensor='1'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);

            $dataCount = $data['cnt'];

            $start = $dataCount - 300;
            $sql = "select * from iot where sensor='1' order by idx asc limit $start, 1000 ";
            //echo "$sql<br>";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);
            while($data)
            {
                // 2025-07-10 12:34:56 
                $time = $data['time'];
                $split = explode(" ", $time);
                $temp = $data['temp'];
                $hum = $data['hum'];


                echo "['$split[1]', $temp, $hum],";
                $data = mysqli_fetch_array($result);
            }

          ?>

        ]);

        var options = {
          title: '센서 모니터링',
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

<script>
    setTimeout(function(){
        location.href='index.php?cmd=monitor';
        }
    , 3000);
    </script>