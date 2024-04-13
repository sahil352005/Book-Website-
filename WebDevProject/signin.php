<?php
session_start();

if(isset($_SESSION['fname'])) {
    // If the user is already signed in, redirect to index.php
    header("Location: index.php");
    exit;
}

if(isset($_POST['submit'])) {
    // Database connection
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DBNAME", "userdetails");

    $con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME) or die ("cannot connect to database.");

    // Get user input
    $email_phone = $_POST['email_phone'];
    $password = $_POST['password'];

    // Query to check if user exists in the database
    $query = "SELECT * FROM usertable WHERE (email='$email_phone' OR phone='$email_phone') AND password='$password'";
    $result = mysqli_query($con, $query) or die("Query failed: " . mysqli_error($con));

    if(mysqli_num_rows($result) == 1) {
        // If user exists, set session variables and redirect to index.php
        $row = mysqli_fetch_assoc($result);
        $_SESSION['fname'] = $row['fname'];
        header("Location: index.php");
        exit;
    } else {
        // If user does not exist, display error message
        $error_message = "Invalid email/phone or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In to BookBazaar</title>
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
            <a href="register.php">Register</a>
        </div>
    </nav>
</header>

<div class="form">
    <form id="signInForm" name="signInForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h1>Sign In</h1>
        <?php if(isset($error_message)) echo "<p class='error'>$error_message</p>"; ?>
        <label for="email_phone">Email or Phone</label>
        <input type="text" id="email_phone" name="email_phone" placeholder="Enter your email or phone" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <input type="submit" name="submit" value="Sign In">
    </form>
</div>

<footer class="footer">
    <p>Copyright &copy; 2023 BookBazaar. All rights reserved.</p>
</footer>

</body>
</html>
