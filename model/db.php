<?php

class db{

  public static function getconnection(){

    $db="sql_quiz";
    $dsn="mysql:dbname=$db;host=localhost";
    $user="root";
    $password="admin";
    $bdd=new PDO($dsn,$user,$password);
    $bdd->exec("SET character_set_client = 'utf8'");
   return $bdd;
 }
}

 ?>
