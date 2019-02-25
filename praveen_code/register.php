
<?php 
include ('session.php');

if ($access == 1) {

?>
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
<table align="right">
<tr>
<td><table align="right" border = 8><tr><td><a href="logout.php">LOGOUT</a></td></tr></table>
</table>
  <form method="post" action="register.php" enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>RollNo*</label>
  	  <input type="text" name="rollno" value="<?php echo $rollno; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Name*</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
  	<div class="input-group">
  	  Program
<select name="prog">
  <option value="btech">B.Tech</option>
  <option value="mtech">M.Tech</option>
  <option value="phd">Phd</option>
  <option value="emp">Employee</option>
</select>
Year of Joining 
<select name="join">
  <option value="2008">2008</option>
  <option value="2009">2009</option>
  <option value="2010">2010</option>
  <option value="2011">2011</option>
  <option value="2012">2012</option>
  <option value="2013">2013</option>
  <option value="2014>2014</option>
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
  <option value="2019">2019</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
</select>
  	</div>
  	<div class="input-group">
  	  <label>IITP Email ID*</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Alternate Email*</label>
  	  <input type="email" name="aemail" value="<?php echo $aemail; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Skype ID</label>
  	  <input type="email" name="semail" value="<?php echo $semail; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Linkdin ID</label>
  	  <input type="email" name="lemail" value="<?php echo $lemail; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Phone No.*</label>
  	  <input type="text" name="phone" value="<?php echo $phone; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Guardian Phone No.*</label>
  	  <input type="text" name="gphone" value="<?php echo $gphone; ?>">
  	</div>
  	<div class="input-group">
 Select photo image to upload*:
    <input type="file" name="file">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  </form>
</body>
</html>
<?php
} 
else {
	echo "Unauthorised Attempt";
}
?>
