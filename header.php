<?php
include './showErros.php';
session_start();
//$keyword = "";
//if (isset($_GET['keyword'])) {
//    $keyword = $_GET['keyword'];
//    
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="header.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    </head>
    <body>
        <?php
//} 
        ?>
       <?php
            if (isset($_SESSION["is_login"]) && ($_SESSION["is_login"] == true)) {
                
        ?>
                        <nav>
                            <ul>
                                <li class="logo">Election of Ceylon</li>
                                <li class="btn"><span class="fas fa-bars"></span></li>
                                <div class="items">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="vote_search.php">Vote</a></li>
                                    <li><a href="result.php">Result</a></li>
                                    <li><a href="about_us.php">About</a></li>
                                    <li><a href="contact_us.php">Contact</a></li>                    
                                    <li><a href="index.php"><img src="image/logout_mini.png"></a></li>
                                </div>
                                <li class="search-icon">
                                    <input type="search" name="keyword" id="keyword" placeholder="Search">
                                    <label class="icon">
                                        <span class="fas fa-search"></span>
                                    </label>
                                </li>
                            </ul>
                        </nav>


        <?php
            } else {
                
        ?>
        <nav>
            <ul>
                <li class="logo">Election of Ceylon</li>
                <li class="btn"><span class="fas fa-bars"></span></li>
                <div class="items">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="vote_search.php">Vote</a></li>
                    <li><a href="result.php">Result</a></li>
                    <li><a href="about_us.php">About</a></li>
                    <li><a href="contact_us.php">Contact</a></li>                    
                    <li><a href="login/login.php" style="font-size: 0.8em;">Log In</a></li>|
                    <li><a href="login/login.php" style="font-size: 0.8em;">Register</a></li>
                </div>
                <li class="search-icon">
                    <input type="search" name="keyword" id="keyword" placeholder="Search">
                    <label class="icon">
                        <span class="fas fa-search"></span>
                    </label>
                </li>
            </ul>
        </nav>


        <script>
            $('nav ul li.btn span').click(function () {
                $('nav ul div.items').toggleClass("show");
                $('nav ul li.btn span').toggleClass("show");
            });
        </script>
        <?php
            }
            
        ?>
    </body>
</html>
