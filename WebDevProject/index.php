<?php
session_start();

// Check if the user is signed in
if(isset($_SESSION['fname'])) {
    $logout_link = '<a href="logout.php">Logout</a>';
} else {
    $logout_link = '<a href="register.php">Register</a>';
}

$fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : '';
$currentHour = date("H");
$greeting = getGreeting($currentHour);

function getGreeting($hour) {
    if ($hour >= 5 && $hour < 12) {
        return "Good Morning";
    } else if ($hour >= 12 && $hour < 18) {
        return "Good Afternoon";
    } else if ($hour >= 18 && $hour < 21) {
        return "Good Evening";
    } else {
        return "Good Night";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBazaar - the Book Platform</title>
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
        <?php echo $logout_link; ?>
        </div>
    </nav>
</header>

<div class="greeting" id="greeting">
    <!-- JavaScript will populate the greeting message here -->
    <?php echo $greeting . " " . $fname . "!"; ?>
</div>
  
<div class="hero-section">
    <img src="img/heroimg.jpg" alt="Hero Image">
    <p class="quote">"A room without books is like a body without a soul."</p>
</div>

<div class="content">
    <h3>Welcome to BookBazaar!</h3>
    <p>Explore our vast collection of books and immerse yourself in captivating stories.</p>
    <button onclick="alert('Happy Reading!')">Start Exploring</button>
    <button onclick="location.href ='prices.html'">Know our Prices !</button>
</div>

<head>
    <script src="jsquery.js"></script>
    <script> 
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideDown("slow");
            });
        });
    </script>
    <style> 
        #panel, #flip {
            padding: 5px;
            text-align: center;
            background-color: #e5eecc;
            border: solid 1px #c3c3c3;
        }

        #panel {
            padding: 50px;
            display: none;
        }
    </style>
</head>

<div id="flip">Book Information</div>
<div id="panel">
    <table border="2">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Details</th>
        </tr>
        <tr>
            <td rowspan="2">Harry Potter Series</td>
            <td>J.K. Rowling</td>
            <td>Fantasy</td>
            <td rowspan="2">A series of fantasy novels about a young wizard, Harry Potter.</td>
        </tr>
        <tr>
            <td>Adventure</td>
            <td>Book 1: The Philosopher's Stone</td>
        </tr>
        <tr>
            <td colspan="3">The Lord of the Rings</td>
            <td>Fantasy novel series written by J.R.R. Tolkien.</td>
        </tr>
        <tr>
            <td>The Fellowship of the Ring</td>
            <td>J.R.R. Tolkien</td>
            <td>Fantasy</td>
            <td>First book in The Lord of the Rings trilogy.</td>
        </tr>
    </table>
</div>

<video src="bookvideo.mp4" autoplay muted></video>

<footer class="footer">
    <p>Copyright &copy; 2023 BookBazaar. All rights reserved.</p>
</footer>

</body>
</html>
