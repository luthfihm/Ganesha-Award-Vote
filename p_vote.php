<?php
	require_once("plugin/qFrame/qFrame.php");
	$op=new q_sql();
	if(isset($_POST['submit'])) {
		$id=$_POST['id_vote'];
		$jum=$_POST['jml'];
		$kat="";
		$kat_value="";
		for($i=1;$i<=$jum;$i++){
			$k="kategori".$i;
			$kat=$kat.",k".$_POST[$k];
			$kat_value=$kat_value.",".$_POST[$i];
		} 
		$kat="no".$kat;
		$kat_value=$id.$kat_value;
		$vote=$op->save("tb_vote",$kat,$kat_value);
		if($vote){
			echo "
				<script type='text/javascript' >
					alert('Thank You For Vote in Ganesha Award 2012');
					top.location='index.php';
				</script>";			
		}
	}
	
?>