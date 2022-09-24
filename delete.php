<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_patient'])) {
    $patient_id = mysqli_real_escape_string($con, $_POST['delete_patient']);

    $query = "DELETE FROM patients WHERE id='$patient_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "patient Deleted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "patient Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['update_patient'])) {
    $patient_id = mysqli_real_escape_string($con, $_POST['patient_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $address = mysqli_real_escape_string($con, $_POST['address']);


    $query = "UPDATE patients SET name='$name', age='$age', address='$address' WHERE id='$patient_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "patient Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "patient Not Updated";
        header("Location: index.php");
        exit(0);
    }
}


if (isset($_POST['save_patient'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "INSERT INTO patients (name,age,address) VALUES ('$name','$age','$address')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "patient Created Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "patient Not Created";
        header("Location: patient-create.php");
        exit(0);
    }
}
