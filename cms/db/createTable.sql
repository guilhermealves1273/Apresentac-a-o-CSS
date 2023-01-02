create table user(
    id int Primary key  auto_increment,
    username varchar(50) not null,
    password varchar(100) not null,
    role varchar(20) not null
);

create table soft_skills(
    id int primary key auto_increment,
    nome varchar(100) not null
);


create table frameworks(
    id int Primary KEY AUTO_INCREMENT,
    nome varchar(100) not null
);


create table about_me(
    id int Primary KEY AUTO_INCREMENT,
    frase varchar(500) not null
   
);

create table language(
    id int Primary KEY AUTO_INCREMENT,
    nome varchar(50) not null
    
);

create table me(
    id int Primary KEY AUTO_INCREMENT,
    fullname varchar(100) not null,
    dt_nascimento DATE not null,
    localidade varchar(100) not null,
    profissao varchar(100) not null,
    imagem varchar(100) not null 
);

create table educacao(
	id int primary key auto_increment,
	nome varchar(100) not null,
	descricao varchar(200) not null
	

);

create table contactos(
	id int primary key auto_increment,
	nome varchar(100) not null,
	descricao varchar(200) not null,
	link varchar(200) not null
	

);

create table ling_prog(
	id int primary key auto_increment,
	nome varchar(100) not null,
	nivel int not null
	
);

create table mensagens(
	id int primary key auto_increment,
	nome varchar(100) not null,
	email varchar(100) not null,
	informacao varchar(500) not null,
	estado varchar (20),
	idUser int 
);



