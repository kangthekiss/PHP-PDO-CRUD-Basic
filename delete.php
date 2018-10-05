<?php

  include 'connect.php';

  $sql = "delete from users where id = ?";
  $stm = $con->prepare($sql);
  $id = 1;
  $stm->bindParam("1", $id);

  try {
    $stm->execute();
    echo "deleted";
  } catch (Exception $e) {
    echo $e->getTracAsString();
  }



?>
