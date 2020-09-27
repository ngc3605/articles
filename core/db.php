<?php 

class DB {
	

	public static function DBconnection(){
		$db = new PDO('mysql:host=localhost;dbname=myarticles','root','');
		return $db;
	}
}