<?php 

// Include config file
require_once "config.php";












function gen_password($length = 6)
{
	$password = '';
	$arr = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
		'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
		'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 
		'1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
	);
 
	for ($i = 0; $i < $length; $i++) {
		$password .= $arr[random_int(0, count($arr) - 1)];
	}
	return $password;
}
 



error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
 // Database connection details. 
//////// End of Database connection /////////
//////////////////////////////////////
$id = $_GET['id']; // member id is fixed here 
$count=$pdo->prepare("select * from users WHERE id=:id");
$count->bindParam(":id",$id);

if($count->execute()){
echo " Success <br>";
$row = $count->fetch(PDO::FETCH_OBJ);
}else{
print_r($pdo->errorInfo());
}
$id = $_GET['id'];

/// Display the form to collect fresh data /// 
?>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>

<!-- <form name='myForm' action='pdo-update2.php' method=post><input type=hidden name=id value='$id'>

<table class='t1'> <input type=hidden name=todo value='change-data'>
<tr><th colspan=2>Update Profile <?php echo $row->id ?></th></tr>
<tr class='r1'><td>Name</td><td><input type=text name='name' value='<?php echo $row->username ?>'></td></tr>
<tr class='r1'><td>tell</td><td><input type=text name='tell' value='<?php echo $row->tell ?>'></td></tr>
<tr class='r0'><td>Password</td><td><input type=text name='password' value='<?php echo gen_password(8) ?>'></td></tr>
<tr class='r1'><td></td><td><input type=submit value='Submit'></td></tr>

</table>
</form> -->

 <div class="wrapper">
 <form action="pdo-update2.php" method="post" name='myForm'  type=hidden name=id value='$id'>
    <tr><th colspan=2>Update Profile <?php echo $row->id ?></th></tr>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $row->username  ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>  
             <div class="form-group">
                <label>Surname</label>
                <input type="text" name="surname" class="form-control <?php echo (!empty($surname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $row->surname ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>  
                <div class="form-group">
                <label>TEL</label>
                <input type="text" name="tell" class="form-control <?php echo (!empty($tel_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $row->tell ?>">
                <span class="invalid-feedback"><?php echo $tel_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo gen_password(8)?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo gen_password(8) ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo  $row->id ?>">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p> <a href="login.php">OK??</a>.</p>
        </form>

</div>
