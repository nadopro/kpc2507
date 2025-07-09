<?php
// bbs.php — 게시판 처리 (list, show, write, dbWrite, delete)

$mode = $_GET['mode'] ?? 'list';
$bid  = (int)($_GET['bid'] ?? 1);
$idx  = (int)($_GET['idx'] ?? 0);

// list mode — 목록 출력
if ($mode === 'list') {
    echo "<h3>게시판 목록</h3>";
    $sql = "SELECT * FROM bbs WHERE bid = $bid ORDER BY notice DESC, idx DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    echo '<div class="d-none d-md-block">'; // PC
    echo '<div class="row fw-bold border-bottom py-2"><div class="col-1">No</div><div class="col-6">제목</div><div class="col-2">작성자</div><div class="col-3">작성일</div></div>';
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $url = "index.php?cmd=bbs&bid=$bid&mode=show&idx=" . $row['idx'];
        echo '<div class="row py-1 border-bottom">';
        echo "<div class='col-1'>{$no}</div>";
        echo "<div class='col-6'><a href='$url'>{$row['title']}</a></div>";
        echo "<div class='col-2'>{$row['name']}</div>";
        echo "<div class='col-3'>" . substr($row['time'], 0, 10) . "</div>";
        echo '</div>';
        $no++;
    }
    echo '</div>';

    echo '<div class="d-block d-md-none">'; // Mobile
    mysqli_data_seek($result, 0);
    while ($row = mysqli_fetch_assoc($result)) {
        $url = "index.php?cmd=bbs&bid=$bid&mode=show&idx=" . $row['idx'];
        echo '<div class="row py-2 border-bottom">';
        echo "<div class='col-8'><a href='$url'>{$row['title']}</a></div>";
        echo "<div class='col-4'>{$row['name']}</div>";
        echo '</div>';
    }
    echo '</div>';

    echo "<div class='mt-3'>";
    echo "<a href='index.php?cmd=bbs&bid=$bid&mode=write' class='btn btn-primary'>글쓰기</a>";
    echo "</div>";
}

// write mode — 글쓰기 형식
elseif ($mode === 'write') {
    $name = htmlspecialchars($_SESSION['sess_name'] ?? '');
    echo <<<HTML
    <h3>글쓰기</h3>
    <form action="index.php?cmd=bbs&bid=$bid&mode=dbWrite" method="post">
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="notice" value="1" id="notice">
            <label class="form-check-label" for="notice">공지사항 여부</label>
        </div>
        <input type="text" name="title" class="form-control mb-2" placeholder="제목을 입력하세요" required>
        <input type="text" name="name" class="form-control mb-2" value="$name" readonly>
        <textarea name="html" class="form-control mb-2" rows="10" placeholder="내용을 입력하세요" required></textarea>
        <button type="submit" class="btn btn-success">글등록</button>
        <a href="index.php?cmd=bbs&bid=$bid" class="btn btn-secondary">목록보기</a>
    </form>
HTML;
}

// dbWrite mode — 글저장
elseif ($mode === 'dbWrite') {
    $id     = $_SESSION['sess_id'] ?? '';
    $name   = $_POST['name'] ?? '';
    $title  = $_POST['title'] ?? '';
    $html   = $_POST['html'] ?? '';
    $notice = isset($_POST['notice']) ? 1 : 0;

    $title  = addslashes($title);
    $name   = addslashes($name);
    $html   = addslashes($html);

    $sql = "INSERT INTO bbs (bid, title, id, name, html, notice, time) VALUES ($bid, '$title', '$id', '$name', '$html', $notice, NOW())";
    mysqli_query($conn, $sql);
    echo "<script>alert('글이 등록되었습니다.'); location.href='index.php?cmd=bbs&bid=$bid';</script>";
    exit;
}

// show mode — 그림 보기
elseif ($mode === 'show') {
    $sql = "SELECT * FROM bbs WHERE idx = $idx";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    echo "<h3>{$row['title']}</h3>";
    echo "<div class='text-muted mb-2'>{$row['name']} | " . substr($row['time'], 0, 10) . "</div>";
    echo "<div style='min-height:300px;' class='border p-3 mb-3'>{$row['html']}</div>";

    // 이전글/다음글
    $prev = mysqli_fetch_assoc(mysqli_query($conn, "SELECT idx FROM bbs WHERE bid=$bid AND idx < $idx ORDER BY idx DESC LIMIT 1"));
    $next = mysqli_fetch_assoc(mysqli_query($conn, "SELECT idx FROM bbs WHERE bid=$bid AND idx > $idx ORDER BY idx ASC LIMIT 1"));

    echo "<div class='mb-3'>";
    if ($prev) {
        echo "<a href='index.php?cmd=bbs&bid=$bid&mode=show&idx={$prev['idx']}' class='btn btn-outline-primary'>이전글</a> ";
    } else {
        echo "<button class='btn btn-outline-secondary' disabled>이전글</button> ";
    }
    if ($next) {
        echo "<a href='index.php?cmd=bbs&bid=$bid&mode=show&idx={$next['idx']}' class='btn btn-outline-primary'>다음글</a> ";
    } else {
        echo "<button class='btn btn-outline-secondary' disabled>다음글</button> ";
    }
    echo "</div>";

    echo "<a href='index.php?cmd=bbs&bid=$bid' class='btn btn-secondary'>목록보기</a> ";

    if ($_SESSION['sess_id'] === $row['id'] || $_SESSION['sess_id'] === 'admin') {
        echo "<a href='index.php?cmd=bbs&bid=$bid&mode=delete&idx=$idx' class='btn btn-danger'>삭제</a>";
    }
}

// delete mode — 삭제
elseif ($mode === 'delete') {
    $sql = "SELECT * FROM bbs WHERE idx = $idx";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if ($_SESSION['sess_id'] === $row['id'] || $_SESSION['sess_id'] === 'admin') {
        mysqli_query($conn, "DELETE FROM bbs WHERE idx = $idx");
        echo "<script>alert('삭제되었습니다.'); location.href='index.php?cmd=bbs&bid=$bid';</script>";
        exit;
    } else {
        echo "<script>alert('삭제 권한이 없습니다.'); history.back();</script>";
        exit;
    }
}
