<?php
if (isset($_POST['login'])){
	session_start();
	require_once("../plugin/qFrame/qFrame.php");
	header("Cache-Control:no-cache, must-revalidate");
	$uname=$_POST['user'];
	$pass=md5($_POST['pass']);	
	$cek = new q_sql();
	
	$r=$cek->validUser("tb_admin","user","pass",$uname,$pass);
	$c=mysql_num_rows($r);
	if($c > 0){
		$_SESSION['userAdminGanesha']=$uname;
		$_SESSION['passAdminGanesha']=$pass;
		header("location:main_menu.php");
	}else{
		header("location:login.php?gagal");
	}
}else{ header("location:login.php"); }
?>
