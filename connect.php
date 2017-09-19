<?php
	$user='root';
	$pwd='';
	$pdoMethod='mysql:host=localhost;dbname=soutenance;port=3306';

	try{
		$pdo = new PDO($pdoMethod, $user, $pwd);
	}catch(PDOException $e){
		/*echo $e->getMessage();*/
		exit;//if (!$pdo) exit;
	}
	