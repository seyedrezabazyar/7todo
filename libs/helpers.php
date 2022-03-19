<?php defined('BASE_PATH') or die("Permission Denied!");

function getCurrentUrl()
{
    return 1;
}

function isAjaxRequest()
{
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    } else {
        return false;
    }
}

function site_url($uri = '')
{
    return BASE_URL . $uri;
}

function redirect($url)
{
    header("location: $url");
    die();
}

function diePage($msg)
{
    echo "<div style='padding: 50px 30px; width: 80%; margin: 50px auto; border-radius: 10px; background-color: rgba(244,67,54 ,0.2); color: #f44336; font-family: sans-serif;'>$msg</div>";
    die();
}

function message($msg, $cssClass = 'message-info')
{
    echo "<div class='$cssClass'>$msg</div>";
}

function dd($var)
{
    echo "<pre style='color: #455A64;font-size: 18px;position:relative;background-color:#ffffff;border-radius:10px;z-index: 999;margin: 10px;padding: 20px;border-left: 5px solid #e3133d;'>";
    var_dump($var);
    echo "</pre>";
}
