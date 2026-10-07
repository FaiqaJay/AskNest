<?php
$errors = [];
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>

<div class="container mt-5">
  <h1 class="heading">Ask A Question</h1>

  <form action="./server/request.php" method="POST">
    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title" placeholder="Enter Question">
      <?php 
      if(isset($errors['title']) && $errors['title'] != ''){
      
        echo "<span class='error-message' style='color: red'>{$errors['title']}</span>";
        
      }
      ?>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" class="form-control" id="description" placeholder="Enter Question Description"></textarea>
      <?php 
      if(isset($errors['description']) && $errors['description'] != ''){
      
        echo "<span class='error-message' style='color: red'>{$errors['description']}</span>";
        
      }
      ?>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="category" class="form-label">Category</label>
      <?php include("category.php") ?>
      <?php 
      if(isset($errors['category']) && $errors['category'] != ''){
      
        echo "<span class='error-message' style='color: red'>{$errors['category']}</span>";
        
      }
      ?>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <button type="submit" name="ask" class="btn btn-primary">Ask Question</button>
    </div>
  </form>

</div>