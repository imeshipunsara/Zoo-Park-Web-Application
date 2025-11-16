/*
 create admins table with fields username, password_enc ,
*/

drop table if exists admins;
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password_enc VARCHAR(255) NOT NULL
);

drop table if exists events;
CREATE TABLE events(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    event_image VARCHAR(200) DEFAULT NULL,
    event_text VARCHAR(600) NOT NULL,
    event_datetime DATETIME,
    INDEX idx_event_datetime (event_datetime)
);


drop table if exists informations;
CREATE TABLE informations(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    cover_image VARCHAR(200) DEFAULT NULL,
    information_text VARCHAR(600) NOT NULL
);

insert into admins (username, password_enc) values ('admin', '81dc9bdb52d04dc20036dbd8313ed055');

drop table if exists community_members;
CREATE TABLE community_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    age integer NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    aproval VARCHAR(15)  DEFAULT 'pending',
    password_enc VARCHAR(255) NOT NULL,
    registered_date DATETIME Default CURRENT_TIMESTAMP
);
