<?php
//require_once("httpResources.php");
require_once("../model/M_Questions.php");
$data = array();
	$data = getquestion::get(2);

//  while ($row_user = getquestion::get(2)){
    //  $data[] = $row_user;
  // }

    echo json_encode($data);

 ?>
