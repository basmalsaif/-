<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "MediCareHub");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete appointment
    $sql = "DELETE FROM appointments WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment deleted successfully.";
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }

    $conn->close();
}
?>
