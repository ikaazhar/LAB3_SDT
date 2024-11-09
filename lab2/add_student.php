<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit(); 
}
?>

<html>
    <head>
        <title>Add Student</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h2>Add Student Information</h2>
        <form action="add_student.php" method="POST">
            <label> Name: </label>
            <input type="text" name="name" required><br><br>
            <label> Student ID: </label>
            <input type="text" name="student_id" required><br><br>
            <label> Program: </label>
            <input type="text" name="program" required><br><br>
            <label> Faculty: </label>
            <input type="text" name="faculty" required><br><br>
            <label> Phone number: </label>
            <input type="text" name="phone_num" required><br><br>
            <label> Email: </label>
            <input type="email" name="email" required><br><br>
            <button type="submit">Add Student</button>
        </form>

        <a href="index.php">Back to Student List</a>

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

