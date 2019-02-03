<?php
	include "inc/header.php";
	if(isset($_GET["act"]) && $_GET["act"] == "sil") {
		mysql_Query("delete from zaman where film_id='$_GET[zaman_id]'");
		yonlendir("zaman_listele.php");
	}
?>	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"> <h2> Zamanlar</h2></div>
			<div class="col-md-12 text-right"> <a class="btn btn-success" href="zaman_ekle.php"> Zaman Ekle</a></div>
			<div class="col-md-12"> 
				<table class="table" style="margin-top:20px;">
					<tr>
						<th>No </th>
						<th> İndirim</th>
						<th> Akşam</th>
						<th> Gece</th>
						<th> İşlemler</th>
					</tr>
						<?php
							$sor = mysql_Query("select * from zaman order by zaman_id asc");
							if(mysql_num_rows($sor) == 0) {
								echo ' <tr> <td colspan="5" class="text-center"> Zaman Yok</td></tr>';
							}else {
								while($film = mysql_fetch_array($sor)) {
									echo '
									<tr>
										<td> '.$film["zaman_id"].'</td>
										<td> '.$film["indirim"].'</td>
										<td> '.$film["aksam"].'</td>
										<td> '.$film["gece"].'</td>
										<td> 
										
										<a class="btn btn-danger" href="?act=sil&zaman_id='.$film["zaman_id"].'"> Sil</a>
										</td>
									</tr>
									';
								}
							}
						
						
						?>
					
				</table>
			
			</div>
		</div>
	</div>
	
	
	
	
<?php	
	
	include "inc/footer.php";



?>