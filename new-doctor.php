<?php include 'header.php'; ?>
<div class="main-container">
  <?php include 'sidebar.php'; ?>
  <div class="content-container">
    <h2>New Doctor</h2>
    <form class="doctor-form" method="POST" action="insert_doctor.php">
      <label for="name">Doctor Name</label>
      <input type="text" id="name" name="name" placeholder="Enter doctor name" required>
      
      <label for="specialty">Specialty</label>
      <input type="text" id="specialty" name="specialty" placeholder="Enter specialty" required>
      
      <label for="phone">Phone</label>
      <input type="text" id="phone" name="phone" placeholder="Enter phone number">
      
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter email address">
      
      <button type="submit">Add Doctor</button>
    </form>
  </div>
</div>
<?php include 'footer.php'; ?>
