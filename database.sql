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

CREATE DATABASE calendar_db;

CREATE TABLE bookings(
    id INT PRIMARY KEY AUTO_INCREMENT,
    date VARCHAR(255)
);

DROP TABLE bookings;

--Sample Data for Admin and Employee
INSERT INTO `employees` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'employee1', 'employee1@email.com', '$2y$10$wNHlBY2GXqxhbqzhCOWQNe0Lx0occFnnwzNiYRYoQmjlh16PyvSwa'),
(2, 'admin1', 'admin1@email.com', '$2y$10$66nmi0OFLO8b5XayGEFISuzjFu0Fd8X51ddoMFgTs./eXDRfU.Hvy');

--Sample Data for User
INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'customer1', 'customer1@email.com', '$2y$10$J97mD.7XAymS0DqpsxF3V.hY5lXtdU/ozZprImnRQ3NR6T1DFBzwq');

--Sample Data for Bookings
INSERT INTO `bookings` (`id`, `fullName`, `fullAddress`, `email`, `contactNum`, `airconType`, `serviceType`, `message`) VALUES
(1, 'Lawrence', 'calamba city', 'lawrence@email.com', '9876543210', 'Window Aircon', 'Cleaning', 'CharitooAire Air Conditioning');


