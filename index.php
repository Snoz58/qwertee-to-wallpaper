<?php
require 'wallpaper.php';
require 'tiling.php';

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

if (isset($_POST["generer"])){

	// Récupération du code html de la page qwertee
	$url = $_POST["url"];

	if ($file = fopen ("$url", "r")){
		$url = $_POST["url"];
		if (!$file) {
			echo "<p>Impossible de lire la page.</p>";
			exit;
		}

		if (substr_count($url, "print")){
			$produit = "print";
		}
		else{
			$produit = "tee";
		}


		// Lecture ligne par ligne
		while (!feof ($file)) {

			$line = fgets ($file, 1024);

			// Récupération de toute les images jpg du site
			if (preg_match ("@cdn.qwertee.com(.*).jpg@", $line, $out)) {
				$tabimage[]=$out;
			}

			// Récupération du nom de l'image
			if (preg_match ("@<span class=\"name\">(.*)</span>@", $line, $out)) {
				$tabnom[]=$out;
			}

			// Récupération de l'auteur
			if (preg_match ("@<span class=\"author\">(.*)</span>@", $line, $out)) {
				$tabauteur[]=$out;
			}


		}

		fclose($file);


		// Récupération de l'image qui nous interesse
		$image = "http://".$tabimage[1][0];

		// Récupération de la miniature
		$imageMini = str_replace( "500x600" , "285x342" , $image);

		// Récupération du nom de l'image
		$nomImage = $tabnom[0][1];

		// Récupération de l'auteur
		$nomAuteur = $tabauteur[0][1];
		$nomAuteur = str_replace("/profile", "https://www.qwertee.com/profile", $nomAuteur);

		$recadrage = $recadrer;
		$wallpaper = createWallpaper($image, $width, $height, $produit);

		$path = ''.$wallpaper;

	}
	else{
		echo "problème dans le chargement de l'url";
	}
}
else{
	$url = "";
}

include('template.php')

?>
