use bank;
drop table compte;
drop table client;
drop table verement;
create table client(
	id int primary key auto_increment,
	Username varchar(100), 
	email varchar(100)
);
create table compte(
	id int,
	solde float ,
	foreign key(id) references client(id)
);
create table verement(
	dateVerement date default now(),
	userId int,
	montant float



);