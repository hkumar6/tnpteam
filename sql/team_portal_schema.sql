drop database if exists placements;


create database placements;

use placements;

create table company(
	company_id int not null auto_increment,
	company_name varchar(255) not null,
	primary key (company_id),
	unique (company_name) );

create table hr(
	hr_id int not null auto_increment,
	hr_name varchar(500) not null,
	company_id int not null,
	email varchar(100),
	info varchar(5000),
	primary key (hr_id),
	foreign key (company_id) references company(company_id) on delete cascade on update cascade );

create table contact(
	contact_id int not null auto_increment,
	hr_id int not null,
	contact_number varchar(20) not null,
	primary key (contact_id),
	foreign key (hr_id) references hr(hr_id) on delete cascade on update cascade );

create table contact_log(
	log_id int not null auto_increment,
	log_time datetime not null,
	hr_id int not null,
	remark varchar(5000),
	primary key (log_id),
	foreign key (hr_id) references hr(hr_id) on delete cascade on update cascade );

create table team_members(
	member_id varchar(20) not null,
	member_password varchar(40) not null,
	primary key (member_id) );

create user 'tnpteam'@'localhost' identified by 'tnpteam2014';
grant all privileges on placements.* to 'tnpteam'@'localhost';

insert into team_members values ('kumar.harsha', SHA1('MoluHarsha'));