<?php
include '../showErros.php';
include './../DB/dbConnection.php';

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

//echo $userName;
//echo $password;
//echo $email;
$select = "SELECT * FROM `admin`";
 $check = $connection->query($select);
 if ($check->num_rows > 0) {
    while($row = $check->fetch_assoc()){
        if($row['email']==$email){
            header("Location: ../login/login.php?msg=Email already exists");die();
//        } else if($row['username']==$username){
//            header("Location: ../admin/admin_register.php?msg=Username already exists");die();
//        }
    }
    }
 }

$query = "INSERT INTO `admin`(`idadmin`,`username`,`password`,`email`) VALUES ('0','".$username."','".$password."',".$email."')";
  

$isSaved = mysqli_query($connection, $query);

if($isSaved){
    echo "SUCCESS";
    header("Location: ../index.php?msg=Success ! ");die();
}else{
    echo "ERROR";
    header("Location: ../login/login.php?msg=Error : ".$connection->error);die();

}


        
?>

