<?php
// Include the database connection
include('conn.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $namecourse = $_POST['namecourse'];

    // Prepare the SQL statement
    $sql = "INSERT INTO users (firstname, middlename, lastname, age, address, namecourse)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Initialize prepared statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param('ssssss', $firstname, $middlename, $lastname, $age, $address, $namecourse);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect back to index.php with a success message
            header("Location: index.php?status=success");
            exit();
        } else {
            // Redirect back to index.php with an error message
            header("Location: index.php?status=error");
            exit();
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
