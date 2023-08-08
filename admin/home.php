<?php
include '../showErros.php';
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
        <link rel="stylesheet" href="../header.css">
        <link rel="stylesheet" href="../footer.css">
        <link rel="stylesheet" href="home.css">
        <link rel="shortcut icon" href="../image/hand-voting-removebg-preview.png">
        <title>Admin Home</title>
    </head>
    <body>
        <!--Navigation bar start -->
        <?php
        include '../admin/header.php';
        ?>
        <!--Navigation bar end -->

        <div style="height: 80vh;">
            <div class="home">
                <button class="home" style="background-color: #f12020;" ><a href="voter_register.php">Voter Register</a></button>
                <button class="home" style="background-color: mediumseagreen;"> <a href="Parties_and_candidates.php">Parties and Candidates</a></button>
                <button class="home" style="background-color: purple;"><a href="electorates.php">Electorates</a></button>
            </div>
        </div>




        <!--footer start -->
        <?php
        include '../footer.php';
        ?>
        <!--footer end -->
    </body>
</html>
