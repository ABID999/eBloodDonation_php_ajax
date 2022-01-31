<?php
session_start();


include_once 'Crud.php';

$crud = new Crud();

$user_email = $_SESSION['email'];
$name = $_POST['name'];
$bgroup = $_POST['bgroup'];
$dob = $_POST['dob'];
$division = $_POST['division'];
$phone = $_POST['phone'];
$ldod = $_POST['ldod'];
$td = $_POST['td'];
		
		
	$result = $crud->execute("Update user_info SET name='$name',dob='$dob',bgroup='$bgroup',division='$division',phone='$phone',total_donation='$td',ldod='$ldod' where email='$user_email'");
    //$result = $crud->execute("Update user_info SET name='$name' where  email='$user_email'");
	if($result){
		echo 'Update success';
	}else{
		echo "Update failed";
	}
        
    

?>
    
    