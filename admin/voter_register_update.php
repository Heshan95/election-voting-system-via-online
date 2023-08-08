<?php
include './showErros.php';
//include './dbConnection.php';


if (isset($_POST['updatedata'])) 
{
    $idproduct = $_POST['idproducts'];
    $productNam = $_POST['productName'];
    $productDescriptio = $_POST['productDescription'];
    $productCategory = $_POST['productCategory'];
    $sellPric = $_POST['sellPrice'];
    $buyPric = $_POST['buyPrice'];
    $image_ur = $_POST['image_url'];

    $query = "UPDATE `products` SET `productName` = '" . $productNam . "' , `productDescription` = '" . $productDescriptio . "' , `productCategory` = '" . $productCategory . "' , `sellPrice` = '" . $sellPric . "' , `buyPrice` = '" . $buyPric . "' , `image_url` = '" . $image_ur . "' WHERE `idproducts` = '" . $idproducts . "' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Updated"); </script>';
        header("Location: admin_productManager.php");
    } else {
        echo '<script> alert("Data Not Updated"); </script>';
         header("Location: admin_productManager.php");
    }
}
?>
