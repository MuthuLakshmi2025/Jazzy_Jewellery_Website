<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Agent Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f0fb;
      padding: 30px;
      margin: 0;
    }

    .form-container {
      max-width: 600px;
      margin: auto;
      background: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #932F67;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      margin-top: 15px;
      display: block;
    }

    input, select, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      font-size: 15px;
    }

    textarea {
      resize: vertical;
    }

    .checkbox-container {
      margin-top: 20px;
      display: flex;
      align-items: flex-start;
      gap: 10px;
    }

    .checkbox-container input[type="checkbox"] {
      margin-top: 4px;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      margin-top: 25px;
    }

    input[type="submit"],
    button[type="button"] {
      width: 48%;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    input[type="submit"] {
      background-color: #932F67;
      color: white;
    }

    input[type="submit"]:hover {
      background-color: #CC66DA;
    }

    button[type="button"] {
      background-color: #ccc;
    }

    button[type="button"]:hover {
      background-color: #bbb;
    }
    .checkbox-container {
  margin-top: 20px;
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
}

.checkbox-container input[type="checkbox"] {
  margin: 0;
  width: 18px;
  height: 18px;
}

.checkbox-container label {
  font-weight: normal;
  margin: 0;
}

  </style>
</head>
<body>

<div class="form-container">
  <h2>Agent Registration</h2>
  <form method="post" enctype="multipart/form-data">
    <label>Full Name</label>
    <input type="text" name="an" required />

    <label>Gender</label>
    <select name="gen" required>
      <option value="">-- Select Gender --</option>
      <option>Male</option>
      <option>Female</option>
      <option>Other</option>
    </select>

    <label>Date of Birth</label>
    <input type="date" name="dob" />

    <label>Phone</label>
    <input type="tel" name="phone" required />

    <label>Email</label>
    <input type="email" name="email" required />

    <label>Password</label>
    <input type="password" name="password" required />

    <label>Address</label>
    <textarea name="address" rows="3" required></textarea>

    <label>State</label>
    <select id="state" name="state" required>
      <option value="">-- Select State --</option>
    </select>

    <label>City (Type or Select)</label>
    <input type="text" id="city" name="city" list="cities" placeholder="Start typing or select city">
    <datalist id="cities">
      <option value="">-- Select City --</option>
    </datalist>

    <label>PIN Code</label>
    <input type="text" name="pincode" required />

    <label>Upload ID Proof (Aadhaar/PAN)</label>
    <input type="file" name="idpr" />

    <label>Profile Photo</label>
    <input type="file" name="img" />

    <div class="checkbox-container">
      <input type="checkbox" id="agree" required />
      <label for="agree">I confirm that all the above details are true and correct.</label>
    </div>

    <div class="button-group">
      <input type="submit" name="submit" value="Register">
      <button type="button" onclick="window.location.href='index.html'">Cancel</button>
    </div>
  </form>
</div>

<script>
const cityData = {
  "Andhra Pradesh": ["Vijayawada", "Visakhapatnam", "Guntur", "Nellore", "Kurnool"],
  "Arunachal Pradesh": ["Itanagar", "Naharlagun", "Tawang"],
  "Assam": ["Guwahati", "Silchar", "Dibrugarh", "Jorhat"],
  "Bihar": ["Patna", "Gaya", "Bhagalpur", "Muzaffarpur"],
  "Chhattisgarh": ["Raipur", "Bhilai", "Durg"],
  "Goa": ["Panaji", "Margao", "Vasco da Gama"],
  "Gujarat": ["Ahmedabad", "Surat", "Vadodara", "Rajkot"],
  "Haryana": ["Gurgaon", "Faridabad", "Panipat"],
  "Himachal Pradesh": ["Shimla", "Manali", "Dharamshala"],
  "Jharkhand": ["Ranchi", "Jamshedpur", "Dhanbad"],
  "Karnataka": ["Bengaluru", "Mysuru", "Mangalore", "Hubli"],
  "Kerala": ["Thiruvananthapuram", "Kochi", "Kozhikode", "Thrissur"],
  "Madhya Pradesh": ["Bhopal", "Indore", "Gwalior", "Jabalpur"],
  "Maharashtra": ["Mumbai", "Pune", "Nagpur", "Nashik"],
  "Manipur": ["Imphal"],
  "Meghalaya": ["Shillong"],
  "Mizoram": ["Aizawl"],
  "Nagaland": ["Kohima", "Dimapur"],
  "Odisha": ["Bhubaneswar", "Cuttack", "Rourkela"],
  "Punjab": ["Amritsar", "Ludhiana", "Jalandhar"],
  "Rajasthan": ["Jaipur", "Jodhpur", "Udaipur", "Kota"],
  "Sikkim": ["Gangtok"],
  "Tamil Nadu": ["Chennai", "Coimbatore", "Madurai", "Trichy"],
  "Telangana": ["Hyderabad", "Warangal", "Karimnagar"],
  "Tripura": ["Agartala"],
  "Uttar Pradesh": ["Lucknow", "Kanpur", "Agra", "Varanasi"],
  "Uttarakhand": ["Dehradun", "Haridwar", "Nainital"],
  "West Bengal": ["Kolkata", "Howrah", "Durgapur", "Asansol"]
};

const stateSelect = document.getElementById("state");
const cityDatalist = document.getElementById("cities");

// Populate states
for (const state in cityData) {
  const option = document.createElement("option");
  option.value = state;
  option.textContent = state;
  stateSelect.appendChild(option);
}

// Update cities on state change
stateSelect.addEventListener("change", function () {
  const cities = cityData[this.value] || [];
  cityDatalist.innerHTML = '';
  cities.forEach(city => {
    const opt = document.createElement("option");
    opt.value = city;
    cityDatalist.appendChild(opt);
  });
});
</script>

<?php
if (isset($_POST['submit'])) {
  include './connect_db.php'; // DB connection file

  $fn = $_POST['an'];
  $gn = $_POST['gen'];
  $db = $_POST['dob'];
  $pn = $_POST['phone'];
  $em = $_POST['email'];
  $pw = $_POST['password'];
  $add = $_POST['address'];
  $st = $_POST['state'];
  $cy = $_POST['city'] ?? '';
  $pc = $_POST['pincode'];
  $idp = $_FILES['idpr']['name'];
  $img = $_FILES['img']['name'];

  $tmp_idp = $_FILES['idpr']['tmp_name'];
  $tmp_img = $_FILES['img']['tmp_name'];

  move_uploaded_file($tmp_idp, "agent_detail/" . $idp);
  move_uploaded_file($tmp_img, "agent_detail/" . $img);

  $sql = "INSERT INTO agent_details(fname, gen, dob, ph, mail, psw, ad, state, city, pin, idproof, profile)
          VALUES ('$fn', '$gn', '$db', '$pn', '$em', '$pw', '$add', '$st', '$cy', '$pc', '$idp', '$img')";

  if (mysqli_query($con, $sql)) {
    echo "<script>alert('Agent Registered Successfully!');</script>";
  } else {
    echo "<script>alert('Error while registering');</script>";
  }
}
?>
</body>
</html>
