<?php 

Session::checkSession();

    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        Session::destroy();
    }

    $app = new Application();
    $job = new Job();
    $text = new Language();
    $profile = new Profile();

    if(isset($_GET['delapp'])){
        $app->delApplication();
    }

    if(isset($_GET['deljob'])){
        $job->deleteRecord();
    }

    if(isset($_GET['dellang'])){
        $text->langDelete();
    }

    if(isset($_GET['delprofile'])){
        $profile->delProfile();
    }

    if(isset($_POST["public"])){
        $profile->changeStatus();
    }