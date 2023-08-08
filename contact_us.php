<?php include './showErros.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>C O N T A C T - U S</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="contact_us.css"/>
        <link rel="shortcut icon" href="image/hand-voting-removebg-preview.png">
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <!-- header start -->
        <?php
        include './header.php';
        ?>
        <!-- header end -->
        <div style="width: 100%; height: 90vh;">


            <section id="contact" class="contact">

                <div class="contact-box">
                    <div class="c-heading">
                        <h1>Get In Touch</h1>
                        <p>Call Or Email Us Regarding Question Or Issues</p>
                    </div>
                    <div class="c-inputs">
                        <form>
                            <input type="text" placeholder="Full Name"/>	
                            <input type="email" placeholder="Example@gmail.com"/>
                            <textarea name="message" placeholder="Write Message"></textarea><br>

                            <button class="button">SEND</button>
                        </form>
                    </div>

                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.343637231157!2d79.89048431744386!3d6.910215207214054!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd8dee43b05fd81d1!2sElection%20Commission%20of%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1632122204377!5m2!1sen!2slk" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </section>

        </div>


        <!-- footer end -->  
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




