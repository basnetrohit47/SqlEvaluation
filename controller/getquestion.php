<?php
//require_once("httpResources.php");
require_once("../model/M_getQuestion.php");


if(isset($_POST["Qid"])){
  $qid=$_POST["Qid"];
  session_start();
  $_SESSION['question_id'] = $qid;

	$data = getquestion::get($qid);

    echo json_encode($data);
}
 ?>
