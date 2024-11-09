<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="name">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Register">
        </form>

        <a href="login.php">Already have an account? Login here</a>
    </body>
</html>
<?php
include "db_conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO student_reg (username, password) VALUES ('$username', '$password')";

    if(mysqli_query($conn, $sql)){
        echo "New record created successfully";
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>