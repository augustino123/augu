<?php
// Simple authentication (in production, use proper authentication)
$valid_password = 'admin123'; // Change this!
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Admin Area"');
    header('HTTP/1.0 401 Unauthorized');
    die('Unauthorized');
} else {
    if ($_SERVER['PHP_AUTH_PW'] != $valid_password) {
        die('Invalid password');
    }
}

// Create uploads directory if it doesn't exist
if (!file_exists('uploads')) {
    mkdir('uploads', 0755, true);
}

// Get all photos
$photos = glob('uploads/photo_*.{jpg,jpeg,png,gif}', GLOB_BRACE);
rsort($photos); // Newest first
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Total Photos: <?php echo count($photos); ?></p>

        <div class="photos-grid">
            <?php foreach ($photos as $photo): ?>
                <div class="photo-card">
                    <img src="<?php echo htmlspecialchars($photo); ?>" alt="Captured Photo">
                    <div class="photo-meta">
                        <?php echo htmlspecialchars(basename($photo)); ?><br>
                        <?php echo date('F d Y H:i:s', filemtime($photo)); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>