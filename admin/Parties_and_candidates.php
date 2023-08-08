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
        <title>Parties and Election Candidates</title>
    </head>
    <body>
        <!--Navigation bar start -->
        <?php
        include '../admin/header.php';
        ?>
        <!--Navigation bar end -->

        <!--form Start-->
        <form action="Parties_and_candidates_insert.php" method="POST">

            <div class="text_one" style="color: #000; height: auto;">
                <div class="container">
                    <lable style="color: #000; font-weight: bold; font-size: 250%;">Parties Registration</lable>
                    <div class="ui_text_field">
                        <input type="text" name="id" id="id" onchange="this.setAttribute('value', this.value)">
                        <label>ID</label>
                    </div>
                    <div class="ui_text_field">
                        <input type="text" name="nameOfParty" id="nameOfParty" onchange="this.setAttribute('value', this.value)">
                        <label>Name of Party</label>
                    </div>
                    <div class="ui_text_field">
                        <input type="file" name="photo" id="photo" placeholder="jpg, png, etc..">
                        <label>Logo</label>
                    </div>

                    <div class="ui_text_field">
                        <input type="text" name="colour" id="colour" onchange="this.setAttribute('value', this.value)">
                        <label>Colour</label>
                    </div>
                    <button type="submit" name="inserparties" style="background-color: green; color: white; padding: 15px 15px 15px 15px; border-radius: 5%; font-weight: bold; font-size: larger; cursor: pointer;">Add Data</button>
                    </form>
                    <!--form end-->
                </div>
            </div>

            <div style="
                 margin:0;
                 padding:20px;
                 font-family: sans-serif;">
                 <?php
                 $query = "SELECT * FROM `parties`";
                 $query_run = mysqli_query($connection, $query);
                 ?>
                <table class="table" > 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name of Party</th>
                            <th>Logo</th>
                            <th>Colour Code</th>
                        </tr>
                    </thead>

                    <?php
                    if ($query_run) {
                        foreach ($query_run as $row) {
                            ?>

                            <tbody>

                                <tr>
                                    <td style="color: #000;" ><?php echo $row["idparties"]; ?></td>
                                    <td style="color: #000;" ><?php echo $row["name"]; ?></td>
                                    <td style="color: #000;" ><img src="
                                                                   <?php echo "../image/" . $row['logo']; ?>" width="50" height="50"></td>

                                    <td style="color: #000;" ><?php echo $row["colour"]; ?></td>
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




            <form action="Parties_and_candidates_insert.php" method="POST">
                <div class="text_one" style="color: #000;height: auto;">
                    <div class="container">
                        <lable style="color: #000; font-weight: bold; font-size: 250%;">Elector Registration</lable>

                        <?php
                        $query = "SELECT * FROM `parties`";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                        <table>                            
                            <tr>
                                <td> <label style="color: #000;">Select your Party</label></td>
                                <td><select
                                    <?php
                                    while ($row = mysqli_fetch_array($query_run)) {
                                        ?>
                                            class="ui_text_field" name="province" id="province" style="color: #000; width: 150%;" >
                                            <option style="color: #000; "><?php echo $row["name"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select></td>
                            </tr>


                        </table>

                        <div class="ui_text_field">
                            <input type="text" name="number" id="number" onchange="this.setAttribute('value', this.value)">
                            <label>Voter Number</label>
                        </div>
                        <div class="ui_text_field">
                            <input type="text" name="nameOfElector" id="nameOfElector" onchange="this.setAttribute('value', this.value)">
                            <label>Name of Elector</label>
                        </div>
                        <div class="ui_text_field">
                            <input type="file" name="photo" id="photo" placeholder="jpg, png, etc.." onchange="this.setAttribute('value', this.value)">
                            <label>Photo</label>
                        </div>
                        <button type="submit" name="inserelector"  style="background-color: green; color: white; padding: 15px 15px 15px 15px; border-radius: 5%; font-weight: bold; font-size: larger; cursor: pointer;">Add Data</button>
                        </form>
                    </div>
                </div>

                <div style="margin:0;
                     padding:20px;
                     font-family: sans-serif;  justify-content: center; align-items: center;">

                    <?php
                    $query = "SELECT * FROM `electors`";
                    $query_run = mysqli_query($connection, $query);
                    ?>

                    <table  class="table" > 
                        <thead>
                        <th>Party</th>
                        <th>Vote number</th>
                        <th>Name of Eletcor</th>
                        <th>Photo</th>
                        </thead>
                        <tbody>

                            <?php
                            if ($query_run) {
                                foreach ($query_run as $row) {
                                    ?>

                                    <tr>
                                        <td style="color: #000;" ><?php echo $row["parties_idparties"]; ?></td>
                                        <td style="color: #000;" ><?php echo $row["idelectors"]; ?></td>
                                        <td style="color: #000;" ><?php echo $row["name"]; ?></td>
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
