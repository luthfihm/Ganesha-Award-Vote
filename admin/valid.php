<?php 
	if(isset($_GET['ubah'])){
		require_once("../plugin/qFrame/qFrame.php");
		$op=new q_sql();
		$pass=md5($_GET['pass']);
		$user=$_GET['user'];
		$cek=$op->cs_query("SELECT * from tb_admin WHERE user='$user'");
		$dt=mysql_fetch_array($cek);
		if($pass==$dt['pass']){
			echo "benar";	
		}else{
			echo "salah";	
		}
	}
?>