<?php

namespace Classes;

use PDO;

class Users
{

public function createTable():bool
    {
        $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE.';',DB_USER,DB_PASSWORD, DB_OPTS);
        $sql = $pdo->prepare("CREATE TABLE users
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)  NOT NULL,
    surname VARCHAR(100) NOT NULL,
    age smallint NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);
");
        return $sql->execute();
    }

public function addUser(array $data):bool
    {
        $name = $data['dataF'][0]['value'];
        $surname = $data['dataF'][1]['value'];
        $age = $data['dataF'][2]['value'];
        $email = $data['dataF'][3]['value'];

        $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE.';',DB_USER,DB_PASSWORD, DB_OPTS);
        $query = $pdo->prepare("INSERT INTO users (name, surname, age, email) VALUES (:name, :surname, :age, :email)");

        $query->bindParam("name",$name);
        $query->bindParam("surname",$surname);
        $query->bindParam("age",$age);
        $query->bindParam("email",$email);

        return $query->execute();
    }

public    function getUsers(int $id = null):string
    {
        $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE.';',DB_USER,DB_PASSWORD, DB_OPTS);
        if($id != NULL){
            $query = $pdo->prepare("SELECT * FROM users WHERE id = :id");
            $query->bindParam('id',$id,PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return "<hr> <h5>User Info</h5>Info about user {$id}: <br> Name - {$result['name']} <br> Surname - {$result['surname']} <br> Age - {$result['age']} <br> Email - {$result['email']}";
        }
        $query = $pdo->prepare("SELECT id FROM users");
        $query->execute();
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        $result = '';
        foreach ($array as $value){
            $result .= '<option data-id="'.$value['id'].'">User with ID -'.$value['id'].'</option>';
        }
        return $result;
    }

public   function deleteUser(int $id):bool
    {
        $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE.';',DB_USER,DB_PASSWORD, DB_OPTS);

        $query = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $query->bindParam('id',$id,PDO::PARAM_INT);

        return $query->execute();
    }
}