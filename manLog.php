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
<div class="row">
    <div class="col text-center">
        <ul class="pagination">
        <li class="page-item <?php echo $type1Mark?>" ><a class="page-link" href="index.php?cmd=manLog&type=1">그래프</a></li>
        <li class="page-item <?php echo $type2Mark?>" ><a class="page-link" href="index.php?cmd=manLog&type=2">표</a></li>
        </ul>
    </div>
</div>
