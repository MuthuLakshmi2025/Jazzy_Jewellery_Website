<?php
session_start();
include './connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Jazzy Jewels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #f8e9ff, #fef6ff);
            font-family: 'Segoe UI', sans-serif;
            color: #4a0072;
            min-height: 100vh;
        }
        .navbar { background-color: #fff; }
        .navbar-brand { color: #7b1fa2 !important; font-weight: bold; }
        .navbar-nav .nav-link { color: #7b1fa2 !important; }
        .form-label, .form-check-label, p, h2 { color: #4a0072; }
        .form-control {
            background-color: #fff;
            border: 1px solid #d1a4e3;
            color: #4a0072;
        }
        .form-control:focus {
            border-color: #ba68c8;
            box-shadow: 0 0 0 0.2rem rgba(186, 104, 200, 0.25);
        }
        .btn-login {
            background-color: #ce93d8;
            border-radius: 5px;
            width: 100%;
            color: white;
        }
        a { color: #4a148c; font-size: 0.85rem; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .login-container {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        .login-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2);
        }
    </style>
    <script>
        function updateRegisterLink() {
            const userRadio = document.getElementById("roleUser");
            const agentRadio = document.getElementById("roleAgent");
            const registerLink = document.getElementById("registerLink");

            if (userRadio.checked) {
                registerLink.href = "User_Registration.php";
            } else if (agentRadio.checked) {
                registerLink.href = "Agent_Registration.php";
            } else {
                registerLink.href = "#";
            }
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.jpg" height="30px" width="30px" class="me-2">JAZZY JEWELS
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="homePage1.html">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid login-container">
        <div class="row align-items-center justify-content-center w-100">
            <div class="col-lg-4 text-center mb-4 mb-lg-0">
                <img src="./login1.jpg" alt="Login Image" class="login-image" height="400px">
            </div>
            <div class="col-lg-4">
                <div class="login-box">
                    <h2 class="text-center">Welcome Back</h2>
                    <p class="text-center" style="font-size: small;">Enter your account credentials to view your orders</p>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Select Role</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="roleUser" value="User" required onchange="updateRegisterLink()">
                                <label class="form-check-label" for="roleUser">User</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="roleAgent" value="Agent" onchange="updateRegisterLink()">
                                <label class="form-check-label" for="roleAgent">Agent</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="mail" class="form-label">Email</label>
                            <input type="email" name="email" id="mail" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label for="psw" class="form-label">Password</label>
                            <input type="password" name="password" id="psw" class="form-control" required>
                        </div>

                        <div class="mb-3 text-end">
                            <a href="#">Forgot Your Password?</a>
                        </div>

                        <button type="submit" class="btn btn-login" name="login" value="login">Log In</button>

                        <p class="mt-3 text-center">
                            Don't have an account?
                            <a href="#" id="registerLink" onclick="updateRegisterLink()">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pw = $_POST['password'];
    $role = $_POST['role'];

    // Choose table and column based on role
    if ($role == 'User') {
        $table = "user_details";
        $emailColumn = "email";
    } elseif ($role == 'Agent') {
        $table = "agent_details";
        $emailColumn = "agent_email"; // Change this if your DB uses a different name
    } else {
        echo "<script>alert('Please select a valid role.');</script>";
        exit;
    }

    // Query database
    $q = "SELECT * FROM $table WHERE $emailColumn = '$email'";
    $result = mysqli_query($con, $q);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Allow hashed or plain text passwords
        if (password_verify($pw, $row['password']) || $pw === $row['password']) {
            if ($role == 'User') {
                $_SESSION['user_id'] = $row['id'];
                echo "<script>alert('Login Successful'); window.location='Explore Now.html';</script>";
            } elseif ($role == 'Agent') {
                $_SESSION['agent_id'] = $row['id'];
                echo "<script>alert('Login Successful'); window.location='agent_profile.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid Email or Password.');</script>";
        }
    } else {
        echo "<script>alert('Invalid Email or Password.');</script>";
    }
}
?>
