<!doctype html>
<html id="html" lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediCare Hub - Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".tab").click(function () {
        $(".tab-content").hide();
        const target = $(this).attr("data-target");
        $(`#${target}`).show();
        $(".tab").removeClass("active");
        $(this).addClass("active");
      });
      $(".tab:first").click(); // Activate the first tab on load
    });
  </script>

</head>
<body> <?php include 'header.php'; ?>
<div class="main-container">
  <?php include 'sidebar.php'; ?>
  <div class="content-container">
    <h2>Appointment Details</h2>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Database connection
        $conn = new mysqli("localhost", "root", "", "MediCareHub");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch appointment details
        $result = $conn->query("SELECT * FROM appointments WHERE id = $id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><strong>Patient Name:</strong> " . $row['patient_name'] . "</p>";
            echo "<p><strong>Doctor:</strong> " . $row['doctor_name'] . "</p>";
            echo "<p><strong>Date:</strong> " . $row['appointment_date'] . "</p>";
            echo "<p><strong>Time:</strong> " . $row['appointment_time'] . "</p>";
        } else {
            echo "<p>Appointment not found.</p>";
        }

        $conn->close();
    } else {
        echo "<p>No appointment ID provided.</p>";
    }
    ?>
    <button onclick="window.location.href='appointments.php'">Back to Appointments</button>
  </div>
</div>
<?php include 'footer.php'; ?>
