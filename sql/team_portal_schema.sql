drop database if exists placements;


create database placements;

use placements;

create table team_members(
	member_id varchar(20) not null,
	member_password varchar(40) not null,
	primary key (member_id) );

create table companies(
	company_id int not null auto_increment,
	company_name varchar(255) not null,
	company_key varchar(255) not null,
	member_id varchar(20),
	primary key (company_id),
	unique (company_key),
	foreign key (member_id) references team_members(member_id) on delete set null on update cascade);

create table contacts(
	contact_id int not null auto_increment,
	contact_name varchar(100) not null,
	company_id int not null,
	contact_email varchar(100),
	contact_number varchar(200),
	contact_info varchar(5000),
	primary key (contact_id),
	unique (contact_name, company_id),
	foreign key (company_id) references companies(company_id) on delete cascade on update cascade );

/*create table contact_number(
	contact_id int not null auto_increment,
	person_id int not null,
	contact_num varchar(20) not null,
	primary key (contact_id),
	foreign key (person_id) references company_people(person_id) on delete cascade on update cascade );*/

create table contact_log(
	log_id int not null auto_increment,
	log_time datetime not null,
	contact_id int not null,
	log_remark varchar(5000) not null,
	primary key (log_id),
	foreign key (contact_id) references contacts(contact_id) on delete cascade on update cascade );

insert into team_members values ('kumar.harsha', SHA1('MoluHarsha'));