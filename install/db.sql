drop table user;
create table user (
id int not null auto_increment,
firstname varchar(255) not null,
lastname varchar(255) not null,
email varchar(255) not null,
password varchar(255) not null,
constraint pk_user primary key (id)
);

insert into user (firstname,lastname,email,password) values ('Dolyveen','RENAULT','d.renault@yopmail.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');
insert into user (firstname,lastname,email,password) values ('Patrick','DUPONT','p.dupont@yopmail.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');
insert into user (firstname,lastname,email,password) values ('Jean','LOUP','j.loup@yopmail.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');