<?php
	include "inc/header.php";
	$uyari = "";
	if($_POST) {
		
		$ad_soyad = addslashes($_POST["ad_soyad"]);
		$telefon = addslashes($_POST["telefon"]);
		$posta = addslashes($_POST["posta"]);
		$sifre = addslashes($_POST["sifre"]);
		$sifre_t = addslashes($_POST["sifre_t"]);
		
		if(empty($ad_soyad) || empty($telefon) || empty($posta) || empty($sifre) || empty($sifre_t)) {
			$uyari = ' <div class="alert alert-danger"> Boş Alan bırakmayınız.</div>';
		}else if(!filter_var($posta, FILTER_VALIDATE_EMAIL)) {
			$uyari = ' <div class="alert alert-danger"> Geçersiz E-Posta Adresi.</div>';
			
		} else if($sifre != $sifre_t) {
			$uyari = ' <div class="alert alert-danger"> Şifreler Aynı Değil.</div>';
		}
		else {
			
			$ekle = mysql_query("insert into kullanicilar set ad_soyad='$ad_soyad', telefon='$telefon', posta='$posta', sifre='$sifre', isAdmin='0'");
			$uyari =  $ekle ? ' <div class="alert alert-success"> KAyıt Başarılı.</div>' : ' <div class="alert alert-danger"> Sistem Hatası.</div>';
			
		}
		
		
		
	}
	
	
	
?>

<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Kaydol</h1>
	               		<hr />
	               	</div>
	            </div> 
	            <div class="col-md-6 col-md-offset-3">
	            <?=$uyari?>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Ad Soyad</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="ad_soyad" id="name"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">E-Mail</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="posta" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Telefon</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="telefon"  placeholder="Telefon"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Şifre</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="sifre"  placeholder="Şifre"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Şifre Tekrar</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="sifre_t"  placeholder="Şifre Tekrar"/>
								</div>
							</div>
						</div>
						

						

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Kaydol</button>
						</div>
						<div class="login-register text-right">
				            <a href="giris.php">Giriş</a>
				         </div>
					</form>
				</div>
				</div>
			</div>
		</div>







<?php	
	include "inc/footer.php";
?>