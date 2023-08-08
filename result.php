<?php
include './showErros.php';
include './DB/dbConnection.php';


$districtid = "";
$province_id = "";
$division_id = "";
$totalCount = 0;
$divisionholderName="";
$totalDistrictCount = 0;
$totalProvinceCount = 0;
$totalDivCount = 0;

if (isset($_GET["district"])) {
    $districtid = $_GET["district"];
}

if (isset($_GET["province"])) {
    $province_id = $_GET["province"];
}

if (isset($_GET["iddivision"])) {
     $division_name = $_GET["iddivision"];
    $getDivisionIDquery = "select * from division where division ='" . $division_name . "'";
    $resultDivID = $connection->query($getDivisionIDquery);
    if ($rowDivID = $resultDivID->fetch_assoc()) {
        $division_id = $rowDivID["iddivision"];
    }
}




$searchTotalVotings = "SELECT * FROM vote join parties on vote.party=parties.idparties";
$resultTotalVotings = $connection->query($searchTotalVotings);
while ($rowTotalVotings = $resultTotalVotings->fetch_assoc()) {
    $totalCount = $totalCount + 1;
}

$searchTotalVotings2 = "SELECT * FROM vote join parties on vote.party=parties.idparties AND vote.district_iddistrict='" . $districtid . "'";
$resultTotalVotings2 = $connection->query($searchTotalVotings2);
while ($rowTotalVotings2 = $resultTotalVotings2->fetch_assoc()) {
    $totalDistrictCount = $totalDistrictCount + 1;
}

$searchTotalVotings4 = "SELECT * FROM vote join parties on vote.party=parties.idparties AND vote.province_idprovince='" . $province_id . "'";
$resultTotalVotings4 = $connection->query($searchTotalVotings4);
while ($rowTotalVotings4 = $resultTotalVotings4->fetch_assoc()) {
    $totalProvinceCount = $totalProvinceCount + 1;
}

$searchTotalVotings3 = "SELECT * FROM vote join parties on vote.party=parties.idparties AND vote.division_iddivision='" . $division_id . "'";
$resultTotalVotings3 = $connection->query($searchTotalVotings3);
while ($rowTotalVotings3 = $resultTotalVotings3->fetch_assoc()) {
    $totalDivCount = $totalDivCount + 1;
}
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
        <link rel="stylesheet" type="text/css" href="result.css"/>
        <link rel="shortcut icon" href="image/hand-voting-removebg-preview.png">
        <title>Result</title>
    </head>
    <body>
        <!-- header start -->
        <?php
        include './header.php';
        ?>
        <!-- header end -->


        <!-- Province results -->
        <div style="height: auto; color: black;" class="skills" class="new_body">
            <h1 style="color: #000;">Results</h1>
            <?php
            $query = "SELECT * FROM `province`";
            $query_run = mysqli_query($connection, $query);
            ?>
                <h2 style="color: black;">Province Results</h2>
                <form method="get" action="result.php">
                <select class="ui_text_field" name="province" id="province" style="color: #000; width: 50%; height: 5%;padding: 5px 5px; margin-left: 15%;" >
                <?php
                while ($row = mysqli_fetch_array($query_run)) {
                    ?>
                    <option style="color: #000;" value="<?php echo $row["idprovince"];?>"><?php echo $row["province"]; ?></option>
                        <?php
                    }
                    ?>
                </select> 
            <input type="submit" value="search" style="color:black;background:#cecece ; font-weight: bold;cursor: pointer;border-radius: 10px; width: 100px; padding: 5px 3px ;height:5%; "/>
            </form>
            <?php
                        if ($province_id === "") {
                            $queryPartySelector = "select * from parties";
                            $resultSelector = $connection->query($queryPartySelector);
                            while ($rowSelector = $resultSelector->fetch_assoc()) {
                                ?>
                                <div class="container2">
                                    <div class="picture"><img src="<?php echo "./image/". $rowSelector["logo"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                <!--<div class="progress" max="10" value="<?php // $val = "2"; echo $val;    ?>"></div>-->
                                    <div class="container-div">
                                        <div style="
                                             width: 0%;
                                             height: 11px;
                                             background-color: <?php echo $rowSelector["colour"]; ?>;
                                             border-top-right-radius: 10px;
                                             border-bottom-right-radius: 10px;
                                             position: absolute;
                                             z-index: 2;
                                             "></div>
                                        <div class="status-bar-text">    
                                            <h6 style="color: #000;" class="val3"><?php echo $rowSelector["name"]; ?></h6>
                                            <h5 style="color: #000;" class="val2">0%</h5>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            $selectDistrictExistanceQuery="select * from vote where province_idprovince='".$province_id."'";
                               $selectDistrictExistanceResult=$connection->query($selectDistrictExistanceQuery);
                               if($selectDistrictExistanceRow=$selectDistrictExistanceResult->fetch_assoc()){
                            ?>
                            <?php
                            $party_id = "";
                            $searchParty = "SELECT * FROM parties";
                            $resultVote1 = $connection->query($searchParty);
                            while ($rowSearch1 = $resultVote1->fetch_assoc()) {
                                $party_id = $rowSearch1["idparties"];

                                $searchPartyVotes3 = "SELECT COUNT(vote.idvote),logo,colour,name FROM vote join parties on vote.party=parties.idparties where parties.idparties='" . $party_id . "' AND vote.province_idprovince='" . $province_id . "'";
                                $resultVote3 = $connection->query($searchPartyVotes3);
                                while ($rowSearch3 = $resultVote3->fetch_assoc()) {
                                    $partyCount3 = $rowSearch3["COUNT(vote.idvote)"];
                                    $calculation3 = ($partyCount3 / $totalProvinceCount) * 100;
                                    ?>
                                    <div class="container2">
                                        <div class="picture"><img src="<?php echo "./image/". $rowSearch1["logo"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                    <!--<div class="progress" max="10" value="<?php // $val = "2"; echo $val;    ?>"></div>-->
                                        <div class="container-div">
                                            <div style="
                                                 width: <?php echo $calculation3; ?>%;
                                                 height: 11px;
                                                 background-color: <?php echo $rowSearch1["colour"]; ?>;
                                                 border-top-right-radius: 10px;
                                                 border-bottom-right-radius: 10px;
                                                 position: absolute;
                                                 z-index: 2;
                                                 "></div>
                                            <div class="status-bar-text">
                                                <h6 style="color: #000;" class="val3"><?php echo $rowSearch1["name"]; ?></h6>
                                                <h5 style="color: #000;" class="val2"><?php echo round($calculation3); ?>%</h5>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                    <?php
                                }
                            }
                        }else{
                            $districtNotExisQuery="select * from province where idprovince='".$province_id."'";
                            $districtNotExisResult=$connection->query($districtNotExisQuery);
                            if($districtNotExisRow=$districtNotExisResult->fetch_assoc()){
                                $existedPName=$districtNotExisRow["province"];
                             echo "<script> alert('Still There are No Votes From $existedPName Province');location='result.php' </script>";die();
                            }else{
                             echo "<script> alert('Invalid Province Record');location='result.php' </script>";die();
                            }
                        }
                        
                                }
                        ?>
            <br>
            <li>
                <span <h5 style="color: #000;">Rejects votes :</h5><label style="color: #000;"> 10 </label></span> &emsp;&emsp;&emsp;&emsp;
                <span <h5 style="color: #000;">Total votes :</h5><label style="color: #000;"> 100 </label></span>
            </li>

        </div><br>
        <!-- Province results -->



        <!-- District results -->
        <div style="height: auto; color: black;" class="skills" class="new_body" id="district_div">
            <?php
            $query2 = "SELECT * FROM `district`";
            $query_run2= mysqli_query($connection, $query2);
            ?>
            <form method="get" action="result.php#district_div">
                <h2 style="color: black;">District Results</h2>
                <select
                        class="ui_text_field" name="district" id="district" style="color: #000; width: 50%; height: 5%;
                        padding: 5px 5px; margin-left: 15%;" >
                    <option disabled selected>Select The District</option>
                <?php
                while ($row2 = mysqli_fetch_array($query_run2)) {
                    ?>
                        <option style="color: #000;" value="<?php echo $row2["iddistrict"];?>"><?php echo $row2["district"]; ?></option>
                        <?php
                    }
                    ?>
                </select> 
                <input type="submit" value="search" style="color:black;background:#cecece ; font-weight: bold;cursor: pointer;border-radius: 10px; width: 100px; padding: 5px 3px ;height:5%; "/>
            </form>
            <?php
                        if ($districtid === "") {
                            $queryPartySelector = "select * from parties";
                            $resultSelector = $connection->query($queryPartySelector);
                            while ($rowSelector = $resultSelector->fetch_assoc()) {
                                ?>
                                <div class="container2">
                                    <div class="picture"><img src="<?php echo "./image/". $rowSelector["logo"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                <!--<div class="progress" max="10" value="<?php // $val = "2"; echo $val;    ?>"></div>-->
                                    <div class="container-div">
                                        <div style="
                                             width: 0%;
                                             height: 11px;
                                             background-color: <?php echo $rowSelector["colour"]; ?>;
                                             border-top-right-radius: 10px;
                                             border-bottom-right-radius: 10px;
                                             position: absolute;
                                             z-index: 2;
                                             "></div>
                                        <div class="status-bar-text">    
                                            <h6 style="color: #000;" class="val3"><?php echo $rowSelector["name"]; ?></h6>
                                            <h5 style="color: #000;" class="val2">0%</h5>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            $selectDistrictExistanceQuery="select * from vote where district_iddistrict='".$districtid."'";
                               $selectDistrictExistanceResult=$connection->query($selectDistrictExistanceQuery);
                               if($selectDistrictExistanceRow=$selectDistrictExistanceResult->fetch_assoc()){
                            ?>
                            <?php
                            $party_id = "";
                            $searchParty = "SELECT * FROM parties";
                            $resultVote1 = $connection->query($searchParty);
                            while ($rowSearch1 = $resultVote1->fetch_assoc()) {
                                $party_id = $rowSearch1["idparties"];

                                $searchPartyVotes3 = "SELECT COUNT(vote.idvote),logo,colour,name FROM vote join parties on vote.party=parties.idparties where parties.idparties='" . $party_id . "' AND vote.district_iddistrict='" . $districtid . "'";
                                $resultVote3 = $connection->query($searchPartyVotes3);
                                while ($rowSearch3 = $resultVote3->fetch_assoc()) {
                                    $partyCount3 = $rowSearch3["COUNT(vote.idvote)"];
                                    $calculation3 = ($partyCount3 / $totalDistrictCount) * 100;
                                    ?>
                                    <div class="container2">
                                        <div class="picture"><img src="<?php echo "./image/". $rowSearch1["logo"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                    <!--<div class="progress" max="10" value="<?php // $val = "2"; echo $val;    ?>"></div>-->
                                        <div class="container-div">
                                            <div style="
                                                 width: <?php echo $calculation3; ?>%;
                                                 height: 11px;
                                                 background-color: <?php echo $rowSearch1["colour"]; ?>;
                                                 border-top-right-radius: 10px;
                                                 border-bottom-right-radius: 10px;
                                                 position: absolute;
                                                 z-index: 2;
                                                 "></div>
                                            <div class="status-bar-text">
                                                <h6 style="color: #000;" class="val3"><?php echo $rowSearch1["name"]; ?></h6>
                                                <h5 style="color: #000;" class="val2"><?php echo round($calculation3); ?>%</h5>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                    <?php
                                }
                            }
                        }else{
                            $districtNotExisQuery="select * from district where iddistrict='".$districtid."'";
                            $districtNotExisResult=$connection->query($districtNotExisQuery);
                            if($districtNotExisRow=$districtNotExisResult->fetch_assoc()){
                                $existedDiName=$districtNotExisRow["district"];
                             echo "<script> alert('Still There are No Votes From $existedDiName District');location='result.php' </script>";die();
                            }else{
                             echo "<script> alert('Invalid District Record');location='result.php' </script>";die();
                            }
                        }
                        
                                }
                        ?>

            <br>
            <li>
                <span <h5 style="color: #000;">Rejects votes :</h5><label style="color: #000;"> 10 </label></span> &emsp;&emsp;&emsp;&emsp;
                <span <h5 style="color: #000;">Total votes :</h5><label style="color: #000;"> 100 </label></span>
            </li>

        </div><br>
        <!-- District results -->


        <!-- Division results -->
        <div style="height: auto; color: black;" class="skills" class="new_body" id="div-section">
            <?php
            $query = "SELECT * FROM `division`";
            $query_run = mysqli_query($connection, $query);
            ?>
            <h2 style="color: black;">Division Results</h2>
            <form method="get" action="result.php#div-section" class="form">
                 <?php
                            if ($divisionholderName === "") {
                                ?>
                                <input name="iddivision" type="text" placeholder="Enter Division" class="comboDistrict"/>
                                <?php
                            } else {
                                ?>
                                <input name="iddivision" type="text" placeholder="<?php echo $divisionholderName; ?> " class="comboDistrict"/>
                                
                                <?php
                            }
                            ?>
                &nbsp;&nbsp;
                <input type="submit" value="Search" style="color:black;background:#cecece ; font-weight: bold;cursor: pointer;border-radius: 10px; width: 100px; padding: 5px 3px ;height:5%; "/>
            </form>
            <br>
            <?php
               $party_id_query="select * from vote where division_iddivision='".$division_id."'";
               $result_querw=$connection->query($party_id_query);
               if($row_quew = $result_querw->fetch_assoc()){
                   
                        if ($division_id === "") {
                            $queryPartySelector2 = "select * from parties";
                            $resultSelector2 = $connection->query($queryPartySelector2);
                            while ($rowSelector2 = $resultSelector2->fetch_assoc()) {
                                ?>
                                <div class="container2">
                                    <div class="picture"><img src="<?php echo "./image/".$rowSelector2["logo"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                    <div class="container-div">
                                        <div style="
                                             width: 0%;
                                             height: 11px;
                                             background-color: <?php echo $rowSelector2["colour"]; ?>;
                                             border-top-right-radius: 10px;
                                             border-bottom-right-radius: 10px;
                                             position: absolute;
                                             z-index: 2;
                                             "></div>
                                        <div class="status-bar-text">    
                                            <h6 class="val3"><?php echo $rowSelector2["name"]; ?></h6>
                                            <h5 class="val2">0%</h5>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <?php
                            $party_id2 = "";
                            $searchParty12 = "SELECT * FROM parties";
                            $resultVote12 = $connection->query($searchParty12);
                            while ($rowSearch12 = $resultVote12->fetch_assoc()) {
                                $party_id2 = $rowSearch12["idparties"];

                                $searchPartyVotes4 = "SELECT COUNT(vote.idvote),logo,colour,name FROM vote join parties on vote.party=parties.idparties where parties.idparties='" . $party_id2 . "' AND vote.division_iddivision ='" . $division_id . "' ";
                                $resultVote4 = $connection->query($searchPartyVotes4);
                                while ($rowSearch4 = $resultVote4->fetch_assoc()) {
                                    $partyCount4 = $rowSearch4["COUNT(vote.idvote)"];
                                    $calculation4 = ($partyCount4 / $totalDivCount) * 100;
                                    ?>
                                    <div class="container2">
                                        <div class="picture"><img src="<?php echo "./image/".$rowSearch12["logo"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                        <div class="container-div">
                                            <div style="
                                                 width: <?php echo $calculation4; ?>%;
                                                 height: 11px;
                                                 background-color: <?php echo $rowSearch12["colour"]; ?>;
                                                 border-top-right-radius: 10px;
                                                 border-bottom-right-radius: 10px;
                                                 position: absolute;
                                                 z-index: 2;"></div>
                                            <div class="status-bar-text">
                                                <h6 style="color: #000;" class="val3"><?php echo $rowSearch12["name"]; ?></h6>
                                                <h5 style="color: #000;" class="val2"><?php echo round($calculation4); ?>%</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
               }else{
                   $queryPartySelector2 = "select * from parties";
                            $resultSelector2 = $connection->query($queryPartySelector2);
                            while ($rowSelector2 = $resultSelector2->fetch_assoc()) {
                                ?>
                                <div class="container2">
                                    <div class="picture"><img src="<?php echo "./image/".$rowSelector2["logo"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                    <div class="container-div">
                                        <div style="
                                             width: 0%;
                                             height: 11px;
                                             background-color: <?php echo $rowSelector2["colour"]; ?>;
                                             border-top-right-radius: 10px;
                                             border-bottom-right-radius: 10px;
                                             position: absolute;
                                             z-index: 2;
                                             "></div>
                                        <div class="status-bar-text">    
                                            <h6 style="color: #000;" class="val3"><?php echo $rowSelector2["name"]; ?></h6>
                                            <h5 style="color: #000;" class="val2">0%</h5>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
               }
                        ?>
                <li>
                    <span <h5 style="color: #000;">Rejects votes :</h5><label style="color: #000;"> 10 </label></span> &emsp;&emsp;&emsp;&emsp;
                    <span <h5 style="color: #000;">Total votes :</h5><label style="color: #000;"> 100 </label></span>
                </li>

            </div><br>
            <!-- Division results -->

            <!-- Total results -->
            <div style="height: auto; color: black;" class="skills" class="new_body">
                <h1 style="color: #000;">Total Results</h1>
    <?php
    $party_id = "";
    $searchParty = "SELECT * FROM parties";
    $resultVote1 = $connection->query($searchParty);
    ?>
                <?php
                while ($rowSearch1 = $resultVote1->fetch_assoc()) {
                    $party_id = $rowSearch1["idparties"];

                    $searchPartyVotes = "SELECT COUNT(vote.idvote),logo,colour,name FROM vote join parties on vote.party=parties.idparties where parties.idparties='" . $party_id . "'";
                    $resultVote2 = $connection->query($searchPartyVotes);
                    while ($rowSearch2 = $resultVote2->fetch_assoc()) {
                        $partyCount = $rowSearch2["COUNT(vote.idvote)"];
                        $calculation = ($partyCount / $totalCount) * 100;
                        ?>
                        <div class="container">
                            <div class="picture"><img src="<?php echo "./image/" . $rowSearch2['logo']; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;

                            <div class="container-div">
                                <div style="
                                     width: <?php echo $calculation; ?>%;
                                     height: 11px;
                                     background-color: <?php echo $rowSearch2["colour"]; ?>;
                                     border-top-right-radius: 10px;
                                     border-bottom-right-radius: 10px;
                                     position: absolute;
                                     z-index: 2;
                                     transition: 0.5s;
                                     "></div>
                                <div class="status-bar-text">
                                    <h6 style="color: #000;" class="val3"><?php echo $rowSearch2["name"]; ?></h6>
                                    <h5 style="color: #000;" class="val"><?php echo round($calculation); ?>%</h5>
                                </div>
                            </div>
                        </div>  



            <?php
        }
    }
    ?>

                <br>
                <li>
                    <span <h5 style="color: #000;">Rejects votes :</h5><label style="color: #000;"> 10 </label></span> &emsp;&emsp;&emsp;&emsp;
                    <span <h5 style="color: #000;">Total votes :</h5><label style="color: #000;"> 100 </label></span>
                </li>

            </div>
            <!-- Total results -->

            <!-- footer end -->  
            <?php
            include './footer.php';
            ?>
        <!-- footer end -->
    </body>
</html>
