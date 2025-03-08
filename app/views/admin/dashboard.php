<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - User & Ticket Management</title>
  <link rel="stylesheet" href="/style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script>
    // For user deletion confirmation (Users tab)
    function confirmDelete(userId) {
      if (confirm("Are you sure you want to delete this user? This action cannot be undone.")) {
        // Navigate to the delete confirmation page for the user.
        window.location.href = "/admin/users/delete?id=" + userId;
      }
    }

    // For event deletion confirmation (Tickets & Availabilities tab)
    function confirmDeleteEvent(eventId) {
      if (confirm("Are you sure you want to delete this event? This action cannot be undone.")) {
        // Placeholder: Navigate to a delete route for events
        window.location.href = "/admin/events/delete?id=" + eventId;
      }
    }
  </script>
</head>
<body>
  <?php include __DIR__ . '/../partials/admin_header.php'; ?>
  <div class="container my-5">
    <h2>Admin Dashboard</h2>

    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" id="dashboardTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="true">Users</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tickets-tab" data-bs-toggle="tab" data-bs-target="#tickets" type="button" role="tab" aria-controls="tickets" aria-selected="false">Tickets & Availabilities</button>
      </li>
    </ul>
    
    <!-- Tab Content -->
    <div class="tab-content" id="dashboardTabContent">
      
      <!-- Users Tab Pane -->
      <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
        <div class="my-3">
          <?php if(isset($_GET['message'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['message']); ?></div>
          <?php endif; ?>
          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
          <?php endif; ?>
          
          <!-- Search, Filter, and Sort Form -->
          <form method="GET" action="/admin/dashboard" class="mb-4">
            <div class="row g-2">
              <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search users..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
              </div>
              <div class="col-md-3">
                <select name="sort" class="form-select">
                  <option value="registration_date" <?php if(($_GET['sort'] ?? '')=='registration_date') echo 'selected'; ?>>Registration Date</option>
                  <option value="name" <?php if(($_GET['sort'] ?? '')=='name') echo 'selected'; ?>>Name</option>
                  <option value="email" <?php if(($_GET['sort'] ?? '')=='email') echo 'selected'; ?>>Email</option>
                </select>
              </div>
              <div class="col-md-2">
                <select name="direction" class="form-select">
                  <option value="DESC" <?php if(($_GET['direction'] ?? '')=='DESC') echo 'selected'; ?>>Descending</option>
                  <option value="ASC" <?php if(($_GET['direction'] ?? '')=='ASC') echo 'selected'; ?>>Ascending</option>
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
                    <td><?php echo htmlspecialchars($user['user_id']); ?></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                    <td><?php echo htmlspecialchars($user['registration_date'] ?? ''); ?></td>
                    <td>
                      <a href="/admin/edit?id=<?php echo $user['user_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                      <button onclick="confirmDelete(<?php echo $user['user_id']; ?>)" class="btn btn-sm btn-danger">Delete</button>
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
          <h3>Tickets & Availabilities</h3>
          <p>Below is a placeholder for managing event tickets and their availability limits. You can integrate real data from your database later.</p>
          
          <!-- Example: "Create New Event" or "Add Ticket Type" button -->
          <a href="/admin/events/create" class="btn btn-success mb-3">Create New Event</a>
          
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
              <!-- Placeholder data. Replace with dynamic content from your database. -->
              <tr>
                <td>10</td>
                <td>Jazz Concert</td>
                <td>200</td>
                <td>58</td>
                <td>
                  <a href="/admin/events/edit?id=10" class="btn btn-sm btn-warning">Edit</a>
                  <button onclick="confirmDeleteEvent(10)" class="btn btn-sm btn-danger">Delete</button>
                </td>
              </tr>
              <tr>
                <td>11</td>
                <td>Dance Show</td>
                <td>300</td>
                <td>126</td>
                <td>
                  <a href="/admin/events/edit?id=11" class="btn btn-sm btn-warning">Edit</a>
                  <button onclick="confirmDeleteEvent(11)" class="btn btn-sm btn-danger">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- End of tab-content -->
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
