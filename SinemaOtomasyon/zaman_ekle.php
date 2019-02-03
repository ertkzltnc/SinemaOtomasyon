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
			
			$ekle = mysql_query("insert into zaman set $vv");
			$uyari =  $ekle ? ' <div class="alert alert-success"> Kayıt Başarılı.</div>' : ' <div class="alert alert-danger"> Sistem Hatası. <br/>'.$vv.'</div>';
			
		}
		
		
		
	}
	
	
	
?>

<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Zaman Ekle</h1>
	               		<hr />
	               	</div>
	            </div> 
	            <div class="col-md-6 col-md-offset-3">
	            <?=$uyari?>
				<div >
					<form class="form-horizontal" method="post" action="#">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">İndirim</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="indirim"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Akşam</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<select class="form-control" name="aksam" id="">
										<option value="0"> Hayır</option>
										<option value="1"> Evet</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Gece</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<select class="form-control" name="gece" id="">
										<option value="0"> Hayır</option>
										<option value="1"> Evet</option>
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