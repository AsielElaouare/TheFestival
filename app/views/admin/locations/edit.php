<!-- views/admin/locations/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Location</title>
    <link rel="stylesheet" href="/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../../partials/admin_header.php'; ?>
<div class="container my-5">
    <h2>Edit Location</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="/location/edit">
        <input type="hidden" name="location_id" value="<?= htmlspecialchars($location->getLocationId()) ?>">

        <div class="mb-3">
            <label for="venue_name" class="form-label">Venue Name:</label>
            <input type="text" name="venue_name" id="venue_name" class="form-control" 
                   value="<?= htmlspecialchars($location->getVenueName()) ?>" required>
        </div>
        <div class="mb-3">
            <label for="postal_code" class="form-label">Postal Code:</label>
            <input type="text" name="postal_code" id="postal_code" class="form-control"
                   value="<?= htmlspecialchars($location->getPostalCode()) ?>" required>
        </div>
        <div class="mb-3">
            <label for="street_name" class="form-label">Street Name:</label>
            <input type="text" name="street_name" id="street_name" class="form-control"
                   value="<?= htmlspecialchars($location->getStreetName()) ?>" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City:</label>
            <input type="text" name="city" id="city" class="form-control"
                   value="<?= htmlspecialchars($location->getCity()) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/location/index" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
