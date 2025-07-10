<?php
    if(isset($_SESSION['sess_level']) and $_SESSION['sess_level'] < $adminLevel)
    {
        ?>
        <script>
            alert('잘못된 접근입니다.');
            location.href='index.php';
        </script>
        <?php
    }
?>