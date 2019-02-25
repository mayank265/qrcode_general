
<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// initializing variables
$rollno = "";
$name1 = "";
$email = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'qr@admin', 'Mess');

function generate($roll_number){
	return md5($roll_number.$GLOBALS['encryption_key']);
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
	// receive all input values from the form
	$rollno =strtoupper(mysqli_real_escape_string($db, $_POST['rollno']));
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$prog = mysqli_real_escape_string($db, $_POST['prog']);
	$join = mysqli_real_escape_string($db, $_POST['join']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$aemail = mysqli_real_escape_string($db, $_POST['aemail']);
	$semail = mysqli_real_escape_string($db, $_POST['semail']);
	$lemail = mysqli_real_escape_string($db, $_POST['lemail']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$gphone = mysqli_real_escape_string($db, $_POST['gphone']);
	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($rollno)) { array_push($errors, "Rollno is required"); }
if (!stristr($email,"@iitp.ac.in")) { array_push($errors, "Please enter valid IITP Email ID"); }
if (!stristr($aemail,"@") OR !stristr($aemail,".")) { array_push($errors, " Alternate Email is not in Valid format"); }
	if (empty($name)) { array_push($errors, "Name is required"); }
	if (empty($phone)) { array_push($errors, "Phone No is required"); }
	if (empty($gphone)) { array_push($errors, "Guardian Phone is required"); }
	if($_FILES['file']['error'] > 0) { array_push($errors, "Error during uploading File, try again"); }

	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
  if (count($errors) == 0) {
	$user_check_query = "SELECT * FROM users WHERE `Roll No`='$rollno' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	if ($user) { // if user exists
		$query = "update users set Name='$name',email='$email',contact='$phone' where `Roll No`='$rollno'"; 
		mysqli_query($db, $query);
		$query = "update studentinfo set Name='$name',prog='$prog',yjoin='$join',email='$email',aemail='$aemail',semail='$semail',lemail='$lemail',contact='$phone',gcontact='$gphone' where `Roll No`='$rollno'"; 
		mysqli_query($db, $query);
	}

	// Finally, register user if there are no errors in the form
else {
		$query = "INSERT INTO users (`Roll No`, Name, email, marked,contact) 
			VALUES('$rollno', '$name', '$email',1,'$phone')";
		mysqli_query($db, $query);
		$query = "INSERT INTO studentinfo VALUES('$name', '$rollno','$prog','$join', '$email', '$aemail', '$semail', '$lemail', '$phone','$gphone')";
		mysqli_query($db, $query);
	}

	$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
	$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
	if (in_array($extUpload, $extsAllowed) ) {
		$name1 = "img/".strtolower($rollno).".jpg";
		$result = move_uploaded_file($_FILES['file']['tmp_name'], $name1);
		if($result){
			echo "<script>alert('Registered Successfully');</script>";
			include "libs/phpqrcode/qrlib.php";
			$encryption_key = "BatMaN!007GurUjI";
			QRcode::png($name."\n".$rollno."\n".generate($rollno), "qr/".$rollno.".png");
			echo '<center><img src="qr/'.$rollno.'.png">';
			echo '<a href="qr/'.$rollno.'.png" download> <br>Click here to download the QR Code</a>';

		}

	}         else { echo 'File is not valid. Please try again'; }
}
}
?>

