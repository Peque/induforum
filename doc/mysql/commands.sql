--
-- Create the user that will have access to the database.
--
create user 'induforum'@'localhost' identified by '1234';

--
-- Create the actual database.
--
create database induforum character set utf8 collate utf8_general_ci;

--
-- Set user permissions.
--
grant select,insert,delete,update on induforum.* to induforum identified by '1234';

--
-- Use the new database.
--
use induforum;

--
-- The users table contains all the registered users (name and hashed
-- password) and an automatically assigned unsigned ID to be used as key
-- in other tables.
--
create table users(
	number int unsigned not null auto_increment primary key,
	id char(20) not null unique,
	password char(128) not null
);

--
-- This table registers log in events and the moment when they occured.
--
create table session_log(
	user int unsigned not null,
	date datetime not null,
	primary key (user,date)
);

--
-- The invitation table contains all the invitations, with the
-- expiration date, the invitation key and a boolean variable that will
-- be set to '1' once the invitation has been used.
--
create table invitations(
	user int unsigned not null,
	invitation_key char(128) not null,
	expiration datetime not null,
	used_by char(20)
);

--
-- The permissions table contains the users permissions.
--
create table permissions(
	user int unsigned not null primary key,
	admin bool default 0,
	company bool default 0,
	student bool default 0,
	invitations bool default 0,
	statistics bool default 0,
	permissions bool default 0,
	banners bool default 0
);

create table students_personal_data(
	user int unsigned not null primary key,
	name char(30) not null,
	surname char(60) not null,
	birth date not null,
	country char(20) not null,
	province char(20) not null,
	city char(20) not null,
	street char(50) not null,
	zip char(20) not null,
	phone char(20) not null,
	email char(50) not null
);

create table students_academic_data(
	user int unsigned not null primary key,
	studies char(50) not null,
	higher_course tinyint not null,
	speciality char(50) not null,
	begin_year year not null,
	additional_information text(500)
);

create table students_work_experience(
	user int unsigned not null,
	initial_date date not null,
	final_date date not null,
	company char(30) not null,
	job char(60) not null,
	description_experience text(500),
	primary key (user,initial_date,company)
);

create table students_languages(
	user int unsigned not null,
	language char(20) not null,
	listening char(2) not null,
	reading char(2) not null,
	spoken_interaction char(2) not null,
	spoken_production char(2) not null,
	writing char(2) not null,
	primary key (user,language)
);

create table students_computing_experience(
	user int unsigned not null primary key,
	windows tinyint unsigned not null,
	mac tinyint unsigned not null,
	linux tinyint unsigned not null,
	data_bases tinyint unsigned not null,
	finances_accounting tinyint unsigned not null,
	cad tinyint unsigned not null,
	graphic_design tinyint unsigned not null,
	spreadsheet tinyint unsigned not null,
	email tinyint unsigned not null,
	maths_statistics tinyint unsigned not null,
	presentations tinyint unsigned not null,
	word_processors tinyint unsigned not null,
	programming_languages tinyint unsigned not null,
	simulation tinyint unsigned not null,
	communications_networks tinyint unsigned not null
);

create table students_other_information(
	user int unsigned not null primary key,
	driving_license bit not null,
	traveling bit not null,
	schedule tinyint not null,
	resume_pdf char(50)
);
