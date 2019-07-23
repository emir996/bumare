<?php
	
	define("DBHOST", "localhost");
	define("DBUSER", "root");
	define("DBPASS", "");
	define("DBNAME", "bumare_db");
	define("APP_DIR", "d:/xampp/htdocs/bumare");

	spl_autoload_register(function($class){

		require_once APP_DIR . "/classes/".$class.".php";
	});
	