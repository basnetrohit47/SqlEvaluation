<?php

require_once("db.php");
class EvaluationModel{

  public static function get($evaluationId) {
         $db = DB::getConnection();
         $sql = "CALL EvaluationById();";
         $stmt = $db->prepare($sql);
         //$stmt->bindValue(":person_id", $evaluationId);
         $ok = $stmt->execute();
         $result = null;
         if ($ok) {
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
         }
         return $result;
     }
}
 ?>
