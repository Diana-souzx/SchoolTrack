create database SchoolTrack;
use SchoolTrack;

create table Usuários(
id_usuário int primary key not null auto_increment,
nome varchar(100) not null,
email varchar(100) not null,
senha char(10) not null,
foto blob null,
telefone int not null,
bairro varchar(45) not null,
data_nasc date null,
bio varchar (200) null,
link_redeSocial varchar(100));

create table Bairro(
id_bairro_rota int primary key not null auto_increment,
img_rota blob not null,
nome_bairro varchar(45),
id_usuário int not null,
foreign key (id_usuário) references Usuários(id_usuário)
);

create table HorárioBairro(
id_bairro_rota int primary key not null,
horário time not null,
foreign key (id_bairro_rota) references Bairro(id_bairro_rota)
);

create table PontosOnibusBairro(
id_bairro_rota int primary key not null,
link_ponto_onibus varchar(100) null
);

create table Notificações(
id_noti int primary key not null auto_increment,
conteudo varchar(45) not null
);

create table NotificaçõesUsuário(
id_noti int not null,
id_usuário int not null,
foreign key (id_noti) references Notificações(id_noti),
foreign key (id_usuário) references Usuários(id_usuário)
);

create table NotificaçõesBairro(
id_noti int not null,
id_usuário int not null,
id_bairro_rota int not null,
foreign key (id_noti) references Notificações(id_noti),
foreign key (id_usuário) references Usuários(id_usuário),
foreign key (id_bairro_rota) references Bairro(id_bairro_rota)
);