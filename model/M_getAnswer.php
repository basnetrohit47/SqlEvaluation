<?php

require_once("db.php");
class getanswer{

  public static function get() {
         $db = DB::getConnection();
         $sql = "select * from sql_answer";

         $stmt = $db->prepare($sql);

         $ok = $stmt->execute();
         $data = array();




        // $result = null;
         if ($ok) {
           while ($row_user = $stmt->fetch(PDO::FETCH_ASSOC)){
               $data[] = $row_user;
            }
         }
         return $data;
     }
}
 ?>
