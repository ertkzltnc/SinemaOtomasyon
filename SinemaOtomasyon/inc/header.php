<?php
	include "inc/db.php";
	include "inc/function.php";
	if(isLogin()) {
		$user = user(); // kullanııc bilgilerini çektik 
		
	}

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="style/style.css" />
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sinema Otomasyonu</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
          	
          	<?php
          	$u = user("isAdmin");
          		if($u["isAdmin"]) {
					// admin giriş yapmış
					// admin menüsü göster
					echo '
					<ul class="nav navbar-nav">
		              <li><a href="#">Anasayfa</a></li>
		              <li><a href="sinema_listele.php">Sinemalar</a></li>
		              <li><a href="film_listele.php">Filmler</a></li>
		              <li><a href="gosterim_listele.php">Gösterimler</a></li>
		              <li><a href="zaman_listele.php">Zamanlar</a></li>
		              <li><a href="bilet_listele.php">Biletler</a></li>
		            </ul>
					
					
					';
					
				}else {
					// kullanıcı giriş yapmış
					// kullanıcı menüsü göster
					echo '
					<ul class="nav navbar-nav">
		              <li><a href="#">Anasayfa</a></li>
		            </ul>
					';
				}
          	
          	?>
          
            
            <?php
            	if(isLogin()) {
					echo '
					<ul class="nav navbar-nav navbar-right">
		              <li><a href="">'.$user["ad_soyad"].'</a></li>
		              <li><a href="cikis.php">Çıkış Yap</a></li>
		            </ul>
					
					';
				}else {
					?>
				
            <ul class="nav navbar-nav navbar-right">
              <li><a href="giris.php">Yönetici Girişi</a></li>
              <li><a href="giris.php">Müşteri Girişi</a></li>
            </ul>
            <?php
            }
            
            
            
            ?>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
		</div>
	</div>
</div>
	
	
	