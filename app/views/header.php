<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TheFestival</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4c23360f25.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/style/style.css">
</head>
<body>
 <main>
   <div class="container">
    <nav class="d-flex justify-content-center align-items-center py-3">
      <picture class="me-auto">
        <img src="/uploads/logo.svg" alt="Logo the Festival">
      </picture>
      <ul class="nav nav-pills">
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">Home</a></li>
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">Yummy</a></li>
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">Jazz</a></li>
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">Dance</a></li>
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">History</a></li>
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">Tylers</a></li>
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">Tickets</a></li>
        
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link purple" title="Admin Dashboard">
              <i class="fa-solid fa-tachometer-alt" style="font-size:1.5rem;"></i>
            </a>
          </li>
        <?php else: ?>
          <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item">
              <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  Account
                </a>
                <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                  <li><a class="dropdown-item" href="/account/edit">Edit Account</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
              </div>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a href="/login" class="btn btn-primary">
                <i class="fa-solid fa-user"></i> Login
              </a>
            </li>
          <?php endif; ?>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
