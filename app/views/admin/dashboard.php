<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - User & Ticket Management</title>
  <link rel="stylesheet" href="/style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/../partials/admin_header.php'; ?>
  <div class="container my-5">
    <h2>Admin Dashboard</h2>

    <!-- Tab navigatie -->
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
    
    <div class="tab-content" id="dashboardTabContent">
      
      <!-- Users Tab  -->
      <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
        <div class="my-3">
          <?php if(isset($_GET['message'])): ?>
            <div class="alert alert-success"><?= htmlspecialchars((string) $_GET['message']) ?></div>
          <?php endif; ?>
          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?= htmlspecialchars((string) $_GET['error']) ?></div>
          <?php endif; ?>
          
          <!-- Search, Filter, en Sort  -->
          <form method="GET" action="/admin/dashboard" class="mb-4">
            <div class="row g-2">
              <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search users..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
              </div>
              <div class="col-md-3">
                <select name="sort" class="form-select">
                  <option value="registration_date" <?= (($_GET['sort'] ?? '') === 'registration_date') ? 'selected' : '' ?>>Registration Date</option>
                  <option value="name" <?= (($_GET['sort'] ?? '') === 'name') ? 'selected' : '' ?>>Name</option>
                  <option value="email" <?= (($_GET['sort'] ?? '') === 'email') ? 'selected' : '' ?>>Email</option>
                </select>
              </div>
              <div class="col-md-2">
                <select name="direction" class="form-select">
                  <option value="DESC" <?= (($_GET['direction'] ?? '') === 'DESC') ? 'selected' : '' ?>>Descending</option>
                  <option value="ASC" <?= (($_GET['direction'] ?? '') === 'ASC') ? 'selected' : '' ?>>Ascending</option>
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
                    <td><?= htmlspecialchars((string) ($user['user_id'] ?? '')) ?></td>
                    <td><?= htmlspecialchars($user['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($user['email'] ?? '') ?></td>
                    <td><?= htmlspecialchars($user['phone_number'] ?? '') ?></td>
                    <td><?= htmlspecialchars($user['role'] ?? '') ?></td>
                    <td><?= htmlspecialchars($user['registration_date'] ?? '') ?></td>
                    <td>
                      <a href="/admin/edit?id=<?= htmlspecialchars((string) ($user['user_id'] ?? '')) ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a href="/admin/delete?id=<?= htmlspecialchars((string) ($user['user_id'] ?? '')) ?>" 
                         class="btn btn-sm btn-danger btn-delete-user" 
                         data-id="<?= htmlspecialchars((string) ($user['user_id'] ?? '')) ?>">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      
      <!-- Dashboard: Tickets (shows) -->
    <div class="tab-pane fade" id="tickets" role="tabpanel" aria-labelledby="tickets-tab">
      <div class="my-3">
        <h3>Tickets &amp; Availabilities</h3>
        
        <a href="/show/create" class="btn btn-success mb-3">Create New Show</a>
        
        <?php if (empty($shows)): ?>
          <p>No shows found.</p>
        <?php else: ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Price</th>
                <th>Location</th> 
                <th>Available Spots</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($shows as $show): ?>
                <tr>
                  <td><?= htmlspecialchars($show['show_id'] ?? '') ?></td>
                  <td><?= htmlspecialchars($show['show_name'] ?? '') ?></td>
                  <td><?= htmlspecialchars($show['start_date'] ?? '') ?></td>
                  <td><?= htmlspecialchars($show['price'] ?? '') ?></td>
                  <td><?= htmlspecialchars($show['venue_name'] ?? '') ?></td>
                  <td><?= htmlspecialchars($show['available_spots'] ?? '') ?></td>
                  <td>
                    <a href="/show/edit?id=<?= htmlspecialchars($show['show_id'] ?? '') ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="/show/destroy" method="POST" style="display:inline;">
                      <input type="hidden" name="show_id" value="<?= htmlspecialchars($show['show_id'] ?? '') ?>">
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>
    </div>

      
    </div> 
  </div> 
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/js/admin.js"></script>
</body>
</html>
