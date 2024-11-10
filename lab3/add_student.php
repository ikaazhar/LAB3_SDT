<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit(); 
}
?>

<html>
    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>Add Student</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid d-flex align-items-center">
                <i class="bi bi-mortarboard-fill px-2 text-white"></i>
                <a class="navbar-brand text-white" href="#">UTM Student System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item ms-2 d-none d-md-inline">
                            <a class="btn btn-danger" href="logout.php">Logout<i class="bi bi-box-arrow-right px-2"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h1 class="mt-3 mb-3 lead text-center display-4">Student Information Form</h1>

        <div class="roq my-5 d-flex align-items-center justify-content-center">
            <div class="col-xl-10">
                <div class="card border-8">
                    <div class="card-body text-left py-4">
                        <form action="add_student.php" method="POST" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Student ID:</label>
                                <input type="text" name="student_id" id="student_id" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="program" class="form-label">Program:</label>
                                <input type="text" name="program" id="program" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                    <label for="faculty" class="form-label">Faculty:</label>
                                    <select name="faculty" id="faculty" class="form-select" required>
                                        <option value="" disabled selected>Select a Faculty</option>
                                        <option value="FAB">Faculty of Build Environment</option>
                                        <option value="FBME">Faculty of Biosciences and Medical Engineering</option>
                                        <option value="FKA">Faculty of Civil Engineering</option>
                                        <option value="FC">Faculty of Computing</option>
                                        <option value="FChE">Faculty of Chemical Engineering</option>
                                        <option value="FKE">Faculty of Electrical Engineering</option>
                                        <option value="FKM">Faculty of Mechanical Engineering</option>
                                        <option value="FGHT">Faculty of Geoinformation and Real Estate</option>
                                        <option value="FP">Faculty of Education</option>
                                        <option value="FM">Faculty of Management</option>
                                        <option value="FS">Faculty of Science</option>
                                        <option value="FIC">Faculty of Islamic Civilization</option>
                                        <option value="FPREE">Faculty of Petroleum and Renewable Energy Engineering</option>
                                        <option value="LANGUAGE ACADEMY">Language Academy</option>
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label for="phone_num" class="form-label">Phone number:</label>
                                <input type="text" name="phone_num" id="phone_num" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Register" class="btn btn-primary mt-3">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>

<?php

include "db_conn.php"; //using database connection file here

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];
    $student_id = $_POST['student_id'];
    $program = $_POST['program'];
    $faculty = $_POST['faculty'];
    $phone_num = $_POST['phone_num'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (name, student_id, program, faculty, phone_num, email) VALUES ('$name','$student_id','$program','$faculty','$phone_num','$email')";

    if (mysqli_query($conn, $sql)){
        echo "<br> New record created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

