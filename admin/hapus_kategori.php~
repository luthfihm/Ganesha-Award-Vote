<?php
	require_once("../plugin/qFrame/qFrame.php");
	$op=new q_sql(); 
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$hapus=$op->delete("tb_kategori","id='$id'");
		if($hapus){
			$hapus_tbl=$op->cs_query("ALTER TABLE `tb_vote` DROP `k$id`");
			$hapus_vote=$op->delete("tb_nominator","kategori='$id'");
			if(($hapus_tbl)&&($hapus_vote)){
				$url="location:main_menu.php?page=kategori_vote";
				header($url);	
			}	
		}	
	}
?>