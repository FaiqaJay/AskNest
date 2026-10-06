<div class="container mt-5">
  <h1 class="heading">Login</h1>

  <form action="./server/request.php" method="POST" class="row g-3">
    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <button type="submit" name="login" class="btn btn-primary">Login</button>
    </div>
  </form>

</div>