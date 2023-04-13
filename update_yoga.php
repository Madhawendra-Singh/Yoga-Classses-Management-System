<?php
require('db.php');




if (isset($_REQUEST['yoga'])) {
  $yoga_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
  $type = mysqli_real_escape_string($conn, $_REQUEST['type']);
  $TIME = mysqli_real_escape_string($conn, $_REQUEST['TIME']);

  $update_query="update yoga set yoga_id='$yoga_id',yoga_name='$name',address='$address',type='$type' where yoga_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Yoga Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from yoga where yoga_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  


?>





<div class="container">
    <form class="form-group mt-3" method="post" action="">
        <div><h3>UPDATE YOGA</h3></div>
         <?php  
    echo @$err;

    ?>
        <label class="mt-3">YOGA ID</label>
        <input type="text" name="id" value="<?php echo @$res['yoga_id'];?>" class="form-control">
        <label class="mt-3">YOGA NAME</label>
        <input type="text" name="name" value="<?php echo @$res['yoga_name'];?>" class="form-control">
        <label class="mt-3">YOGA ADDRESS</label>
        <input type="text" name="address" value="<?php echo @$res['address'];?>" class="form-control">
        <label class="mt-3">YOGA TYPE</label>
        <input type="text" name="type" value="<?php echo @$res['type'];?>" class="form-control">
        <label class="mt-3">YOGA TIME</label>
        <input type="text" name="type" value="<?php echo @$res['TIME'];?>" class="form-control">
        
        
        <button class="btn btn-dark mt-3" type="submit" name="yoga">UPDATE</button>
    </form>
</div>

