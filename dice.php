<form method="post">
<div class="row">
    <div class="col-2 colLine">횟수</div>
    <div class="col-8 colLine">
        <input type="text" name="count" placeholder="실행 횟수" class="form-control">
    </div>
    <div class="col-2 colLine">
        <button type="submit" class="btn btn-primary form-control">실행</div>
    </div>
</div>
</form>
<?php
    if(isset($_POST['count']))
    {
        $count = $_POST['count'];

        $dice = array();

        for($i=1; $i<=6; $i++)
            $dice[$i] = 0;

        for($i=1; $i<=$count; $i++)
        {
            $rand = rand(1, 6);
            $dice[$rand] ++;
        }

        ?>
        <div class="row">
            <div class="col colLine">
        <?php
        for($i=1; $i<=6; $i++)
        {
            echo "[$i] $dice[$i]<br>";
        }
        ?>  
            </div>
        </div>

         
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['주사위번호', '출현횟수'],
          <?php
            for($i=1; $i<=6; $i++)
            {
                // ['1', 13],
                echo "['dice$i', $dice[$i] ],";
            }
          ?>
        ]);

        var options = {
          title: '주사위 출현 빈도',
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




        <?php
    }
?>