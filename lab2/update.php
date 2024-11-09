<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit(); 
}
?>

<html>
    <head>
        <title>Update Student</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h2>Update Student Information</h2>

    <?php
        include "db_conn.php";

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        }
    ?>

    <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
        <label>Name: </label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        <label>Student ID: </label>
        <input type="text" name="student_id" value="<?php echo $row['student_id']; ?>" required><br><br>
        <label>Program: </label>
        <input type="text" name="program" value="<?php echo $row['program']; ?>" required><br><br>
        <label>Faculty: </label>
        <input type="text" name="faculty" value="<?php echo $row['faculty']; ?>" required><br><br>
        <label>Phone Number: </label>
        <input type="text" name="phone_num" value="<?php echo $row['phone_num']; ?>" required><br><br>
        <label>Email: </label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        <button type="submit"> Update Student Information </button>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['name'];
            $student_id = $_POST['student_id'];
            $program = $_POST['program'];
            $faculty = $_POST['faculty'];
            $phone_num = $_POST['phone_num'];
            $email = $_POST['email'];

            $sql = "UPDATE students SET name='$name', student_id='$student_id', program='$program' , faculty='$faculty', phone_num='$phone_num', email='$email' WHERE id=$id";

            if(mysqli_query($conn, $sql)){
                echo "Record updated succesfully";
            } else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

    ?>

    <a href="index.php"> Back to student list </a>

    </body>
</html>