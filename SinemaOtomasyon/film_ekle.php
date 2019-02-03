<?php
	include "inc/header.php";
	$uyari = "";
	if($_POST) {
		$vv = "";
		foreach($_POST as $key => $value) {
			if(empty($value) ) {
				$uyari = ' <div class="alert alert-danger"> Boş Alan bırakmayınız.</div>';
				break;
			}
			$vv .= " $key='$value', ";
			
			
		}
		$vv = rtrim($vv,", ");
		
		if(empty($uyari)) {
			
			$ekle = mysql_query("insert into filmler set $vv");
			$uyari =  $ekle ? ' <div class="alert alert-success"> Kayıt Başarılı.</div>' : ' <div class="alert alert-danger"> Sistem Hatası. <br/>'.$vv.'</div>';
			
		}
		
		
		
	}
	
	
	
?>

<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Film Ekle</h1>
	               		<hr />
	               	</div>
	            </div> 
	            <div class="col-md-6 col-md-offset-3">
	            <?=$uyari?>
				<div >
					<form class="form-horizontal" method="post" action="#">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Film Adı</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="film_adi"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Film Yılı</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="yil"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Aktör</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="aktor"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Aktrist</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="aktris"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Yöntmen</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="yonetmen"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Dil</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="dil"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Süre</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="sure"   />
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