<?php
include '../showErros.php';
session_start();
if (isset($_SESSION["is_login"])) {
    if (($_SESSION["is_login"] == true)) {  // The user is  logged in to the home.
        header("Location: index.php"); // User log wela inne ee nisa home page ekata directed wenawa. mokada amuthuwen check karanna deyak nh username password.
        exit();
    }
} else {

    include '../DB/dbConnection.php';
    
    $passwd="";
    if (isset($_POST["password"])) {
        $pwd = $_POST["password"];
       
    $_SESSION["vid"]=$pwd;
        $searchAdminQuery="select * from `admin` where `password`='".$pwd."'";
        
           $result = $connection->query($searchAdminQuery);
            if ($row = $result->fetch_assoc()) {
                $passwd=$row['password'];
            }
        if ($pwd==$passwd) {
            $_SESSION["is_admin_login"] = true;
            header("Location: ./home.php");
            exit();
        } else {

            $searchQuery = "SELECT * FROM `voter_registration` WHERE `nic`='".$pwd."'";

            $result = $connection->query($searchQuery);
            if ($row = $result->fetch_assoc()) {
                $_SESSION["is_login"] = true;    
                $_SESSION["userid"]=$row['nic'];
                header("Location:  ../vote_search.php");
                exit();
            } else{
                    echo "<script> alert('Invalid Access');location='../login/login.php' </script>";
                }
            }
        }
}
?>

