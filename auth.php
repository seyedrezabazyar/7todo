<?php

include 'bootstrap/init.php';

$home_url = site_url();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action == 'register') {
        $result = register($params);
        if (!$result) {
            message('ERROR: an error occurred while registering!');
        } else {
            message("Successfully registered. Welcome To 7Todo. <br /><br />
            <a href='{$home_url}auth.php'>Please Login</a>", 'message-success');
        }
    } else if ($action == 'login') {
        $result = login($params['email'], $params['password']);
        if (!$result) {
            message('ERROR: email or password incorrect!');
        } else {
            message("you are know Logged In. <br /><br />
            <a href='{$home_url}'>Manage Your Tasks</a>", 'message-success');
        }
    }
}

include 'tpl/tpl-auth.php';
