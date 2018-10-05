<?php
  include 'connect.php';
  $sql = "select fname,lname from users where id = ?";
  $stm = $con->prepare($sql);
  $stm->bindParam("1", $_GET['edit']);
  $stm->execute();
  $row = $stm->fetch();
?>
<form class="" action="edit.php?id=<?php echo $_GET['edit']; ?>" method="post">
  <input type="text" name="fname" value="<?php echo $row['fname']; ?>"><br>
  <input type="text" name="lname" value="<?php echo $row['lname']; ?>"><br>
  <button type="submit" name="update">edit</button><br><br>
</form>
<?php
  if(isset($_POST['update'])){
    $sql2 = "update users set fname = ?, lname = ? where id = ?";
    $stm2 = $con->prepare($sql2);
    $stm2->bindParam("1",$_POST['fname']);
    $stm2->bindParam("2",$_POST['lname']);
    $stm2->bindParam("3",$_GET['id']);

    try {
      $stm2->execute();
      header("location: index.php");
    } catch (Exception $e) {
      echo $e->getTracAsString();
    }

  }

?>
