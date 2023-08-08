<?php
include './showErros.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="index.css">        
        <link rel="shortcut icon" href="image/hand-voting-removebg-preview.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Election of Ceylon</title>
    </head>
    <!--Navigation Bar-->
    <?php
    include './header.php';
    ?>
    <!--Navigation Bar-->


    <img src="image/national flag.jpg" width="100%" height="" alt="Parliament-of-Sri-Lanka-Logo"/>
    <div class="text1">
        <h2 style="text-shadow: 0px 1px 1px rgba(0, 0, 0, 0.925);">The vote is</h2>
    </div>

    <div id="main" >
        <div class="box" >
            <div class="letter">Y</div>
        </div>
        <div class="box">
            <div class="letter">O</div>
        </div>
        <div class="box">
            <div class="letter">U</div>
        </div>
        <div class="box">
            <div class="letter">R</div>
        </div>
        <div class="box">
            <div class="letter">S</div>
        </div>
    </div>

    <div class="backgraound">
        <div class="youtube"> <iframe width="80%" height="500vh" src="https://www.youtube.com/embed/pnoz_oZFfig" 
                                      title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; 
                                      clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div>
    
    </div>
    
    <div class="backgraound1" style="height: 80vh;">
    <div class="election_map">
        <iframe src="https://www.google.com/maps/d/embed?mid=1uyJXC5desMc6DG_nuvqwHNGzWuI-Li05" width="100%" height="500vh"></iframe>
    </div>
    </div>
    



    <!--footer start -->
    <?php
    include './footer.php';
    ?>
    <!--footer end -->

    <script>
        $(document).scroll(function () {
            var scroll = $(window).scrollTop();
            var amount = -160 + (scroll * 0.8);
            if (amount < 10)
            {
                $('.letter').css({left: amount + "px"});
            }
        });
    </script>

</body>
</html>
