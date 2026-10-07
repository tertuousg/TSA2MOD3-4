CREATE DATABASE IF NOT EXISTS tasks_for_today CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE tasks_for_today;
DROP TABLE IF EXISTS tasks; DROP TABLE IF EXISTS users;
CREATE TABLE tasks(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,title VARCHAR(150) NOT NULL,status VARCHAR(20) NOT NULL DEFAULT 'pending',task_date DATE NOT NULL,is_archived TINYINT(1) NOT NULL DEFAULT 0,created_at DATETIME NOT NULL) ENGINE=InnoDB;
CREATE TABLE users(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50) NOT NULL UNIQUE,full_name VARCHAR(100) NOT NULL,email VARCHAR(100) NOT NULL,password VARCHAR(255) NOT NULL,created_at DATETIME NOT NULL) ENGINE=InnoDB;
INSERT INTO tasks(title,status,task_date,is_archived,created_at) VALUES ('Finish Web System activity','pending',CURDATE(),0,NOW()),('Review CodeIgniter MVC','completed',CURDATE(),0,NOW()),('Prepare project documentation','pending',DATE_ADD(CURDATE(),INTERVAL 1 DAY),0,NOW());
INSERT INTO users(username,full_name,email,password,created_at) VALUES ('student01','Paul Terence Guadalupe','student01@example.com','$2b$12$3vkRt5Fvc9GR5tqVgne4IeFtPravhFxV9F5LtazL5uTRXze00ZWAO',NOW());
