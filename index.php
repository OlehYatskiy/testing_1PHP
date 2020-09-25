<?php

	session_start();

	//Set the encoding and output of all errors
	header('Content-Type: text/html; charset=UTF8');
	error_reporting(E_ALL);

	include 'index.html';
?>			