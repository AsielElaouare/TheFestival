<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="/style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
  <div class="container my-5">
    <h1>Register</h1>
    <form action="/register/processRegister" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" class="form-control">
      </div>

      <div class="mb-3">
      <div class="g-recaptcha" data-sitekey="6LcHI-0qAAAAADbVDt6TBG9r_9d4k4jDF4YXWyY2"></div>
      </div>
      <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>

<?php
include __DIR__ . '/../footer.php';
?>
