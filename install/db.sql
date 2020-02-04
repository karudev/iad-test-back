drop table message;
drop table user;
create table user (
id int not null auto_increment,
firstname varchar(255) not null,
lastname varchar(255) not null,
email varchar(255) not null,
password varchar(255) not null,
constraint pk_user primary key (id)
);
create table message (
id int not null auto_increment,
message varchar(255) not null,
user_id int not null,
created_at datetime not null,
constraint pk_user primary key (id),
constraint fk_user foreign key (user_id) references user(id)
);

insert into user (firstname,lastname,email,password) values ('Dolyveen','RENAULT','d.renault@yopmail.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');
insert into user (firstname,lastname,email,password) values ('Patrick','DUPONT','p.dupont@yopmail.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');
insert into user (firstname,lastname,email,password) values ('Jean','LOUP','j.loup@yopmail.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');

insert into message (message,user_id,created_at) values ('Bienvenue sur notre tchat privé !',1,'2020-02-01');