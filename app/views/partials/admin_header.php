<?php
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/admin/dashboard">
      <i class="fa-solid fa-tachometer-alt" style="font-size:1.8rem;"></i>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="adminNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="adminAccountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Admin Account
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminAccountDropdown">
            <li><a class="dropdown-item" href="/account/edit">Edit Account</a></li>
            <li><a class="dropdown-item" href="/">Exit Dashboard</a></li>
            <li><a class="dropdown-item" href="/login/logout">Logout</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
