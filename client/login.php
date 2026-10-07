<?php
$errors = [];
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>
<div class="container mt-5">
  <h1 class="heading">Login</h1>

  <form action="./server/request.php" method="POST" class="row g-3">
    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
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
      <button type="submit" name="login" class="btn btn-primary">Login</button>
    </div>
  </form>

</div>