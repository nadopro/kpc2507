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
?>

aaa