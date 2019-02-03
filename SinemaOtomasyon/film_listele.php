<?php
	include "inc/header.php";
	if(isset($_GET["act"]) && $_GET["act"] == "sil") {
		mysql_Query("delete from filmler where film_id='$_GET[film_id]'");
		yonlendir("film_listele.php");
	}
?>	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"> <h2> FİLMLER</h2></div>
			<div class="col-md-12 text-right"> <a class="btn btn-success" href="film_ekle.php"> Film Ekle</a></div>
			<div class="col-md-12"> 
				<table class="table" style="margin-top:20px;">
					<tr>
						<th>No </th>
						<th> Film  Adı</th>
						<th> Yönetmen</th>
						<th> Dil</th>
						<th> İşlemler</th>
					</tr>
						<?php
							$sor = mysql_Query("select * from filmler order by film_adi asc");
							if(mysql_num_rows($sor) == 0) {
								echo ' <tr> <td colspan="5" class="text-center"> Film Yok</td></tr>';
							}else {
								while($film = mysql_fetch_array($sor)) {
									echo '
									<tr>
										<td> '.$film["film_id"].'</td>
										<td> '.$film["film_adi"].'</td>
										<td> '.$film["yonetmen"].'</td>
										<td> '.$film["dil"].'</td>
										<td> 
										<a class="btn btn-success" href="film_duzenle.php?film_id='.$film["film_id"].'"> Düzenle</a>
										<a class="btn btn-danger" href="?act=sil&film_id='.$film["film_id"].'"> Sil</a>
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