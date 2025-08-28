<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <style>
    body {
      background: url('loginbg.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', sans-serif;
    }
    .center-box {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .form-container {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 600px;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
    .btn-custom {
      width: 48%;
    }
  </style>

  <script>
    function myfun() {
      var nam = document.forms["register"]["nm"];
      var gend = document.forms["register"]["gen"];
      var dob = document.forms["register"]["dob"];
      var phon = document.forms["register"]["ph"];
      var ema = document.forms["register"]["mail"];
      var pw = document.forms["register"]["psw"];
      var add = document.forms["register"]["ad"];
      var cty = document.forms["register"]["city"];
      var stat = document.forms["register"]["state"];
      var pincod = document.forms["register"]["pin"];

      if (nam.value.trim() === "") {
        alert("Please Enter Your Name");
        nam.focus();
        return false;
      }
      if (gend.value.trim() === "") {
        alert("Select Your Gender");
        gend.focus();
        return false;
      }
      if (dob.value.trim() === "") {
        alert("Select Your Date of Birth");
        dob.focus();
        return false;
      }
      if (phon.value.trim() === "") {
        alert("Enter Your Phone Number");
        phon.focus();
        return false;
      }
      if (ema.value.trim() === "") {
        alert("Enter Your Email Address");
        ema.focus();
        return false;
      }
      if (pw.value.trim() === "") {
        alert("Enter Your Password");
        pw.focus();
        return false;
      }
      if (add.value.trim() === "") {
        alert("Enter Your Address");
        add.focus();
        return false;
      }
      if (cty.value.trim() === "") {
        alert("Enter Your City");
        cty.focus();
        return false;
      }
      if (stat.value.trim() === "") {
        alert("Enter Your State");
        stat.focus();
        return false;
      }
      if (pincod.value.trim() === "") {
        alert("Enter Your PinCode");
        pincod.focus();
        return false;
      }

      alert("Registered successfully");
      return true;
    }
  </script>
</head>
<body>

  <div class="container-fluid center-box">
    <div class="form-container">
      <h2 style="color:#932F67;">Welcome</h2>
      <form method="post" enctype="multipart/form-data" name="register" onsubmit="return myfun()">
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" name="nm" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Gender</label>
          <select name="gen" class="form-control" required>
            <option value="">Select Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>

        <div class="form-group">
          <label>Date of Birth</label>
          <input type="date" name="dob" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Phone Number</label>
          <input type="tel" name="ph" class="form-control" pattern="[0-9]{10}" required>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="mail" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="psw" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Address</label>
          <textarea name="ad" rows="2" class="form-control" required></textarea>
        </div>

        <div class="form-group">
          <label>City</label>
          <input type="text" name="city" class="form-control" placeholder="Enter City" required>
        </div>

        <div class="form-group">
          <label>State</label>
          <input type="text" name="state" class="form-control" placeholder="Enter State" required>
        </div>

        <div class="form-group">
          <label>PIN Code</label>
          <input type="number" name="pin" class="form-control" required>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" required> I agree to the Terms and Conditions
          </label>
        </div>

        <div class="form-group text-center">
          <input type="submit" class="btn btn-custom" value="Register Now" name="submit" style="background-color:#932F67;color:white;">
          <input type="reset" class="btn btn-custom" value="Cancel">
        </div>
      </form>
    </div>
  </div>

  <?php
    include './connect_db.php';
    if (isset($_POST['submit'])) {
        $fn = $_POST['nm'];
        $gn = $_POST['gen'];
        $db= $_POST['dob'];
        $pn=$_POST['ph'];
        $em=$_POST['mail'];
        $pw = $_POST['psw'];
        $add=$_POST['ad'];
        $cy=$_POST['city'];
        $st=$_POST['state'];
        $pc=$_POST['pin'];

        $sql= "INSERT INTO user_details(full_name,gender,date_of_birth,phone_number,email,password,address,city,state,pin_code)
               VALUES('$fn','$gn','$db','$pn','$em','$pw','$add','$cy','$st','$pc')";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Form Registered')</script>";
        } else {
            echo "<script>alert('Error in Registering')</script>";
        }
    }
  ?>
</body>
</html>
