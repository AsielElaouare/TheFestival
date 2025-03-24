<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Locations</title>
    <link rel="stylesheet" href="/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../../partials/admin_header.php'; ?>
<div class="container my-5">
    <h2>Manage Locations</h2>
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['message']) ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <a href="/location/create" class="btn btn-success mb-3">Create New Location</a>
    <!-- New button to return to the admin dashboard -->
    <a href="/admin/dashboard" class="btn btn-secondary mb-3">Return to Dashboard</a>

    <?php if (empty($locations)): ?>
        <p>No locations found.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Location ID</th>
                <th>Venue Name</th>
                <th>Postal Code</th>
                <th>Street Name</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($locations as $loc): ?>
                <tr>
                    <td><?= htmlspecialchars($loc->getLocationId()) ?></td>
                    <td><?= htmlspecialchars($loc->getVenueName()) ?></td>
                    <td><?= htmlspecialchars($loc->getPostalCode()) ?></td>
                    <td><?= htmlspecialchars($loc->getStreetName()) ?></td>
                    <td><?= htmlspecialchars($loc->getCity()) ?></td>
                    <td>
                        <a href="/location/edit?id=<?= $loc->getLocationId() ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/location/delete?id=<?= $loc->getLocationId() ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
