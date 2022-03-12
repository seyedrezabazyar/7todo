<?php

function getCurrentUserID(){
    // Get login user id
    return 1;
}

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

function getTasks(){
    return [1,2,3,4,5];
}