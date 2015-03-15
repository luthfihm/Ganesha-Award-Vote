<?php 
	require_once("../plugin/qFrame/qFrame.php");
		$op=new q_sql();
		$user=$_SESSION['userAdminGanesha'];
		$view=$op->cs_query("SELECT * from tb_admin WHERE user='$user'");
		$dt=mysql_fetch_array($view);
?>
<script type="text/javascript">
	var xmlHttp;
	var aksi="";
	xmlHttp=createXmlHttpRequest();
	function createXmlHttpRequest(){
		var xmlHttp = false;
		if (window.ActiveXObject) {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		} else {
			xmlHttp = new XMLHttpRequest();
		}
		if (!xmlHttp) {
			alert("Ops sorry We found some error!!");
		}
		return xmlHttp;
	}
	function valid(req){
		aksi=req;
		if(aksi=="ubah"){
			if(xmlHttp.readyState==4 || xmlHttp.readyState==0){
				var pwd=document.getElementById("old").value;
				var id=document.getElementById("admin").value;
				xmlHttp.open("GET","valid.php?ubah&user="+id+"&pass="+pwd+"&sid="+Math.random(),true);
				xmlHttp.onreadystatechange=server;
				xmlHttp.send(null);
			}
		}else if(aksi=="reset"){
			location="reset.php";	
		}
	}
	function cek_new(){
		var pass=document.getElementById("pass").value;
		var cekpass=document.getElementById("cekpass");
		if(cekpass.value!=pass){
			cekpass.value="";
			document.getElementById("cekpass").focus();
			alert("Password Tidak Sama");	
		}
	}
	function server(){
			if(xmlHttp.readyState==1){
	
			}else if(xmlHttp.readyState==4 || xmlHttp.readyState==0){		
				var cek=xmlHttp.responseText;
				if (cek=="benar"){
					
				}else{
					document.getElementById("old").value="";
					document.getElementById("old").focus();
					alert("Password Lama Salah!!!");	
				}
			}
		
	}
</script>
<table width="500px" align="center" cellspacing="1" cellpadding="5" style="background:#CCCCCC;">
	<tr style="color:#FFFFFF;background:#006699;">
		<th>Administrator Password</th>
	</tr>
	<tr style="background:#EAEAEA;">
		<td>
		<div style="width:100%;padding:10px;">
			<table align="center">
			<form>
				<tr>
					<td align="left">User Admin</td>
					<td>:</td>
					<td><input type="text" name="admin" id="admin" value="<?php echo $dt['user']; ?>" style="width:200px;"></td>				
				</tr>	
				<tr>
					<td align="left">Old Password</td>
					<td>:</td>
					<td><input type="password" name="old" id="old" style="width:200px;"></td>				
				</tr>
				<tr>
					<td align="left">New Password</td>
					<td>:</td>
					<td><input type="password" name="pass" id="pass" style="width:200px;"></td>				
				</tr>
				<tr>
					<td align="left">Password again</td>
					<td>:</td>
					<td><input type="password" name="cekpass" id="cekpass" style="width:200px;" onchange="cek_new();"></td>				
				</tr>	
				<tr>
					<td colspan="3" align="center" style="padding-top:10px;"><input type="submit" name="ubah" value="Change User Password" onclick="valid('ubah');return false" class="button"></td>				
				</tr>	
			</form>			
			</table>
		</div>		
		</td>	
	</tr>
	<tr style="color:#FFFFFF;background:#006699;">
		<th>Reset Data</th>	
	</tr>
	<tr style="background:#EAEAEA;">
		<td style="padding:10px;" align="center"><input type="button" id="reset" class="button" value="Reset" onclick="if(confirm('Yakin Reset Semua Data?')){ valid('reset'); }else{ return false; }"></td>
	</tr>
</table>