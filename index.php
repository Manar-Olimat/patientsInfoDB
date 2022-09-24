<?php
$pageTitle = "Landing Page";
require './dbConnect.php';
?>
<?php


# select based on condition
function selectWhere($id_condition){
    $sql=" SELECT * FROM patients WHERE id=$id_condition ";
$stmt=$conn->query($sql);
$row=$stmt->fetch();
return $row;
}
function select(){
    $sql=" SELECT * FROM patients ";
$stmt=$conn->prepare($sql);
$stmt->execute();
$row=$stmt->fetch();
return $row;
}
#return random img from an array
 function randomImg(){
    $img=[
        ' https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png',
    
        'https://www.shareicon.net/data/512x512/2016/07/26/802031_user_512x512.png',
        
        'https://cdn3.iconfinder.com/data/icons/avatars-round-flat/33/avat-01-512.png',
        
        'https://e7.pngegg.com/pngimages/122/453/png-clipart-computer-icons-user-profile-avatar-female-profile-heroes-head.png',
        
        'https://cdn.pixabay.com/photo/2021/02/12/07/03/icon-6007530_640.png',
        
        'https://cdn1.iconfinder.com/data/icons/avatars-1-5/136/87-512.png',
        
        'https://www.clipartmax.com/png/middle/293-2931307_account-avatar-male-man-person-profile-icon-profile-icons.png'
    ];
    
    $key = array_rand($img);
    $randomNumber = rand(0, (count($img) - 1));
    // Display the random array element
    return $img[$key];
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="./style.css">
    <title>PHP Crud Exercise</title></head>

<body>
<?php 

function getUsrs(){
    // $sql=" SELECT * FROM patients";
    // $stmt=$conn->query($sql);

    $rows=select();
    // generate card for each patient
    ?>
    <div class="row">
    <?php
    foreach ($rows as $row) {?>
        <div class="container">
        <div class="card">
        <div class="img">
            <?php echo '<img src="' . randomImg(). '" alt="avatar">' ;?>
         
  </div>


  <div class="card-details">
    <p class="text-title"> <?php echo $row['Name'] ;?></p>
   
  </div>
<form action="index.php" method="post">
<input type="text" id="id-hidden"  name="id-hidden"
     value=<?php echo $row['id'] ; ?>>
  <button class="card-button" type="button"
  data-bs-toggle="modal" data-bs-target="#exampleModal" 
  name="more-info">More info</button>
</form>

</div>
        </div>


 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label class =" label" for="patientName">
    Patient Name: 
<span class="input-wrapper">
  <input class="input" id="patientName" disabled 
  name="patientName" value="<?php echo $row['Name'] ;?>" type="text">
</span>

</label>
<br>
<label class =" label" for="patientAge">
    Patient Age: 
<span class="input-wrapper">
  <input class="input" disabled id="patientAge"
   name="patientAge" value="<?php echo $row['Age'] ;?>" type="text">
</span>

</label><br>

<label class =" label" for="patientAddress">
    Patient Address: 
<span class="input-wrapper">
  <input class="input" disabled id="patientAddress"
   name="patientAddress" value="<?php echo $row['Address']; ?>" type="text">
</span>

</label><br>    
<label class =" label" for="patientDisease">
    Patient Disease: 
<span class="input-wrapper">
  <input class="input" disabled id="patientDisease"
   name="patientDisease" value="<?php echo $row['Disease'] ;?>" type="text">
</span>

</label><br> 
      </div>
      <div class="modal-footer">
      <form action="update.php" method="get"> 
           <button name="edit-record"  class="edit-record">
      <input type="text" name="id" class="id-hidden" value="<?php echo $row['id'];?>">

    <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="#FFFFFF" height="24" width="24" viewBox="0 0 24 24">
        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
    </svg>
    Edit
</button> </form>

      <form action="delete.php"  method="get"> 
        <input type="text" name="id" class="id-hidden" value="<?php echo $row['id'];?>">
<button class="delete-record" name="delete-record " type="button">
 <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="#ffffff" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg>
    Delete
</button>  </form>



<?php 
    }}
?>
</div>

<!-- landing page  -->

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#5000ca" fill-opacity="1" d="M0,160L34.3,165.3C68.6,171,137,181,206,197.3C274.3,213,343,235,411,234.7C480,235,549,213,617,181.3C685.7,149,754,107,823,117.3C891.4,128,960,192,1029,213.3C1097.1,235,1166,213,1234,192C1302.9,171,1371,149,1406,138.7L1440,128L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>

<span id="headerContainer">
<h2 id="header">
    Welcome to Patients Database!
</h2>
</span>
<br><br>
<div>
    <h4>
        Click Below to Add New Patient Record
    </h4>
   
<form action="insert.php" method="post">
<button class="icon-btn add-btn" name="create">
    <div class="add-icon"></div>
    <div class="btn-txt">Create</div>
</button> </form>








<?php 
getUsrs();

?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>

</html>