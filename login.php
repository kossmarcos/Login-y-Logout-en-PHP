<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        //     Db 
        $query = "select * from users where username = $username limit 1";

        $result = mysqli_query($con, $query);

        if ($result)
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] == $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        echo "Usuario o Contraseña Incorrecta!";
    } else {
        echo "Usuario o Contraseña Incorrecta!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <div class="" id="box">
        <div class="Login">
            <h1>Login</h1>
        </div>
        <form action="" method="POST">
            <input id="text" type="text" name="username"><br>
            <br>
            <input id="text" type="password" name="password">

            <input type="submit" name="Login">
            <a href="signup.php">Registrarse</a>
        </form>
    </div>
</body>

</html>