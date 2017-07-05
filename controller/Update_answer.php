<?php
require_once("../httpResources.php");
require_once("../model/M_updateAnswer.php");


  session_start();
      $qid = $_POST["qid"];
      $qry=$_POST["qry"];
     $data=null;


      if (1 == updateAnswer::insert($qry,$qid)) {
        $data=1;
        echo $data;
      }
      else {
        $data =0;
        echo $data;
      }
