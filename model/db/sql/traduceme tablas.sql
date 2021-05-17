CREATE DATABASE IF NOT EXISTS traduceme;

CREATE TABLE IF NOT EXISTS tm_langs (
    lang VARCHAR(2) NOT NULL,
    PRIMARY KEY (lang)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS tm_pages (
    page_name VARCHAR(40) NOT NULL,
    lang VARCHAR(2) NOT NULL,
    title VARCHAR(70) NOT NULL,
    content longtext NOT NULL,
    PRIMARY KEY (page_name, lang),
    FOREIGN KEY (lang) REFERENCES tm_langs(lang)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS tm_partials (
    partial_name VARCHAR(40) NOT NULL,
    lang VARCHAR(2) NOT NULL,
    content longtext NOT NULL,
    PRIMARY KEY (partial_name, lang),
    FOREIGN KEY (lang) REFERENCES tm_langs(lang)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS tm_admins (
    user VARCHAR(16) NOT NULL,
    `hash` VARCHAR(64) NOT NULL,
    date_added datetime NOT NULL,
    PRIMARY KEY (user)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS tm_access (
    id INT NOT NULL AUTO_INCREMENT,
    `admin` VARCHAR(16) NOT NULL,
    `timestamp` datetime NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (`admin`) REFERENCES tm_admins(user)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;