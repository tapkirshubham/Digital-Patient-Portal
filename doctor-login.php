<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor-Login Page</title>
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="doctor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
  <header>
    <navbar>
        <!-- left nav -->
        <nav1 class="nav1">
            <a href="BloodCenter.html"><button class="btn1">Blood Center</button></a>
            <div class="ambulance">Ambulance:+91 7887351465</div>
            <a class="payment" href="onlinepayment.html">Online Payment</a>
            <!-- Right nav -->
            <div class="right-nav">
                <a href="login.html" class="login">Login</a>
                <a href="contactus.html" class="contact">Contact Us</a>
                <div class="socialmedia">
                  <a href="index.html">
                    <i class="fa-solid fa-house"></i>
                </a>
                <!-- <a href="#">
                    <i class="fa-brands fa-instagram"></i>
                </a> -->
                </div>

            </div>

        </nav1>
        <!-- second nav -->
        <!-- <div class="logo"></div> -->
        <nav2 class="nav2">
                <div class="logo"></div>
                <div class="nav2-ops">
                    <a href="login.html">Book Appointment</a>
                    <a href="aboutus.html">About us</a>
                    <a href="specialities.html">Specialities</a>
                    <a href="opdtimings.php">OPD Timings</a>
                    <a href="InternationalPatient.html">International Patients</a>
                    <a href="empanelment.html">Empanelment</a>
                </div>
                </div>
            </nav2>
    </navbar>
</header>
<content>
    <!-- hero image -->
    <div class="heroimageadmin">
        <div class="headingindxadmin">Doctor<br>Login-Page</div>
    </div>
    <section id="appointments" class="card">
    <h2>Appointments</h2>
    <div id="appointment-list">
        <?php include 'fetch_appointments.php'; ?>
    </div>
    </section>


    <section id="queries" class="card">
    <h2>Patient Queries</h2>
    <div id="query-container">
        <?php include 'fetch_queries.php'; ?>
    </div>
    </section>



    <section id="reports" class="card">
    <h2>Patient Uploaded Reports</h2>
    <div id="report-container">
        <!-- PHP content will be loaded here -->
        <?php include 'fetch_reports.php'; ?>
    </div>
</section>

<div class="upload-form ">
    <h2>Upload Prescription</h2>
    <form action="upload_prescription.php" method="POST" enctype="multipart/form-data">
        <label for="patient_name">Patient Name:</label>
        <input type="text" name="patient_name" required>
        
        <label for="prescription">Upload Prescription (PDF):</label>
        <input type="file" name="prescription" accept="application/pdf" required>
        
        <button type="submit">Upload</button>
    </form>
</div>

<section class="card upload-form">
  <h2>Send Query to Admin</h2>
  <form action="submit_doctor_query.php" method="POST">
  <label for="doctor_name">Doctor Name:</label>
  <input type="text" name="doctor_name" required>

  <label for="query">Your Query:</label>
  <textarea name="query" required></textarea>

  <button type="submit">Submit Query</button>
</form>


</section>

      
</content>
</content>
<footer>
  <div class="footpanel-2">
       <ul>
            <p>Quick Links</p>
            <a href="login.html">Book Appointment</a>
            <a href="aboutus.html">About us</a>
            <a href="specialities.html">Specialities</a>
            <a href="empanelment.html">Empanelment</a>
            <a href="opdtimings.php">Opd Timings</a>
            <a href="InternationalPatient.html">International Patient</a>
        </ul>
      <ul>
          <p>Hospital Address</p>
          <div class="address">
              <p><b>HealthFirst Medical Center</b>
                  <br>Old Charholi road,
                  <br>near Gangotri Enterprises,
                  <br>Chaudhary Park,
                  <br>Dighi, Pune 411015
              </p>
          </div>
      </ul>
      <ul>
          <div class="emergency">
              <p>Hospital Emergency Cases</p>
              Operator:
              <a>+91 788734165</a>
              Ambulance:
              <a>+91 7887351465</a>
              <a>+91 7887351466</a>
              Emergency:
              <a>+91 9850233174</a>
              <a>+91 9850233175</a>
              <a>+91 9850233176</a>
          </div>
      </ul>

      <ul>
          <p>About Hospital</p>
          <div class="about-footer">
              <p>HealthFirst Medical Center is dedicated<br> to providing comprehensive and compassionate<br>
                  healthcare
                  services to the community. Our team of<br> experienced professionals specializes in<br>
                  preventive care, as
                  well as the diagnosis and treatment of<br> various medical conditions, ensuring personalized<br>
                  attention
                  for each patient.
              </p>
          </div>
      </ul>

  </div>
  <div class="copyright">
      © 2024-2025, HealthFirst Medical Center.
  </div>
  </div>
</footer>