<?php
include './showErros.php';
session_start();
include './DB/dbConnection.php';
$nic = "";
$district2 = "";
$votedParty = "";
$nic_no = "";
$status = false;
if (isset($_SESSION["is_login"])) {
    if (($_SESSION["is_login"] == true)) {  // The user is  logged in to the home.
        $status = true;
}}


    if (isset($_GET['nic'])) {
        $nic = $_GET['nic'];
        $_SESSION["nic_no"] = $nic;
    }

    if (isset($_SESSION["nic_no"])) {
        $nic_no = $_SESSION["nic_no"];
    }

    $getNIC = "";

    if (isset($_GET['pid'])) {
        $votedParty = $_GET['pid'];
    }
    echo $votedParty;
    $selectVoterQuery = "select * from voter_registration where nic='" . $nic . "'";
    $resultVoter = $connection->query($selectVoterQuery);
    if ($rowVoter = $resultVoter->fetch_assoc()) {
        $district2 = $rowVoter["district_iddistrict"];
        $getNIC = $rowVoter["nic"];
    }
    if ($status) {
        if ($nic === $getNIC) {
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
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" type="text/css" href="vote.css"/>
                    <link rel="shortcut icon" href="image/hand-voting-removebg-preview.png">
                    <title>Voting Page</title>

                </head>
                <body>
                    <!-- header start -->
                    <?php
                    include './header.php';
                    ?>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <div style="width: 30%;height:auto;background:#eeeeee;margin:0% auto;display:flex;flex-direction:column;justify-content: center;align-items:center;">
                        <h1 style="color: #000;">Vote</h1>
                        <br/>
                        <div style='width:100%;height:50%;'>
                            <?php
                            $getPartyies = "select * from parties";
                            $resultParties = $connection->query($getPartyies);
                            while ($rowParties = $resultParties->fetch_assoc()) {
                                ?>
                                <div style="width: 100%;height:25%; padding: 0 10%;
                                     display:flex;justify-content: center;align-items:center;">
                                    <img src="<?php echo "./image/" . $rowParties['logo']; ?>"width="50" height="50"> &emsp;&emsp;&emsp;&emsp;
                                    <a href="vote.php?pid=<?php echo $rowParties["idparties"]; ?>">
                                        <button style="width:2vh;height:3vh;color: #000; font-size: 25px; padding: 0 10px;" name="btn" id="btn" value="<?php echo $rowParties["idparties"]; ?>"></button>
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <form style="width:100%;height:50%;display:flex;flex-direction:column;justify-content: space-around;align-items:center;padding:5vh;" method="post" action="vote_insert.php">
                            <select style="color: #000;" name="voter1">
                                <option style="color: #000;" disabled selected>member 01</option>
                                <?php
                                $qmemb1 = "select * from electors where parties_idparties='" . $votedParty . "'";
                                $resultQuery = $connection->query($qmemb1);
                                while ($rowQuery = $resultQuery->fetch_assoc()) {
                                    ?>
                                    <option style="color: #000;"><?php echo $rowQuery["name"]; ?></option>
                                    <?php
                                }
//                    
                                ?>
                            </select>
                            <select style="color: #000;" name="voter2">
                                <option style="color: #000;" disabled selected>member 02</option>
                                <?php
                                $qmemb2 = "select * from electors where parties_idparties='" . $votedParty . "'";
                                $resultQuery2 = $connection->query($qmemb2);
                                while ($rowQuery2 = $resultQuery2->fetch_assoc()) {
                                    ?>
                                    <option style="color: #000;"><?php echo $rowQuery2["name"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <select style="color: #000;" name="voter3">
                                <option style="color: #000;" disabled selected>member 03</option>
                                <?php
                                $qmemb3 = "select * from electors where parties_idparties='" . $votedParty . "'";
                                $resultQuery3 = $connection->query($qmemb3);
                                while ($rowQuery3 = $resultQuery3->fetch_assoc()) {
                                    ?>
                                    <option style="color: #000;"><?php echo $rowQuery3["name"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <br/>
                            <br/>
                            <?php
                            $selectVoterInfo = "select * from voter_registration where nic='" . $nic_no . "'";
                            $resultinfo = $connection->query($selectVoterInfo);
                            while ($rowinfo = $resultinfo->fetch_assoc()) {
                                ?>
                                <input type="hidden" name="province" value="<?php echo $rowinfo["province_idprovince"]; ?>"/>
                                <input type="hidden" name="district" value="<?php echo $rowinfo["district_iddistrict"]; ?>"/>
                                <input type="hidden" name="division" value="<?php echo $rowinfo["division_iddivision"]; ?>"/>
                                <input type="hidden" name="gndivision" value="<?php echo $rowinfo["gn_division"]; ?>"/>
                            <?php } ?>
                            <input type="hidden" name="party" value="<?php echo $votedParty; ?>"/>
                            <input style="color: #000; width: 80%; cursor: pointer; height: 35px; background: #00999c; color: #eeeeee; padding: 0 10px; border: none; border-radius: 10px;" type="submit" value="Submit"/>
                        </form>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>

                    <!-- footer end -->  
                    <?php
                    include './footer.php';
                    ?>
                    <!-- footer end -->
                </body>
            </html>
            <?php
        } else {
            echo "<script> alert('Hmm.. Looks like your NIC is invalid');location='./vote_search.php' </script>";
        }
}else{
    echo "<script> alert('Hmm.. Looks like you are an Unauthorized Accessed');location='./login/login.php' </script>";
}
    ?>