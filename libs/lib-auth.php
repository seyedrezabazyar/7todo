<?php defined('BASE_PATH') or die("Permission Denied!");

/*** Auth Functions ***/

function getCurrentUserID()
{
    // Get login user id
    return 1;
}

function isLoggedIn()
{
    return false;
}

function login($user, $password)
{
    return 1;
}

function register($userData)
{
    global $pdo;
    # Validation of $userData here (isValidEmail,isValidName,isValidPassword)
    $passHash = password_hash($userData['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO `users` (name,email,password) VALUES (:name,:email,:password);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $userData['name'], ':email' => $userData['email'], ':password' => $passHash]);
    return $stmt->rowCount() ? true : false;
}
