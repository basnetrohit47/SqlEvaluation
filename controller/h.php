<?php

$db="sql_quiz";
$dsn="mysql:dbname=$db;host=localhost";
$user="root";
$password="admin";
$bdd=new PDO($dsn,$user,$password);
$qr="select question_id,query from sql_answer";

$stmt = $bdd->prepare($qr);
$ok = $stmt->execute();
$result = null;
$data = array();

while ($row_user = $stmt->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row_user;
 }
//$data =$stmt->fetch(PDO::FETCH_ASSOC);
// ($data);die;

echo json_encode($data);



  ?>
