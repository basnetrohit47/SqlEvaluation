<?php
require_once("../model/M_finalize.php");

if (1 == finalize::insert()) {
}
else {
  $data ="error";
  echo $data;
}
