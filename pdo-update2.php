<?php 
error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
require "config.php"; // Database connection details. 
//////// End of Database connection /////////

/////////////Collect form data/////////////
 $id=$_POST['id'];
// $username=$_POST['username'];
// $surname=$_POST['surname'];
// $tell=$_POST['tell'];
// $password=$_POST['password'];

;

// $step = $pdo->prepare("update users set username=:username,surname=:surname,tell=:tell where id=:id");

// $step->bindParam(':username',$username);
// print_r($step);
// $step->bindParam(':surname',$surname);
// $step->bindParam(':tell',$tell);
// $step->bindParam(':id',$id);

// if($step->execute()){
// echo "Successfully updated Profile";
// //header( "Refresh:0.5; url='admin.php'");
// }// End of if profile is ok 
// else{
// print_r($step->errorInfo()); // if any error is there it will be posted
// $msg=" Database problem, please contact site admin ";
// }

	  $password = trim($_POST["password"]);
       $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
	$sql = 'UPDATE users 
                SET 
                 username =:username,
                 password =:password,
                 surname =:surname,
               tell =:tell 
               WHERE id =:id';

    $stmt = $pdo->prepare($sql);
    //print_r($_POST['id']);

    $stmt->bindValue(":id", $id);
    $stmt->bindValue(":username", $_POST["username"]);
    $stmt->bindValue(":password", $param_password);

    $stmt->bindValue(":surname", $_POST["surname"]);
   $stmt->bindValue(":tell", $_POST["tell"]);
    $stmt->execute();
    if($stmt->execute()){
echo "Successfully updated Profile";
header( "Refresh:0.5; url='admin.php'");
}// End of if profile is ok 
else{
print_r($stmt->errorInfo()); // if any error is there it will be posted
$msg=" Database problem, please contact site admin ";
}
    