<?php

include_once '../bootstrap/init.php';

if(!isAjaxRequest()){
    diePage("Invalid Request!");
}

var_dump($_POST);