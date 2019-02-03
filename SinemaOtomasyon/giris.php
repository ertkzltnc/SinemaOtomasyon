<?php
	include "inc/header.php";
	$uyari = "";
	if($_POST) {
		
		$posta = addslashes($_POST["posta"]);
		$sifre = addslashes($_POST["sifre"]);
		
		if(empty($posta) || empty($sifre)) {
			$uyari = ' <div class="alert alert-danger"> Boş Alan bırakmayınız.</div>';
		}
		else {
			
			$sor = mysql_query("select * from kullanicilar WHERE posta='$posta' &&  sifre='$sifre'");
			if(mysql_num_rows($sor) == 0)
			{
				$uyari = ' <div class="alert alert-danger"> Kullanıcı adı veya şifre hatalı</div>';
			} else {
				$user = mysql_fetch_array($sor);
				$_SESSION["kullanici_id"] = $user["kullanici_id"];
				$_SESSION["isAdmin"] = $user["isAdmin"];
				$uyari = ' <div class="alert alert-success"> Giriş Başarılı Yönlendiriliyorsunuz.

				</div>' ;
				
				yonlendir("index.php");
			}
			
			
		}
		
		
		
	}
	
	
	
?>

<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Giriş Yap</h1>
	               		<hr />
	               	</div>
	            </div> 
	            <div class="col-md-6 col-md-offset-3">
	            <?=$uyari?>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						
						

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
							<label for="username" class="cols-sm-2 control-label">Şifre</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="sifre"  placeholder="Şifre"/>
								</div>
							</div>
						</div>
						
						

						

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Giriş</button>
						</div>
						<div class="login-register text-right">
				            <a href="kaydol.php">Kaydol</a>
				         </div>
					</form>
				</div>
				</div>
			</div>
		</div>







<?php	
	include "inc/footer.php";
?>