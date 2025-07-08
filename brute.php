<?php
/**
 * brute.php  ‒ 4‑글자 소문자 비밀번호 무차별 대입 공격 데모
 *   aaaa → zzzz 까지 순회하며 users.pass 와 매칭 시도
 *   1000회마다 현재 시도 문자열을 출력·flush
 *   발견 즉시 [count] 비밀번호 : Find!! 출력 후 종료
 *
 * ⚠️ 학습/실습 목적의 코드입니다. 실제 서비스 사용 금지
 */

// 실행 시간이 길어질 수 있으므로 제한 해제
set_time_limit(0);

// 버퍼링 설정: 실시간 출력
while (ob_get_level()) {
    ob_end_flush();
}
ob_implicit_flush(true);

$totalCount = 0;
$found      = false;

$chars = range('a', 'z');              // a ~ z 배열
$targetId = null;                      // 매칭 사용자 id (원하면 특정 id 조건 사용)

foreach ($chars as $c1) {
    foreach ($chars as $c2) {
        foreach ($chars as $c3) {
            foreach ($chars as $c4) {
                $pwd  = $c1 . $c2 . $c3 . $c4;
                $totalCount++;

                // 패스워드 검증 (보안 미고려: 바로 비교)
                $sql    = "SELECT name FROM users WHERE pass = '$pwd'";
                $result = mysqli_query($conn, $sql);

                if ($row = mysqli_fetch_assoc($result)) {
                    // 일치하는 패스워드 발견
                    $name = htmlspecialchars($row['name']);
                    echo "[{$totalCount}] $pwd : Find!! (사용자: $name)\n";
                    $found = true;
                    exit;   // 즉시 종료
                }

                // 1000회마다 진행 상황 출력
                if ($totalCount % 1000 === 0) {
                    echo "[{$totalCount}] 현재 검사중인 비밀번호 : $pwd<br>\n";
                }
            }
        }
    }
}

if (!$found) {
    echo "모든 조합을 시도했지만 일치하는 비밀번호를 찾지 못했습니다.";
}
?>
