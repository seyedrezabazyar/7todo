<?php

include 'bootstrap/init.php';

if(isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])){
    $deletedcount  = deleteFolder($_GET['delete_folder']);
    // echo "$deletedcount Folders successfully deleted!";
}

if(isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])){
    $deletedcount  = deleteTask($_GET['delete_task']);
    // echo "$deletedcount Tasks successfully deleted!";
}

# connect to database and get tasks
$folders = getFolders();

$tasks = getTasks();

include 'tpl/tpl-index.php';