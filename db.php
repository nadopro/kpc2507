<?php
/**
 * 데이터베이스 연결 함수
 * DB: kpc / User: kpc / Pass: 1111
 * @return mysqli  성공 시 연결 객체, 실패 시 예외 발생
 */
function connectDB(): mysqli
{
    $host = '127.0.0.1';   // 또는 'localhost'
    $user = 'kpc';
    $pass = '1111';
    $db   = 'kpc';

    // MySQLi 객체 기반 연결
    $conn = new mysqli($host, $user, $pass, $db);

    // 연결 오류 처리
    if ($conn->connect_error) {
        throw new RuntimeException('DB 연결 실패: ' . $conn->connect_error);
    }

    // 문자셋(UTF-8) 설정
    $conn->set_charset('utf8mb4');

    return $conn;
}

    $prefix = "";
    $users = $prefix . "users";
    $log = "log";
    $members = "members";


?>