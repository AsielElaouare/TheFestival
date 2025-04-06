<?php
include __DIR__ . '/../header.php';
?>
  <div class="container my-5">
    <h1>Login</h1>
    <form action="/login/processLogin" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>
      <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
      <button type="submit" class="btn btn-primary">Login</button>
      <p>Don't have an account? <a href="/register">Register here</a></p>
      <p><a href="/forgotPassword">Forgot your password?</a></p>
      


    </form>
  </div>
<?php
include __DIR__ . '/../footer.php';
?>

