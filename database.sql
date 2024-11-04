CREATE DATABASE uqi_academy_test;
CREATE DATABASE uqi_academy;

CREATE TABLE students (
    id VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL,
    temp_password VARCHAR(10),
    photo VARCHAR(255) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    specialist VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    website VARCHAR(255),
    bio TEXT,
    phone VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    school VARCHAR(50),
    status VARCHAR(10),
    PRIMARY KEY (id)
) ENGINE = INNODB;

CREATE TABLE portofolios (
    id INT NOT NULL AUTO_INCREMENT,
    id_student VARCHAR(10) NOT NULL,
    type VARCHAR(10) NOT NULL,
    portofolio_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_student_portofolio FOREIGN KEY (id_student) REFERENCES students(id)
) ENGINE = INNODB;

CREATE TABLE batch (
    id INT NOT NULL AUTO_INCREMENT,
    id_student VARCHAR(10) NOT NULL,
    registration_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    year INT NOT NULL,
    batch INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_student_batch FOREIGN KEY (id_student) REFERENCES students(id)
) ENGINE = INNODB;

CREATE TABLE sessions (
    id VARCHAR(255) NOT NULL,
    id_student VARCHAR(10) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_student_session FOREIGN KEY (id_student) REFERENCES students(id)
 ) ENGINE = INNODB;

 CREATE TABLE social_media (
    id INT NOT NULL AUTO_INCREMENT,
    id_student VARCHAR(10) NOT NULL,
    platform VARCHAR(20) NOT NULL,
    url TEXT,
    PRIMARY KEY (id),
    CONSTRAINT fk_student_social_media FOREIGN KEY (id_student) REFERENCES students(id)
 ) ENGINE = INNODB;

 CREATE TABLE skills (
    id INT NOT NULL AUTO_INCREMENT,
    id_student VARCHAR(10) NOT NULL,
    skill VARCHAR(255),
    score INT DEFAULT 0,
    PRIMARY KEY (id),
    CONSTRAINT fk_student_skills FOREIGN KEY (id_student) REFERENCES students(id)
 ) ENGINE = INNODB;

 CREATE TABLE languages (
    id INT NOT NULL AUTO_INCREMENT,
    id_student VARCHAR(10) NOT NULL,
    language VARCHAR(255),
    score INT DEFAULT 0,
    PRIMARY KEY (id),
    CONSTRAINT fk_student_languages FOREIGN KEY (id_student) REFERENCES students(id)
 ) ENGINE = INNODB;

 CREATE TABLE educations (
    id INT NOT NULL AUTO_INCREMENT,
    id_student VARCHAR(10) NOT NULL,
    school VARCHAR(255),
    entry_year INT,
    graduate_year INT, 
    PRIMARY KEY (id),
    CONSTRAINT fk_student_educations FOREIGN KEY (id_student) REFERENCES students(id)
 ) ENGINE = INNODB;

  CREATE TABLE experiences (
    id INT NOT NULL AUTO_INCREMENT,
    id_student VARCHAR(10) NOT NULL,
    type VARCHAR(20),
    company VARCHAR(255) NOT NULL,
    entry_date DATE NOT NULL,
    end_date DATE NOT NULL,
    description TEXT,
    PRIMARY KEY (id),
    CONSTRAINT fk_student_experiences FOREIGN KEY (id_student) REFERENCES students(id)
 ) ENGINE = INNODB;

-- CREATE TABLE employees (
--     id VARCHAR(10) NOT NULL,
--     photo VARCHAR(255) NOT NULL,
--     fullname VARCHAR(255) NOT NULL,
--     phone VARCHAR(15) NOT NULL,
--     email VARCHAR(255) NOT NULL,
--     address TEXT NOT NULL,
--     id_role INT NOT NULL,
--     PRIMARY KEY (id),
--     CONSTRAINT fk_
-- )