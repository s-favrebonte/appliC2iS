<?php

/**
 * La Classe App permet de gérer la création d'objets.
 *
 */

class App{

	static $db=null;
	static $library=null;

	static function getDatabase(){
		if(!self::$db){
			return new Database('root','root','localhost','appli_C2iS');
		}

		return self::$db;
	}

	static function getLibrary(){
		if(!self::$library){
			return new Library();
		}

		return self::$library;
	}
}