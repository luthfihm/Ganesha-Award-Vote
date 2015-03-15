<?php 
	require_once("plugin/qFrame/qFrame.php");
	$op=new q_sql();
	if(isset($_POST['Check-in'])) {
		$timezone = "Asia/Bangkok";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$time=date("H:i:s");
		$id=$_POST['id'];
		$kelas=$_POST['kelas'];
		$upd=$op->update("tb_siswa","status='1',time='$time'","id","$id");
		if($upd) { 
			echo "
			<script type='text/javascript' >
				top.location='vote.php?id=".$id."';
			</script>";
		 }
	}
?>
