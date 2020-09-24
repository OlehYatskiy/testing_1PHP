<?php
 /**
 * Подключение к базе данных
 * Site: http://bezramok-tlt.ru
 * Регистрация пользователя письмом
 */

 //Ключ защиты
 if(!defined('BEZ_KEY'))
 {
     header("HTTP/1.1 404 Not Found");
     exit(file_get_contents('./../404.html'));
 }

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
//Подключение к базе данных mySQL с помощью PDO
try {
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE.';charset=utf8',
        DB_USER,
        DB_PASS,
        $options
    );

} catch (PDOException $e) {
    print "Ошибка соединения!: " . $e->getMessage() . "<br/>";
    die();
}

