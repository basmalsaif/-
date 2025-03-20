<?php include 'header.php'; ?>
<div class="main-container">
  <?php include 'sidebar.php'; ?>
  <div class="content-container">
<h2>Manage Doctors</h2>

    <!-- Button to Add a New Doctor -->
    <div class="doctor-actions">
      <button onclick="window.location.href='new-doctor.php'">Add New Doctor</button>
      <button onclick="viewLastDoctors()">View Last Doctors</button>
    </div>

    <!-- Doctors Table -->
    <section class="doctors-list">
      <h3>Doctors</h3>
      <table id="doctorsTable">
        <thead>
          <tr>
            <th>Doctor ID</th>
            <th>Name</th>
            <th>Specialty</th>
            <th>Phone</th>
            <th>Email</th>
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

          // Fetch doctors
          $result = $conn->query("SELECT * FROM doctors ORDER BY created_at DESC");

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$row['id']}</td>
                      <td>{$row['name']}</td>
                      <td>{$row['specialty']}</td>
                      <td>{$row['phone']}</td>
                      <td>{$row['email']}</td>
                      <td>
                        <button onclick=\"viewDoctor({$row['id']})\">View</button>
                        <button onclick=\"updateDoctor({$row['id']})\">Update</button>
                        <button onclick=\"deleteDoctor({$row['id']})\">Delete</button>
                      </td>
                    </tr>";
            }
          } else {
            echo "<tr><td colspan='6'>No doctors found</td></tr>";
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
  // View doctor details
  function viewDoctor(id) {
    window.location.href = `view-doctor.php?id=${id}`;
  }

  // Update doctor
  function updateDoctor(id) {
    window.location.href = `update-doctor.php?id=${id}`;
  }

  // Delete doctor
  function deleteDoctor(id) {
    if (confirm("Are you sure you want to delete this doctor?")) {
      // AJAX request to delete the doctor
      fetch(`delete-doctor.php?id=${id}`, { method: 'GET' })
        .then(response => response.text())
        .then(data => {
          alert(data);
          location.reload();
        })
        .catch(error => console.error('Error:', error));
    }
  }

  // View last doctors
  function viewLastDoctors() {
    alert("Feature to display last added doctors can be implemented here!");
  }
</script>