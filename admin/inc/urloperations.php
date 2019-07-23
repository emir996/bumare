<?php 

Session::checkSession();

    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        Session::destroy();
    }

    $app = new Application();
    $job = new Job();
    $text = new Language();

    if(isset($_GET['delapp'])){
        $del_app = $app->delApplication();
    }

    if(isset($_GET['deljob'])){
        $del_job = $job->deleteRecord();
    }

    if(isset($_GET['dellang'])){
      $delete = $text->langDelete();
    }

    if(isset($_POST["public"])){
        $is_public = $app->changeStatus();
    }