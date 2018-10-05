<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Show</title>
</head>
<body>

  <?php
    if(isset($_POST['save'])){
      $insert = "insert into users (fname, lname) values (?, ?)";
      $in_stm = $con->prepare($insert);
      $in_stm->bindParam("1", $_POST['fname']);
      $in_stm->bindParam("2", $_POST['lname']);
      try {
        $in_stm->execute();
        header("location: index.php");
      } catch (\Exception $e) {
        echo $e->getTraceAsString();
      }

    }
  ?>
  <form class="" action="index.php" method="post">
    <input type="text" name="fname" value="" placeholder="Input Your Name"><br>
    <input type="text" name="lname" value="" placeholder="Input Your Lastname"><br>
    <button type="submit" name="save">Save</button><br><br>
  </form>

  <table border="1">
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Lastname</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
      $sql = "select * from users";
      $stm = $con->prepare($sql);
      try {
        $stm->execute();
      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
      while($row = $stm->fetch()){
        echo "<tr>";
          echo "<td>".$row['id']."</td>";
          echo "<td>".$row['fname']."</td>";
          echo "<td>".$row['lname']."</td>";
          echo "<td><a href='edit.php?edit=$row[id]'>edit</a></td>"; ?>
          <td><a href="index.php?del=<?php echo $row[id]; ?>">del</a></td>
          <?php
        echo "</tr>";
      }
    ?>
  </table>
  <?php
    if(isset($_GET['del'])){
      $del = "delete from users where id = ?";
      $del_stm = $con->prepare($del);
      $del_stm->bindParam("1", $_GET['del']);
      $del_stm->execute();
      header("location: index.php");
    }
  ?>
</body>
</html>
