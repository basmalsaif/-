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
   <!-- Main Content -->
    <div class="content-container">
      <section class="my-systems">
        <h2>Services</h2>
        <div class="systems-grid">
          <div class="system-item"><i class="fa fa-user-md"></i><span>Find a Doctor</span></div>
          <div class="system-item"><i class="fa fa-calendar-alt"></i><span>Book an Appointment</span></div>
          <div class="system-item"><i class="fa fa-file-medical-alt"></i><span>View Reports</span></div>
          <div class="system-item"><i class="fa fa-prescription"></i><span>Prescription Details</span></div>
          <div class="system-item"><i class="fa fa-history"></i><span>Medical History</span></div>
          <div class="system-item"><i class="fa fa-wallet"></i><span>Billing and Payments</span></div>
        </div>
      </section>
    </div>
</div>
<?php include 'footer.php'; ?>
