CREATE DATABASE joinfnc_db;
USE joinfnc_db;

--table users
CREATE TABLE users (
    id NUT AUTO_INCREMENT
    PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    role ENUM('admin','volunteer','guest') DEFAULT'guest',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--table events
CREATE TABLE events (
    id NUT AUTO_INCREMENT
    PRIMARY KEY,
    title VARCHAR(255) UNIQUE NOT NULL,
    description TEXT,
    start_date DATETIME NOT NULL,
    end_date DATETIME,
    location VARCHAR (255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--table pages
CREATE TABLE pages (
    id NUT AUTO_INCREMENT
    PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    content TEXT,
    last_update TIMESTAMP,
    DEFAULT CURRENT_TIMESTAMP    
    ON UPDATE CURRENT_TIMESTAMP
);

--table donations
CREATE TABLE donations (
    id NUT AUTO_INCREMENT
    PRIMARY KEY,
    donor_name VARCHAR(100),
    amount DECIMAL(10,2),
    message TEXT,
    donate_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
--table volunteers
CREATE TABLE volunteers (
    id NUT AUTO_INCREMENT
    PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    message TEXT,
    signed_up_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--table blog posts
CREATE TABLE blog posts (
    id NUT AUTO_INCREMENT
    PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    author_id INT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREING KEY (author_id)
    REFERENCES users(id)
);
