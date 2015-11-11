<?php

/* Autoloader qui permet d'inclure les classes */

spl_autoload_register('autoloader');

function autoloader($class){
   	require "class/$class.php";
}