create database test;

create table if not exists images(
id int auto_increment primary key,
name varchar(100),
image longblob
);