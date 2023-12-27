<?php

//include connection file
require '../config/connection.php';


$user_name =  (($_POST['user_name'])) ;
$user_email =  (($_POST['user_email']));
$user_password =  (md5($_POST['user_password']));
$user_contact = (($_POST['user_contact']));
$user_address = (($_POST['user_address']));


//Check duplicacy 

$checkUser="SELECT * FROM users WHERE user_email='$user_email'";
$checkQuery=mysqli_query($conn,$checkUser);
if(mysqli_num_rows($checkQuery)>0){
	
	//Convert  in json format

	$response['error']="001";
	$response['message']="User Exist!";

}
else{


$insertQuery="INSERT INTO users(user_name,user_email,user_password,user_contact,user_address) VALUES('$user_name','$user_email','$user_password','$user_contact','$user_address')";

$result= mysqli_query($conn, ($insertQuery));

if ($result) {

	//Convert code in json format
	$response['error']="000";
	$response['message']="Registeration Successful!";
	//echo "Registration Sucess!";
}
else{
	//Convert code in json format
	$response['error']="002";
	$response['message']="Registraton failed!";
}
}
echo json_encode($response);
?>