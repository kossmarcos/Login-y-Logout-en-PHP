<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        //    Guardar en Db 
        $userid = random_num(20);
        $query = "insert into login (userid, username,password) values('$userid', '$username','$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "Ingrese informacion valida!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>

<body>
    <div class="" id="box">
        <div class="Login">
            <h1>Registrarse</h1>
        </div>
        <form action="" method="POST">
            <input id="text" type="text" name="username"><br>
            <br>
            <input id="text" type="password" name="password">
            <br><br>
            <input type="submit" name="signup">
            <a href="login.php">Inicio</a>
        </form>
    </div>
</body>

</html>