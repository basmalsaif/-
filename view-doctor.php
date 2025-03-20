<?php include 'header.php'; ?>
<div class="main-container">
  <?php include 'sidebar.php'; ?>
  <div class="content-container">
    <h2>Doctor Details</h2>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $conn = new mysqli("localhost", "root", "", "MediCareHub");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query("SELECT * FROM doctors WHERE id = $id");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><strong>Name:</strong> {$row['name']}</p>";
            echo "<p><strong>Specialty:</strong> {$row['specialty']}</p>";
            echo "<p><strong>Phone:</strong> {$row['phone']}</p>";
            echo "<p><strong>Email:</strong> {$row['email']}</p>";
        } else {
            echo "<p>Doctor not found.</p>";
        }

        $conn->close();
    } else {
        echo "<p>No doctor ID provided.</p>";
    }
    ?>
    <button onclick="window.location.href='manage-doctors.php'">Back to Doctors</button>
  </div>
</div>
<?php include 'footer.php'; ?>
