<?php
$upload_directory = getcwd() . '/uploads/';
$uploaded_video_file = $upload_directory . basename($_FILES['video_file']['name']);
$temporary_file = $_FILES['video_file']['tmp_name'];


if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0777, true);
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