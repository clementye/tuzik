<?php
  require_once "../models/connexion.php";

  $photo_article = function(string $AID) use ($db) {
    $statement = $db->prepare("SELECT image
      FROM photo_article
      WHERE articleId = ?;");
    $statement->execute([$AID]);
    $result = $statement->fetch(PDO::FETCH_OBJ);
    return $result;
  };
 ?>
