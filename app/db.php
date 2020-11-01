<?php


	/**
	 *  Session Start:
	 */
	session_start();

	/**
	 *  Database Connection:
	 */
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "auth";


	$connection = new mysqli($host, $user, $password, $db);
?>