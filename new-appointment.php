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
<body>

<?php include 'header.php'; ?>
<div class="main-container">
  <?php include 'sidebar.php'; ?>
  <div class="content-container">
    <h2>New Appointment</h2>
    <form class="appointment-form" method="POST" action="insert_appointment.php">
      <label for="patientName">Patient Name</label>
      <input type="text" id="patientName" name="patientName" placeholder="Enter patient name" required>
      
      <label for="doctor">Select Doctor</label>
      <select id="doctor" name="doctor" required>
        <option value="">-- Select a Doctor --</option>
        <option value="Dr. Ahmed Ali">Dr. Ahmed Ali (Cardiologist)</option>
        <option value="Dr. Fatima Saeed">Dr. Fatima Saeed (Dermatologist)</option>
        <option value="Dr. Mohammed Khalid">Dr. Mohammed Khalid (Pediatrician)</option>
      </select>
      
      <label for="appointmentDate">Appointment Date</label>
      <input type="date" id="appointmentDate" name="appointmentDate" required>
      
      <label for="appointmentTime">Appointment Time</label>
      <input type="time" id="appointmentTime" name="appointmentTime" required>
      
      <button type="submit">Create Appointment</button>
    </form>
  </div>
</div>
<?php include 'footer.php'; ?>
