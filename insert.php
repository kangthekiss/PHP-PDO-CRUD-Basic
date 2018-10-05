<?php
  include 'connect.php';

  $fname = "lalita";
  $lname = "saiseng";

  $sql = "insert into users (fname, lname) values (?,?)";
  $stm = $con->prepare($sql);
  $stm->bindParam("1",$fname);
  $stm->bindParam("2",$lname);

  try {
    $stm->execute();
    echo "insert data success";
  } catch (Exception $e) {
    echo $e->getTracAsString();
  }


?>
