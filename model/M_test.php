<?php

require_once("db.php");

/** Access to the person table.
 * Put here the methods like getBySomeCriteriaSEarch */
class TestModel {

    /** Get person data for id $personId
     * (here demo with a SQL request about an existing table)
     * @param int $personId id of the quizz to be retrieved
     * @return associative_array table row
     */
    public static function insert($user_id, $evaluationId) {
        $db = db::getConnection();
        $sql = "INSERT INTO test(student_id, evaluation_id) VALUES(1, 1)";
        $stmt = $db->prepare($sql);
        $ok = $stmt->execute();
        $result = null;
        if ($ok) {
          $result = 1;
        }

        return $result;
    }

 }

?>
