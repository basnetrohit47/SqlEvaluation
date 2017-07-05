<?php

require_once("../model/M_getAnswer.php");
$data = array();
	$data = getanswer::get();


//  while ($row_user = getquestion::get(2)){
    //  $data[] = $row_user;
  // }

    echo json_encode($data);

 ?>
