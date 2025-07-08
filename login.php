<?php
/**
 * login.php
 * - index.php?cmd=login 으로 접근 시 포함되는 로그인 처리 스크립트
 * - index.php에서 이미 세션 start 및 $conn = connectDB() 완료된 상태라고 가정
 * - SQL Injection 실습을 위해 보안(Prepared Statement, Hash) 미적용
 */

// 세션이 시작되지 않은 경우 대비 (중복 호출 방지)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// POST 값 수신 (공백이면 빈 문자열)
$id  = $_POST['id']  ?? '';
$pass = $_POST['pass'] ?? '';

// ───────────────────────────────────────────────
// 1) 아이디·비밀번호 검사 (보안 미적용)
//    ※ 실습 목적: SQL Injection 테스트를 위해 그대로 문자열 삽입
// ───────────────────────────────────────────────
$sql = "SELECT * FROM users WHERE id = '$id' AND pass = '$pass'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    // ── 로그인 성공 ──
    $_SESSION['sess_id']   = $row['id'];      // 세션에 아이디 저장
    $_SESSION['sess_name'] = $row['name'];    // 세션에 이름 저장

    $name = htmlspecialchars($row['name']);   // XSS 방지용 출력 이스케이프
    echo "<script>alert('{$name}님 반갑습니다.'); location.href='index.php';</script>";
    exit;
} else {
    // ── 로그인 실패 ──
    echo "<script>alert('아이디와 비밀번호를 확인하세요'); location.href='index.php?cmd=injection';</script>";
    exit;
}
?>
