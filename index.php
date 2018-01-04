<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Konversi Koordinat</title>
	<link href="../icon/fav.png" rel="shorcut icon">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

</head>
<body style="background-color: grey;">
<?php 
require 'navbar.php';
?>

<div class="container">
	<center>
	<div class="jumbotron" style="padding-top: 0px; padding-bottom: 5px;">
		<h1 style="font-family: monospace;"><b>Aplikasi Konversi Koordinat</b></h1>
		<hr>
		<div class="btn btn-lg btn-success">Decimal Degree - DMS</div>
		<div class="btn btn-lg btn-info">DMS - Decimal Degree</div>
	</div>
	</center>

	<div class="col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<b>Konversi Decimal Degree - DMS</b>
		</div>
		<div class="panel-body">
			<h4>Decimal Degree</h4>
			<form method="POST">
				<input type="text" name="dlat" placeholder="Latitude">
				<select name="poslat1">
					<option value="utara">Utara</option>
					<option value="selatan">Selatan</option>
				</select>
				<br>
				<input type="text" name="dlng" placeholder="Longitude">
				
				<select name="poslng1">
					<option value="timur">Timur</option>
					<option value="barat">Barat</option>
				</select>
				<br><br>
				<button name="konvert1" style="background-color: grey; color: white;">Ubah</button>
			</form>
			<br>
			<h4>Hasil Konversi</h4>
			<?php 
			if (isset($_POST['konvert1'])) {
				$dlat = $_POST['dlat'];
				$dlng = $_POST['dlng'];
				$poslat1 = $_POST['poslat1'];
				switch ($poslat1) {
					case 'utara':
						$degclat1 = floor($dlat);
						$degclat = $dlat - $degclat1;
						$minclat1 = $degclat*60;
						$minclat = floor($minclat1);
						$minclat2 = $minclat1 - $minclat;
						$secclat1 = $minclat2*60;
						$secclat = floor($secclat1);
						break;
					
					case 'selatan':
						$degclat1 = -(ceil($dlat));
						$degclat = -($dlat) - $degclat1;
						$minclat1 = $degclat*60;
						$minclat = floor($minclat1);
						$minclat2 = $minclat1 - $minclat;
						$secclat1 = $minclat2*60;
						$secclat = floor($secclat1);
						break;
				}
				$poslng1 = $_POST['poslng1'];
				switch ($poslng1) {
					case 'timur':
						$degclng1 = floor($dlng);
						$degclng = $dlng - $degclng1;
						$minclng1 = $degclng*60;
						$minclng = floor($minclng1);
						$minclng2 = $minclng1 - $minclng;
						$secclng1 = $minclng2*60;
						$secclng = floor($secclng1);
						break;
					
					case 'barat':
						$degclng1 = -(ceil($dlng));
						$degclng = -($dlng) - $degclng1;
						$minclng1 = $degclng*60;
						$minclng = floor($minclng1);
						$minclng2 = $minclng1 - $minclng;
						$secclng1 = $minclng2*60;
						$secclng = floor($secclng1);
						break;
				}
				
			} ?>
			<div class="col-md-6" style="padding-left: 0px;">
			<h5>Latitude</h5>
			<input type="number" placeholder="Degree" value="<?php echo ($degclat1) ?>" readonly> Degree<br>
			<input type="number" placeholder="Minute" value="<?php echo ($minclat) ?>" readonly> Minute<br>
			<input type="number" placeholder="Second" value="<?php echo ($secclat) ?>" readonly> Second
			</div>

			<div class="col-md-6" style="padding-left: 0px;">
			<h5>Laongitude</h5>
			<input type="number" placeholder="Degree" value="<?php echo ($degclng1) ?>" readonly> Degree<br>
			<input type="number" placeholder="Minute" value="<?php echo ($minclng) ?>" readonly> Minute<br>
			<input type="number" placeholder="Second" value="<?php echo ($secclng) ?>" readonly> Second
			</div>
		</div>
	</div>
	</div>

	<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<b>Konversi DMS - Decimal Degree</b>
		</div>
		<div class="panel-body">
			<h4>Latitude</h4>
			<form method="POST">
				<input type="text" name="deglat" size="10" placeholder="Degree">
				<input type="text" name="minlat" size="10" placeholder="Minute">
				<input type="text" name="seclat" size="10" placeholder="Second">
				<select name="poslat">
					<option value="utara">Utara</option>
					<option value="selatan">Selatan</option>
				</select>

			<h4>Longitude</h4>
			
				<input type="text" name="deglng" size="10" placeholder="Degree">
				<input type="text" name="minlng" size="10" placeholder="Minute">
				<input type="text" name="seclng" size="10" placeholder="Second">
				<select name="poslng">
					<option value="timur">Timur</option>
					<option value="barat">Barat</option>
				</select>		
			
			<br>
			<br>
				<button name="konvert2" style="background-color: grey; color: white;">Ubah</button>
			</form>
			<br>
			<h4>Hasil Konversi</h4>
			<?php 
			if(isset($_POST['konvert2'])){
			$deglat = $_POST['deglat'];
			$minlat = $_POST['minlat'];
			$seclat = $_POST['seclat'];
			$deglng = $_POST['deglng'];
			$minlng = $_POST['minlng'];
			$seclng = $_POST['seclng'];
			$minlat1 = $minlat / 60;
			$seclat1 = $seclat / 3600;
			$minlng1 = $minlng / 60;
			$seclng1 = $seclng / 3600;
			$poslat = $_POST['poslat'];
			switch ($poslat) {
				case 'utara':
					$hasillat = $deglat+$minlat1+$seclat1;
					break;
				
				case 'selatan':
					$hasillat = -($deglat+$minlat1+$seclat1);
					break;
			}
			$poslng = $_POST['poslng'];
			switch ($poslng) {
				case 'barat':
					$hasillng = -($deglng+$minlng1+$seclng1);
					break;
				
				case 'timur':
					$hasillng = $deglng+$minlng1+$seclng1;
					break;
			}
			?>
			<?php } ?>
			<input type="number" placeholder="Latitude" value="<?php echo ($hasillat) ?>" readonly> Latitude<br><br>
			<input type="number" placeholder="Longitude" value="<?php echo ($hasillng) ?>" readonly> Longitude
			

		</div>
	</div>
	</div>
</div>
<?php 
require '../footer.php';
?>
</body>
</html>