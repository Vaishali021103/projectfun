<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>

<style>
     @import url(https://fonts.googleapis.com/css?family=Roboto:300);
header .header{
  
  /* background-color: #fff; */
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  font-family: Harry Potter, Arial;
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: Harry Potter, Arial;
  /* font-family: "Roboto", sans-serif; */
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body{
  background-image: url(images/OIP.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  filter: brightness(80%);      
}
</style>
</head>
<body>
    <form  action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="login-page">
          <div class="form">
            <div class="login">
              <div class="login-header">
                <h3>LOGIN</h3>
                <p>Please enter your credentials to login.</p>
              </div>
            </div>
            <form class="login-form">
              <input type="text" placeholder="Enter Username" name="uname" required/>
              <input type="password" placeholder="Enter password" name="psw" required/>
              <button type="submit" name="submit">login</button>
              <p class="message">Not registered? <a href="createuser.php">Create an account</a></p>
            </form>
          </div>
        </div>
</body>
</html>

<?php

session_start();
if(isset($_POST) && $_POST){
  $conn = mysqli_connect("localhost","root","","aquarum","3309");
     if(!$conn){
         echo "Can't connect database" . mysqli_connect_error($conn);
         exit;
     }
 
     $username = $_POST["uname"];
     $password = $_POST["psw"];
     
 
     $query = "SELECT username,password from newacc where username = '$username';";
     $result= mysqli_query($conn, $query);
    
     $row= mysqli_fetch_assoc($result);
     
     print_r($row);
 
     if($username != $row['username'] or $password != $row['password']){
          echo "<script> alert('Username and Password mismatch. Please fill it again');
          window.location.href = 'login.php';
         
          </script>;";
      }
 
      else{
        $_SESSION['username'] = $username;
        header("Location: index.html");
      }
}
     
?>