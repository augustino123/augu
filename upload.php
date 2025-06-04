<?php
header('Content-Type: text/plain');

// Create uploads directory if it doesn't exist
if (!file_exists('uploads')) {
    if (!mkdir('uploads', 0755, true)) {
        die('ERROR: Failed to create upload directory');
    }
}

// Check if file was uploaded
if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    die('ERROR: No file uploaded or upload error');
}

// Validate file
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
$file_info = finfo_open(FILEINFO_MIME_TYPE);
$detected_type = finfo_file($file_info, $_FILES['photo']['tmp_name']);
finfo_close($file_info);

if (!in_array($detected_type, $allowed_types)) {
    http_response_code(400);
    die('ERROR: Invalid file type. Only images are allowed.');
}

// Generate safe filename
$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
$safe_filename = 'photo_' . uniqid() . '.' . $extension;
$destination = 'uploads/' . $safe_filename;

// Move the file
if (move_uploaded_file($_FILES['photo']['tmp_name'], $destination)) {
    // Log the upload (you could also store in database)
    file_put_contents('uploads/log.txt', date('Y-m-d H:i:s') . " - " . $safe_filename . "\n", FILE_APPEND);
    echo "SUCCESS: Photo saved as " . $safe_filename;
} else {
    http_response_code(500);
    echo "ERROR: Failed to save file";
}
?>