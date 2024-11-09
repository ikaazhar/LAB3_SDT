<?php
    include "db_conn.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM students WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "<script>alert('Student Information Deleted Successfully'); window.location='index.php'</script>";
        } else{
            echo "<script>alert('Student Information Not Deleted'); window.location='index.php'</script>";
        }
    }
?>