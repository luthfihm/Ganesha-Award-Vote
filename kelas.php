<link rel="stylesheet" type="text/css" href="style.css" />
<script src="clock.js" type="text/javascript"></script>
	<script type="text/javascript" src="plugin/jquery-1.2.3.pack.js"></script>
	<script type="text/javascript" src="plugin/jquery.validate.pack.js"></script>
	<script type="text/javascript">
		function select_kelas(id){
			var kelas=encodeURIComponent(document.getElementById(id).value)
			if (kelas!=""){
				location="check-in.php?kelas="+kelas;	
			}
		}
	</script>
	<style type="text/css">
	.button {  background:url(images/p5.png) repeat;
			font-family:Arial;
			font-size:24px;
			color:#FFFFFF;
			font-weight:bold;
			border-radius: 5px;
			border:none;
			padding:3px;
			padding-left:10px;
			padding-right:10px;
			margin:20px;
			width: 180px;
			text-align:center; } 
.button:hover{box-shadow: 2px 2px 2px #888888;}
</style>
<table width="100%" cellpadding="10px">
	<tr style="font-size:20px;font-family:Arial;">
		<th colspan="5">PILIH KELAS</th>
	</tr>
	<tr bgcolor="#EAEAEA" style="color:#333333; font-size:16px">
		<?php 
			for($i=1;$i<=12;$i++){	
				if((($i/4)+1) % 2){
					$bg="#EAEAEA";
				}else{
					$bg="#FFFFFF";
				}					
		?>
			<td width="20%" align="center" style="font-family:arial;padding-top:25px;" valign="absmidle">
				<input type="button" id="<?php echo $i; ?>" value="XII IPA <?php echo $i; ?>" onclick="select_kelas('<?php echo $i; ?>');" class="button">
			</td>
		<?php if($i%4==0){ echo "</tr><tr bgcolor='$bg' style='color:#333333; font-size:16px'>"; }
		} ?>
			<td width="20%" align="center" style="font-family:arial;padding-top:25px;" valign="absmidle">
				<input type="button" id="13" value="XII IPS 1" onclick="select_kelas('13');" class="button">
			</td>
			<td width="20%" align="center" style="font-family:arial;padding-top:25px;" valign="absmidle">
				<input type="button" id="14" value="XII IPS 2" onclick="select_kelas('14');" class="button">
			</td>
			<td width="20%" align="center" style="font-family:arial;padding-top:25px;" valign="absmidle">
				<input type="button" id="15" value="XII AKSEL" onclick="select_kelas('15');" class="button">
			</td>
	</tr>