<?php
include '../showErros.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="../login/styles.css">
        <link rel="shortcut icon" href="../image/hand-voting-removebg-preview.png">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Login & Register Form</title>
    </head>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="../image/img-login.svg" alt="">
                </div>

                <div class="login__forms">
                    <form method="post" action="../admin/admin_login_checkLogin.php" class="login__registre" id="login-in">
                        <h1 class="login__title">Sign In</h1>



                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Please enter NIC" name="password" id="password" class="login__input">
                        </div>
<br/>
                        <a type="submit" href="#" class="login__forgot">Forgot password?</a>

                        <button style="width: 100%; font-size: 1.2em; background-color: rgb(190, 144, 212);
                                color: #FFF;
                                font-weight: 600;
                                text-align: center;
                                cursor: pointer;" type="submit" class="login__button">Sign In</button>

                        <div>
                            <span class="login__account">Don't have an Account ?</span>
                            <span class="login__signin" id="sign-up">Sign Up</span>
                        </div>
                    </form>
                    
                    <form action="../admin/admin_register_user.php" method="POST" class="login__create none" id="login-up">
                        <h1 class="login__title">Create Account</h1>

                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Username" name="username" id="username" class="login__input">
                        </div>

                        <div class="login__box">
                            <i class='bx bx-at login__icon'></i>
                            <input type="text" placeholder="Email" name="email" id="email" class="login__input">
                        </div>

                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" name="password" id="password" class="login__input">
                        </div>

                        <button type="submit" style="width: 100%; font-size: 1.2em; background-color: rgb(190, 144, 212);
                                color: #FFF;
                                font-weight: 600;
                                text-align: center;cursor: pointer;" href="#" class="login__button">Sign Up</button>

                        <div>
                            <span class="login__account">Already have an Account ?</span>
                            <span class="login__signup" id="sign-in">Sign In</span>
                        </div>

                        <div class="login__social">
                            <a href="https://www.facebook.com/" class="login__social-icon"><i class='bx bxl-facebook' ></i></a>
                            <a href="https://twitter.com/" class="login__social-icon"><i class='bx bxl-twitter' ></i></a>
                            <a href="https://mail.google.com/" class="login__social-icon"><i class='bx bxl-google' ></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--===== MAIN JS =====-->
        <script src="../login/main.js"></script>
    </body>
</html>