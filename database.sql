CREATE DATABASE login_db;

CREATE TABLE user(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password_hash VARCHAR(255)
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
    message VARCHAR(255)
);

DROP TABLE bookings;