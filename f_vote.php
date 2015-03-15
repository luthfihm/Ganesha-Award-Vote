<?php 
	if (isset($_REQUEST['id'])){
		$id_vote=$_REQUEST['id'];
?>
<script type="text/javascript" src="plugin/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="plugin/jquery.validate.pack.js"></script>
<style type="text/css">
	.button {  background:url(images/p5.png) repeat-x;
			font-family:Arial;
			font-size:25px;
			color:#FFFFFF;
			font-weight:bold;
			border-radius: 6px;
			border:none;
			padding:1px;
			padding-left:10px;
			padding-right:10px;
			margin-top:10px;
			text-align:center; } 
.button:hover{box-shadow: 2px 2px 2px #888888;}
</style>
<script type="text/javascript">
	var c=0;
	function cek(id){
		document.getElementById(id).checked="checked";
		var jum=parseInt(encodeURIComponent(document.getElementById("jml").value));
	}
	function change_value(j){
		document.getElementById(j).value="1";
	}
	function id_cek(a){
		c=c+parseInt(encodeURIComponent(document.getElementById(a).value));	
	}
	function tb_bold(m,n){
		var jml=parseInt(encodeURIComponent(document.getElementById("jml"+m).value));
		for(i=1;i<=jml;i++){
			if(i==n){
				document.getElementById("tbl"+m+i).style.fontWeight="bold";	
				document.getElementById("tbl"+m+i).style.backgroundColor="#FF6";	
			}else{
				document.getElementById("tbl"+m+i).style.fontWeight="normal";
				document.getElementById("tbl"+m+i).style.backgroundColor="";
			}
		}	
	}
	function valid_vote(k,l){
		if(document.getElementById(k).value!="1"){
			change_value(k);
			id_cek(k);
		}
		tb_bold(k,l);
		var jum=parseInt(encodeURIComponent(document.getElementById("jml").value));
		if (c==jum){
			document.getElementById("submit").style.display="inline-block";
		}
	}
</script>
<form action="p_vote.php" method="post">
<input type="hidden" name="id_vote" id="id_vote" value="<?php echo $id_vote; ?>">
<table cellpadding="10" width="99%">
	<tr>
<?php
	require_once("plugin/qFrame/qFrame.php");
	$op=new q_sql();
	$tbl=new q_grid();
	$view=$op->cs_query("SELECT * FROM tb_kategori ORDER BY kategori ASC");
	$i=1;
	while($dt=mysql_fetch_array($view)){
		$kat=$dt['kategori'];
		$id=$dt['id'];
?>
	<td width="300px" valign="top">
	<div>
		<table cellpadding="5" cellspacing="1" border="0" align="left" bgcolor="#CCCCCC" style="font-family:arial;margin-top:0px;" width="100%">
			<tr style="color:#FFFFFF;background:#006699;">
				<th>
					Nominasi Kategori: <?php echo $kat; ?>
				</th>
			</tr>
			<input type="hidden" name="kategori<?php echo $i; ?>" value="<?php echo $id; ?>">
			<input type="radio" name="<?php echo $i; ?>" id="<?php echo $i; ?>" checked="checked" value="" style="display:none;" >
			<?php
				$arr_nomi=$op->cs_query("SELECT * FROM tb_nominator WHERE kategori='$id' ORDER BY id ASC");
				$l=1;
				while($nomi=mysql_fetch_array($arr_nomi)){
					if($l % 2){
						$bg="#EAEAEA";
					}else{
						$bg="#FFFFFF";
					}
					$nama_nomi=$nomi['nama'];
					$id_nomi=$nomi['id'];
					$arr_siswa=$op->cs_query("SELECT * FROM tb_siswa WHERE id='$nama_nomi'");
					$siswa=mysql_fetch_array($arr_siswa);
					$id_siswa=$siswa['id'];
			?>
			<tr bgcolor="<?php echo $bg; ?>" style="font-size:18px;font-weight:normal;" id="tbl<?php echo $i.$l; ?>">
						<td style="padding:5px;" valign="top" onclick="cek('<?php echo $id_siswa; ?>');valid_vote('<?php echo $i; ?>','<?php echo $l; ?>');">
						<input type="radio" name="<?php echo $i; ?>" id="<?php echo $id_siswa; ?>" value="<?php echo $id_siswa; ?>" onclick="cek('<?php echo $id_siswa; ?>');valid_vote('<?php echo $i; ?>','<?php echo $l; ?>');">
						<div style="display:inline-block;margin-left:10px;" onclick="cek('<?php echo $id_siswa; ?>');valid_vote('<?php echo $i; ?>','<?php echo $l; ?>');"><?php echo $siswa['nama']; ?></div>
						</td>
			</tr>
			<?php $l++;} ?>
			<input type="hidden" name="jml<?php echo $i; ?>" id="jml<?php echo $i; ?>" value="<?php echo $l-1; ?>">
		</table>	
	</div>
	</td>
<?php 
		if (($i % 3)==0){
			echo "</tr><tr>";
		}
		$i++; } 		
		?>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<input type="hidden" name="jml" id="jml" value="<?php echo $i-1; ?>">
			<input type="submit" name="submit" id="submit" value="Vote Here!" class="button" style="display:none;">		
		</td>	
	</tr>
</table>
</form>
<?php } ?>