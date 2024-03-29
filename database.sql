CREATE DATABASE admin_db;

CREATE TABLE admin(
	id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    password_hash VARCHAR(255)
);

DROP TABLE admin;

CREATE DATABASE employee_db;

CREATE TABLE employees(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password_hash VARCHAR(255)
);

DROP TABLE employees;

CREATE DATABASE user_db;

CREATE TABLE user(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    address VARCHAR(255),
    contnum VARCHAR(11),
    password_hash VARCHAR(255),
    profile_img VARCHAR(255)
);

DROP TABLE user;

CREATE DATABASE book_db;

CREATE TABLE bookings(
    id INT PRIMARY KEY AUTO_INCREMENT,
    fullName VARCHAR(255),
    fullAddress VARCHAR(255),
    email VARCHAR(255),
    contactNum VARCHAR(11),
    airconType VARCHAR(255),
    serviceType VARCHAR(255),
    message VARCHAR(255),
    date VARCHAR(255),
    timeslot VARCHAR(255),
    status VARCHAR(255) DEFAULT 'Pending'
);

INSERT INTO bookings VALUES ();

DROP TABLE bookings;

CREATE DATABASE calendar_db;

CREATE TABLE bookings(
    id INT PRIMARY KEY AUTO_INCREMENT,
    date VARCHAR(255)
);

DROP TABLE bookings;