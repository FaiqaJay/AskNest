<?php
$errors = [];
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>

<div class="container mt-5">
  <h1 class="heading">Sign Up</h1>

  <form method="post" action="./server/request.php">
    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
      <?php 
      if(isset($errors['username']) && $errors['username'] != ''){
      
        echo "<span class='error-message' style='color: red'>{$errors['username']}</span>";
        
      }
      ?>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" >
      <?php 
      if(isset($errors['email']) && $errors['email'] != ''){
      
        echo "<span class='error-message' style='color: red'>{$errors['email']}</span>";
        
      }
      ?>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
      <?php 
      if(isset($errors['password']) && $errors['password'] != ''){
      
        echo "<span class='error-message' style='color: red'>{$errors['password']}</span>";
        
      }
      ?>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
      <?php 
      if(isset($errors['address']) && $errors['address'] != ''){
      
        echo "<span class='error-message' style='color: red'>{$errors['address']}</span>";
        
      }
      ?>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
    </div>
  </form>

</div>