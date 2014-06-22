create database dpx character set utf8;
use dpx;

create table d_article
(
title varchar(32) not null,
matchname varchar(32) ,
content text,
time int not null primary key,
attachment varchar(60) ,
 type varchar(30) not null default 'news'
);


create table d_cooperate
(
id int not null primary key auto_increment,
partner varchar(32) not null,
link varchar(30),
coopimage varchar(32)

);


create table d_match
(
 sdate varchar(30),
 edate varchar(30),
 location varchar(40) not null,
 imagename varchar(30) ,
 intro text not null,
 rule text not null,
 unionname varchar(32) not null,
 matchname varchar(32) not null,
 inserttime int not null primary key,
 index(unionname),
 index(matchname)
);


create table d_member
(
membername varchar(32) not null ,
picture varchar(40),
teamname varchar(32) not null,
type varchar(20) not null,
id int not null auto_increment primary key,
matchname varchar(32) not null
);


create table d_result
(
id int not null primary key auto_increment,
matchname varchar(32) not null,
one varchar(32),
two varchar(32),
three varchar(32),
four varchar(32),
five varchar(32),
six varchar(32),
seven varchar(32),
eight varchar(32)
);


create table d_school
(
id int not null primary key auto_increment,
name varchar(32) not null,
logo varchar(32) ,
location varchar(32) not null,
intro text not null


);


create table d_team
(
teamname varchar(32) not null,
matchname varchar(32) not null,
info text not null,
memberlist varchar(32),
location varchar(32) not null,
id int not null auto_increment primary key,
index(matchname)

);


create table d_union
(
id int not null primary key auto_increment,
unionname varchar(32) not null,
index (unionname)

);


create table d_website
(
intro text not null ,
rule text not null,
org text not null,
id int not null default '1',
con text

);

create table d_slider
(
id int not null  auto_increment primary key,
slidername varchar(30) not null
);


create table d_user
( username varchar(36) not null primary key, 
password varchar(36) not null );

create table d_notice(
title varchar(32) not null,
matchname varchar(32) ,
content text ,
time int not null primary key,
attachment varchar(30) ,
type varchar(20) not null default 'notice'
);


ALTER TABLE d_match ADD CONSTRAINT fk_union 
FOREIGN KEY (unionname) 
REFERENCES d_union(unionname)
on delete cascade on update cascade;

ALTER TABLE d_team ADD CONSTRAINT fk_match 
FOREIGN KEY (matchname) 
REFERENCES d_match(matchname)
on delete cascade on update cascade;




insert into d_website values
(
'这是简介',
'这里是规则',
'这里是组织',
1,
'这里是联系人'


);

insert into d_result values
(1,'大学生男子排球比赛','one','two','three','four','five','six','seven','eight'),
(2,'大学生女子排球比赛','one','two','three','four','five','six','seven','eight');

insert into d_user values 
('admin',
md5('root'));
