<?php

/**
 * La Classe Database permet de gérer la connexion à la bdd et l'éxécution des requêtes.
 *
 */

class Database{

	private $bdd;

	public function __construct($login,$password,$host,$dbname){

		try
		{
			$this->bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
			catch (Exception $e)
		{

			$this->bdd= false;
		}
	}

	public function getStatusBdd(){
		return ($this->bdd)?true:false;
	}

	public function query($query,$params=false){
		if($params){
			$req = $this->bdd->prepare($query);
			$req->execute($params);
		}else{
			$req= $this->bdd->query($query);
		}
		return $req;
		
	}
}