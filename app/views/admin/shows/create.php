<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/" />
    <meta charset="UTF-8">
    <title>Create Show</title>
    <link rel="stylesheet" href="/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/../../partials/admin_header.php'; ?>
  <div class="container my-5">
      <h2>Create New Show</h2>
      
      <?php if(isset($error)): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
      <?php endif; ?>
      
      <form method="POST" action="/show/store">
          <div class="mb-3">
              <label for="show_name" class="form-label">Show Name:</label>
              <input type="text" name="show_name" id="show_name" class="form-control" required>
          </div>
          <div class="mb-3">
              <label for="event_date" class="form-label">Event Date and Time:</label>
              <input type="datetime-local" name="event_date" id="event_date" class="form-control"
                     min="<?= date('Y-m-d\TH:i'); ?>" required>
          </div>
          <div class="mb-3">
              <label for="price" class="form-label">Price:</label>
              <input type="number" step="0.01" name="price" id="price" class="form-control" required>
          </div>
          <div class="mb-3">
              <label for="location_id" class="form-label">Location:</label>
              <select name="location_id" id="location_id" class="form-select" required>
                  <option value="">Select a location</option>
                  <?php foreach ($locations as $location): ?>
                  <option value="<?= htmlspecialchars($location->getLocationId()); ?>">
                      <?= htmlspecialchars($location->getVenueName()); ?>
                  </option>
                  <?php endforeach; ?>
              </select>
          </div>
          <!-- New Artist Dropdown -->
          <div class="mb-3">
              <label for="artist_id" class="form-label">Artist:</label>
              <select name="artist_id" id="artist_id" class="form-select" required>
                  <option value="">Select an artist</option>
                  <?php foreach ($artists as $artist): ?>
                  <option value="<?= htmlspecialchars($artist['artist_id'] ?? ''); ?>">
                      <?= htmlspecialchars($artist['name'] ?? ''); ?> (<?= htmlspecialchars($artist['genre'] ?? ''); ?>)
                  </option>
                  <?php endforeach; ?>
              </select>
          </div>
          <div class="mb-3">
              <label for="available_spots" class="form-label">Available Spots:</label>
              <input type="number" name="available_spots" id="available_spots" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Create Show</button>
          <a href="/admin/dashboard" class="btn btn-secondary">Cancel</a>
      </form>
  </div>
</body>
</html>
