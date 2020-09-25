<?php
 /**
 * Подключение к базе данных
 * Site: http://bezramok-tlt.ru
 * Регистрация пользователя письмом
 */

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
//Connection to database mySQL via PDO
try {
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE.';charset=utf8',
        DB_USER,
        DB_PASS,
        $options
    );

} catch (PDOException $e) {
    print "Connection error!: " . $e->getMessage() . "<br/>";
    die();
}

