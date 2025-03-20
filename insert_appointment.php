<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Add your MySQL password if applicable
$dbname = "MediCareHub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $patient_name = $_POST['patientName'];
    $doctor_name = $_POST['doctor'];
    $appointment_date = $_POST['appointmentDate'];
    $appointment_time = $_POST['appointmentTime'];

    // Insert data into the appointments table
    $sql = "INSERT INTO appointments (patient_name, doctor_name, appointment_date, appointment_time) 
            VALUES ('$patient_name', '$doctor_name', '$appointment_date', '$appointment_time')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
