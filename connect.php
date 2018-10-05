<?php

  $db = 'mysql:host=localhost; dbname=pdo';
  $user = 'root';
  $pass = '';

  try{
    $con = new PDO($db, $user, $pass);
    // echo "success";
  } catch(Exception $ex){
    echo $ex->getMessage();
  }


?>
