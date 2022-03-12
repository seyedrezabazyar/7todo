<?php

/*** Folder Functions ***/

function deleteFolder($folderID){
    global $pdo;
    $sql = "DELETE FROM folders WHERE id = $folderID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}

function addFolders(){

}

function getFolders(){
    global $pdo;
    $currentUserID = getCurrentUserID();
    $sql = "SELECT * FROM folders WHERE user_id = $currentUserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

/*** Tasks Functions ***/
function removeTasks(){
    return 1;
}

function addTasks(){
    return 1;
}

function getTasks(){
    return 1;
}