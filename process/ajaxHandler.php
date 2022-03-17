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
        echo addFolder($_POST['folderName']);
    break;
    case "addTask":
        $folderID = $_POST['folderID'];
        $taskTitle = $_POST['taskTitle'];
        if (!isset($folderID) || empty($folderID)) {
            echo "فولدر را انتخاب کنید.";
            die();
        }
        if (!isset($taskTitle) || strlen($taskTitle) < 3) {
            echo "عنوان تسک باید بیشتر از ۲ حرف باشد.";
            die();
        }
        echo addTask($taskTitle,$folderID);
    break;

    default:
        diePage("Invalid Request!");
}