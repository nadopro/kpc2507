<?php
    // 세션 레벨이 설정 안되어 있거나, 관리자보다 낮은 등급이면, 쫓아내기
    if(!isset($_SESSION['sess_level']) or $_SESSION['sess_level'] < $adminLevel)
    {
        ?>
        <script>
            alert('잘못된 접근입니다.');
            location.href='index.php';
        </script>
        <?php
        exit();
    }

    if(isset($_GET["type"]))
        $type = $_GET["type"];
    else
        $type = 1;

        
    if($type == 1)
        $type1Mark = "active";
    else
        $type1Mark = "";

    if($type == 2)
        $type2Mark = "active";
    else
        $type2Mark = "";
?>
<div class="row text-center">
    <div class="col text-center">
        <ul class="pagination">
        <li class="page-item <?php echo $type1Mark?>" ><a class="page-link" href="index.php?cmd=manLog&type=1">그래프</a></li>
        <li class="page-item <?php echo $type2Mark?>" ><a class="page-link" href="index.php?cmd=manLog&type=2">표</a></li>
        </ul>
    </div>
</div>

<?php
    if($type == 1)
    {
        $today = Date('Y-m-d');
        echo "today = $today<br>";


        ?>
 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['시간', '클릭수', '컴퓨터수'],
          <?php
            

            // 00시 ~ 23시 
            for($t = 0; $t <=23; $t ++)
            {
                // 00:00:00 ~ 00:59:59
                $sql = "select count(*) as cnt from log 
                            where 
                            time>='$today $t:00:00' and time<='$today $t:59:59' 
                            ";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_array($result);
                $clickCount = $data['cnt'];
                echo "['$t', $clickCount, 3], ";
            }

          ?>

        ]);

        var options = {
          title: '시간별 접속 통계',
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
        location.href='index.php?cmd=manLog&type=1';
        }
    , 3000);
    </script>

        <?php
    }else
    {

    }
?>