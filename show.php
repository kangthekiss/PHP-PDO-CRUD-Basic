<?php

  include 'connect.php';

  $sql = "select * from users";
  $stm = $con->prepare($sql);

  try {
    $stm->execute();
  } catch (Exception $e) {
    echo $e->getTracAsString();
  }

  while($row = $stm->fetch()){
    echo "id :".$row['id']."<br>";
    echo "name :".$row['fname']."<br>";
    echo "lastname :".$row['lname']."<br>";
    echo "<hr>";
  }


?>
