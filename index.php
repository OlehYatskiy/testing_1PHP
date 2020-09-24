<?php

	session_start();

	//Устанавливаем кодировку и вывод всех ошибок
	header('Content-Type: text/html; charset=UTF8');
	error_reporting(E_ALL);


	//Подключаем наш шаблон
	include 'index.html';
?>			