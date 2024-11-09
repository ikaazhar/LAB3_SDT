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

    <title>Student List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<!--
<nav class="navbar navbar-expand-md navbar-light bg-secondary">
  <div class="container-xxl">
    <a href="#intro" class="navbar-brand">
        <span class="fw-bold text-muted">
            UTM Student List
        </span>
    </a>
  </div>
</nav>
-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    UTM Student System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <img src="UTM-LOGO-FULL.png" alt="Logo" width="15" height="15">
    <a href="logout.php">Logout</a>
    <h2>Student List</h2>
    <table border="1">
        <tr>
            <td> ID </td>
            <td> Name </td>
            <td> Student ID </td>
            <td> Program </td>
            <td> Faculty </td>
            <td> Phone Number </td>
            <td> Email </td>
            <td> Edit </td>
            <td> Delete </td>
        </tr>
    <?php
        include "db_conn.php";

        $sql = "SELECT * FROM students";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>". $row['id']."</td>";
                echo "<td>". $row['name']."</td>";
                echo "<td>". $row['student_id']."</td>";
                echo "<td>". $row['program']."</td>";
                echo "<td>". $row['faculty']."</td>";
                echo "<td>". $row['phone_num']."</td>";
                echo "<td>". $row['email']."</td>";
                echo "<td> <a href='update.php?id=". $row['id'] ."'> Edit </a> </td>";
                echo "<td> <a href='delete.php?id=". $row['id'] ."'> Delete </a> </td>";
            }
        } else{
            echo "<tr> <td colspan = '9'> No Data Found </td> <tr>";
        }
    ?>
    </table>

    <a href="add_student.php">Register New Student</a>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>