<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include __DIR__ . '/../../partials/admin_header.php'; ?>
    <div class="container my-5">
        <h2>Edit User</h2>
        <form method="POST" action="/admin/update">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user->getUserId()); ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($user->getName()); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($user->getEmail()); ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo htmlspecialchars($user->getPhoneNumber()); ?>">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select name="role" id="role" class="form-select">
                    <option value="customer" <?php if($user->getRole()->value === 'customer') echo 'selected'; ?>>Customer</option>
                    <option value="admin" <?php if($user->getRole()->value === 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="employee" <?php if($user->getRole()->value === 'employee') echo 'selected'; ?>>Employee</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password (leave blank to keep current):</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="/admin/dashboard" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
