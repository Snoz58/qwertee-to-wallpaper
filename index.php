<?php
require 'wallpaper.php';

// Récupération de la résolution de l'utilisateur
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

var_dump($_POST);
// if (false) {
if (isset($_POST["generer"])){

	// Récupération du code html de la page qwertee
	$url = $_POST["url"];
	echo($url);
	if ($file = fopen ("https://www.qwertee.com/print/the-father-948", "r")){
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

		$path = ''.$wallpaper;
	}
	else{
		echo "problème dans le chargement de l'url";
	}
}

include('template.php')

?>
