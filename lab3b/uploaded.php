<?php
$upload_directory = getcwd() . '/uploads/';
$uploaded_image_file = $upload_directory . basename($_FILES['image_file']['name']);
$temporary_file = $_FILES['image_file']['tmp_name'];

if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0777, true);
}

$allowed_image_types = ['image/jpeg', 'image/png', 'image/gif'];

if (in_array($_FILES['image_file']['type'], $allowed_image_types)) {
    if (move_uploaded_file($temporary_file, $uploaded_image_file)) {
        echo "Image uploaded successfully!";
        echo "<img src='/uploads/" . basename($_FILES['image_file']['name']) . "' alt='Uploaded Image' />";
    } else {
        echo "Failed to upload image file.";
    }
} else {
    echo "Please upload a valid image file (jpg, png, gif).";
}

exit;