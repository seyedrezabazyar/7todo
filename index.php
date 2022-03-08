<?php

include 'bootstrap/init.php';
// use Hekmatinasser\Verta\Verta;
// $v = new Verta();
// var_dump($v);

# connect to database and get tasks
$tasks = getTasks();


include 'tpl/tpl-index.php';