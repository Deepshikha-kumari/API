<?php

//include connection file
require '../config/connection.php';



$user_email =  (($_POST['user_email']));
$user_password=(md5($_POST['user_password']));


$checkUser="SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password'";
$checkQuery=mysqli_query($conn,$checkUser);
if(mysqli_num_rows($checkQuery)>0)
{
	
	//Convert code in json format

	$response['error']="001";
	$response['message']="Login Successful!";

}
else
{
	$response['error']="001";
	$response['message']="Login failed";

}
echo json_encode($response);

?>