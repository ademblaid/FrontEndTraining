<?php
// Include the database connection code
require 'db_connection.php'; // Adjust the path as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // Get selected job types as an array
    $jobTypes = isset($_POST['job-type']) ? $_POST['job-type'] : array();

    // Convert job types array into a comma-separated string
    $jobTypesString = implode(', ', $jobTypes);

    // Prepare and execute the SQL query
    $sql = "INSERT INTO newsletter (name, email, job_type)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $jobTypesString);
    $success = mysqli_stmt_execute($stmt);

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);

    if ($success) {
        echo "Subscription successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
