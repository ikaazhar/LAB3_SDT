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
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Student List</title>
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
          <li class="nav-item">
            <a class="nav-link text-white" href="add_student.php">Add Student</a>
          </li>
          <li class="nav-item ms-2 d-none d-md-inline">
            <a class="btn btn-danger" href="logout.php">
              Logout<i class="bi bi-box-arrow-right px-2"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <h1 class="mt-3 mb-3 lead text-center display-3">Student List</h1>

  <section>
    <div class="container-lg my-5">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <!-- Header Row -->
                <thead class="table-secondary">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>STUDENT ID</th>
                        <th>PROGRAM</th>
                        <th>FACULTY</th>
                        <th>PHONE NUMBER</th>
                        <th>EMAIL</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP Content Rows -->
                    <?php
include "db_conn.php";

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['student_id'] . '</td>';
        echo '<td>' . $row['program'] . '</td>';
        echo '<td>' . $row['faculty'] . '</td>';
        echo '<td>' . $row['phone_num'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td><a class="btn btn-info" href="update.php?id=' . $row['id'] . '"><i class="bi bi-pencil-square"></i></a></td>';
        echo '<td><a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '"><i class="bi bi-trash-fill"></i></a></td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="9">No Data Found</td></tr>';
}
?>

                </tbody>
            </table>
        </div>
    </div>
</section>



  <!-- Bootstrap JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>