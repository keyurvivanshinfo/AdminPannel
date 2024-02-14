<?php
// download.php

if (isset($_GET['file'])) {
    $filename = $_GET['file'];

    // Specify the path to the directory where images are stored
    $filepath = '../images/' . $filename;

    // Check if the file exists
    if (file_exists($filepath)) {
        // Set headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        // File not found
       
        echo "<script> alert('File not found');
        window.location.href='../views/show_images.php'
        </script>";
    }
} else {
    // File parameter not provided
    echo "<script> alert('Invalid request');
    window.location.href='../views/show_images.php'
    </script>";
    
}
?>