CREATE DATABASE IF NOT EXISTS animedb;
USE animedb;

CREATE TABLE IF NOT EXISTS genre_title
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name_genre VARCHAR(32) NOT NULL
);

CREATE TABLE IF NOT EXISTS author
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(64) NOT NULL,
    second_name VARCHAR(64) NOT NULL,
    DOB DATE
);

CREATE TABLE IF NOT EXISTS studio
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name_studio VARCHAR(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS titles
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(64) NOT NULL,
    date_of_creation DATE,
    episode_count INT NOT NULL,
    rating INT CHECK(rating > 0 AND rating <= 10),
    exit_status ENUM('Announced','Came Out','Ongoing') NOT NULL,
    id_studio BIGINT,
    id_author BIGINT,
    FOREIGN KEY (id_studio) REFERENCES studio(id) ON DELETE SET NULL,
    FOREIGN KEY (id_author) REFERENCES author(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS title_to_genre
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    id_title BIGINT,
    id_genre BIGINT,
    FOREIGN KEY  (id_title) REFERENCES titles(id) ON DELETE CASCADE,
    FOREIGN KEY (id_genre) REFERENCES genre_title(id) ON DELETE CASCADE
);

ALTER TABLE title_to_genre ADD unique(id_title, id_genre);

CREATE TABLE IF NOT EXISTS the_character
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    first_name_char VARCHAR(64) NOT NULL,
    second_name_char VARCHAR(64) NOT NULL,
    alias VARCHAR(64)
);

CREATE TABLE IF NOT EXISTS character_to_title
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    id_title BIGINT,
    id_character BIGINT,
    FOREIGN KEY (id_title) REFERENCES  titles(id) ON DELETE CASCADE,
    FOREIGN KEY (id_character) REFERENCES the_character(id) ON DELETE CASCADE
);

ALTER TABLE character_to_title ADD unique(id_title, id_character);
