<?php

require 'wallpaper.php';
require 'tiling.php';

// Récupération de la résolution de l'utilisateur
if(isset($_POST['width'])&&isset($_POST['height'])){
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

if (!isset($_POST["generer"])) {
    $url = "";

    include('template.php');
    exit();
}

$name = basename($_POST["url"]);
$url = 'https://site.qwertee.com/api/tee/'.$name;

if ($file = fopen ("$url", "r")){

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

	$content = '';

	// Lecture ligne par ligne
	while (!feof ($file)) {

		$line = fgets ($file, 1024);

		$content.=$line;
	}

	fclose($file);

	$content = json_decode($content, true);
	$image = 'https://cdn.qwertee.com/images/designs/product-thumbs/'.$content['zoom']['id'].'-'.$content['zoom']['name'].'-500x600.jpg';

	// Récupération de la miniature
	$imageMini = str_replace( "500x600" , "285x342" , $image);

	// Récupération du nom de l'image
	$nomFichier = $content['slug'];
	$nomDesign = $content['name'];

	// Récupération de l'auteur
	$nomAuteur = $content['user']['username'];

	$recadrage = $recadrer;
	$wallpaper = createWallpaper($image, $width, $height, $produit);

	$path = ''.$wallpaper;

}
else{
	echo "problème dans le chargement de l'url";
}

include('template.php')

?>
