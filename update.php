<?php
require_once './dbConnect.php';

$id = $_GET["id"];

$sql = "select * from patients where id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $id, PDO::PARAM_STR);
$row = $query->execute();
$row = $query->fetch();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="./style.css">
    <title>Update Page</title></head>



<body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#5000ca" fill-opacity="1" d="M0,160L34.3,165.3C68.6,171,137,181,206,197.3C274.3,213,343,235,411,234.7C480,235,549,213,617,181.3C685.7,149,754,107,823,117.3C891.4,128,960,192,1029,213.3C1097.1,235,1166,213,1234,192C1302.9,171,1371,149,1406,138.7L1440,128L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>

<form method="post"> 
<button class="cta"  name="home">
    <span class="hover-underline-animation"> Home </span>
    <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
        <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
    </svg>
</button>
</form>
<?php 
if(isset($_REQUEST['home']))
{
    header("Location: index.php");

}
?>
<br><br>
<span id="headerContainer">
<h2 id="header">
    Update Patient:
</h2>


</span>
<br><br>

    

<form id="insertForm" action="insert.php" method="POST">

<label class =" label" for="patientName">
    Patient Name: 
<span class="input-wrapper">
  <input class="input" value="<?php echo $row['Name'] ?>" id="patientName" name="patientName" placeholder="Type here..." type="text">
</span>

</label>
<br>
<label class =" label" for="patientAge">
    Patient Age: 
<span class="input-wrapper">
  <input class="input" value="<?php echo $row['Age'] ?>" id="patientAge" name="patientAge" placeholder="Type here..." type="text">
</span>

</label><br>

<label class =" label" for="patientAddress">
    Patient Address: 
<span class="input-wrapper">
  <input class="input" value="<?php echo $row['Address'] ?>" id="patientAddress" name="patientAddress" placeholder="Type here..." type="text">
</span>

</label><br>

<label class =" label" for="patientDisease">
    Patient Disease: 
<span class="input-wrapper">
<select name="disease" value="<?php echo $row['Disease'] ?>" id="disease">
<option value="Allergies">Allergies</option>
<option value="Colds and Flu">Colds and Flu</option>
<option value="Diarrhea">Diarrhea</option>
<option value="Headaches">Headaches</option>
<option value="Mononucleosis">Mononucleosis</option>
<option value="Stomach Aches">Stomach Aches</option>
        </select>
</span>

</label><br>

<button type="submit" name="update" id="submit-ptn"> Add Patient
</button>
</form>

<br><br><br>

<?php

$id = $_GET["id"];

if (isset($_REQUEST["update"])) {
    $name = $_REQUEST["name"];
    $age = $_REQUEST["age"];
    $address = $_REQUEST["address"];
$disease= $_REQUEST["disease"];

    $sql = "update patients set Name = :name, Age = :age, Address = :address, Disease=:disease  where id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_STR);
    $query->bindParam(":name", $name, PDO::PARAM_STR);
    $query->bindParam(":age", $age, PDO::PARAM_STR);
    $query->bindParam(":address", $address, PDO::PARAM_STR);
    $query->bindParam(":disease", $disease, PDO::PARAM_STR);
    $query->execute();

    header("Location: index.php");
}

// <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
// <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
// </body>
// </html>