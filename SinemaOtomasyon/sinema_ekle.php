<?php
	include "inc/header.php";
	$uyari = "";
	if($_POST) {
		
		$sinema_adi = addslashes($_POST["sinema_adi"]);
		$sinema_yeri = addslashes($_POST["sinema_yeri"]);
		$salon_sayisi = addslashes($_POST["salon_sayisi"]);
		
		if(empty($sinema_adi) || empty($sinema_yeri) || empty($salon_sayisi) ) {
			$uyari = ' <div class="alert alert-danger"> Boş Alan bırakmayınız.</div>';
		}
		else {
			
			$ekle = mysql_query("insert into sinemalar set adi='$sinema_adi', yeri='$sinema_yeri', salon_Sayisi='$salon_sayisi'");
			$uyari =  $ekle ? ' <div class="alert alert-success"> Kayıt Başarılı.</div>' : ' <div class="alert alert-danger"> Sistem Hatası.</div>';
			
		}
		
		
		
	}
	
	
	
?>

<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Sinema Ekle</h1>
	               		<hr />
	               	</div>
	            </div> 
	            <div class="col-md-6 col-md-offset-3">
	            <?=$uyari?>
				<div >
					<form class="form-horizontal" method="post" action="#">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Sinema Adı</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="sinema_adi"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Sinema Yeri</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="sinema_yeri"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Salon Sayısı</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="salon_sayisi"   />
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







<?php	
	include "inc/footer.php";
?>