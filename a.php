<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap 5 기본</title>
  <!-- Bootstrap 5 CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>

        .colLine { 
            line-height:180%; 
            min-height:30px; 
            border-bottom:1px dotted #DDDDDD; 
            padding-top:4px; 
            padding-bottom:4px;
        }
    </style>
</head>
<body>

  <div class="container-fluid bg-danger">
    전체 바
  </div>
  <div class="container">
    <div class="row">
        <div class="col colLine">
            PHP를 배워봅시다.<br>

            <?php
                $age = 13;
                echo "age = $age<br>";

                include "b.php";
                echo "age = $age<br>";

                for($i=1; $i<=10; $i++)
                {
                    echo "$i<br>";
                }
            ?>

            <form method="get">
                <input type="text" name="id" class="form-control" placeholder="아이디입력">
                <button type="submit" class="btn btn-primary">로그인</button>
            </form>

        </div>
    </div>

  </div>

  <!-- Bootstrap 5 JS CDN -->
  
</body>
</html>
