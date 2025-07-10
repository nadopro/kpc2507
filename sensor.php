<?php
// sensor.php — 센서 데이터 랜덤 수집 및 DB 저장
// index.php에서 DB 연결 ($conn) 완료 상태라고 가정

// 랜덤한 온도(30.0 ~ 32.0)와 습도(70.0 ~ 75.0) 생성
$temp = round(mt_rand(300, 320) / 10, 1); // 예: 30.7
$hum  = round(mt_rand(700, 750) / 10, 1); // 예: 72.3

// SQL 쿼리 작성
$sql = "INSERT INTO iot (sensor, temp, hum, time) VALUES (1, $temp, $hum, NOW())";

// 쿼리 실행
if (mysqli_query($conn, $sql)) {
    echo "센서 데이터 저장 완료: 온도 {$temp}℃ / 습도 {$hum}%";
} else {
    echo "오류 발생: " . mysqli_error($conn);
}
?>

<script>
    setTimeout(function(){
        location.href='index.php?cmd=sensor';
        }
    , 3000);
    </script>

