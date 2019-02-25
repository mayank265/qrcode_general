<?php 
session_start();

include ("encrypt.php");

$rollno     = encrypt_decrypt('decrypt', $_SESSION['rollno']);
$access     = encrypt_decrypt('decrypt', $_SESSION['access']);


if(!isset($rollno))
{
	header("location: index.php");
        exit;
}

?>
