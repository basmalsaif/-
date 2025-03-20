<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $patient_name = $_POST['patientName'];
    $doctor_name = $_POST['doctor'];
    $appointment_date = $_POST['appointmentDate'];
    $appointment_time = $_POST['appointmentTime'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "MediCareHub");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update appointment
    $sql = "UPDATE appointments 
            SET patient_name='$patient_name', doctor_name='$doctor_name', appointment_date='$appointment_date', appointment_time='$appointment_time' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment updated successfully.";
    } else {
        echo "Error updating appointment: " . $conn->error;
    }

    $conn->close();
}
?>
