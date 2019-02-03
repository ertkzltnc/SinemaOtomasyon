<?php
	include "inc/header.php";
	$uyari = "";
	$film_id = $_GET["film_id"];
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
			
			$ekle = mysql_query("update filmler set $vv WHERE film_id='$film_id'");
			$uyari =  $ekle ? ' <div class="alert alert-success"> Güncelleme Başarılı.</div>' : ' <div class="alert alert-danger"> Sistem Hatası.</div>';
			
		}
		
		
		
	}
	
	$film = mysql_fetch_array(mysql_query("select * from filmler where film_id='$film_id'"));
	
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
					<form class="form-horizontal" method="post" action="?film_id=<?=$film_id?>">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Film Adı</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" value="<?=$film["film_adi"]?>"  name="film_adi"    />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Film Yılı</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" value="<?=$film["yil"]?>" name="yil"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Aktör</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" value="<?=$film["aktor"]?>" name="aktor"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Aktrist</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" value="<?=$film["aktris"]?>" name="aktris"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Yöntmen</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" value="<?=$film["yonetmen"]?>" name="yonetmen"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Dil</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" value="<?=$film["dil"]?>" name="dil"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Süre</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" value="<?=$film["sure"]?>" name="sure"   />
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