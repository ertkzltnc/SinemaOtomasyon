<?php
	include "inc/header.php";
	$uyari = "";
	if($_POST) {
		$vv = "";
		foreach($_POST as $key => $value) {
			if($value =="" ) {
				$uyari = ' <div class="alert alert-danger"> Boş Alan bırakmayınız.</div>';
				break;
			}
			$vv .= " $key='$value', ";
			
			
		}
		$vv = rtrim($vv,", ");
		
		if(empty($uyari)) {
			
			$ekle = mysql_query("insert into bilet set $vv");
			$uyari =  $ekle ? ' <div class="alert alert-success"> Kayıt Başarılı.</div>' : ' <div class="alert alert-danger"> Sistem Hatası. </div>';
			
		}
		
		
		
	}
	
	
	
?>

<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Bilet Ekle</h1>
	               		<hr />
	               	</div>
	            </div> 
	            <div class="col-md-6 col-md-offset-3">
	            <?=$uyari?>
				<div >
					<form class="form-horizontal" method="post" action="#">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Fiyat</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="fiyat"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Bilet Türü</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<select class="form-control" name="bilet_turu" id="">
										<option value="Normal"> Normal</option>
										<option value="Öğrenci"> Öğrenci</option>
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







<?php	
	include "inc/footer.php";
?>