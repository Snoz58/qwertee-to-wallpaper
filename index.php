<!DOCTYPE html>
<html>
	<head>
		<title>Qwertee to Wallpaper</title>
		<!-- Google Fonts -->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- CSS Reset -->
		<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
		<!-- Milligram CSS minified -->
		<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="./style.css">
	</head>

 	<body>

<?php

// Récupération de la résolution de l'utilisateur
if(!isset($_GET['screenx'])&&!isset($_GET['screenx'])){

	echo "<script type=\"text/javascript\">\n";

	echo "location.href='index.php?screenx='+screen.width+'&screeny='+screen.height;\n";

	echo "</script>\n";

}
else {  

	$screenx = $_GET["screenx"];
	$screeny = $_GET["screeny"];

}

// Gestion du recadrage
if (isset($_GET["recadrer"])){
	$recadrer = true;
}
else {
	$recadrer = false;
}

if (isset($_GET["generer"])){

	// Récupération du code html de la page qwertee
	if ($file = fopen ($_GET["url"], "r")){

		if (!$file) {
			echo "<p>Impossible de lire la page.\n";
			exit;
		}

		// Lecture ligne par ligne
		while (!feof ($file)) {

			$line = fgets ($file, 1024);

			// récupération de toute les images jpg du site
			if (preg_match ("@cdn.qwertee.com(.*).jpg@", $line, $out)) {
				$tabimage[]=$out;
			}

		}

		fclose($file);


		// Récupération de l'image qui nous interesse
		$image = "http://".$tabimage[1][0];
		$imageMini = str_replace( "500x600" , "285x342" , $image);

	}
	else{
		echo "problème dans le chargement de l'url";
	}
}

?>

		<div class="container">
			<div class="row">
				<div class="column column-50 column-offset-25">
					<a href="./index.php"><h1 class="title">Qwertee to Wallpaper</h1></a>
					<p class="description">
						Création de fond d'écran à partir d'images de <a href="https://www.qwertee.com/shop">Qwertee</a>.
					</p>
					<form action="index.php">
						<fieldset>
							<label for="url">Url de la source</label>
							<input type="text" placeholder="https://www.qwertee.com/product/..." id="url" name="url">

							<input type="checkbox" id="recadrer" name="recadrer">
							<label class="label-inline" for="recadrer">Recadrer l'image (Provoque une perte de qualité)</label>

							<label for="screenx">Résolution souhaitée</label>
							<input type="text" value="<?php echo $screeny; ?>" id="screeny" name="screeny">
							<input type="text" value="<?php echo $screenx; ?>" id="screenx" name="screenx">

							<input class="button-primary" type="submit" value="Générer" name="generer">
						</fieldset>
					</form>
<?php 
if (isset($_GET["generer"])){
?>
					<div class="image">
						<img src="<?php echo $imageMini; ?>">
						<div class="clearfix"></div>
						<a download="qwertee_wallpaper.jpg" <?php echo "href='./wallpaper.php?image=".$image."&screenx=".$screenx."&screeny=".$screeny."&recadrer=".$recadrer."'"; ?>><button class="button-primary">Télécharger</button></a>
						<a <?php echo "href='./wallpaper.php?image=".$image."&screenx=".$screenx."&screeny=".$screeny."&recadrer=".$recadrer."'"; ?> target="_blank"><button class="button-primary">Afficher</button></a>
					</div>
<?php 
}
?>
				</div>
			</div>

		</div>

		<footer>
			<div class="float-left">Made with <3 by Corentin MÉTÉNIER - <a href="https://github.com/Snoz58/qwertee-to-wallpaper">GitHub</a></div>
	  		<div class="float-right">CSS : Milligram - <a href="https://github.com/milligram/milligram">GitHub</a></div>
		</footer>

	</body>

</html>