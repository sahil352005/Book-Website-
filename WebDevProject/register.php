<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register on BookBazaar</title>
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <header>
    <nav>
      <div class="left">
        <ul>
          <a href="index.php">
            <li>Home</li>
          </a>
          <a href="about.html">
            <li>About</li>
          </a>
          <a href="collection.html">
            <li>Collection</li>
          </a>
          <a href="contact.html">
            <li>Contact</li>
          </a>
        </ul>
      </div>
      <div class="right">
        <a href="signin.php">Sign In</a>
      </div>
    </nav>
  </header>

  <?php
    session_start();
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DBNAME", "userdetails");

    $con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME) or die ("cannot connect to database.");

    if(isset($_POST['submit']))
    {   
        $fname= $_POST['fname'];
        $lname= $_POST['lname'];
        $email= $_POST['email'];
        $dob= $_POST['dob'];
        $password= $_POST['password'];
        $phone= $_POST['phone'];

        $query = "INSERT INTO usertable(fname, lname, email, dob, password, phone) VALUES ('$fname', '$lname', '$email', '$dob', '$password', '$phone')";

        $fire = mysqli_query($con, $query) or die("Cannot insert data into Database. ".mysqli_error($con));

        if ($fire) {
            // Set session variable
            $_SESSION['fname'] = $fname;
            // Redirect to index.php
            header("Location: index.php");
            exit; // Make sure to exit after redirection
        }
    }
  ?>    

  <div class="form">

     
    <form id="registrationForm" onsubmit="return validateAndConfirmSubmission()" name="usertable" action="https://api.web3forms.com/submit" method="POST">

       <input type="hidden" name="access_key" value="0c2fe6df-7ebd-45b0-b799-6f1000ae769e">
      <h1>Register</h1>
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="fname" placeholder="Enter your First name" required>

      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lname" placeholder="Enter your Last name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>

      <label for="dob">Date of Birth</label> 
      <input type="date"  id="dob" name="dob"  placeholder="Enter your DOB" max="" required> 

      <label for="password">Create Password</label>
      <input type="password" id="password" name="password" placeholder="Create a new Password" minlength="8">

      <label for="again">Re-enter your Password</label>
      <input type="password" id="again" name="password_again" placeholder="Enter your Password Again" minlength="8">

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter your Phone Number" pattern="\d*" minlength="10" maxlength="10" required>

      <label>
        <input type="checkbox" id="agree" name="agree" required>
          I agree to the Terms and Conditions of this Website.
      </label>

      <input type="submit" name="submit" value="Submit">
    </form>
  </div>

  <footer class="footer">
    <p>Copyright &copy; 2023 BookBazaar. All rights reserved.</p>
  </footer>

  <script>
    const today = new Date().toISOString().split('T')[0];
    document.getElementById("dob").max = today;

    function validateAndConfirmSubmission() {
      if (validateForm() && confirmSubmission()) {
        return true;
      } else {
        return false;
      }
    }

    function validateForm() {
      var fname = document.getElementById("fname").value;
      var lname = document.getElementById("lname").value;
      var email = document.getElementById("email").value;
      var dob = document.getElementById("dob").value;
      var password = document.getElementById("password").value;
      var again = document.getElementById("again").value;
      var phone = document.getElementById("phone").value;
      var agree = document.getElementById("agree").checked;

      if (!fname || !lname || !email || !dob || !password || !again || !phone || !agree) {
        alert("Please fill out all required fields.");
        return false;
      }

      if (password !== again) {
        alert("Passwords do not match.");
        return false;
      }

      return true;
    }

    function confirmSubmission() {
      var isSure = confirm("Are you sure you want to submit?");
      return isSure;
    }

  </script>
</body>
</html>
