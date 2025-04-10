<?php
$adminIsLoggedIn = false;
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
  $adminIsLoggedIn = true;
}

function getContentByTitle($blocks, $title) {
  foreach ($blocks as $block) {
      if ($block->contentblock_title === $title) {
          return $block->content;
      }
  }
  return '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TheFestival</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4c23360f25.js" crossorigin="anonymous"></script>
  <?php if ($adminIsLoggedIn): ?>
    <script src="https://cdn.tiny.cloud/1/ho7c7ke8cs9ykaxznotza1qf56jj6ljuc2umaouva9id4cv1/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  <?php endif; ?>
  <link rel="stylesheet" href="/style/style.css">
</head>
<body class="d-flex flex-column min-vh-100">
 <main>
   <div class="container">
    <nav class="d-flex justify-content-center align-items-center py-3">
      <picture class="me-auto">
        <img src="/uploads/logo.svg" alt="Logo the Festival">
      </picture>
      <ul class="nav nav-pills">
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">Home</a></li>
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">Yummy</a></li>
        <li class="nav-item impact-font"><a href="/jazz" class="nav-link purple">Jazz</a></li>
        <li class="nav-item impact-font"><a href="/dance" class="nav-link purple">Dance</a></li>
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">History</a></li>
        <li class="nav-item impact-font"><a href="/" class="nav-link purple">Tylers</a></li>
        <li class="nav-item impact-font"><a href="/tickets" class="nav-link purple">Tickets</a></li>
        
        <?php if ($adminIsLoggedIn): ?>
          <!-- If an admin is logged in, show only the dashboard icon -->
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link purple impact-font" title="Admin Dashboard">
              <i class="bi bi-speedometer" style="font-size:1rem;"></i>
              Admin 
            </a>
          </li>
        <?php else: ?>
          <?php if (isset($_SESSION['user_id'])): ?>
            <!-- If a customer is logged in, show the account dropdown -->
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
            <!-- If no user is logged in, show the login button -->
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

<?php if ($adminIsLoggedIn): ?>
  <form id="contentForm" class="bg-yellow">
<?php endif; ?>
