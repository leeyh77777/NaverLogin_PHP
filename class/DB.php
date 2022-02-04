<?php

class DB extends PDO
{
	public function __construct()
	{
		try {
			$dsn = "mysql:host=localhost;dbname=sns";
			$username = "root";
			$password = "";
			parent::__construct($dsn, $username, $password);
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
}