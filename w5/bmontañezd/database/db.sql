use bdbmontañezd;

CREATE TABLE `libros` (
    id int primary KEY auto_increment,
    titulo varchar(255) not null,
    autor varchar(255) not null
);