<?php
require 'wallpaper.php';
// Récupération de la résolution de l'utilisateur

$width = 1920;
$height = 1080;

if(isset($_POST['width'])&&isset($_POST['width'])){
	$width = $_POST["width"];
	$height = $_POST["height"];
}

// Gestion du recadrage
if (isset($_POST["recadrer"])){
	$recadrer = true;
}
else {
	$recadrer = false;
}

$url = '';

if (isset($_POST["generer"])){

	// Récupération du code html de la page qwertee
	if ($file = fopen ($_POST["url"], "r")){
		$url = $_POST["url"];
		if (!$file) {
			echo "<p>Impossible de lire la page.</p>";
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

		$recadrage = $recadrer;
		$wallpaper = createWallpaper($image, $width, $height);

		$path = 'http://localhost/druz/qwertee-to-wallpaper/'.$wallpaper;
	}
	else{
		echo "problème dans le chargement de l'url";
	}
}

include('template.php')

?>
