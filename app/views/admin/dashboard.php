<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - User Management</title>
    <link rel="stylesheet" href="/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script>
    function confirmDelete(userId) {
        if (confirm("Are you sure you want to delete this user? This action cannot be undone.")) {
            // Navigate to the delete confirmation view instead of directly destroying.
            window.location.href = "/admin/delete?id=" + userId;
        }
    }
</script>

</head>
<body>
    <?php include __DIR__ . '/../partials/admin_header.php'; ?>
    <div class="container my-5">
        <h2>User Management Dashboard</h2>
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
    </body>
</html>
