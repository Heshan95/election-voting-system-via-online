<?php
include './showErros.php';
include './DB/dbConnection.php';
//
//$nic = "";
//if (isset($_SESSION['nic'])) {
//    $nic = $_SESSION['nic'];
//}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="vote_search.css"/>
        <link rel="stylesheet" href="">
        <link rel="shortcut icon" href="image/hand-voting-removebg-preview.png">
        <title>Before voting Search page</title>
        <?php
        ?>
    </head>
    <body>
        <!-- header start -->
<?php
include './header.php';
?>
        <!-- header end -->


        <div class="center1" style="height: 65vh;">
            <form class="center_text" method="get" action="vote.php">
                <h1>Put your NIC and press Search button..</h1><br>
                <label>
                    <input class="center_text"  type="text" name="nic" placeholder="Enter your NIC here" size="100%" > 
                    <input type="submit" class="button1"/>

                </label>
            </form>
        </div>


        <!-- footer end -->  
<?php
include './footer.php';
?>
        <!-- footer end -->
    </body>
</html>
