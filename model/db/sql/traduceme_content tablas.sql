CREATE DATABASE IF NOT EXISTS traduceme_content;

CREATE TABLE IF NOT EXISTS tm_page  (
    page_name VARCHAR(40) NOT NULL,
    lang VARCHAR(2) NOT NULL,
    title VARCHAR(70) NOT NULL,
    content longtext NOT NULL,
    PRIMARY KEY (page_name, lang)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS tm_partials  (
    partial_name VARCHAR(40) NOT NULL,
    lang VARCHAR(2) NOT NULL,
    content longtext NOT NULL,
    PRIMARY KEY (partial_name, lang)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_general_ci;