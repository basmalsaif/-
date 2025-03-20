<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointments - MediCare Hub</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body> <?php include 'header.php'; ?>
<div class="main-container">
  <?php include 'sidebar.php'; ?>
  <div class="content-container">
    <h2>Manage Your Appointments</h2>
    
    <!-- Button to Create a New Appointment -->
    <div class="appointment-actions">
      <button onclick="window.location.href='new-appointment.php'">Make New Appointment</button>
      <button onclick="viewLastAppointments()">View Last Appointments</button>
    </div>

    <!-- Appointments Table -->
    <section class="appointments-list">
      <h3>Appointments</h3>
      <table id="appointmentsTable">
        <thead>
          <tr>
            <th>Appointment ID</th>
            <th>Patient Name</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Database connection
          $conn = new mysqli("localhost", "root", "", "MediCareHub");

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Fetch appointments
          $result = $conn->query("SELECT * FROM appointments ORDER BY appointment_date DESC");

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$row['id']}</td>
                      <td>{$row['patient_name']}</td>
                      <td>{$row['doctor_name']}</td>
                      <td>{$row['appointment_date']}</td>
                      <td>{$row['appointment_time']}</td>
                      <td>
                        <button onclick=\"viewAppointment({$row['id']})\">View</button>
                        <button onclick=\"updateAppointment({$row['id']})\">Update</button>
                        <button onclick=\"deleteAppointment({$row['id']})\">Delete</button>
                      </td>
                    </tr>";
            }
          } else {
            echo "<tr><td colspan='6'>No appointments found</td></tr>";
          }

          $conn->close();
          ?>
        </tbody>
      </table>
    </section>
  </div>
</div>
<?php include 'footer.php'; ?>

<script>
  // View appointment details
  function viewAppointment(id) {
    window.location.href = `view-appointment.php?id=${id}`;
  }

  // Update appointment
  function updateAppointment(id) {
    window.location.href = `update-appointment.php?id=${id}`;
  }

  // Delete appointment
  function deleteAppointment(id) {
    if (confirm("Are you sure you want to delete this appointment?")) {
      // AJAX request to delete the appointment
      fetch(`delete-appointment.php?id=${id}`, { method: 'GET' })
        .then(response => response.text())
        .then(data => {
          alert(data);
          location.reload();
        })
        .catch(error => console.error('Error:', error));
    }
  }

  // View last appointments
  function viewLastAppointments() {
    alert("Feature to display last appointments can be implemented here!");
  }
</script>
