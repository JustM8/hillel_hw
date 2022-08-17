<?php

require_once __DIR__.'/constants.php';
spl_autoload_register(function ($class_name){
    $file = __DIR__.'/'.str_replace('\\','/',$class_name).'.php';

    if(!file_exists($file)){
        throw new Exception("Class [{$class_name}] dose not exist in [{$file}] path");
    }
    require_once $file;
});

use Classes\Users;
$user = new Users();

switch ($_POST['do']){
    case 'create':
        $user->createTable();
    break;
    case 'userAdd':
        echo $user->addUser($_POST);
    break;
    case 'getUsers':
        echo $user->getUsers(@$_POST['id']);
    break;
    case 'deleteUser':
        echo $user->deleteUser($_POST['id']);
    break;
    default:
        echo 'some ajax to my functions';
    break;
}



