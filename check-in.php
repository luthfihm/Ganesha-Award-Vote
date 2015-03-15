<script type="text/javascript" src="plugin/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="plugin/jquery.validate.pack.js"></script>
<style type="text/css">
	.button {  background:url(images/p5.png) repeat-x;
			font-family:Arial;
			font-size:10px;
			color:#FFFFFF;
			font-weight:bold;
			border-radius: 3px;
			border:none;
			padding:1px;
			padding-left:10px;
			padding-right:10px;
			margin-top:10px;
			text-align:center; } 
.button:hover{box-shadow: 2px 2px 2px #888888;}
</style>
<div style="padding-left:30px;padding-top:-10px;"><input type="button" value="Back" onclick="top.location='index.php';" class="button"></div>
<table width="100%" cellpadding="10px">
	<tr style="font-size:20px;font-family:Arial;">
		<th colspan="5">KELAS <?php echo $_REQUEST['kelas']; ?></th>
	</tr>
	<tr bgcolor="#EAEAEA" style="color:#333333; font-size:16px">
		<?php 
		require_once("plugin/qFrame/qFrame.php");
		$kelas=$_REQUEST['kelas'];
		$op=new q_sql();		
		$view=$op->cs_query("SELECT * FROM tb_siswa WHERE kelas='$kelas' ORDER BY nama ASC");
		$i=1;
		while($dt=mysql_fetch_array($view)){
			if((($i/5)+1) % 2){
				$bg="#EAEAEA";
			}else{
				$bg="#FFFFFF";
			}
		?>
		<td width="20%" align="center" style="font-family:arial;padding-top:25px;" valign="top">
			<b><? echo $dt['nama'];?></b><br>
			<?php
				if($dt['status']=="1"){
			?>
				<div style="font-size:12px;margin-top:5px;">Checked-in at <?php echo $dt['time']; ?>
			<?php }else{ ?>
			<form method="post" action="p_check-in.php" name="masuk<? echo $i;?>">
			<input type="hidden" name="id" value="<? echo $dt['id'];?>">
			<input type="hidden" name="kelas" value="<? echo $kelas;?>">
			<input type="submit" value="Check-in" name="Check-in" class="button">
			</form>
			<?php } ?>
		</td>
		<?php 
			if($i%5==0){ echo "</tr><tr bgcolor='$bg' style='color:#333333; font-size:16px'>"; }		
		$i++;} ?>
	</tr>
	
</table>