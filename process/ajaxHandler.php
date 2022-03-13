<?php

include_once '../bootstrap/init.php';

if(!isAjaxRequest()){
    diePage("Invalid Request!");
}

if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("Invalid Action!");
}

switch($_POST['action']){
    case "addFolder":
        if (!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3) {
            echo "نام فولدر باید بیشتر از ۲ حرف باشد.";
            die();
        }
        echo addFolders($_POST['folderName']);
    break;
    case "addTask":
        var_dump($_POST);
    break;

    default:
        diePage("Invalid Request!");
}