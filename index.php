<?php
    session_save_path(__DIR__ . '/sess');   // ./sess 폴더에 저장
    if (!is_dir(__DIR__ . '/sess')) mkdir(__DIR__ . '/sess', 0700, true);
    session_start();

    include "db.php";

    $conn = connectDB();

// index.php
$cmd = $_GET['cmd'] ?? '';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap 5 기본</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    /* 선택적: 표 형태 라인 표시용 */
    .colLine {
      line-height: 180%;
      min-height: 30px;
      border-bottom: 1px dotted #DDDDDD;
      padding: 4px 0;
    }
  </style>
</head>

<!-- flexbox로 스티키 푸터 구현 -->
<body class="d-flex flex-column min-vh-100">

  <!-- ── Navigation Bar ─────────────────────────── -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">홈페이지</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav"
          aria-controls="topNav" aria-expanded="false" aria-label="메뉴 열기">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div id="topNav" class="collapse navbar-collapse">
          <ul class="navbar-nav ms-auto">

            <!-- 홈 -->
            <li class="nav-item">
              <a class="nav-link" href="index.php">홈</a>
            </li>

            <!-- 메뉴1 -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="menu1" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">공격테스트</a>
              <ul class="dropdown-menu" aria-labelledby="menu1">
                <li><a class="dropdown-item" href="index.php?cmd=injection">SQL Injection</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=injectionsafe">Safe Injection</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=shell">웹 쉘</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=brute">무차별대입</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=brute2">무차별대입2</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=fake">fake data</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=dice">주사위</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=chart">차트</a></li>
              </ul>
            </li>

            <!-- 메뉴2 -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="menu2" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">게시판</a>
              <ul class="dropdown-menu" aria-labelledby="menu2">
                <li><a class="dropdown-item" href="index.php?cmd=bbs&bid=1">자유게시판</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=bbs&bid=2">QnA</a></li>
              </ul>
            </li>

            <!-- 메뉴3 -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="menu3" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">메뉴 3</a>
              <ul class="dropdown-menu" aria-labelledby="menu3">
                <li><a class="dropdown-item" href="index.php?cmd=menu3-1">메뉴 3-1</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=menu3-2">메뉴 3-2</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- ── 로그인 상태 표시줄 ────────────────────── -->
    <div class="bg-light">
      <div class="container py-2 d-flex justify-content-end align-items-center">
        <?php if (isset($_SESSION['sess_id'])): ?>
          <span class="me-2 fw-semibold"><?= htmlspecialchars($_SESSION['sess_name'] ?? '사용자') ?>님</span>
          <a href="index.php?cmd=logout" class="btn btn-sm btn-outline-secondary">로그아웃</a>
        <?php else: ?>
          <a href="index.php?cmd=injection" class="btn btn-sm btn-primary">로그인</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <!-- ── Main Content ───────────────────────────── -->
  <main class="flex-fill container my-4">

<?php
  // ① cmd 파라미터가 없으면 init.php
  if ($cmd === '') {
      include 'init.php';

  // ② cmd가 있으면 같은 이름의 php 파일 포함
  } else {
      // 보안: 디렉터리 탈출 방지
      $file = basename($cmd) . '.php';
      if (is_file($file)) {
          include $file;
      } else {
          echo '<div class="alert alert-danger">요청하신 페이지를 찾을 수 없습니다.</div>';
      }
  }
?>

  </main>

  <!-- ── Footer (Sticky) ────────────────────────── -->
  <footer class="bg-light text-center py-3 mt-auto">
    한국생산성본부 보안 프로그래밍 과정
  </footer>

</body>
</html>
