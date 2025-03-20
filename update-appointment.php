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
    <h2>Update Appointment</h2>
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
            ?>
            <form class="appointment-form" method="POST" action="save_appointment.php">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <label for="patientName">Patient Name</label>
              <input type="text" id="patientName" name="patientName" value="<?php echo $row['patient_name']; ?>" required>
              
              <label for="doctor">Select Doctor</label>
              <select id="doctor" name="doctor" required>
                <option value="Dr. Ahmed Ali" <?php if ($row['doctor_name'] == "Dr. Ahmed Ali") echo "selected"; ?>>Dr. Ahmed Ali (Cardiologist)</option>
                <option value="Dr. Fatima Saeed" <?php if ($row['doctor_name'] == "Dr. Fatima Saeed") echo "selected"; ?>>Dr. Fatima Saeed (Dermatologist)</option>
                <option value="Dr. Mohammed Khalid" <?php if ($row['doctor_name'] == "Dr. Mohammed Khalid") echo "selected"; ?>>Dr. Mohammed Khalid (Pediatrician)</option>
              </select>
              
              <label for="appointmentDate">Appointment Date</label>
              <input type="date" id="appointmentDate" name="appointmentDate" value="<?php echo $row['appointment_date']; ?>" required>
              
              <label for="appointmentTime">Appointment Time</label>
              <input type="time" id="appointmentTime" name="appointmentTime" value="<?php echo $row['appointment_time']; ?>" required>
              
              <button type="submit">Save Changes</button>
            </form>
            <?php
        } else {
            echo "<p>Appointment not found.</p>";
        }

        $conn->close();
    } else {
        echo "<p>No appointment ID provided.</p>";
    }
    ?>
  </div>
</div>
<?php include 'footer.php'; ?>
