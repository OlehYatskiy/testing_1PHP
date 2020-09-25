<?php
	/**
	main file 'switcher'
	*/

	//Включаем буферизацию содержимого
	ob_start();

	//Определяем переменную для переключателя
	$mode = isset($_REQUEST['mode'])  ? $_REQUEST['mode'] : false;
	$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
	$err = [];

	//Устанавливаем ключ защиты
	define('BEZ_KEY', true);

	if($mode) {
		//Подключаем конфигурационный файл
		include './config.php';
		//Подключаем скрипт с функциями
		include './func/funct.php';
		//подключаем MySQL
		include './bd/bd.php';

		//registration/auth scripts
		switch($mode)
		{
			//Подключаем обработчик с формой регистрации
			case 'reg':
				include './reg/reg.php';
				$data = register($pdo);
				break;
			//Подключаем обработчик с формой авторизации

			case 'auth':
				include './auth/auth.php';
				$data = auth($pdo);
				include '../show.php';
				break;
		}
	}
    
	//Получаем данные с буфера
	$content = ob_get_contents();
	ob_end_clean();

	echo $data;
?>			