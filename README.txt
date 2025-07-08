download xampp
download visual code


https://github.com/nadopro/kpc2507

아이디	이름	나이
aaaa	알파벳	34
test	테스터	32
admin	관리자	12
user	사용자	23
kdhong	홍길동	24
sejong	이도	42
leesan	이산	28
sslee	이순신	52
chatgpt	지피티	40
gemini	제미나이	61
copilot	코파일럿	27


http://localhost:9000

http://localhost:9000/phpmyadmin

kpc
kpc
1111

CREATE TABLE members (
    id   CHAR(20)     NOT NULL UNIQUE, -- 고유 ID (기본키 아님)
    name VARCHAR(50)  NOT NULL,
    age  TINYINT UNSIGNED NOT NULL
);

INSERT INTO members (id, name, age) VALUES
('aaaa', '알파벳', 34),
('test', '테스터', 32),
('admin', '관리자', 12),
('user', '사용자', 23);

drop table members;

alter database kpc character set = utf8mb4 COLLATE=utf8mb4_unicode_ci;


create table  users (
    idx integer auto_increment primary key,
    id  char(20) unique,
    name char(20),
    pass char(50)
);

insert into users (id, name, pass) values ('test', '테스트', 'abcd');
insert into users (id, name, pass) values ('admin', '관리자', 'abcd');
insert into users (id, name, pass) values ('hong', '홍길동', password('abcd'));

$id   / $pass
xyz  1111
xyz' or 2>1 -- 
select * from users where id='$id' and pass='$pass' 

select * from users where id='xyz' or 2>1 limit 1, 1 -- ' and pass='$pass';


X로 된 약어

X = Ex
Windows XP 
XML = eXtensible Markup Language
DX : Digital Transformation

X = tran 
X = Cross

HTML : HyperText Markup Language

<br>태그는 줄바꿈할때 씁니다.

<>

< : &lt;
> : &gt;

w3schools.com


size

xs -  sm  - md - lg - xlg


 1.2.3.4    0001    0010    0011    0100
 255.0      1111    1111    1111    0000
 ----------------------------------------
 &          0001    0010    0011    0000    = 1.2.3.0

    0000 0000
    0111 1111
    A class : 0 ~ 127

        100.*.*.*

        10.*.*.*
        127.0.0.1

    B class
    10 00 0000
    10 11 1111  : 128 ~ 191

        172.16.*.*

        150.23.*.*
    110 0 0000
    110 1 1111 :192 ~ 221

    C class : 192.168.*.*

    200.13.75.*

 0100 0000

 download burp suite


localhost:9000/index.php?cmd=test

javascript:alert(document.cookie);

비밀번호의 취약성 확인(맨 뒤의 슬래쉬 포함되어야 함)
https://www.security.org/how-secure-is-my-password/

 Q1. Homepage 구조 잡기

 다음과 같은 형태의 홈페이지를 작성하려고 해.
 - HTML5와 Bootstrap5를 이용해 홈페이지 제작
 - XAMPP 환경에서 PHP를 이용한 프로그래밍
 모든 홈페이지의 구조는 index.php를 통과해서 만들고 싶어.
  - GET 방식으로 넘어온 $cmd 값이 없으면, init.php 파일을 include 하도록 구성해 줘.
  - 만약 $cmd 값이 있으면 $cmd.php 파일을 include 하도록 Body를 설정해 줘.
화면 상단에는 네비게이션 바와 드랍다운 메뉴를 이용해 메뉴를 구성해 줘.
메뉴는 홈, 메뉴1, 메뉴2, 메뉴3
메뉴1에는 메뉴 1-1, 메뉴 1-2, 메뉴 1-3
메뉴2에는 메뉴2-1, 메뉴 2-2
메뉴 3에는 메뉴3-1, 메뉴 3-2로 구성

화면 하단에는 사이트 정보를 넣어줘.
사이트 정보는 다음과 같은 내용을 넣어줘.
한국생산성본부 보안 프로그래밍 과정

그런데 화면이 내용이 너무 적을때는 사이트 정보는 화면의 맨 아래에 배치되도록 하고 싶어.

화면의 기본 HTML 구조는 다음과 같아.

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


  <div class="container">
    <div class="row">
        <div class="col colLine">
            여기처럼 각 라인은 row를 이용해 표시하려고 해.
        </div>
    </div>

  </div>

</body>
</html>

Q2. init.php를 다음과 같이 작성하고 싶어.
이 파일은 Carousel을 이용해서 이미지를 SlidingShow하고 싶어.
사용하는 이미지는 img/la.jpg, img/chicago.jpg, img/ny.jpg 파일을
이용해서 슬라이드 쇼하는 형태로 구성해 줘.

Q3. 다음과 같이 db.php 파일을 만들어 줘.

db name : kpc
db user : kpc
db pass : 1111

connectDB()함수를 하나 정의해줘.
이 함수는 접속후 접속한 $conn를 리턴하도록 만들어 줘.

Q4.
index.php 파일이 아래와 같이 구성되어 있어.
여기서 로그인 처리를 위해 세션처리르 하고 싶어.
세션은 ./sess 폴더에 저장하고 싶어.

로그인 정보를 sess_id, sess_name를 관리싶은데,
아래코드의 메뉴 다음 줄에 로그인 정보를 표시하고 싶어.

만약 로그인이 된 경우에는 sess_id을 이용해 판단하는데,
홍길동님 <버튼>로그아웃</버튼>
로그인이 안된 경우에는 <버튼>로그인</버튼>형태로 표시하고 싶어.
그런데, 이 로그인 정보는 오른쪽 정렬을 하고 싶어.

만약 로그아웃 버튼을 클릭하면 index.php?cmd=logout로 이동시켜줘.
로그인 버튼을 클릭하면 index.php?>cmd=injection 로 이동하도록 코드를 만들어줘.


<?php

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
                <li><a class="dropdown-item" href="index.php?cmd=menu1-2">메뉴 1-2</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=menu1-3">메뉴 1-3</a></li>
              </ul>
            </li>

            <!-- 메뉴2 -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="menu2" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">메뉴 2</a>
              <ul class="dropdown-menu" aria-labelledby="menu2">
                <li><a class="dropdown-item" href="index.php?cmd=menu2-1">메뉴 2-1</a></li>
                <li><a class="dropdown-item" href="index.php?cmd=menu2-2">메뉴 2-2</a></li>
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


Q5

index.php?cmd=injection 으로 접속하면
injection.php가 include 되고 있어.
이 파일을 만들어 줘.

이 파일에서는 로그인하는 입력받는 창을 만들고 싶어.

입력 값 : id (name = id), 비멀번호 : pass (name = pass)

id에는 placeholder로 "아이디 입력"
pass에는 "비밀번호 입력"으로 표시해 줘.
하단에 로그인 버튼을 클릭하면 index.php?cmd=login으로 이동하도록 해줘.

Q6.

이번에는 login.php 파일을 만들려고 해.
index.php?cmd=login으로 접속했으니,
index.php에서 이미 세션처리와, DB접속 작업을 수행했어.

$conn = connectDB() 이렇게 수행했더.

그런데, post로 넘어온 id, pass를 이용해서 로그인할거야.

로그인을 위한 테이블이 다음과 같아.

create table  users (
    idx integer auto_increment primary key,
    id  char(20) unique,
    name char(20),
    pass char(50)
);

sql injection 테스트를 위해 보안을 고려하지 않고, 아이디와 비번을 검사한후
로그인 처리하는 코드를 만들어 줘.

로그인이 되면 세션에 sess_id, sess_name 값을 세팅해 줘야 해.

로그인 성공한 경우에는 
"홍길동님 반갑습니다." 와 같이 세션 이름(sess_name)으로 alert창으로 띄운 후,
index.php로 이동해

실패하는 경우에는 "아이디와 비밀번호를 확인하세요"라고 alert해 주고

index.php?cmd=injection 으로 이동 시켜줘.

Q7.

sql injection을 방어하기 위한 코드로 변경하고 싶어.
이를 위해 loginsafe.php 파일은 다음과 같은데,
이 코드를 안전한 코드로 변경해 줘.

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
    echo "<script>alert('아이디와 비밀번호를 확인하세요'); location.href='index.php?cmd=injectionsafe';</script>";
    exit;
}
?>

Q8.

index.php?cmd=shell 을 수행할 때, 
include "shell.php"가 수행되는데,
shell.php에서는 웹 쉘을 구현하고 싶어.
구조는 첨부한 그림과 같은 형태야.
맨 앞에 "명령" 출력하고, 옆에 명령을 입력받아(name=command)
실행 버튼을 클릭하면, 하단에 web shell을 수행하고 싶어.

그런데 웹쉘을 수행할 때, 한글이 깨지는 문제가 있는데,
한글 인코딩은 utf-8로 인코딩해서, **한글이 깨지지 않도록**
코드에 특히 관심을 두고 작성해 줘.

===============================================

int main()
{
    a();
    printf("A\n");
    fflush(stdout); // out.flush();
    b();
    printf("B\n");
    fflush(stdout); // out.flush();
    c();
    printf("C\n");
    fflush(stdout); // out.flush();
    d();
    printf("D\n");
    fflush(stdout); // out.flush();
    e();
    printf("E\n");
}
A 
B

Q9;

무차별 대입 공격을 이용해 로그인 정보를 확인하는 PHP 코드를 만들고 싶어.
brute.php 파일이야.

편의상 4글자의 비밀번호를 검사하는데, 비밀번호는 영문 소문자로만 구성되어있어.
즉, aaaa ~ zzzz 까지 대입하는 과정을 프로그래밍하려고 해.

순서대로 aaaa, aaab, aaac, aaad ,... 이런 순서로 검사하고 싶어.
검사를 하는 users 테이블에 비밀번호 필드인 pass와 비교를 하고 싶어.

그런데, 순서를 카운팅하는 데 매 시도마다 count를 1씩 증가시켜줘.
매번 1000의 배수일 때 다음과 같은 형태로 출력해 줘.

[1000] 현재 검사중인 비밀번호<br>
[2000] 현재 검사중인 비밀번호 <br>
...
각 출력마다 flush를 해주고 싶어.

그러다가, 해당하는 비밀번호를 찾으면,
[현재count] 비밀번호 : Find!!
라고 출력하고 프로그램을 종료해 줘.

===================================

Q10.

brute2.php 파일을 만드려고 해.
index.php?cmd=brute2&pos=3
과 같은 형태로 접속할거야.
만약 pos가 없으면 pos = 1

aaaa ~ zzzz까지 검사하는 코드인데,
pos = 1 : aaaa
pos = 2 : aaab
pos = 3 : aaac
...
와 같이 순차적으로 모든 값을 비교하려고 해.
검사를 하는 users 테이블에 비밀번호 필드인 pass와 비교를 하고 싶어.
화면에는 다음과 같이 출력해 줘.

[ pos, 검사값 ] = [ 1, aaaa ]

만약에 못찾았으면 자바스크립트로 1초를 쉰 다음에,
pos값을 증가시킨 링크로 다시 접속해 줘.
예를 들어 현재 pos=100이면
index.php?cmd=brute2&pos=101 로 접속

그런데 만약에 비밀번호를 찾았으면,
Find!!! 출력하고, 프로그램을 종료시켜줘.




for(10000000)
{
    connect();
    insert();
    close();
}

connect();
for(10000000)
{
    insert();
}
close();