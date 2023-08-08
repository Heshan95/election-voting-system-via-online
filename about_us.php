<?php 
include './showErros.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>A B O U T - U S</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="about_us.css">
        <link rel="shortcut icon" href="image/hand-voting-removebg-preview.png">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    </head>
    <body>

        <!-- header start -->
        <?php
        include './header.php';
        ?>
        <!-- header end -->

        <div class="content_div">
           
            <div class="about">
                <div class="inner-section">
                    <h1 style="color: #656565;">About Us</h1>
                    <p class="text">
                        The Election Commission of Sri Lanka is the constitutional authority
                        responsible for administering and overseeing all elections in Sri Lanka,
                        including the Presidential, Parliamentary, Provincial and Local Authority elections.
                    </p>
                    <div class="skills">
                        <button><a href="contact_us.php" style="text-decoration: none;">Contact Us</a></button>
                    </div>
                </div>
            </div>
        </div>







        <!-- footer start -->
        <?php
        include './footer.php';
        ?>
        <!-- footer end -->

        <!--query js start-->
        <script>
            $('nav ul li.btn span').click(function () {
                $('nav ul div.items').toggleClass("show");
                $('nav ul li.btn span').toggleClass("show");
            });
        </script>
        <!--query js end-->
    </body>
</html>




