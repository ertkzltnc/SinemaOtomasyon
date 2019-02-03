<?php
	include "inc/header.php";
	if(isset($_GET["act"]) && $_GET["act"] == "sil") {
		mysql_Query("delete from bilet where bilet_id='$_GET[bilet_id]'");
		yonlendir("bilet_listele.php");
	}
?>	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"> <h2> Bilet Listele</h2></div>
			<div class="col-md-12 text-right"> <a class="btn btn-success" href="bilet_ekle.php"> Bilet Ekle</a></div>
			<div class="col-md-12"> 
				<table class="table" style="margin-top:20px;">
					<tr>
						<th>No </th>
						<th> Bilet Tipi</th>
						<th> Fiyat</th>
						<th> İşlemler</th>
					</tr>
						<?php
							$sor = mysql_Query("select * from bilet order by bilet_id asc");
							if(mysql_num_rows($sor) == 0) {
								echo ' <tr> <td colspan="5" class="text-center"> Bilet Yok</td></tr>';
							}else {
								while($film = mysql_fetch_array($sor)) {
									echo '
									<tr>
										<td> '.$film["bilet_id"].'</td>
										<td> '.$film["bilet_turu"].'</td>
										<td> '.$film["fiyat"].'</td>
										<td> 
										
										<a class="btn btn-danger" href="?act=sil&bilet_id='.$film["bilet_id"].'"> Sil</a>
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