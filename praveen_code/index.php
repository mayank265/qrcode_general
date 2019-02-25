

<html>
<head>
<title>
Student Registration :: IIT Patna
</title>
<link rel="stylesheet" type="text/css" href="/facapr_new/facapr.css" />
<style type="text/css">
A {font-family: Verdana, Arial, Helvetica, sans-serif, "MS sans serif";font-size:
11px;line-height: 13px;text-decoration: none;color: #0000ee;font-weight: bold;}
A:hover
{color:#6666CC;text-decoration:none;}
h1 {font-family: Georgia,Verdana, Arial, Helvetica, sans-serif, "MS sans-serif";font-size: 24px;line-height: 100%;text-decoration: none; color:  #8072f4 ;font-weight: bold;}
h2 {font-family: Georgia,Verdana, Arial, Helvetica, sans-serif, "MS sans-serif";font-size: 18px;line-height: 100%;text-decoration: none;color: #8072f4;font-weight: bold;}
.gen {font-family: Verdana, Arial, Helvetica, sans-serif, "MS sans serif";font-size: 11px;text-decoration: none;color: #000000;font-weight: bold;}
.small {font-family: Verdana, Arial, Helvetica, sans-serif, "MS sans-serif";font-size: 9px;text-decoration: none;color: #000000;font-weight: bold;}
.dark {font-family: Verdana, Arial, Helvetica, sans-serif, "MS sans-serif";font-size: 14px;line-height: 16px;text-decoration: none;color:
#000099;font-weight: bold;}
.para {font-family: Verdana, Arial, Helvetica, sans-serif, "MS sans-serif";font-size: 14px;line-height: 16px;text-decoration: none;color:
#787878;font-weight: bold;}
.big {font-family: Georgia,Verdana, Arial, Helvetica, sans-serif, "MS sans-serif";font-size: 20px;line-height: 100%;text-decoration: none;color:
#000099;font-weight: bold;}
.light {font-family: Georgia,Verdana, Arial, Helvetica, sans-serif, "MS sans-serif";font-size: 11px;line-height: 13px;text-decoration: none;color:
#dedede;font-weight: bold;}

body {
scrollbar-arrow-color: #0000ff;
scrollbar-base-color: #d2f2f2;
scrollbar-track-color: #ffffff;
scrollbar-face-color: #d2f2f2;
scrollbar-highlight-color: #000000;
}


</style>

</head>
<body>
<?php 

include ("join_facapr.php");


$sql   = "SELECT * FROM server_list order by server_sr";
$query = $conn->query($sql);
$num   = $query->num_rows;

?>

<center><h1> Registration For QR Code </h1>

<br><br>
<FORM  action="stud_check.php"  method="post" onSubmit="return checkform();" name="myform"> 

<table align="center"   cellspacing=0 cellpadding=2 style="border:1px solid #a0a0ff; margin:0px;" width=40%>

<tr>
<td colspan=3> &nbsp;</td>
</tr>

<tr>
<td class="big" align=right>Email Server</td>
<td> &nbsp; &nbsp;</td>
<td><SELECT NAME="selected_server">
<?php 

while($row = $query->fetch_assoc()) 
{
   $domain_ip=$row["domain_ip"];
   $server_name=$row["server_name"];
 ?>
<OPTION VALUE="<?php  echo $domain_ip; ?>"> <?php  echo $server_name; ?> 
<?php 
 } 
?>
</select></TD>
</TR>
<tr>
<td class="big" align=right>Login ID</td>
<td> &nbsp; &nbsp;</td>
<td><INPUT type="text" name="user_login" size=20  maxlength=20></td>
</tr>
<tr>
<td class="big" align=right>Password</td>
<td> &nbsp; &nbsp;</td>
<td><INPUT type="password" name="user_password" size=20  maxlength=20></td>
</tr>

<tr>
<td colspan=3> &nbsp;</td>
</tr>

</table>
<br>
<table align="center"   cellspacing=0 cellpadding=2  width=40%>
<tr><td align=center><INPUT TYPE="submit" value="Submit"></td></tr>
</table>
<br><br><br><br><br><br>
<table align="center"   cellspacing=0 cellpadding=2  width=40%>
<tr><td colspan=2 >
<CENTER><h2>Instructions</h2></center>
1. Select the server in which you have <FONT COLOR="brown<B></B>"><Big>iitp.ac.in</Big></FONT> mail account.<BR>
2. Enter your email login and password and submit.

</td><tr>
</table>
</FORM>
</CENTER>

<!--

<TABLE border=1 cellspacing=0 cellpadding=2 bgcolor=#ddFFFF align=center width=600>
<TR><td colspan=4><CENTER><FONT SIZE="3" COLOR="blue">Leave Catagories</FONT></center>
</TR>
<TR>
	<TD>&nbsp;</TD>
	<TD align=center><FONT SIZE="" COLOR="red">Type</FONT></TD>
	<td align=center><FONT SIZE="" COLOR="red">Purpose</FONT></td>
	<TD align=center><FONT SIZE="" COLOR="red">Duration</FONT></TD>
</TR>
<TR>
	<TD>1.</TD>
	<TD>Earned Leave and Medical Leave</TD>
	<td>&nbsp;
	<TD>As per accumulated earned leave and medical leave (as per rules)</TD>
</TR>
<TR>
	<TD>2.</TD>
	<TD>Casual Leave</TD>
	<td>&nbsp;
	<TD>Upto 8 days in a calender year</TD>
</TR>
<TR>
	<TD>3.</TD>
	<TD>Special casual Leave</TD>
	<td>To undertake outside work other then project work or to appear in a court of law. 
	<TD>Upto 15 days per academic year</TD>
</TR>
<TR>
	<TD>4.</TD>
	<TD>Duty Leave</TD>
	<td>Conferences, Workshops, Seminars
	<TD>Upto 15 days per academic year</TD>
</TR>

<TR>
	<TD>5.</TD>
	<TD>Leave for Project Work</TD>
	<td>Project work
	<TD>Upto 4 days per month</TD>
</TR>

<TR>
	<TD>6.</TD>
	<TD>Vacation Leave</TD>
	<td>Leave during vacation
	<TD>As per Rules</TD>
</TR>

<TR>
        <TD>7.</TD>
        <TD>Sabatical Leave</TD>
        <td>&nbsp;
        <TD>As per Rules</TD>
</TR>

<TR>
        <TD>8.</TD>
        <TD>Extraordinary Leave</TD>
        <td>&nbsp;
        <TD>As per Rules</TD>
</TR>

<TR>
        <TD>9.</TD>
        <TD>Restricted Holiday</TD>
        <td>&nbsp;
        <TD>2 Days per Calendar Year</TD>
</TR>


<tr><Td colspan=4><FONT SIZE="3" COLOR="blue">Note:</FONT> Total Leave under types 3, 4 and 5 should not exceed 15 days per semester.</td></tr>
</TABLE>
</td></tr>
<!-- <tr><td colspan=2>
<I><B><FONT SIZE="" COLOR="red">Please Note</FONT></B></I>
<ul style="margin-bottom:0px; margin-top:0px; color:brown;">
<li>For Casual Leave, Earned Leave, Vacation and Station Leaving, HoD, HoC, HoS are sanctioning authorities.
<li>For  Special Casual Leave and Leave for outside work, the Dean (F & P) is the sanctioning authority.
<li>For Leave for project work, the Dean (SRIC) is the sanctioning authority.

<li>For EOL and Sabatical Leave, the Director is the sanctioning authority.
<li>For faculty members holding administrative positions, Director is the sanctioning authority for all types of leave.
</ul> -->



