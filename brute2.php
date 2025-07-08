<?php
/**
 * brute2.php — 4‑글자 소문자 무차별 대입 공격 (step‑by‑step)
 *   index.php?cmd=brute2&pos=1  형식으로 호출
 *   pos 파라미터가 없으면 1부터 시작
 *   [ pos, 검사값 ] = [ 1, aaaa ] 형태로 화면에 보여줌
 *   매 호출마다 한 비밀번호만 검사하고, 실패 시 1초 후 pos+1 로 재요청
 *   성공 시   [pos] 비밀번호 : Find!! 출력 후 종료
 *
 * ⚠️ 실습/연구 목적 코드입니다. 실제 서비스에 사용하지 마십시오.
 */

// ───── 초기화
set_time_limit(0);

// index.php 에서 session, DB 연결이 이미 되어 있다고 가정
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once 'db.php';
$conn = $conn ?? connectDB(); // index.php 에서 안 불렀다면 연결

$pos = isset($_GET['pos']) ? (int)$_GET['pos'] : 1;
if ($pos < 1) $pos = 1;

/*
 * pos → 4자리 문자열 변환
 *   pos=1   → aaaa (index 0)
 *   pos=26^4 → zzzz (index 456975)
 */
function posToString(int $p): string {
    $p--;                       // 0‑based
    $s = '';
    for ($i = 0; $i < 4; $i++) {
        $char = chr(ord('a') + ($p % 26));
        $s   = $char . $s;
        $p   = intdiv($p, 26);
    }
    return $s;
}

$pwd = posToString($pos);

// 현재 진행상황 출력
printf('[ %d, %s ]<br>', $pos, htmlspecialchars($pwd));
flush();

// DB 확인 (비밀번호 평문 비교 — 실제로는 해시 권장)
$pwdEsc = mysqli_real_escape_string($conn, $pwd);
$sql    = "SELECT name FROM users WHERE pass = '$pwdEsc' LIMIT 1";
$res    = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($res)) {
    // ── 성공 ──
    printf('[%d] %s : Find!!', $pos, htmlspecialchars($pwd));
    exit;
}

// ── 실패: 1초 후 다음 pos 로 재요청 ──
$next = $pos + 1;
echo "<script>setTimeout(function(){location.href='index.php?cmd=brute2&pos={$next}';}, 100);</script>";
?>
