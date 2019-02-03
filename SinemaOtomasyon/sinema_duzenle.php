<?php
	include "inc/header.php";
	$uyari = "";
	$sinema_id= intval($_GET["sinema_id"]);
	if($_POST) {
		
		$sinema_adi = addslashes($_POST["sinema_adi"]);
		$sinema_yeri = addslashes($_POST["sinema_yeri"]);
		$salon_sayisi = addslashes($_POST["salon_sayisi"]);
		
		if(empty($sinema_adi) || empty($sinema_yeri) || empty($salon_sayisi) ) {
			$uyari = ' <div class="alert alert-danger"> Boş Alan bırakmayınız.</div>';
		}
		else {
			
			$guncelle = mysql_query("update sinemalar set adi='$sinema_adi', yeri='$sinema_yeri', salon_Sayisi='$salon_sayisi' WHERE sinema_id='$sinema_id'");
			$uyari =  $guncelle ? ' <div class="alert alert-success"> Güncelleme Başarılı.</div>' : ' <div class="alert alert-danger"> Sistem Hatası.</div>';
			
		}
		
		
		
	}
	
	
	$sinema = mysql_fetch_array(mysql_query("select * from sinemalar where sinema_id='$sinema_id'"));
?>

<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Sinema Düzenle</h1>
	               		<hr />
	               	</div>
	            </div> 
	            <div class="col-md-6 col-md-offset-3">
	            <?=$uyari?>
				<div >
					<form class="form-horizontal" method="post" action="?sinema_id=<?=$sinema_id?>">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Sinema Adı</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="sinema_adi" value="<?=$sinema["adi"]?>"  />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Sinema Yeri</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="sinema_yeri"  value="<?=$sinema["yeri"]?>"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Salon Sayısı</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="salon_sayisi"  value="<?=$sinema["salon_sayisi"]?>"   />
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