<?php 

session_start();
$servername = "localhost";
$username   = "root";
$password   = "qr@admin";
$dbname     = "Mess";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$mailhost = $_POST["selected_server"];
$user     = $_POST["user_login"];
$passwd   = $_POST["user_password"];


$pop = imap_open('{' .$mailhost. '}', $user, $passwd);


#$pop  = imap_open("{172.16.1.222:995/pop3/ssl/novalidate-cert}" , $user, $passwd);

if ($pop == false) 
{
    echo "<center>Authentication Failed</center>\n";
} 
else 
{
    	imap_close($pop);

echo '<table align="right">
<tr>
<td><table align="right" border = 8><tr><td><a href="logout.php">LOGOUT</a></td></tr></table>
</table>';
	include ("encrypt.php");

	$email_address=$user."@iitp.ac.in";


	$sql   = "SELECT * FROM studentinfo where email = '$email_address'";

        $query = $conn->query($sql);
	

	if ($query->num_rows == 0)
	{
			$access   = 1;
			$_SESSION['access']=encrypt_decrypt('encrypt', $access);
		echo '<center><b>You have not registered yet</b><br><br><a href="register.php">Click here for Registration</a></center>';
	}
	else 
	{


		$row      = $query->fetch_assoc();
			$rollno   = $row['Roll No'];
		//	echo '<center><a href="qr/'.$rollno.'.png" download><br><br>Click here to download the QR Code</a><br>';
		//echo '<br><a href="register.php">Click here to Update Information</a></center>';
		echo '<table align="center" border=8><tr><td><a href="qr/'.$rollno.'.png" download>Click here to download the QR code</a></td></tr></table><table align="center" border=8><tr><td><a href="register.php">Click here to Update Informatuon</a></td></tr></table>';
			$access   = 1;
			$_SESSION['access']=encrypt_decrypt('encrypt', $access);
		}

}

?>



