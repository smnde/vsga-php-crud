<?php

require_once '../config/db.php';

function login($data)
{
	$valid_username = 'admin';
	$valid_password = password_hash('admin123', PASSWORD_BCRYPT);

	$username = htmlspecialchars($data['username']);
	$password = htmlspecialchars($data['password']);

	

	if($username === $valid_username && password_verify($password, $valid_password)) {
		$_SESSION['login'] = true;
		header('Location: index.php');
		exit();
	}

	$error = true;
}