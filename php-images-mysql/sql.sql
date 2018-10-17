create database test;

create table imagens(
    id int auto_increment primary key,
    name varchar(100) not null default 'sem nome',
    imagem longblob
);