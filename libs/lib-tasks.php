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

function addFolder($folderName){
    global $pdo;
    $currentUserID = getCurrentUserID();
    $sql = "INSERT INTO folders (name,user_id) VALUES (:folder_name ,:user_id);";
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

function addTask($taskTitle,$folderID){
    global $pdo;
    $currentUserID = getCurrentUserID();
    $sql = "INSERT INTO tasks (title,user_id,folder_id) VALUES (:title,:user_id,:folder_id);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title'=>$taskTitle,':user_id'=>$currentUserID,':folder_id'=>$folderID]);
    return $stmt->rowCount();
}

function getTasks(){
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;
    $folderCondition = '';
    if(isset($folder) and is_numeric($folder)){
        $folderCondition = " AND folder_id=$folder";
    }
    $currentUserID = getCurrentUserID();
    $sql = "SELECT * FROM tasks WHERE user_id = $currentUserID $folderCondition";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}