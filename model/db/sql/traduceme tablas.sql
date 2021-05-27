CREATE DATABASE IF NOT EXISTS traduceme;

USE traduceme;

CREATE TABLE IF NOT EXISTS tm_admin (
    user VARCHAR(16) NOT NULL,
    `hash` VARCHAR(64) NOT NULL,
    date_added datetime NOT NULL,
    PRIMARY KEY (user)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS tm_lang (
    lang VARCHAR(2) NOT NULL,
    PRIMARY KEY (lang)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS tm_page (
    page_name VARCHAR(40) NOT NULL,
    lang VARCHAR(2) NOT NULL,
    title VARCHAR(70) NOT NULL,
    content longtext NOT NULL,
    user VARCHAR(16) NOT NULL,
    PRIMARY KEY (page_name, lang),
    FOREIGN KEY (lang) REFERENCES tm_lang(lang),
    FOREIGN KEY (`user`) REFERENCES tm_admin(`user`)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS tm_partial (
    partial_name VARCHAR(40) NOT NULL,
    lang VARCHAR(2) NOT NULL,
    content longtext NOT NULL,
    PRIMARY KEY (partial_name, lang),
    FOREIGN KEY (lang) REFERENCES tm_lang(lang)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;


CREATE TABLE IF NOT EXISTS tm_access (
    id INT NOT NULL AUTO_INCREMENT,
    `admin` VARCHAR(16) NOT NULL,
    `timestamp` datetime NOT NULL,
    success BOOLEAN NOT NULL,
    `pass` VARCHAR(64),
    PRIMARY KEY (id)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;