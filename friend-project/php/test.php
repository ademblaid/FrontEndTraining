<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $selectedCategories = isset($_POST['categories']) ? $_POST['categories'] : [];
    $selectedJobTypes = isset($_POST['jobType']) ? $_POST['jobType'] : [];
    $newsletterCheckbox = isset($_POST['subscribtion']) ? 'Subscribed' : 'Not Subscribed';

    // Display the received data
    echo "Email: $email<br>";
    
    if (!empty($selectedCategories)) {
        echo "Selected Categories: " . implode(', ', $selectedCategories) . "<br>";
    } else {
        echo "No Categories Selected<br>";
    }
    
    if (!empty($selectedJobTypes)) {
        echo "Selected Job Types: " . implode(', ', $selectedJobTypes) . "<br>";
    } else {
        echo "No Job Types Selected<br>";
    }
    
    echo "Newsletter Subscription: $newsletterCheckbox<br>";
}
?>











