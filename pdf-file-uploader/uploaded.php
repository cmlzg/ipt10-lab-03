<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';


if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0755, true);
}

if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
    $uploaded_pdf_file = $upload_directory . basename($_FILES['pdf_file']['name']);
    $temporary_file = $_FILES['pdf_file']['tmp_name'];

    
    if (move_uploaded_file($temporary_file, $uploaded_pdf_file)) {
        echo 'File uploaded successfully.<br>';
        
        echo '<a href="' . $relative_path . basename($_FILES['pdf_file']['name']) . '" target="_blank">View PDF</a>';
    } else {
        echo 'Failed to upload file';
    }
} else {
    echo 'No file uploaded or upload error';
}

exit;
?>