create database shopcart;

create table if not exists produtos(
    id int auto_increment primary key,
    descricao varchar(100) not null,
    imagem varchar(100) not null,
    preco double not null
);


insert into produtos (descricao, imagem, preco) values
('Mouse', 'mouse.jpg', 100),
('Notebook', 'notebook.png', 3600),
('Placa de Video', 'placa-de-video.png', 1900),
('Placa Mae', 'placa-mae.png', 5000),
('Processador I9', 'processador-i9.jpg', 9000),
('Teclado', 'teclado.jpg', 380); 