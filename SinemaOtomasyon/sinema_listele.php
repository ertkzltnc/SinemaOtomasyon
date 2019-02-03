<?php
	include "inc/header.php";
	if(isset($_GET["act"]) && $_GET["act"] == "sil") {
		mysql_Query("delete from sinemalar where sinema_id='$_GET[sinema_id]'");
		yonlendir("sinema_listele.php");
	}
?>	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"> <h2> SİNEMALAR</h2></div>
			<div class="col-md-12 text-right"> 
			<a class="btn btn-success" href="sinema_ekle.php"> Sinema Ekle</a>
			</div>
			<div class="col-md-12"> 
				<table class="table" style="margin-top:20px;">
					<tr>
						<th>No </th>
						<th> Sinema Adı</th>
						<th> Sinema Yeri</th>
						<th> Salon Sayısı</th>
						<th> İşlemler</th>
					</tr>
						<?php
							$sor = mysql_Query("select * from sinemalar order by adi asc");
							if(mysql_num_rows($sor) == 0) {
								echo ' <tr> <td colspan="5" class="text-center"> Sinema Yok</td></tr>';
							}else {
								while($sinema = mysql_fetch_array($sor)) {
									echo '
									<tr>
										<td> '.$sinema["sinema_id"].'</td>
										<td> '.$sinema["adi"].'</td>
										<td> '.$sinema["yeri"].'</td>
										<td> '.$sinema["salon_sayisi"].'</td>
										<td> 
										<a class="btn btn-success" href="sinema_duzenle.php?sinema_id='.$sinema["sinema_id"].'"> Düzenle</a>
										<a class="btn btn-primary" href="salon_ekle.php?sinema_id='.$sinema["sinema_id"].'"> Salon Ekle</a>
										<a class="btn btn-danger" href="?act=sil&sinema_id='.$sinema["sinema_id"].'"> Sil</a>
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