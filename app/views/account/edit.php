<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Account</title>
  <link rel="stylesheet" href="/style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../header.php'; ?>
<div class="container my-5">
    <h2>Edit Account</h2>
    <?php if(isset($_GET['error'])): ?>
      <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>
    <form method="POST" action="/account/update">
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
      <!-- For password changes -->
      <div class="mb-3">
        <label for="current_password" class="form-label">Current Password (required to change password):</label>
        <input type="password" name="current_password" id="current_password" class="form-control">
      </div>
      <div class="mb-3">
        <label for="new_password" class="form-label">New Password (leave blank to keep current):</label>
        <input type="password" name="new_password" id="new_password" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Update Account</button>
      <a href="/" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
