<?php defined('BASE_PATH') OR die("Permission Denied!");
// alternative to top code
// if(!defined('BASE_PATH')){
//     echo "Permission Denied!";
//     die();
// }


/*** Folder Functions ***/

function deleteFolder($folderID){
    global $pdo;
    $sql = "DELETE FROM folders WHERE id = $folderID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}

function addFolders($folderName){
    global $pdo;
    $currentUserID = getCurrentUserID();
    $sql = "INSERT INTO folders (name,user_id) VALUES (:folder_name , :user_id);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':folder_name'=>$folderName,':user_id'=>$currentUserID]);
    return $stmt->rowCount();
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
function deleteTask($taskID){
    global $pdo;
    $sql = "DELETE FROM tasks WHERE id = $taskID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}

function addTasks(){
    return 1;
}

function getTasks(){
    global $pdo;
    $currentUserID = getCurrentUserID();
    $sql = "SELECT * FROM tasks WHERE user_id = $currentUserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}