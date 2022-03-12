<?php

function getFolders(){
    global $pdo;
    $sql = "SELECT * FROM folders";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

function getTasks(){
    return [1,2,3,4,5];
}