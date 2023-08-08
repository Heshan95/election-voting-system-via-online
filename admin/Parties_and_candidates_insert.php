<?php

include '../showErros.php';
include '../DB/dbConnection.php';


if (isset($_POST['inserparties'])) 
{
    $id = $_POST['id'];
    $partyName = $_POST['nameOfParty'];
    $photo = $_POST['photo'];
    $colour = $_POST['colour'];


    $query = "INSERT INTO `parties` (`idparties`,`name`,`logo`,`colour`) VALUES ('" . $id . "','" . $partyName . "','" . $photo . "','" . $colour . "')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../admin/Parties_and_candidates.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
        header('Location: ../admin/Parties_and_candidates.php');
    }
}


elseif (isset($_POST['inserelector'])) 
{
    $number = $_POST['number'];
    $nameOfElector = $_POST['nameOfElector'];
    $photo = $_POST['photo'];
    $province = $_POST['province'];


    $query = "INSERT INTO `electors` (`idelectors`,`name`,`photo`,`parties_idparties`) VALUES ('" . $number . "','" . $nameOfElector . "','" . $photo . "','" . $province . "')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../admin/Parties_and_candidates.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
        header('Location: ../admin/Parties_and_candidates.php');
    }
}
?>