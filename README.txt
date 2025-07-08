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