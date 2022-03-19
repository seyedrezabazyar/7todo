<?php defined('BASE_PATH') or die("Permission Denied!");

/*** Auth Functions ***/

function getCurrentUserID()
{
    // Get login user id
    return 1;
}

function isLoggedIn()
{
    return isset($_SESSION['login']) ? true : false;
}

function getLoggedInUser()
{
    return $_SESSION['login'] ?? null;
}

function getUserByEmail($email)
{
    global $pdo;
    $sql = "SELECT * FROM `users` WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}

function logout()
{
    unset($_SESSION['login']);
}

function login($email, $password)
{
    $user = getUserByEmail($email);

    if (is_null($user)) {
        return false;
    }

    #check the password
    if (password_verify($password, $user->password)) {
        # login is successful
        $user->image = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email)));
        $_SESSION['login'] = $user;
        return true;
    }

    return false;
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
