<?php
include "inc/db.php";
$sid = $_POST["sinema_id"];
$sor = mysql_query("select * from salonlar where sinema_id='$sid'");
echo '<option value="0"> Salon Seçin</option>';
while($s = mysql_fetch_array($sor)) {
	echo ' <option value="'.$s["salon_id"].'">'.$s["salon_adi"].'</option>';
}


