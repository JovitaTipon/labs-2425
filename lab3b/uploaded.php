<?php
$upload_directory = getcwd() . '/uploads/';
$uploaded_audio_file = $upload_directory . basename($_FILES['audio_file']['name']);
$temporary_file = $_FILES['audio_file']['tmp_name'];

$uploaded_video_file = $upload_directory . basename($_FILES['video_file']['name']);
$temporary_file = $_FILES['video_file']['tmp_name'];


if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0777, true);
}

if ($_FILES['audio_file']['type'] == 'audio/mpeg' && pathinfo($_FILES['audio_file']['name'], PATHINFO_EXTENSION) == 'mp3') {
    if (move_uploaded_file($temporary_file, $uploaded_audio_file)) {
        echo "MP3 uploaded successfully!";
        echo "<a href='/uploads/" . basename($_FILES['audio_file']['name']) . "'>Listen to MP3</a>";
    } else {
        echo "Failed to upload MP3 file.";
    }
} else {
    echo "Please upload a valid MP3 file.";
}
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

$uploaded_pdf_file = $upload_directory . basename($_FILES['pdf_file']['name']);
$temporary_file = $_FILES['pdf_file']['tmp_name'];

if ($_FILES['pdf_file']['type'] == 'application/pdf') {
    if (move_uploaded_file($temporary_file, $uploaded_pdf_file)) {
        echo "PDF uploaded successfully!";
        echo "<a href='/uploads/" . basename($_FILES['pdf_file']['name']) . "'>View PDF</a>";
    } else {
        echo "Failed to upload PDF file.";
    }
} else {
    echo "Please upload a valid PDF file.";
}

$allowed_video_types = ['video/mp4'];

if (in_array($_FILES['video_file']['type'], $allowed_video_types)) {
    if (move_uploaded_file($temporary_file, $uploaded_video_file)) {
        echo "MP4 video uploaded successfully!";
        echo "<video width='320' height='240' controls>
                <source src='/uploads/" . basename($_FILES['video_file']['name']) . "' type='video/mp4'>
                Your browser does not support the video tag.
              </video>";
    } else {
        echo "Failed to upload MP4 video.";
    }
} else {
    echo "Please upload a valid MP4 video file.";
}

exit;