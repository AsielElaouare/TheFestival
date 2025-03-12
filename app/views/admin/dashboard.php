<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - User & Ticket Management</title>
  <link rel="stylesheet" href="/style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Removed inline JS -->
</head>
<body>
  <?php include __DIR__ . '/../partials/admin_header.php'; ?>
  <div class="container my-5">
    <h2>Admin Dashboard</h2>

    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" id="dashboardTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="true">
          Users
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tickets-tab" data-bs-toggle="tab" data-bs-target="#tickets" type="button" role="tab" aria-controls="tickets" aria-selected="false">
          Tickets &amp; Availabilities
        </button>
      </li>
    </ul>
    
    <!-- Tab Content -->
    <div class="tab-content" id="dashboardTabContent">
      
      <!-- Users Tab Pane -->
      <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
        <div class="my-3">
          <?php if(isset($_GET['message'])): ?>
            <div class="alert alert-success"><?= htmlspecialchars($_GET['message']); ?></div>
          <?php endif; ?>
          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']); ?></div>
          <?php endif; ?>
          
          <!-- Search, Filter, and Sort Form -->
          <form method="GET" action="/admin/dashboard" class="mb-4">
            <div class="row g-2">
              <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search users..." value="<?= htmlspecialchars($_GET['search'] ?? ''); ?>">
              </div>
              <div class="col-md-3">
                <select name="sort" class="form-select">
                  <option value="registration_date" <?= (($_GET['sort'] ?? '') == 'registration_date') ? 'selected' : ''; ?>>Registration Date</option>
                  <option value="name" <?= (($_GET['sort'] ?? '') == 'name') ? 'selected' : ''; ?>>Name</option>
                  <option value="email" <?= (($_GET['sort'] ?? '') == 'email') ? 'selected' : ''; ?>>Email</option>
                </select>
              </div>
              <div class="col-md-2">
                <select name="direction" class="form-select">
                  <option value="DESC" <?= (($_GET['direction'] ?? '') == 'DESC') ? 'selected' : ''; ?>>Descending</option>
                  <option value="ASC" <?= (($_GET['direction'] ?? '') == 'ASC') ? 'selected' : ''; ?>>Ascending</option>
                </select>
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="/admin/dashboard" class="btn btn-secondary">Reset</a>
              </div>
            </div>
          </form>
          
          <a href="/admin/create" class="btn btn-success mb-3">Create New User</a>
          
          <!-- Users Table -->
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Role</th>
                <th>Registration Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if(empty($users)): ?>
                <tr><td colspan="7">No users found.</td></tr>
              <?php else: ?>
                <?php foreach($users as $user): ?>
                  <tr>
                    <td><?= htmlspecialchars($user['user_id']); ?></td>
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td><?= htmlspecialchars($user['phone_number']); ?></td>
                    <td><?= htmlspecialchars($user['role']); ?></td>
                    <td><?= htmlspecialchars($user['registration_date'] ?? ''); ?></td>
                    <td>
                      <a href="/admin/edit?id=<?= $user['user_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a href="/admin/delete?id=<?= $user['user_id']; ?>" 
                         class="btn btn-sm btn-danger btn-delete-user" 
                         data-id="<?= $user['user_id']; ?>">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      
      <!-- Tickets & Availabilities Tab Pane -->
      <div class="tab-pane fade" id="tickets" role="tabpanel" aria-labelledby="tickets-tab">
        <div class="my-3">
          <h3>Tickets &amp; Availabilities</h3>
          <p>Below is a placeholder for managing event tickets and their availability limits. You can integrate real data from your database later.</p>
          
          <!-- Example events table -->
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Ticket Limit</th>
                <th>Tickets Sold</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>10</td>
                <td>Jazz Concert</td>
                <td>200</td>
                <td>58</td>
                <td>
                  <a href="/admin/events/edit?id=10" class="btn btn-sm btn-warning">Edit</a>
                  <a href="/admin/events/delete?id=10" class="btn btn-sm btn-danger btn-delete-event" data-id="10">Delete</a>
                </td>
              </tr>
              <tr>
                <td>11</td>
                <td>Dance Show</td>
                <td>300</td>
                <td>126</td>
                <td>
                  <a href="/admin/events/edit?id=11" class="btn btn-sm btn-warning">Edit</a>
                  <a href="/admin/events/delete?id=11" class="btn btn-sm btn-danger btn-delete-event" data-id="11">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
    </div> <!-- End of tab-content -->
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/js/admin.js"></script>
</body>
</html>
