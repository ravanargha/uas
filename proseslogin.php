<?php
include "koneksi.php";

$username = $_POST['user'];
$password = $_POST['pass'];
session_start();
if (isset($_POST['submit'])) {
	if (!isset($username)) {
		die ("Error. No Id Selected! ");
	} 

	if($username=="") {
		header("Location:login.php?cannotLogin");
	} else { 
		$query = "SELECT * from tbl_user WHERE username='$username'";
		$sql = mysqli_query ($con,$query);
		if($sql)
		{ 
			$hasil = mysqli_fetch_array ($sql);
			$uname = $hasil['username'];
			$upass = $hasil['password'];
			// if($uname==$username && $upass==MD5($password)){
			if($uname == $username && $upass == $password){
				$_SESSION['username'] = $username;
				header("Location:index.php");
			} else {
				header("Location:login.php?UserSalah");
			}
		} else {
			header("Location:login.php?CannotLogin");
		}
	}
}
else {
	header("Location:login.php");
}
