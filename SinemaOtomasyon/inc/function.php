<?php



// giriş yapılmışmı kontrolü 
function isLogin() {
	global $veritabani;
	
	if($_SESSION["kullanici_id"]) return TRUE;
	else return FALSE;
}

function user($col = "*") {
	global $veritabani;
	
	if(isLogin()) {
		$user = mysql_fetch_array(mysql_query("select $col from kullanicilar where kullanici_id='$_SESSION[kullanici_id]'"));
		return $user;
	}else {
		return false;
	}
}

function yonlendir( $page) {
	
	echo '<meta http-equiv="refresh" content="0;URL='.$page.'">';
	
}





?>