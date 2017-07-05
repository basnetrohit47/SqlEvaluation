<?php
require_once("../httpResources.php");
require_once("../model/M_updateAnswer.php");


  session_start();
      $qid = $_POST["qid"];
      $qry=$_POST["qry"];



      if (1 == updateAnswer::insert($qry,$qid)) {

      }
      else {
        $data ="error";
        echo $data;
      }
