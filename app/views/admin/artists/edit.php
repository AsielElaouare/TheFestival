<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Artist</title>
  <link rel="stylesheet" href="/style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../../partials/admin_header.php'; ?>
<div class="container my-5">
  <h2>Edit Artist</h2>
  <?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
  <?php endif; ?>

  <form method="POST" action="/artist/update">
    <input type="hidden" name="artist_id" value="<?= htmlspecialchars($artist['artist_id']); ?>">
    <div class="mb-3">
      <label for="name" class="form-label">Artist Name:</label>
      <input type="text" name="name" id="name" class="form-control"
             value="<?= htmlspecialchars($artist['name']); ?>" required>
    </div>
    <div class="mb-3">
      <label for="genre" class="form-label">Genre:</label>
      <input type="text" name="genre" id="genre" class="form-control"
             value="<?= htmlspecialchars($artist['genre']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Artist</button>
    <a href="/artist/index" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
