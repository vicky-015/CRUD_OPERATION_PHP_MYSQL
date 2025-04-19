<?php
include('connect.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    /*selecting data from database table,so that we can display in input fields*/
    $select_query="Select * from `crud_practice_project` where id=$uid";
    $result_query=mysqli_query($con,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $username=$row['username'];
    $email=$row['email'];
    $phone=$row['phone'];
    $place=$row['place'];
    if(isset($_POST['update'])){
      $username_update=$_POST['username'];
      $email_update=$_POST['email'];
      $phone_update=$_POST['phone'];
      echo $phone_update;
      $place_update=$_POST['place'];

      /* updating new data inside database table*/
      $update_query="update `crud_practice_project` set username='$username_update',email='$email_update',phone='$phone_update',place='$place_update' where id=$uid";
      $result_query=mysqli_query($con,$update_query);
      if($result_query){
          echo "<script>alert('Data updated successfully')</script>";
          echo "<script>window.open('display.php','_self')</script>";
      }else{
          die(mysqli_error($con));
      }
  }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Data in PHP</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="form_container">
      <form action='' method='post'>
        <fieldset>
          <legend>Edit Details</legend>
          <label for="username">Username</label>
          <input type="text" name="username" value="<?php echo $username ?>"/>

          <label for="email">Email</label>
          <input type="email" name="email" value="<?php echo $email ?>"/>

          <label for="phone">Mobile</label>
          <input type="number" name="phone" value="<?php echo $phone ?>"/>

          <label for="place">Place</label>
          <input type="text" name="place"  value="<?php echo $place ?>"/>

          <input
            type="submit"
            class="submit_btn"
            name="update"
            value="Update"
          />
        </fieldset>
      </form>
    </div>
    