<?php
include './../showErros.php';
include '../DB/dbConnection.php';
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
        <link rel="shortcut icon" href="../image/hand-voting-removebg-preview.png">
        <link rel="stylesheet" href="voter_register.css">
        <link rel="stylesheet" href="style.css">

        <title>Voter Registration</title>
    </head>
    <body>
        <!--Navigation bar start -->
        <?php
        include '../admin/header.php';
        ?>
        <!--Navigation bar end -->

        <!--from start-->
        <form action="voter_register_insert.php" method="POST">
            <div class="text_one" style="height: auto; color: #000;">

                <div class="container">
                    <lable style="color: #000; font-weight: bold; font-size: 250%;">Voter Registration</lable>
                    <table class="table">
                        
                        
                        <table>  
                        <tr>
                            <td> <label style="color: #000;">Select your Province</label></td>
                            <?php
                        $query = "SELECT * FROM `province`";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                            <td><select
                                    <?php
                                    while ($row = mysqli_fetch_array($query_run)) {
                                        ?>
                                    class="ui_text_field" name="province" id="province" style="color: #000; width: 110%;" >
                                    <option style="color: #000; "><?php echo $row["province"]; ?></option>
                                <?php
                                        }
                                        ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td> <label style="color: #000;">Select your District</label></td>
                            <?php
                        $query = "SELECT * FROM `district`";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                            <td><select
                                    <?php
                                    while ($row = mysqli_fetch_array($query_run)) {
                                        ?>
                                    class="ui_text_field" name="district" id="district" style="color: #000; width: 120%;" >
                                    <option style="color: #000;"><?php echo $row["district"]; ?></option>
                                <?php
                                        }
                                        ?>
                                </select></td>
                        </tr>
                        <tr>
                             <?php
                        $query = "SELECT * FROM `division`";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                            <td><label style="color: #000;"> Select your Division</label></td>
                            <td> <select
                                    <?php
                                    while ($row = mysqli_fetch_array($query_run)) {
                                        ?>
                                    class="ui_text_field" name="division" id="division" style="color: #000; width: 115%;">
                                    <option style="color: #000;"><?php echo $row["division"]; ?></option>
                                <?php
                                        }
                                        ?>
                                </select></td>
                        </tr>
                        <tr>
                            <?php
                        $query = "SELECT * FROM `gramaniladari_division`";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                            <td> <label style="color: #000;">Select your Gramaniladari Division</label></td>
                            <td> <select 
                                    <?php
                                    while ($row = mysqli_fetch_array($query_run)) {
                                        ?>
                                    class="ui_text_field" name="gndivision" id="gndivision" style="color: #000; width: 100%; margin-bottom: 15px;">
                                    <option style="color: #000; "><?php echo $row["gn_division"]; ?></option>
                                <?php
                                        }
                                        ?>
                                </select></td>
                        </tr>
                    </table>

          
                    <div class="ui_text_field">
                        <input type="text" name="fullName" id="fullName" onchange="this.setAttribute('value', this.value)">
                        <label>Full name</label>
                    </div>
                    <div class="ui_text_field">
                        <input type="text" name="nic" id="nic" onchange="this.setAttribute('value', this.value)">
                        <label>NIC</label>
                    </div>
                    <div class="ui_text_field">
                        <input type="file" name="photo" id="photo" placeholder="jpg, png, etc..">
                        <label>Photo</label>
                    </div>
                    <!--                <div class="ui_text_field">
                                        <input style="color: #000;" placeholder="Male" type="radio" name="Gender" id="Gender" value="" > Male
                                        <input style="color: #000;" placeholder="Female" type="radio" name="Gender" id="Gender" value="" > Female
                                        <label>Gender</label>
                                    </div>-->
                    <div class="ui_text_field">
                        <input type="text" name="address" id="address" value="" onchange="this.setAttribute('value', this.value)">
                        <label>Address</label>
                    </div>
                    <button type="submit" name="inservoterdetails" style="background-color: green; color: white; padding: 15px 15px 15px 15px; border-radius: 5%; font-weight: bold; font-size: larger; cursor: pointer;">Add Data</button>
                    </form>
                </div>
            </div>

            <div style="
                 margin:0;
                 padding:20px;
                 font-family: sans-serif;">
                 <?php
                 $query = "SELECT * FROM `voter_registration`";
                 $query_run = mysqli_query($connection, $query);
                 ?>
                <table class="table" > 
                    <thead>
                        <tr>
                            <th>Province</th>
                            <th>District</th>
                            <th>Division</th>
                            <th>GN Division</th>
                            <th>Full Name</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>Photo</th>
                        </tr>
                    </thead>                  
                            <tbody>
 <?php
                    if ($query_run) {
                        foreach ($query_run as $row) {
                            ?>
                                <tr>
                                    <td style="color: #000;" ><?php echo $row["province_idprovince"]; ?></td>
                                    <td style="color: #000;" ><?php echo $row["district_iddistrict"]; ?></td>
                                    <td style="color: #000;" ><?php echo $row["division_iddivision"]; ?></td>
                                    <td style="color: #000;" ><?php echo $row["gn_division"]; ?></td>
                                    <td style="color: #000;" ><?php echo $row["full_name"]; ?></td>
                                    <td style="color: #000;" ><?php echo $row["nic"]; ?></td>
                                    <td style="color: #000;" ><?php echo $row["address"]; ?></td>
                                    <td style="color: #000;" ><img src="
                                                                   <?php echo "../image/" . $row['photo']; ?>" width="50" height="50"></td>

                                </tr>

                            </tbody>

                            <?php
                        }
                    } else {
                        echo "No Recode found !";
                    }
                    ?>

                </table>
            </div>

            <!--footer start -->
            <?php
            include '../footer.php';
            ?>
            <!--footer end -->



    </body>
</html>
