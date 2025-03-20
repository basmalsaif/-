<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = new mysqli("localhost", "root", "", "MediCareHub");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM doctors WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Doctor deleted successfully.";
    } else {
        echo "Error deleting doctor: " . $conn->error;
    }

    $conn->close();
} else {
    echo "No doctor ID provided.";
}
?>
