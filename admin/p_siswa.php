<?php 
	require_once("../plugin/qFrame/qFrame.php");
	$op=new q_sql();
	$kelas=$_POST['select_kelas'];
	$nama=$_POST['nama'];
	$save=$op->save("tb_siswa","nama,kelas","'$nama','$kelas'");
	if($save){
		$url="location:main_menu.php?page=siswa&&kelas=".$kelas;
		header($url);	
	}
?>