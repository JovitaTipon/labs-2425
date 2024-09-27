<?php
$upload_directory = getcwd() . '/uploads/';
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

exit;