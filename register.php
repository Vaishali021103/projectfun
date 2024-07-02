<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book now</title>
    
    <style>

    .container{
    width: 20%;
    max-height: max-content;
    background-color:rgb(226, 226, 97);
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 150px;
    padding: 50px;
    border-radius: 20px;
    opacity: 0.8;
  }
  
  body{
    background-image: url(images/imgback.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    filter: brightness(80%);
        background-position-x: center;
        background-position-y: center;
  }
  form input {
    font-family: inherit;
    width: 100%;
    outline: none;
    background-color: whitesmoke;
    border-radius: 4px;
    border: none;
    display: block;
    padding: 0.9rem 0.7rem;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
    font-size: 20px;
    color:rgb(16, 13, 13);
    text-indent: 50px;
  }
  

  
  form .btn{
    background-color: rgb(3, 39, 36);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
   width:100%;
  }
  
  .vsv{
    text-decoration: underline rgb(10, 9, 10);  
  }
    </style>
</head>
<body >

    <div class="container">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="vsv">
                <h2>Book here and enjoy your holiday :))</h2>
            </div>
            <input type="email" placeholder="Enter your email" name="email"><br>
            <input type="text" placeholder="Enter your Name" name="username"><br>
            <input type="number"placeholder="Enter your Contact" name ="contactno"><br>
            <input type="date" name="date" required/><br>
            <input type="number" name="members" placeholder="Enter no. of member to come"required/>

            <button class = "btn"type="submit" name = "submit">Submit</button>

            <a href="login.html" download>
                Click Here to download the pass
            </a>
        </form>
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

   
    $email = $_POST["email"];
    $username = $_POST["username"];
    $contactno = $_POST["contactno"];
    $date = $_POST["date"];
    $members = $_POST["members"];
    
 $query = "INSERT into bookedtickets(email,name,contactno,date,members)VALUES('$email','$username','$contactno','$date','$members');"; 
    $result= mysqli_query($conn, $query);


    if(!$result){
        echo "Query issue.".mysqli_error($conn);
    }
    else{
        echo "<script>
        alert('Successfully registered! please login!');
        window.location.href = 'http://localhost/projectfun/login.php';
        </script>;";
    }   
}
?>