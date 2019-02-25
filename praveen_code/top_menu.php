<?php 
if ($access == 1) {
?>

<table align="right">
<tr>
<td><table align="right" border = 8><tr><td><a href="leave_pass.php">HOME</a></td></tr></table>
<td>&nbsp;</td>
<td><table align="right" border = 8><tr><td><a href="record.php">LEAVE RECORD</a></td></tr></table>
<td>&nbsp;</td>
<td><table align="right" border = 8><tr><td><a href="logout.php">LOGOUT</a></td></tr></table>
</table>

<?php
} 
else {
	echo "Unauthorised Attempt";
}
?>

