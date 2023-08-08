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
        <link rel="stylesheet" href="Parties_and_candidates.css">
        <link rel="stylesheet" href="style.css">
        <title>Electorates</title>
    </head>
    <body>
        <!--Navigation bar start -->
        <?php
        include '../admin/header.php';
        ?>
        <!--Navigation bar end -->
        <form action="electorates_insert.php" method="POST">
            <div class="text_one" style="color: #000; height: auto;">
                <div class="container">
                    <lable style="color: #000; font-weight: bold; font-size: 250%;">Provinces Details</lable>
                    <div class="ui_text_field">
                        <input type="text" name="province" id="province" value="" onchange="this.setAttribute('value', this.value)">
                        <label>Province</label>
                    </div>
                    <div class="ui_text_field">
                        <input type="text" name="population" id="population" value="" onchange="this.setAttribute('value', this.value)">
                        <label>Population</label>
                    </div>
                    <button type="submit" name="inserProvince" style="background-color: green; color: white; padding: 10px 10px 10px 10px; border-radius: 5%; font-weight: bold; font-size: larger; cursor: pointer;">Add Data</button>
                    </form>
                </div></div>

            <div style="margin:0;
                 padding:20px;
                 font-family: sans-serif;  justify-content: center; align-items: center;">

                <?php
                $query = "SELECT * FROM `province`";
                $query_run = mysqli_query($connection, $query);
                ?>
                <table class="table" > 
                    <thead>
                    <th>Province</th>
                    <th>Population</th>
                    </thead>
                    <tbody>
                        <?php
                        if ($query_run) {
                            foreach ($query_run as $row) {
                                ?>
                                <tr>
                                    <td style="color: #000;" ><?php echo $row["province"]; ?></td>
                                    <td style="color: #000;" ><?php echo $row["population"]; ?></td>

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


            <form action="electorates_insert.php" method="POST">

                <div class="text_one" style="color: #000; height: auto;">
                    <div class="container">
                        <lable style="color: #000; font-weight: bold; font-size: 250%;">District Details</lable>

                        <?php
                        $query = "SELECT * FROM `province`";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                        <table>
                            <tr>
                                <td> <label style="color: #000;">Select Province</label></td>
                                <td><select
                                    <?php
                                    while ($row = mysqli_fetch_array($query_run)) {
                                        ?>
                                        class="ui_text_field" name="province" id="province" style="color: #000; width: 150%;" >
                                            <option style="color: #000; "><?php echo $row["province"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                        </table>

                        <div class="ui_text_field">
                            <input type="text" name="district" id="district" onchange="this.setAttribute('value', this.value)">
                            <label>District Name</label>
                        </div>
                        <div class="ui_text_field">
                            <input type="text" name="population" id="population" onchange="this.setAttribute('value', this.value)">
                            <label>Population</label>
                        </div>
                        <button type="submit" name="inserDistrict" style="background-color: green; color: white; padding: 10px 10px 10px 10px; border-radius: 5%; font-weight: bold; font-size: larger; cursor: pointer;">Add Data</button>
                        </from>
                    </div>
                </div>

                <div style="margin:0;
                     padding:20px;
                     font-family: sans-serif;  justify-content: center; align-items: center;">

                    <?php
                    $query = "SELECT * FROM `district`";
                    $query_run = mysqli_query($connection, $query);
                    ?>
                    <table class="table" > 
                        <thead>
                        <th>Province</th>
                        <th>District Name</th>
                        <th>Population</th>
                        </thead>
                        <tbody>
                            <?php
                            if ($query_run) {
                                foreach ($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td style="color: #000;" ><?php echo $row["province_idprovince"]; ?></td>
                                        <td style="color: #000;" ><?php echo $row["district"]; ?></td>
                                        <td style="color: #000;" ><?php echo $row["population"]; ?></td>

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


                <form action="electorates_insert.php" method="POST">
                    <div class="text_one" style="color: #000; height: auto;">
                        <div class="container">
                            <lable style="color: #000; font-weight: bold; font-size: 250%;">Division Details</lable>

                            <?php
                            $query = "SELECT * FROM `district`";
                            $query_run = mysqli_query($connection, $query);
                            ?>
                            <table>
                                <tr>
                                    <td> <label style="color: #000;">Select District</label></td>
                                    <td><select 
                                        <?php
                                        while ($row = mysqli_fetch_array($query_run)) {
                                            ?>
                                            class="ui_text_field" name="district" id="district" style="color: #000; width: 150%;" >
                                                <option style="color: #000; "><?php echo $row["district"]; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select></td>
                                </tr>
                            </table>

                            <div class="ui_text_field">
                                <input type="text" name="division" id="division" onchange="this.setAttribute('value', this.value)">
                                <label>Division Name</label>
                            </div>
                            <div class="ui_text_field">
                                <input type="text" name="population" id="population" onchange="this.setAttribute('value', this.value)">
                                <label>Population</label>
                            </div>
                            <button type="submit" name="inserDivision" style="background-color: green; color: white; padding: 10px 10px 10px 10px; border-radius: 5%; font-weight: bold; font-size: larger; cursor: pointer;">Add Data</button>
                            </form>
                        </div>
                    </div>

                    <div style="margin:0;
                         padding:20px;
                         font-family: sans-serif;  justify-content: center; align-items: center;">

                        <?php
                        $query = "SELECT * FROM `division`";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                        <table class="table" > 
                            <thead>
                            <th>District</th>
                            <th>Division Name</th>
                            <th>Population</th>
                            </thead>
                            <tbody>
                                <?php
                                if ($query_run) {
                                    foreach ($query_run as $row) {
                                        ?>

                                        <tr>
                                            <td style="color: #000;" ><?php echo $row["district_iddistrict"]; ?></td>
                                            <td style="color: #000;" ><?php echo $row["division"]; ?></td>
                                            <td style="color: #000;" ><?php echo $row["population"]; ?></td>
                                            
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



                <form action="electorates_insert.php" method="POST">

                    <div class="text_one" style="color: #000; height: auto;">
                        <div class="container">
                            <lable style="color: #000; font-weight: bold; font-size: 250%;">Gramaniladari Division Details</lable>

                            <?php
                            $query = "SELECT * FROM `division`";
                            $query_run = mysqli_query($connection, $query);
                            ?>
                            <table>
                                <tr>
                                    <td> <label style="color: #000;">Select Division</label></td>
                                    <td><select
                                        <?php
                                        while ($row = mysqli_fetch_array($query_run)) {
                                            ?>
                                            class="ui_text_field" name="division" id="division" style="color: #000; width: 150%;" >
                                                <option style="color: #000; "><?php echo $row["division"]; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select></td>
                                </tr>
                            </table>

                            <div class="ui_text_field">
                                <input type="text" name="gndivision" id="gndivision" value="" onchange="this.setAttribute('value', this.value)">
                                <label>Gramaniladari Division Name</label>
                            </div>
                            <div class="ui_text_field">
                                <input type="text" name="population" id="population" value="" onchange="this.setAttribute('value', this.value)">
                                <label>Population</label>
                            </div>
                            <button type="submit" name="inserGndivision" style="background-color: green; color: white; padding: 10px 10px 10px 10px; border-radius: 5%; font-weight: bold; font-size: larger; cursor: pointer;">Add Data</button>
                            </from>
                        </div>
                    </div>

                    <div style="margin:0;
                         padding:20px;
                         font-family: sans-serif;  justify-content: center; align-items: center;">

                        <?php
                        $query = "SELECT * FROM `gramaniladari_division`";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                        <table class="table" > 
                            <thead>
                            <th>Division</th>
                            <th>Gramaniladari Division Name</th>
                            <th>Population</th>
                            </thead>
                            <tbody>

                                <?php
                                if ($query_run) {
                                    foreach ($query_run as $row) {
                                        ?>

                                        <tr>
                                            <td style="color: #000;" ><?php echo $row["division_iddivision"]; ?></td>
                                            <td style="color: #000;" ><?php echo $row["gn_division"]; ?></td>
                                            <td style="color: #000;" ><?php echo $row["population"]; ?></td>

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
                    <

                    <!--footer start -->
                    <?php
                    include '../footer.php';
                    ?>
                    <!--footer end -->
                    </body>
                    </html>
