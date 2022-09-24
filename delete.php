<?php 

require_once './dbConnect.php';

class Delete{
   protected function deleteRecord($id){

   } 
}

$id = $_REQUEST["id"];

$sql="DELETE FROM patients WHERE id = ?";
$stmt=$conn->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_STR);
$stmt->execute();


///back to home
header("Location: index.php");
   


?>