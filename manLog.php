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

    <?php
        // 이상 트래픽을 탐지 (최근 1분 이내에 50번이상 클릭)
        //      5분 이내에 메시지를 보낸 이력이 없으면 전송

        $sql = "select count(*) as cnt from log 
                WHERE time between  DATE_SUB(now(), INTERVAL 1 MINUTE) and now()";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        $clickCount  = $data['cnt'];

        echo "sql = $sql<br>";
        echo "click  = $clickCount";

        if($clickCount >=100)
        {
            // 이상 트래픽, 클릭이 많아짐.

            $sql = "select * from sms 
                where time between DATE_SUB(now(), INTERVAL 5 MINUTE) and now()";
            $result = mysqli_query($conn, $sql);
            $dataCount = mysqli_num_rows($result);
            echo "data Count = $dataCount<br>";

            if($dataCount == 0)
            {
                $receiver = $adminMobile;
                $memo = "이상 트래픽 발생
클릭이 급증합니다.";

                $smstype = "auto";
                include "auto_sms.php";

                $sql = "insert into sms (mobile, memo, time)
                            values('$receiver', '$memo', now())";
                $result = mysqli_query($conn, $sql);


            }
        }

    ?>


    <script>
    setTimeout(function(){
        location.href='index.php?cmd=manLog&type=1';
        }
    , 3000);
    </script>

        <?php
    }else
    {
        $sql = "select * from log order by idx desc limit 200 ";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);

        if($data)
        {
            ?>
            <table class='table table-bordered'>
                <tr>
                    <td>IDX</td>
                    <td>IP</td>
                    <td>WHEN</td>
                    <td>WORK</td>
                    <td>ID</td>
                    <td>FLAG</td>
                    <td>ETC</td>
                </tr>
            <?php

                function ip2nation($ip) // 1.2.3.4
                {
                    $splitIP = explode(".", $ip);
                    include ("ip_files/" . $splitIP[0] . ".php");

                    $code = ($splitIP[0] * 256 * 256 * 256) 
                            + ($splitIP[1] * 256 * 256)
                            + ($splitIP[2] * 256)
                            + $splitIP[3];
                    
                    foreach($ranges as $key => $value)
                    {
                        if($key <= $code)
                        {
                            if($ranges[$key][0] >= $code)
                            {
                                $nation = $ranges[$key][1];
                                break;
                            }
                        }

                        if(!isset($nation))
                        {
                            $nation = "noflag";
                        }

                        return $nation;
                    }
                    
                }

                while($data)
                {
                    $nation = ip2nation($data['ip']);
                    $nationFlag = "<img src='flags/$nation.gif'>";
                    ?>
                    <tr>
                        <td><?php echo $data['idx']?></td>
                        <td><?php echo $data['ip']?></td>
                        <td><?php echo $data['time']?></td>
                        <td><?php echo $data['work']?></td>
                        <td><?php echo $data['id']?></td>
                        <td><?php echo $nationFlag?></td>
                        <td>ETC</td>
                    </tr>
                    <?php
                    $data = mysqli_fetch_array($result);
                }
            ?>
            </table>

            <?php

        }
    }
?>