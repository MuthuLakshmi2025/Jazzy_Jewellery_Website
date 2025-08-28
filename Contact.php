<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact | Jazzy Jewels</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: url('login.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', sans-serif;
      color: white;
    }
    .overlay {
      background: rgba(63, 10, 84, 0.75); 
      min-height: 100vh;
      padding: 20px;
    }

    .brand-color {
      color: #ba68c8;
    }

    .btn-purple {
      background-color: #8e24aa;
      color: #fff;
      border: none;
    }

    .navbar {
      background-color: white !important;
    }

    .form-control {
      background-color: #f5e6ff;
      border: 1px solid #d1a4e3;
      color: #4a0072;
    }

    .form-control:focus {
      border-color: #9c27b0;
      box-shadow: 0 0 0 0.2rem rgba(156, 39, 176, 0.25);
    }

    label {
      color: #f3e5f5;
    }

    .container h5, .container p {
      color: #f3e5f5;
    }

    footer {
      text-align: center;
      color: #ccc;
      padding-top: 20px;
    }
  </style>
</head>
<body>
  <div class="overlay">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand brand-color fw-bold" href="#">
          <img src="logo.jpg" height="30px" width="30px" alt="Logo"> JAZZY JEWELS
        </a>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="homePage1.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="About.html">About</a></li>
          <li class="nav-item"><a class="nav-link active" href="Contact.php">Contact</a></li>
        </ul>
      </div>
    </nav>

    <section class="py-5">
      <div class="container">
        <h2 class="text-center brand-color mb-4">Get in Touch</h2>
        <div class="row">
          <div class="col-md-6 mb-4">
            <h5>Contact Information</h5>
            <p><strong>Address:</strong> 123 Gemstone Lane, Sparkle City, India</p>
            <p><strong>Email:</strong> contact@jazzyjewels.com</p>
            <p><strong>Phone:</strong> +91 98765 43210</p>
          </div>
          <div class="col-md-6">
            <form method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="yname" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="yemail" required>
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea class="form-control" id="message" name="ymess" rows="4" required></textarea>
              </div>
              <button type="submit" class="btn btn-purple" name="submit">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer>
      &copy; <span id="year"></span> Jazzy Jewels. All rights reserved.
    </footer>
  </div>

  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>

  <?php
    include './connect_db.php';
    if (isset($_POST['submit'])) {
        $yn = $_POST['yname'];
        $ye = $_POST['yemail'];
        $ym = $_POST['ymess'];

        $sql = "INSERT INTO contact_details (your_name, your_email, your_message) VALUES ('$yn', '$ye', '$ym')";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Message Sent Successfully')</script>";
        } else {
            echo "<script>alert('Error in Message Sending')</script>";
        }
    }
  ?>
</body>
</html>
