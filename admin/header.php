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
        <nav>
            <ul>
                <li class="logo">Election of Ceylon</li>
                <li class="btn"><span class="fas fa-bars"></span></li>
                <div class="items">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="voter_register.php">Voter Registration</a></li>
                    <li><a href="Parties_and_candidates.php">Party and election candidates</a></li>
                    <li><a href="electorates.php">Electorates</a></li>                    
                    <li><a href="admin_login_logout.php"><img src="../image/logout_mini.png"></a></li>
                </div>
                
            </ul>
        </nav>

        <script>
            $('nav ul li.btn span').click(function () {
                $('nav ul div.items').toggleClass("show");
                $('nav ul li.btn span').toggleClass("show");
            });
        </script>

    </body>
</html>
