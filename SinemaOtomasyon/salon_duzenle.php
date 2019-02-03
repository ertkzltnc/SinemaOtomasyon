<?php
	include "inc/header.php";
	$uyari = "";
	$sinema_id=$_REQUEST["sinema_id"];
	$salon_id=$_REQUEST["salon_id"];
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
			$ekle = mysql_query("Update salonlar set $vv WHERE salon_id='$salon_id'");
			$uyari =  $ekle ? ' <div class="alert alert-success"> Kayıt Başarılı.</div>' : ' <div class="alert alert-danger"> Sistem Hatası.</div>';
			
		}
		
		
		
	}
	
	$sinema = mysql_fetch_array(mysql_query("select * from sinemalar where sinema_id='$sinema_id'"));
	$salon = mysql_fetch_array(mysql_query("select * from salonlar where salon_id='$salon_id'"));
	
	
?>

<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title"><?=$sinema["adi"]?> | Salon Düzenle</h1>
	               		<hr />
	               	</div>
	            </div> 
	            <div class="col-md-6 col-md-offset-3">
	            <?=$uyari?>
				<div >
					<form class="form-horizontal" method="post" action="?salon_id=<?=$salon_id?>">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Salon Adı</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" value="<?=$salon["salon_adi"]?>" name="salon_adi"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Kapasite</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" value="<?=$salon["kapasite"]?>" name="kapasite"   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Ses Sistemi</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control"  value="<?=$salon["ses_sistemi"]?>" name="ses_sistemi"   />
									<input type="hidden" class="form-control" name="sinema_id" value="<?=$sinema_id?>"   />
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

<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"> <h2> Salonlar</h2></div>
			<div class="col-md-12"> 
				<table class="table" style="margin-top:20px;">
					<tr>
						<th>No </th>
						<th> Salon Adı</th>
						<th>Kapasite</th>
						<th> Ses Sistemi</th>
						<th> İşlemler</th>
					</tr>
						<?php
							
							if(isset($_GET["act"]) && $_GET["act"] == "sil") {
								mysql_Query("delete from salonlar where salon_id='$_GET[salon_id]'");
								yonlendir("salon_ekle.php?sinema_id=$_GET[sinema_id]");
							}
							$sor = mysql_Query("select * from salonlar where sinema_id='$sinema_id' order by salon_adi asc");
							if(mysql_num_rows($sor) == 0) {
								echo ' <tr> <td colspan="5" class="text-center"> Salon Yok</td></tr>';
							}else {
								while($sinema = mysql_fetch_array($sor)) {
									echo '
									<tr>
										<td> '.$sinema["salon_id"].'</td>
										<td> '.$sinema["salon_adi"].'</td>
										<td> '.$sinema["kapasite"].'</td>
										<td> '.$sinema["ses_sistemi"].'</td>
										<td> 
										<a class="btn btn-success" href="salon_duzenle.php?sinema_id='.$sinema_id.'&salon_id='.$sinema["salon_id"].'"> Düzenle</a>
										
										<a class="btn btn-danger" href="?act=sil&salon_id='.$sinema["salon_id"].'&sinema_id='.$sinema_id.'"> Sil</a>
										</td>
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
	include "inc/footer.php";
?>