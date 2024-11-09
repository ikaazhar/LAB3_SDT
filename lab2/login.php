<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="name">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Register">
        </form>

        <a href="register.php">Don't have an account? Register here</a>
    </body>
</html>
<?php
session_start();
include "db_conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM student_reg WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $_SESSION['username'] = $username;
            header("Location: index.php");
        }else{
            echo "Invalid username or password";
        }
    }else{
        echo "No user found with that username";
    }
}

?>