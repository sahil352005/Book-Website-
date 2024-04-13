<?php
session_start();

// Check if the user is signed in
if(isset($_SESSION['fname'])) {
    $logout_link = '<a href="logout.php">Logout</a>';
} else {
    $logout_link = '<a href="register.php">Register</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Website - Contact</title>
  <link rel="stylesheet" href="CSS/about.css">
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
          <a href="about.php">
            <li>About</li>
          </a>
          <a href="collection.php">
            <li>Collection</li>
          </a>
          <a href="contact.php">
            <li>Contact</li>
          </a>
        </ul>
      </div>
      <div class="right">
      <?php echo $logout_link; ?>
      </div>
    </nav>
  </header>

<div class="container">
  
</div>

</body>
</html>