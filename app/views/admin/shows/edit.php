<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Show</title>
  <link rel="stylesheet" href="/style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/../../partials/admin_header.php'; ?>
  <div class="container my-5">
    <h2>Edit Show</h2>
    <form method="POST" action="/show/update">
      <input type="hidden" name="show_id" value="<?= htmlspecialchars((string) ($show['show_id'] ?? '')) ?>">
      
      <div class="mb-3">
        <label for="show_name" class="form-label">Show Name:</label>
        <input type="text" name="show_name" id="show_name" class="form-control" 
               value="<?= htmlspecialchars($show['show_name'] ?? '') ?>" required>
      </div>
      
      <div class="mb-3">
            <label for="event_date" class="form-label">Event Date and Time:</label>
            <input type="datetime-local" name="event_date" id="event_date" class="form-control"
         value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($show['start_date'] ?? ''))) ?>"
         min="<?= date('Y-m-d\TH:i'); ?>" required>
    </div>
      
      <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control" 
               value="<?= htmlspecialchars((string) ($show['price'] ?? '')) ?>" required>
      </div>
      
      <div class="mb-3">
        <label for="location_id" class="form-label">Location:</label>
        <select name="location_id" id="location_id" class="form-select" required>
            <option value="">Select a location</option>
            <?php foreach ($locations as $location): 
            $selected = ($location->getLocationId() == ($show['location_id'] ?? '')) ? 'selected' : ''; 
            ?>
            <option value="<?= htmlspecialchars($location->getLocationId()); ?>" <?= $selected; ?>>
                <?= htmlspecialchars($location->getVenueName()); ?>
            </option>
            <?php endforeach; ?>
        </select>
        </div>

      
      <div class="mb-3">
        <label for="available_spots" class="form-label">Available Spots:</label>
        <input type="number" name="available_spots" id="available_spots" class="form-control" 
               value="<?= htmlspecialchars((string) ($show['available_spots'] ?? '')) ?>">
      </div>
      
      <button type="submit" class="btn btn-primary">Update Show</button>
      <a href="/admin/dashboard" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
