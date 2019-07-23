<?php

	include_once '../../config/config.php';
	Session::checkSession();

	$text = new Language();

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_insert'])){

		$lang_insert = $text->langInsert();
	}

	if(isset($lang_insert)){
		echo $lang_insert;
	}

?>