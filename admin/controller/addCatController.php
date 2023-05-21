<?php
include_once "../config/dbconnect.php";

if(isset($_POST['upload']))
{
    $catname = $_POST['c_name'];
    $insert = mysqli_query($conn,"INSERT INTO coins (value) VALUES ('$catname')");

    if(!$insert)
    {
        echo mysqli_error($conn);
        header("Location: ../dashboard.php?coins=error");
    }
    else
    {
        echo "Record added successfully.";
        header("Location: ../dashboard.php?coins=success");
    }
}
?>
