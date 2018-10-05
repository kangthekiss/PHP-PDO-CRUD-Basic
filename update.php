<?php

  include 'connect.php';

  $fname = "kang";
  $lname = "rak";
  $id = 1;

  $sql = "update users set fname = ?, lname = ? where id = ?";
  $stm = $con->prepare($sql);
  $stm->bindParam("1",$fname);
  $stm->bindParam("2",$lname);
  $stm->bindParam("3",$id);

  try {
    $stm->execute();
    echo "update success";
  } catch (Exception $e) {
    echo $e->getTracAsString();
  }


?>
