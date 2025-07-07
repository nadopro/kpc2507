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

