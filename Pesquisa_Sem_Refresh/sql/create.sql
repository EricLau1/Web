create database test 
default character set utf8
default collate utf8_general_ci;

use test;

create table idiomas(
id int auto_increment primary key,
pais varchar(35) not null unique,
descricao varchar(35) not null unique
) engine = InnoDB 
default charset = utf8;


insert into idiomas (pais, descricao) values
('Brasil', 'Portugues'),
('Estados Unidos', 'Inglês'),
('França', 'Francês'),
('Japão', 'Japonês'),
('Alemanha', 'Alemão'),
('Espanha', 'Espanhol'),
('Russia', 'Russo'),
('China', 'Mandarim'),
('Grécia', 'Grego'),
('Coreia', 'Coreano');
