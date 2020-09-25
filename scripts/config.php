<?php
 /**
 * Конфигурационный файл
 * Site: http://bezramok-tlt.ru
 * Регистрация пользователя письмом
 */


 //Ключ защиты
 if(!defined('BEZ_KEY'))
 {
     header("HTTP/1.1 404 Not Found");
     exit(file_get_contents('./404.html'));
 }

 //Database url
 define('DB_HOST','localhost');
 //Database user
 define('DB_USER','oleh');
 //Database password
 define('DB_PASS','223123');
 //Database name
 define('DATABASE','pdo-test');

 //Адрес хоста сайта
 define('BEZ_HOST','http://'. $_SERVER['HTTP_HOST'] .'/');

 ?>