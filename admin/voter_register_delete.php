<?php
include './showErros.php';
//include './dbConnection.php';

if(isset($_POST['deletedata']))
{
    $idproducts = $_POST['delete_id'];

    $query = "DELETE FROM `products` WHERE `idproducts`='".$idproducts."'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:admin_productManager.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>
