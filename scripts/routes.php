<?php
	/**
	main file 'switcher'
	*/

	//set buffering
	ob_start();

	//define mode
	$mode = isset($_REQUEST['mode'])  ? $_REQUEST['mode'] : false;
//	$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
	$err = [];


	if($mode) {

		include './config.php';
		include './func/funct.php';
		include './bd/bd.php';//connect MySQL

		//registration/auth scripts
		switch($mode)
		{
			//handle registration
			case 'reg':
				include './reg/reg.php';
				$data = register($pdo);
				break;

			//handle auth
			case 'auth':
				include './auth/auth.php';
				$data = auth($pdo);
				include '../show.php';
				break;
		}
	}
    
	//Get data from buffer
	$content = ob_get_contents();
	ob_end_clean();

	echo $data;
?>			