<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout-form</title>
</head>
<body>
    <form action="#">
        <input type="text" name="username" id="exampleFormControlInput1" class="form-control">
    </form>
    




<?php
session_start();
session_destroy();
echo "<script>
    alert(`Successfully logged out`);
    window.location.replace('login.php');
    </script>"
?>

</body>
</html>