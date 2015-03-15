<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="frame.css" />
	<script src="../clock.js" type="text/javascript"></script>
	<script type="text/javascript" src="../plugin/jquery-1.2.3.pack.js"></script>
	<script type="text/javascript" src="../plugin/jquery.validate.pack.js"></script>
	<script type="text/javascript">
		function loading() {
    		document.getElementById("respon").style.visibility = "visible";
			document.getElementById("space").style.display = "none";
    		setTimeout("load.src = load.src",100);
    	return true;
    	}
		function hide() {
	   	document.getElementById("warning").style.display = "none";
    		return true;
    	}
    	function kembali(){
    		top.location="../";
    	}
	</script>
</head>
<body onLoad="document.forms.loginAdmin.user.focus()">
	<form method="post" action="p_login.php" name="loginAdmin" onsubmit="<? if (isset($_REQUEST['gagal'])){ echo "hide();"; }?> loading();">
<table style="margin-top:50px; border-radius: 10px; font-size:14px; background:#FFF; font-family:Arial; color:#333333;" border="0" align="center" width="450px" cellpadding="1" cellspacing="1">
	<tr>
		<td colspan=3 align="center">&nbsp;</td>
	</tr>
	<tr>
		<th colspan=3 align="center" id="head_login">Login Administrator</th>
	</tr>
	<tr>
		<td colspan=3 align="center">&nbsp;</td>
	</tr>
	<tr>
		<td align="right" width="30%"><b>Username</b></td>
		<td>:</td>
		<td> <input type="text" name="user" style="width:220px;" id="user" class="input" title="Inputkan Username"/> </td>
	</tr> 
	<tr>
		<td align="right"><b>Password</b></td>
		<td>:</td>
		<td><input type="password" name="pass" style="width:220px;" id="pass" class="input" onkeypress=""/></td>
	</tr>
	<tr><td colspan="3">&nbsp;</td></tr>
	<tr>
		<td colspan="3" align="center"><input type="submit" name="login" value="Login Admin" id="button" class="button"> &nbsp <input type="button" class="button" value="Kembali" onclick="kembali();" /></td>
	</tr>
	<tr>
		<td colspan="3" align="center" valign="absmidle">
        <? if (isset($_REQUEST['gagal'])){ ?>
        <div style="display:yes;" id="warning">
        <table>
        	<tr>
            	<td><img src="../images/sign_warning.png" border=0></td><td>Proses Login gagal !!! Anda bukan user yang terdaftar.</td>
            </tr>
        </table>
        </div>
        <? } ?>
        <div style="visibility:collapse;" id="respon">
        <table>
        	<tr>
            	<td><img id="load" src="../images/loading2.gif"></td><td>&nbsp&nbsp&nbsp Logging in ...</td>
            </tr>
        </table>
        </div>
        <? if (!isset($_REQUEST['gagal'])){ ?><div id="space" style="display:yes;"><br /></div><? } ?>
        </td>
	</tr>
</table>
</form>
</body>
</html>