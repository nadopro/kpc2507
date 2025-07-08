<?php
/**
 * loginsafe.php — SQL Injection 방어(escape) 버전
 * - index.php?cmd=login 으로 접근해 포함되는 스크립트
 * - index.php 에서 session_start(), $conn = connectDB() 가 이미 호출된 상태로 가정
 * - Prepared Statement 대신 mysqli_real_escape_string() 으로 최소한의 Injection 방지
 *   (실전 환경이라면 비밀번호 해시 + password_verify() 사용 권장)
 */

// 세션이 시작되지 않은 경우 대비
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// POST 파라미터 수신
$id   = $_POST['id']   ?? '';
$pass = $_POST['pass'] ?? '';

// ───────────────────────────────────────────────
// 1) 입력값 이스케이프 → SQL Injection 완화
// ───────────────────────────────────────────────
$idEsc   = mysqli_real_escape_string($conn, $id);
$passEsc = mysqli_real_escape_string($conn, $pass);

$sql = "SELECT * FROM users WHERE id = '$idEsc' AND pass = '$passEsc' LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    // ── 로그인 성공 ──
    $_SESSION['sess_id']   = $row['id'];   // 세션에 아이디 저장
    $_SESSION['sess_name'] = $row['name']; // 세션에 이름 저장

    $name = htmlspecialchars($row['name']);
    echo "<script>alert('{$name}님 반갑습니다.'); location.href='index.php';</script>";
    exit;
} else {
    // ── 로그인 실패 ──
    echo "<script>alert('아이디와 비밀번호를 확인하세요'); location.href='index.php?cmd=injectionsafe';</script>";
    exit;
}
?>
