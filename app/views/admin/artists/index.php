<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Artists</title>
  <link rel="stylesheet" href="/style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../../partials/admin_header.php'; ?>
<div class="container my-5">
  <h2>Manage Artists</h2>
  
  <?php if (isset($_GET['message'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($_GET['message']) ?></div>
  <?php endif; ?>
  
  <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
  <?php endif; ?>
  
  <a href="/artist/create" class="btn btn-success mb-3">Create New Artist</a>
  <a href="/admin/dashboard" class="btn btn-secondary mb-3">Return to Dashboard</a>
  
  <?php if (empty($artists)): ?>
    <p>No artists found.</p>
  <?php else: ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Artist ID</th>
          <th>Name</th>
          <th>Genre</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($artists as $artist): ?>
          <tr>
            <td><?= htmlspecialchars($artist['artist_id']); ?></td>
            <td><?= htmlspecialchars($artist['name']); ?></td>
            <td><?= htmlspecialchars($artist['genre']); ?></td>
            <td>
              <a href="/artist/edit?id=<?= $artist['artist_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="/artist/delete?id=<?= $artist['artist_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
</body>
</html>
