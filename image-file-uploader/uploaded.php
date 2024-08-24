<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';


if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0755, true);
}

if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
    $uploaded_image_file = $upload_directory . basename($_FILES['image_file']['name']);
    $temporary_file = $_FILES['image_file']['tmp_name'];

    
    if (move_uploaded_file($temporary_file, $uploaded_image_file)) {
        echo 'Image uploaded successfully.<br>';
        echo '<img src="' . $relative_path . basename($_FILES['image_file']['name']) . '" alt="Uploaded Image" style="max-width:100%; height:auto;">';
    } else {
        echo 'Failed to upload file';
    }
} else {
    echo 'No file uploaded or upload error';
}

exit;
?>
