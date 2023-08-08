<?php
include './showErros.php';
include '../DB/dbConnection.php';


if(isset($_POST['inservoterdetails']))
{
    $province = $_POST['province'];
    $district = $_POST['district'];
    $division = $_POST['division'];
    $gndivision = $_POST['gndivision'];
    $fullName = $_POST['fullName'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $photo = $_POST['photo'];
    

    $query = "INSERT INTO `voter_registration` (`idvoter_registration`,`full_name`,`nic`,`address`,`photo`,`province_idprovince`,`district_iddistrict`,`division_iddivision`,`gn_division`) VALUES ('0','".$fullName."','".$nic."','".$address."','".$photo."','".$province."','".$district."','".$district."','".$gndivision."')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ./voter_register.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
         header('Location: ./voter_register.php');
    }
}

?>