<?php
	session_start();
	require_once("../plugin/qFrame/qFrame.php");
	header("Cache-Control:no-cache, must-revalidate");
	if((isset($_SESSION['userAdminGanesha']))&&(isset($_SESSION['passAdminGanesha']))){
	$uname=$_SESSION['userAdminGanesha'];
	$pass=$_SESSION['passAdminGanesha'];	
	$cek = new q_sql();
	
	$r=$cek->validUser("tb_admin","user","pass",$uname,$pass);
	$c=mysql_num_rows($r);
	if($c > 0){
		$frame="main_menu.php";
	}
	}else{
		$frame="login.php";
		session_destroy();
	}
?>
<!-- 

Web Developer : Luthfi Hamid Mayskuri
Email         : metalic_devil_racer@yahoo.co.id
year          : 2011

"Dedicated for my Lovely Senior High School SMA Negeri 3 Semarang"

-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Ganesha Award's Administrator</title>
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<link rel="shortcut icon" href="../images/badgeganeshaicon.png" >
	<script src="../clock.js" type="text/javascript"></script>
	<script type="text/javascript" src="../plugin/jquery-1.2.3.pack.js"></script>
	<script type="text/javascript" src="../plugin/jquery.validate.pack.js"></script>
	<script type="text/javascript">

	</script>
</head>
<body id="body" onLoad="showclock();">
	<table id="main" align="center">
		<tr>
			<th id="head" valign="top">Ganesha Award's Administrator
			<div class="date" id="clock">			
			</th>		
		</tr>
		<tr>
			<td id="content">
				<iframe src="<?php echo $frame; ?>" width="100%" height="100%" frameborder="no" id="frame"></iframe>
			</td>		
		</tr>
		<tr>
			<td id="footer"><div style="text-align:center; color:#FFF; font-size:14px; padding:10px 0px 0px 0px; font-family:Tahoma">&copy; <? echo date('Y') ?> - <a href="mailto:metalic_devil_racer@yahoo.co.id">Luthfi Hamid Masykuri</a> | ICT Team Symphonie 2012</div></td>		
		</tr>
	</table>
</body>
</html>
<!-- 

Web Developer : Luthfi Hamid Mayskuri
Email         : metalic_devil_racer@yahoo.co.id
year          : 2011

"Dedicated for my Lovely Senior High School SMA Negeri 3 Semarang"

-->