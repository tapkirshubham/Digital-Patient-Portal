<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login Page</title>
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="admin.css">
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
        <div class="headingindxadmin">Admin <br>Login-Page</div>
    </div>
    <main>
        <section id="patient-queries" class="card">
          <h2>Patient Queries</h2>
          <iframe src="admin_queries.php" style="width:100%; height:400px; border:none;"></iframe>
        </section>

      
        <section id="doctor-queries" class="card">
          <h2>Doctor Queries</h2>
          <iframe src="admin_doctor_queries.php" style="width:100%; height:400px; border:none;"></iframe>
        </section>

      
        <!-- <section id="add-doctor" class="card"> -->
          
          <form id="add-doctor" class="card" method="POST" action="add_doctor.php" class="appointment-form">
            <h2>Add New Doctor</h2>
            <label for="doctor_name">Doctor Name:</label>
            <input type="text" id="doctor_name" name="doctor_name" required />

            <label for="specialty">Specialty:</label>
            <input type="text" id="specialty" name="specialty" required />

            <label for="timings">Timings:</label>
            <input type="text" id="timings" name="timings" required />

            <label for="days">Days Available:</label>
            <input type="text" id="days" name="days" required />

            <input type="submit" value="Add Doctor" class="opdsub" />
          </form>

        <!-- </section> -->
      
        <!-- <section id="add-patient" class="card">
          <h2>Add New Patient</h2>
          <form action="admin_backend.php" method="POST" class="form">
            <input type="hidden" name="add_patient" value="1">
            <input type="text" name="patient-name" placeholder="Patient Name" required>
            <input type="number" name="age" placeholder="Age" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone" required>
             <input type="text" name="patient_id" placeholder="Enter Patient ID" required>
            <input type="password" name="patient_password" placeholder="Create Password" required>
            <button type="submit">Add Patient</button>
          </form>
        </section> -->
      <section id="remove-patient" class="card">
        <form action="remove_doctor.php" method="post">
        <label for="doctor_id">Select Doctor to Remove:</label><br><br>
  
      <select name="doctor_id" id="doctor_id" required>
        <option value="">-- Select Doctor --</option>
        <?php
        $conn = new mysqli("localhost", "root", "", "hospital_management_system", "3308");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
      
        $sql = "SELECT id, doctor_name FROM doctors";
        $result = $conn->query($sql);
      
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['doctor_name']) . '</option>';
            }
        } else {
            echo '<option disabled>No doctors found</option>';
        }
      
        $conn->close();
        ?>
      </select>
      <br><br>

        <button type="submit">Remove Doctor</button>
        </form>
  </section>

          
          <!-- <section class="card">
            <h2>Remove Patient</h2>
            <form action="admin_backend.php" method="POST" class="form">
              <input type="text" name="patient_id" placeholder="Enter Patient ID or Email" required>
              <button type="submit" class="remove-btn">Remove Patient</button>
            </form>
          </section> -->
          
      </main>
      
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