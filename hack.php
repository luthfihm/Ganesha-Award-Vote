<?php
function is_connected($ip)
{
    //check to see if the local machine is connected to the web
    //uses sockets to open a connection to apisonline.com
    $connected = @fsockopen($ip,80);
    if ($connected){
        $is_conn = true;
        fclose($connected);
    }else{
        $is_conn = false;
    }
    return $is_conn;

}//end is_connected function
$i=0;
$status="";
while(($i<=254)&&($status=="")) {
	$j=0;
	while(($j<=254)&&($status=="")) {
		if($i<10){
			$a="00".$i;	
		}elseif(($i>=10)&&($i<100)){
			$a="0".$i;	
		}elseif($i>=100){
			$a=$i;
		}
		if($j<10){
			$b="00".$j;	
		}elseif(($j>=10)&&($j<100)){
			$b="0".$j;	
		}elseif($j>=100){
			$b=$j;
		}
		$ping="192.168.".$a.".".$b;
		$cek=is_connected($ping);
		if($cek){
			$status="Connected";
			echo $ping;	
		}else{
			$status="";	
		}
		$j++;
	}
	$i++;
}
?>