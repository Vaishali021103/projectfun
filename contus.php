<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME AQUARUM</title>
    <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">  
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the container/contact section */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
    <!-- header section starts  -->
<header>
    <div class="header-1">
        <div class="share">
            <span> follow us : </span>
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
        </div>

        <div class="call">
            <span> call us : </span>
            <a href="#">+123-456-7890</a>
        </div>

    </div>

    <div class="header-2">

        <div class="logo">
            <img src="images/logo1.jpg" alt="">
            <h3>Aquarum</h3>
        </div>
        <div class="list">
            <nav class="navbar">
                <a href="index.html">Home</a>
                <a href="aboutus.html">About us</a>
                <a href="contus.php">Contact us</a>
            </nav>
        </div>
    </div>
</header>

<!-- header section ends -->

<div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Swing by for a cup of coffee, or leave us a message:</p>
  </div>
  <div class="row">
    <div class="column" >
      <img src="images/I3.webp" style="width:100%">
    </div>
    <div class="column">
      <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name.."required/>
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name.."required/>
        <label for="mail">Email-id</label>
        <input type="text" name="mail" placeholder="Your email..." required/>
        <label for="subject">Message</label>
        <textarea id="subject" name="message" placeholder="Write something.." style="height:170px"></textarea>

        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
</body>
</html>

<?php

session_start();
if (isset($_POST) && $_POST){
    $conn = mysqli_connect("localhost","root","","aquarum","3309");
    if(!$conn){
        echo "Can't connect database" . mysqli_connect_error($conn);
        exit;
    }

   
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $mail = $_POST["mail"];
    $message = $_POST["message"];
    
 $query = "INSERT into feedback(firstname,lastname,mail,message)VALUES('$firstname','$lastname','$mail','$message');"; 
    $result= mysqli_query($conn, $query);


    if(!$result){
        echo "Query issue.".mysqli_error($conn);
    }
    else{
        echo "<script>
        alert('Thanks for your feedback!You can also contact to 987654210');
        window.location.href = 'http://localhost/projectfun/home.php';
        </script>;";
    }   
}
?>