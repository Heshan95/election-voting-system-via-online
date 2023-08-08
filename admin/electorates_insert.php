<?php

include '../showErros.php';
include '../DB/dbConnection.php';


if (isset($_POST['inserProvince'])) 
{
    
    $province = $_POST['province'];
    $population = $_POST['population'];


    $query = "INSERT INTO `province` (`province`,`population`) VALUES ('" . $id . "','" . $partyName . "','" . $photo . "','" . $colour . "')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../admin/electorates.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
        header('Location: ../admin/electorates.php');
    }
}


elseif (isset($_POST['inserDistrict'])) 
{
    $district = $_POST['district'];
    $population1 = $_POST['population'];
    $province1 = $_POST['province'];


    $query = "INSERT INTO `district` (`district`,`population`,`province_idprovince`) VALUES ('" . $district . "','" . $population1 . "','" . $province1 . "')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../admin/electorates.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
        header('Location: ../admin/electorates.php');
    }
}



elseif (isset($_POST['inserDivision'])) 
{
    $division = $_POST['division'];
    $population2 = $_POST['population'];
    $district1 = $_POST['district'];


    $query = "INSERT INTO `division` (`division`,`population`,`district_iddistrict`) VALUES ('" . $division . "','" . $population2 . "','" . $district1 . "')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../admin/electorates.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
        header('Location: ../admin/electorates.php');
    }
}


elseif (isset($_POST['inserGndivision'])) 
{
    $gndivision = $_POST['gndivision'];
    $population3 = $_POST['population'];
    $division1 = $_POST['division'];


    $query = "INSERT INTO `gramaniladari_division` (`gn_division`,`population`,`division_iddivision`) VALUES ('" . $gndivision . "','" . $population3 . "','" . $division1 . "')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../admin/electorates.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
        header('Location: ../admin/electorates.php');
    }
}
?>

