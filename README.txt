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