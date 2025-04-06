<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../../partials/admin_header.php'; ?>
    <div class="container my-5">
        <h2>Create New User</h2>
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST" action="/admin/create">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select name="role" id="role" class="form-select">
                    <option value="customer">Customer</option>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create User</button>
            <a href="/admin/dashboard" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
