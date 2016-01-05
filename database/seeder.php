<?php

require_once '../bootstrap.php';


$phone_carriers = 'TRUNCATE phone_carriers';
$categories = 'TRUNCATE categories';
$users = 'TRUNCATE users';
$ads = 'TRUNCATE ads';
$keywords = 'TRUNCATE keywords';
$ad_keyword = 'TRUNCATE ad_keyword';
$images = 'TRUNCATE images';
$ad_image = 'TRUNCATE ad_image';


$dbc->exec('SET foreign_key_checks = 0');
$dbc->exec($phone_carriers);
$dbc->exec($categories);
$dbc->exec($users);
$dbc->exec($ads);
$dbc->exec($keywords);
$dbc->exec($ad_keyword);
$dbc->exec($images);
$dbc->exec($ad_image);
$dbc->exec('SET foreign_key_checks = 1');


$phone_carriers = [
    ['carrier_domain' => '@txt.att.net'],
    ['carrier_domain' => '@messaging.sprintpcs.com'],
    ['carrier_domain' => '@tmomail.net']
];

$categories = [
    ['category' => 'Automobile'],
    ['category' => 'Document'],
    ['category' => 'Random']
];

$users = [
    ['phone_carrier_id' => '1', 'email' => 'jeromericks@gmail.com',  'username' => 'jeromericks', 'password' => '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm', 'first_name' => 'Jerome',   'last_name' => 'Ricks', 'phone' => '111-1111-111'],
    ['phone_carrier_id' => '2', 'email' => 'jreyes.satx@gmail.com',  'username' => 'jo-nathan',   'password' => '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm', 'first_name' => 'JoNathan', 'last_name' => 'Reyes', 'phone' => '222-2222-222'],
    ['phone_carrier_id' => '3', 'email' => 'car.code240z@gmail.com', 'username' => 'craig240z',   'password' => '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm', 'first_name' => 'Craig',    'last_name' => 'Re',    'phone' => '333-3333-333']
];

$ads = [
    ['user_id' => '1', 'category_id' => '1', 'title' => 'Marilyn Monroe\'s "Happy Birthday Mr. President" Dress', 'description' => 'When Marilyn Monroe delivered a sultry "Happy Birthday" serenade to President John F. Kennedy on May 19, 1962, the blonde bombshell wore a flesh-colored, curve-hugging, jewel-encrusted dress so tight and sheer that, according to legend, Monroe was sewn into the gown and wore nothing under it.',                  'price' => '1267500',  'date_posted' => '1999-12-01'],
    ['user_id' => '2', 'category_id' => '2', 'title' => 'Leonardo da Vinci\'s Codex Hammer',                      'description' => 'As the ultimate Renaissance man, Leonardo da Vinci meticulously recorded his thoughts, musings and sketches in journals throughout his life. Of the 30 that remain, his most famous is the Codex Hammer, named for the British nobleman who acquired the 72-page journal in 1717.',                                      'price' => '30802500', 'date_posted' => '2008-04-23'],
    ['user_id' => '3', 'category_id' => '3', 'title' => '1957 Ferrari 250 Testa Rossa',                           'description' => 'There are only 21 other cars like it, but none of them are quite so expensive. While the 1957 Testa Rossas won 10 of the 19 international races that they entered from 1958 and 1961, this particular vehicle never finished better than fourth. No matter; the car\'s finest quality is not its speed but its beauty.', 'price' => '12200000', 'date_posted' => '1969-07-07'],
    ['user_id' => '1', 'category_id' => '1', 'title' => 'Hi', 'description' => 'Hi', 'price' => '5000', 'date_posted' => '2007-09-18']
];

$keywords = [
    ['keyword' => 'Clothing'],
    ['keyword' => 'Manuscript'],
    ['keyword' => 'Car']
];

$ad_keyword = [
    ['ad_id' => '2', 'keyword_id' => '1'],
    ['ad_id' => '2', 'keyword_id' => '2'],
    ['ad_id' => '3', 'keyword_id' => '3']
];

$images = [
    ['image_url' => 'http://img.timeinc.net/time/photoessays/2009/top10_auctions/marilyn_monroe.jpg'],
    ['image_url' => 'http://img.timeinc.net/time/photoessays/2009/top10_auctions/codex_hammer.jpg'],
    ['image_url' => 'http://img.timeinc.net/time/photoessays/2009/top10_auctions/ferrari_testa_rossa_a.jpg']
];

$ad_image = [
    ['ad_id' => '2', 'image_id' => '1'],
    ['ad_id' => '2', 'image_id' => '2'],
    ['ad_id' => '3', 'image_id' => '3'],
    ['ad_id' => '4', 'image_id' => '1']
];


$stmt = $dbc->prepare('INSERT INTO phone_carriers (carrier_domain) VALUES (:carrier_domain)');
$stmt2 = $dbc->prepare('INSERT INTO categories (category) VALUES (:category)');
$stmt3 = $dbc->prepare('INSERT INTO users (phone_carrier_id, email, username, password, first_name, last_name, phone) VALUES (:phone_carrier_id, :email, :username, :password, :first_name, :last_name, :phone)');
$stmt4 = $dbc->prepare('INSERT INTO ads (user_id, category_id, title, description, price, date_posted) VALUES (:user_id, :category_id, :title, :description, :price, :date_posted)');
$stmt5 = $dbc->prepare('INSERT INTO keywords (keyword) VALUES (:keyword)');
$stmt6 = $dbc->prepare('INSERT INTO ad_keyword (ad_id, keyword_id) VALUES (:ad_id, :keyword_id)');
$stmt7 = $dbc->prepare('INSERT INTO images (image_url) VALUES (:image_url)');
$stmt8 = $dbc->prepare('INSERT INTO ad_image (ad_id, image_id) VALUES (:ad_id, :image_id)');


foreach ($phone_carriers as $phone_carrier) {
    $stmt->bindValue(':carrier_domain', $phone_carrier['carrier_domain'], PDO::PARAM_STR);
    $stmt->execute();
}

foreach ($categories as $category) {
    $stmt2->bindValue(':category', $category['category'], PDO::PARAM_STR);
    $stmt2->execute();
}

foreach ($users as $user) {
    $stmt3->bindValue(':phone_carrier_id', $user['phone_carrier_id'], PDO::PARAM_STR);
    $stmt3->bindValue(':email', $user['email'], PDO::PARAM_STR);
    $stmt3->bindValue(':username', $user['username'], PDO::PARAM_STR);
    $stmt3->bindValue(':password', $user['password'], PDO::PARAM_STR);
    $stmt3->bindValue(':first_name', $user['first_name'], PDO::PARAM_STR);
    $stmt3->bindValue(':last_name', $user['last_name'], PDO::PARAM_STR);
    $stmt3->bindValue(':phone', $user['phone'], PDO::PARAM_STR);
    $stmt3->execute();
}

foreach ($ads as $ad) {
    $stmt4->bindValue(':user_id', $ad['user_id'], PDO::PARAM_STR);
    $stmt4->bindValue(':category_id', $ad['category_id'], PDO::PARAM_STR);
    $stmt4->bindValue(':title', $ad['title'], PDO::PARAM_STR);
    $stmt4->bindValue(':description', $ad['description'], PDO::PARAM_STR);
    $stmt4->bindValue(':price', $ad['price'], PDO::PARAM_STR);
    $stmt4->bindValue(':date_posted', $ad['date_posted'], PDO::PARAM_STR);
    $stmt4->execute();
}

foreach ($keywords as $keyword) {
    $stmt5->bindValue(':keyword', $keyword['keyword'], PDO::PARAM_STR);
    $stmt5->execute();
}

foreach ($ad_keyword as $ad_key) {
    $stmt6->bindValue(':ad_id', $ad_key['ad_id'], PDO::PARAM_STR);
    $stmt6->bindValue(':keyword_id', $ad_key['keyword_id'], PDO::PARAM_STR);
    $stmt6->execute();
}

foreach ($images as $image) {
    $stmt7->bindValue(':image_url', $image['image_url'], PDO::PARAM_STR);
    $stmt7->execute();
}

foreach ($ad_image as $ad_img) {
    $stmt8->bindValue(':ad_id', $ad_img['ad_id'], PDO::PARAM_STR);
    $stmt8->bindValue(':image_id', $ad_img['image_id'], PDO::PARAM_STR);
    $stmt8->execute();
}

