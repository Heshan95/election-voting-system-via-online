<?php
include './showErros.php';
include './DB/dbConnection.php';

$voter1_id = "";
$voter2_id = "";
$voter3_id = "";

$province = "";
if (isset($_POST["province"])) {
    $province = $_POST["province"];
}
$district = "";
if (isset($_POST["district"])) {
    $district = $_POST["district"];
}
$division = "";
if (isset($_POST["division"])) {
    $division = $_POST["division"];
}
$gndivision = "";
if (isset($_POST["gndivision"])) {
    $gndivision = $_POST["gndivision"];
}
$party = "";
if (isset($_POST["party"])) {
    $party = $_POST["party"];
}
$voter1 = "";
if (isset($_POST["voter1"])) {
    $voter1 = $_POST["voter1"];
}
$voter2 = "";
if (isset($_POST["voter2"])) {
    $voter2 = $_POST["voter2"];
}
$voter3 = "";
if (isset($_POST["voter3"])) {
    $voter3 = $_POST["voter3"];
}



$voter1_query = " select * from electors where name = '" . $voter1 . "' and parties_idparties = '" . $party . "'  ";
$resultV1 = $connection->query($voter1_query);
if ($rowv1 = $resultV1->fetch_assoc()) {
    $voter1_id = $rowv1["idelectors"];
}

$voter2_query = " select * from electors where name = '" . $voter2 . "' and parties_idparties = '" . $party . "'  ";
$resultV2 = $connection->query($voter2_query);
if ($rowv2 = $resultV2->fetch_assoc()) {
    $voter2_id = $rowv2["idelectors"];
}

$voter3_query = " select * from electors where name = '" . $voter3 . "' and parties_idparties = '" . $party . "'  ";
$resultV3 = $connection->query($voter3_query);
if ($rowv3 = $resultV3->fetch_assoc()) {
    $voter3_id = $rowv3["idelectors"];
}

//
//echo $voter1_id;
//?>
<br/>
<?php
//echo $voter2_id;
//?>
<br/>
<?php
//echo $voter3_id;
//?>
<br/>
<?php
//echo $province;
//?>
<br/>
<?php
//echo $district;
//?>
<br/>
<?php
//echo $division;
//?>
<br/>
<?php
//echo $gndivision;
//?>
<br/>
<?php
//echo $party;

$queryInsert = "insert into vote(elector1,elector2,elector3,province_idprovince,district_iddistrict,division_iddivision,gramaniladari_division_idgramaniladari_division,party)values('" . $voter1_id . "','" . $voter2_id . "','" . $voter3_id . "','" . $province . "','" . $district . "','" . $division . "','" . $gndivision . "','" . $party . "')";
$query_run = mysqli_query($connection, $queryInsert);

//    echo $query_run;
    if ($query_run) {
        echo '<script> alert("Recorded !!!"); </script>';
        header('Location: thankyou.php');
    } else {
        echo '<script> alert("Somthing Wrong !!!"); </script>';
        header('Location: vote.php');
    }
?>