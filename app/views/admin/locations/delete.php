<!-- views/admin/locations/delete.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Location</title>
    <link rel="stylesheet" href="/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../../partials/admin_header.php'; ?>
<div class="container my-5">
    <h2>Confirm Delete</h2>
    <p>Are you sure you want to delete location "<strong><?= htmlspecialchars($location->getVenueName()) ?></strong>"?</p>
    <form method="POST" action="/location/destroy">
        <input type="hidden" name="location_id" value="<?= htmlspecialchars($location->getLocationId()) ?>">
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="/location/index" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
