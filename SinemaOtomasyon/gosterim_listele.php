<?php
	include "inc/header.php";
	if(isset($_GET["act"]) && $_GET["act"] == "sil") {
		mysql_Query("delete from gosterim where gosterim_id='$_GET[gosterim_id]'");
		yonlendir("sinema_listele.php");
	}
?>	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"> <h2> GÖSTERİMLER</h2></div>
			<div class="col-md-12 text-right"> <a class="btn btn-success" href="gosterim_ekle.php"> Gösterim Ekle</a></div>
			<div class="col-md-12"> 
				<table class="table" style="margin-top:20px;">
					<tr>
						<th>No </th>
						<th> Film Adı</th>
						<th> Salon Adı</th>
						<th> Tarih</th>
						<th> İşlemler</th>
					</tr>
						<?php
							$sor = mysql_Query("select * from gosterim
							inner join salonlar on salonlar.salon_id=gosterim.salon_id 
							inner join filmler on filmler.film_id=gosterim.film_id 
							order by gosterim.tarih asc");
							if(mysql_num_rows($sor) == 0) {
								echo ' <tr> <td colspan="5" class="text-center"> Gösterim Yok</td></tr>';
							}else {
								while($gosterim = mysql_fetch_array($sor)) {
									echo '
									<tr>
										<td> '.$gosterim["gosterim_id"].'</td>
										<td> '.$gosterim["film_adi"].'</td>
										<td> '.$gosterim["salon_adi"].'</td>
										<td> '.$gosterim["tarih"].'</td>
										<td> 
										<a class="btn btn-success" href="gosterim_duzenle.php?gosterim_id='.$gosterim["gosterim_id"].'"> Düzenle</a>
										<a class="btn btn-danger" href="?act=sil&gosterim_id='.$gosterim["gosterim_id"].'"> Sil</a>
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