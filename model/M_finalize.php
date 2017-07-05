<?php

require_once("db.php");

class finalize {
    public static function insert() {
        $db = db::getConnection();
        $sql = "UPDATE test SET completed_at=now() WHERE student_id=1;";
        $stmt = $db->prepare($sql);
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
