<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=entretc;charset=utf8', 'csomorb', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}
?>