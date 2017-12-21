<?php 


try {
		$bdd = new PDO('mysql:host=localhost;dbname=tafcesi;charset=utf8', 'cesi', 'cesi');
	}

catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
	}

 ?>