<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['yoga'])) {

  $yoga_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
  $type = mysqli_real_escape_string($conn, $_REQUEST['type']);
  
  $user_check_query = "SELECT * FROM yoga WHERE yoga_id='$yoga_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['yoga_id'] === $yoga_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO yoga (yoga_id,yoga_name,address,type) 
          VALUES('$yoga_id','$name','$address','$type')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>Yoga added successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>Yoga not added</b></div>";
    }
  }
}

?>

<div class="w3-container">
  <form class="form-group mt-3" method="post" action="">
    <div><h3>ADD YOGA</h3></div>
     <?php include('errors.php'); 
    echo @$msg;

    ?>
    <label class="mt-3">YOGA ID</label>
    <input type="text" name="id" class="form-control">
    <label class="mt-3">YOGA NAME</label>
    <input type="text" name="name" class="form-control">
    <label class="mt-3">YOGA ADDRESS</label>
    <input type="text" name="address" class="form-control">
    <label class="mt-3">YOGA TYPE</label>
    <select name="type" class="form-control mt-3">
    <option value="unisex">UNISEX</option>
    <option value="women">WOMEN</option>
    <option value="men">MEN</option>  
    </select>
    <button class="btn btn-dark mt-3" type="submit" name="yoga">ADD</button>
  </form>
</div>

