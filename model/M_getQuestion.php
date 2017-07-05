<?php

require_once("db.php");
class getquestion{

  public static function get($evaluationId) {
         $db = DB::getConnection();
         $sql = "select question_text,query from sql_question
                 left outer join sql_answer on
                 sql_question.question_id=sql_answer.question_id
                 where sql_answer.question_id=:person_id";

         $stmt = $db->prepare($sql);
         $stmt->bindValue(":person_id", $evaluationId);
         $ok = $stmt->execute();
         $result = null;
         if ($ok) {
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
         }
         return $result;
     }
}
 ?>
