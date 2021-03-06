<?php

require_once '../bootstrap.php';


$dbc->exec('SET foreign_key_checks = 0');
$dbc->exec('DROP TABLE IF EXISTS phone_carriers');
$dbc->exec('DROP TABLE IF EXISTS categories');
$dbc->exec('DROP TABLE IF EXISTS users');
$dbc->exec('DROP TABLE IF EXISTS ads');
$dbc->exec('DROP TABLE IF EXISTS keywords');
$dbc->exec('DROP TABLE IF EXISTS ad_keyword');
$dbc->exec('DROP TABLE IF EXISTS images');
$dbc->exec('DROP TABLE IF EXISTS ad_image');
$dbc->exec('SET foreign_key_checks = 1');


$phone_carriers = 'CREATE TABLE phone_carriers(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    carrier_domain VARCHAR(100),
    PRIMARY KEY (id)
)';

$dbc->exec($phone_carriers);


$categories = 'CREATE TABLE categories(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    category VARCHAR(50),
    PRIMARY KEY (id)
)';

$dbc->exec($categories);


$users = 'CREATE TABLE users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    phone_carrier_id INT UNSIGNED,
    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    phone VARCHAR(25),
    PRIMARY KEY (id),
    FOREIGN KEY (phone_carrier_id) REFERENCES phone_carriers(id)
)';

$dbc->exec($users);


$ads = 'CREATE TABLE ads(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT UNSIGNED,
    category_id INT UNSIGNED,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    date_posted DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
)';

$dbc->exec($ads);


$keywords = 'CREATE TABLE keywords(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    keyword VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
)';

$dbc->exec($keywords);


$ad_keyword = 'CREATE TABLE ad_keyword(
    ad_id INT UNSIGNED,
    keyword_id INT UNSIGNED,
    PRIMARY KEY (ad_id, keyword_id),
    FOREIGN KEY (ad_id) REFERENCES ads(id),
    FOREIGN KEY (keyword_id) REFERENCES keywords(id)
)';

$dbc->exec($ad_keyword);


$images = 'CREATE TABLE images(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    image_url VARCHAR(255) UNIQUE,
    PRIMARY KEY (id)
)';

$dbc->exec($images);


$ad_image = 'CREATE TABLE ad_image(
    ad_id INT UNSIGNED,
    image_id INT UNSIGNED,
    PRIMARY KEY (ad_id, image_id),
    FOREIGN KEY (ad_id) REFERENCES ads(id),
    FOREIGN KEY (image_id) REFERENCES images(id)
)';

$dbc->exec($ad_image);

