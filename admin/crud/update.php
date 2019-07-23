<?php 

include_once '../../config/config.php';
Session::checkSession();

$lang = new Language();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_update'])){

	$lang_update = $lang->langUpdate();
}

if(isset($lang_update)){
	echo $lang_update;
}