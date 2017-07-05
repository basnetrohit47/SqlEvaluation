<?php

require_once("db.php");
class getquestion{

  public static function get($evaluationId) {
         $db = DB::getConnection();
         $sql = "select quiz_question.rank,sql_question.question_text,sql_question.question_id from quiz_question inner join sql_question on
                 sql_question.question_id=quiz_question.question_id where quiz_question.quiz_id=:person_id";

         $stmt = $db->prepare($sql);
         $stmt->bindValue(":person_id", $evaluationId);
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
