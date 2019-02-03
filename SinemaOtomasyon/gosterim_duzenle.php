<?php
	include "inc/header.php";
	$uyari = "";
	$gid = $_GET["gosterim_id"];
	if($_POST) {
		
		$salon_id = addslashes($_POST["salon_id"]);
		$film_id = addslashes($_POST["film_id"]);
		$tarih = addslashes($_POST["tarih"]);
		
		if(empty($salon_id) || empty($film_id) || empty($tarih) ) {
			$uyari = ' <div class="alert alert-danger"> Boş Alan bırakmayınız.</div>';
		}
		else {
			
			$ekle = mysql_query("update gosterim set salon_id='$salon_id', film_id='$film_id', tarih='$tarih' WHERE gosterim_id='$gid'") or die(mysql_error());
			$uyari =  $ekle ? ' <div class="alert alert-success"> Güncelleme Başarılı.</div>' : ' <div class="alert alert-danger"> Sistem Hatası.</div>';
			
		}
		
		
		
	}
	$gosterim = mysql_fetch_array(mysql_query("select * from gosterim where gosterim_id='$gid'"));
	
	
	
?>

<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Gösterim Düzenle</h1>
	               		<hr />
	               	</div>
	            </div> 
	            <div class="col-md-6 col-md-offset-3">
	            <?=$uyari?>
				<div >
					<form class="form-horizontal" method="post" action="?gosterim_id=<?=$gid?>">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Salon Seç</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<select class="form-control" name="salon_id" id="">
									<option value="0"> Salon Seçin</option>
									<?php
										$sor = mysql_query("select * from salonlar order by salon_adi asc");
										while($s = mysql_fetch_array($sor)) {
											$ss = $gosterim["salon_id"] == $s["salon_id"] ? "selected" : "";
											echo ' <option '.$ss.' value="'.$s["salon_id"].'">'.$s["salon_adi"].'</option>';
										}
									
									
									?>
								</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Film Seç</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<select class="form-control" name="film_id" id="">
									<option value="0"> Film Seçin</option>
									<?php
										$sor = mysql_Query("select * from filmler order by film_adi asc");
										while($s = mysql_fetch_array($sor)) {
											$ss = $gosterim["film_id"] == $s["film_id"] ? "selected" : "";
											echo ' <option '.$ss.' value="'.$s["film_id"].'">'.$s["film_adi"].'</option>';
										}
									
									
									?>
								</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Tarih</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="date" class="form-control" value="<?=$gosterim["tarih"]?>" name="tarih"   />
								</div>
							</div>
						</div>

						

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg login-button">Güncelle</button>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>







<?php	
	include "inc/footer.php";
?>