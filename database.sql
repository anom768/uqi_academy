CREATE DATABASE uqi_academy_test;
CREATE DATABASE uqi_academy;

CREATE TABLE students (
    id VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL,
    temp_password VARCHAR(10),
    photo VARCHAR(255) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
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