<?php
	include "inc/header.php";
	$us = user("isAdmin");
	if(isLogin()) {
	if(!$us["isAdmin"]) {
		$uyari = "";
		if($_POST) {
			$sinema_id = intval($_POST["sinema_id"]);
			$salon_id = intval($_POST["salon_id"]);
			$film_id = intval($_POST["film_id"]);
			$fiyat = intval($_POST["bilet_id"]);
			
			$salonKapasite = mysql_fetch_array(mysql_query("select kapasite from salonlar where salon_id='$salon_id'"));
			
			$toplamSalon = mysql_fetch_array(mysql_query("select count(*) as toplam from satis where salon_id='$salon_id'"));
			if($salonKapasite["kapasite"] >	 $toplamSalon["toplam"] ) {
				
				$ekle = mysql_query("insert into satis set sinema_id='$sinema_id', salon_id='$salon_id', film_id='$film_id', tutar='$fiyat', kullanici_id='$user[kullanici_id]'");
				$uyari =  $ekle ? ' <div class="alert alert-success"> Kayıt Başarılı.</div>' : ' <div class="alert alert-danger"> Sistem Hatası. <br/>'.$vv.'</div>';
			}else {
				$uyari =  ' <div class="alert alert-danger"> Salonda Boş Yer Yok. </div>';
			}
			
		}
		
		
		
		?>
	<div class="container">
		<div class="row">
		<div class="col-md-12"><?=$uyari?></div>
			<div class="col-md-12"> 
				<div class="panel panel-default">
					<div class="panel-heading">Bilet Al</div>
					<div class="panel-body">
						<form action="" method="POST">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Sinema Seç</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<select class="form-control" name="sinema_id" id="sinema_id">
									<option value="0"> Sinema Seçin</option>
									<?php
										$sor = mysql_Query("select * from sinemalar order by adi asc");
										while($s = mysql_fetch_array($sor)) {
											echo ' <option value="'.$s["sinema_id"].'">'.$s["adi"].'</option>';
										}
									
									
									?>
								</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Salon Seç</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<select class="form-control" name="salon_id" id="salon_id">
										<option value="0"> Salon Seçin</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Film Seç</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<select class="form-control" name="film_id" id="film_id">
									<option value="0"> Film Seçin</option>
									<?php
										$sor = mysql_Query("select * from filmler order by film_adi asc");
										while($s = mysql_fetch_array($sor)) {
											echo ' <option value="'.$s["film_id"].'">'.$s["film_adi"].'</option>';
										}
									
									
									?>
								</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Bilet Tipi</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<select class="form-control" name="bilet_id" id="bilet_id">
										<?php
										$sor = mysql_Query("select * from bilet order by bilet_id asc");
										while($s = mysql_fetch_array($sor)) {
											echo ' <option value="'.$s["fiyat"].'">'.$s["bilet_turu"].'</option>';
										}
									
									
									?>
									</select>
								</div>
							</div>
						</div>
						

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg login-button">Ekle</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"> <h2> Biletlerim</h2></div>
			<div class="col-md-12"> 
				<table class="table" style="margin-top:20px;">
					<tr>
						<th>No </th>
						<th> Sinema</th>
						<th> Salon</th>
						<th> Film</th>
						<th> Fiyat</th>
					</tr>
						<?php
							$sor = mysql_Query("select * from satis
							inner join sinemalar on sinemalar.sinema_id=satis.sinema_id
							inner join salonlar on salonlar.salon_id=satis.salon_id
							inner join filmler on filmler.film_id=satis.film_id
							WHERE satis.kullanici_id='$user[kullanici_id]'
							 order by satis.satis_id asc");
							if(mysql_num_rows($sor) == 0) {
								echo ' <tr> <td colspan="5" class="text-center"> Satış Yok</td></tr>';
							}else {
								while($film = mysql_fetch_array($sor)) {
									echo '
									<tr>
										<td> '.$film["satis_id"].'</td>
										<td> '.$film["adi"].'</td>
										<td> '.$film["salon_adi"].'</td>
										<td> '.$film["film_adi"].'</td>
										<td> '.$film["tutar"].'</td>
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
} else {
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"> <h2> Satışlar</h2></div>
			<div class="col-md-12"> 
				<table class="table" style="margin-top:20px;">
					<tr>
						<th>No </th>
						<th> Sinema</th>
						<th> Salon</th>
						<th> Film</th>
						<th> Müşteri</th>
						<th> Fiyat</th>
					</tr>
						<?php
							$sor = mysql_Query("select * from satis
							inner join sinemalar on sinemalar.sinema_id=satis.sinema_id
							inner join salonlar on salonlar.salon_id=satis.salon_id
							inner join filmler on filmler.film_id=satis.film_id
							inner join kullanicilar on kullanicilar.kullanici_id=satis.kullanici_id
							
							 order by satis.satis_id asc");
							if(mysql_num_rows($sor) == 0) {
								echo ' <tr> <td colspan="5" class="text-center"> Satış Yok</td></tr>';
							}else {
								while($film = mysql_fetch_array($sor)) {
									echo '
									<tr>
										<td> '.$film["satis_id"].'</td>
										<td> '.$film["adi"].'</td>
										<td> '.$film["salon_adi"].'</td>
										<td> '.$film["film_adi"].'</td>
										<td> '.$film["ad_soyad"].'</td>
										<td> '.$film["tutar"].'</td>
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
	}
	}
	include "inc/footer.php";
?>
<script type="text/javascript">
	$(function(){
		
		$("#sinema_id").change(function(){
			
			$.ajax({
				type:"POST",
				url: "SalonGetir.ajax.php",
				data: "sinema_id="+$(this).val(),
				success:function(e) {
					$("#salon_id").html(e);
				}
				
			});
			
			return false;
		});
		
		
		
		
		
	});
</script>