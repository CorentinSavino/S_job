

CREATE TABLE `user`
(
    id_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    email VARCHAR(100) NOT NULL,
    `password` VARCHAR (255) NOT NULL,
    phone_number VARCHAR (15),
    cv VARCHAR(255), 
    id_adress INT,
    `role` VARCHAR(60)
);

CREATE TABLE `advisor`
(
    id_advisor INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    advisor_number VARCHAR(15) NOT NULL,
    email_pro VARCHAR(100) NOT NULL,
    id_adress INT NOT NULL,
    id_user INT NOT NULL
);

CREATE TABLE jobseeker
(
    id_jobseeker INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_user INT NOT NULL,
    id_address INT NOT NULL,
    job_type VARCHAR (50) NOT NULL,
    contract_type VARCHAR (50) NOT NULL,
    jobseeker_number VARCHAR (50) NOT NULL
);

CREATE TABLE business
(
    id_business INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    siret_number INT(13) NOT NULL,
    id_user INT NOT NULL,
    id_address INT NOT NULL
);

CREATE TABLE job_offer
(
    id_job_offer INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    start_at VARCHAR(8) NOT NULL,
    end_at VARCHAR(8) NOT NULL,
    job_name VARCHAR(50) NOT NULL,
    `description` TEXT,
    contract_length VARCHAR(15) NOT NULL,
    contract_type VARCHAR(50) NOT NULL,
    slary VARCHAR(20) NOT NULL
);
