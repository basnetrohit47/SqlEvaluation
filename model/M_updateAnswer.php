<?php

require_once("db.php");

/** Access to the person table.
 * Put here the methods like getBySomeCriteriaSEarch */
class updateAnswer {

    /** Get person data for id $personId
     * (here demo with a SQL request about an existing table)
     * @param int $personId id of the quizz to be retrieved
     * @return associative_array table row
     */
    public static function insert($qry, $qid) {
        $db = db::getConnection();
        $sql = "UPDATE sql_answer SET query=:qury WHERE question_id=:Sid";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":qury", $qry);
        $stmt->bindValue(":Sid", $qid);
        $ok = $stmt->execute();
        $result = null;
        if ($ok) {
          $result = 1;
        }
        else {
          $result=0;
        }
        return $result;
    }

 }

?>
