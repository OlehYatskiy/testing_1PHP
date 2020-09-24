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

 //Адрес базы данных
 define('DB_HOST','localhost');
 //Логин БД
 define('DB_USER','oleh');
 //Пароль БД
 define('DB_PASS','223123');
 //БД
 define('DATABASE','pdo-test');

 //Errors
 define('BEZ_ERROR_CONNECT','Немогу соеденится с БД');//????

 //Errors
 define('BEZ_NO_DB_SELECT','Данная БД отсутствует на сервере');//????

 //Адрес хоста сайта
 define('BEZ_HOST','http://'. $_SERVER['HTTP_HOST'] .'/');

 //Адрес почты от кого отправляем
 define('BEZ_MAIL_AUTOR','Регистрация на http://bezramok-tlt.ru <no-reply@bezramok-tlt.ru>');
 ?>