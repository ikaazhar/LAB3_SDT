<html>
    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>Register</title>
    </head>
    <body>
        <div class="bg-image" style="background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('utm_bg.jpg'); height: 100vh; background-size: cover; background-position: center;">
            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100%;">
                <img src="UTM-LOGO-FULL.png" alt="Logo" class="mb-3" style="width: 250px; height: auto;">
                <!-- White box container -->
                <div class="bg-white p-4 rounded shadow" style="width: 320px;">
                    <div class="text-center"><i class="bi bi-person-circle fs-1"></i></div>
                    <h2 class="text-center text-dark mb-3">Register New User</h2>
                    <form action="register.php" method="POST">
                        <div class="form-group">
                            <label for="username" class="text-dark">Username:</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-dark">Password:</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Register" class="btn btn-primary mt-3">
                        </div>
                        <!-- login link below the submit button -->
                        <a href="login.php" class="d-block text-center mt-3 text-primary">Already have an account? Login here</a>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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