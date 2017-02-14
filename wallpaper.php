<?php

function createWallpaper($image, $width = 1920, $height = 1080, $type, $multiplier = 1.0) {

	$path = 'images/'.md5($image.$width.$height.$multiplier).'.jpg';

	if (!file_exists($path)) {

		// Gestion des affiche (recadrage de l'image et point de récupération de couleur différent)
		if ($type = "print"){ // pour une affiche
			$offsetImage = 10;
		}
		else { // pour un teeshirt
			$offsetImage = 0;
		}

		// Récupération de la couleur de fond de l'image source
		$source = imagecreatefromjpeg($image);
		$rgb = imagecolorat($source, $offsetImage, $offsetImage);
		$colors = imagecolorsforindex($source, $rgb);


		// Taille de la future image

		// Paramètres de l'image
		//$recadrage = $_GET["recadrer"];
		// $recadrage = true;

		$destination = @imagecreatetruecolor($width, $height) or die ("Erreur lors de la création de l'image");
		imagefill ( $destination , 0 , 0 , $rgb );


//########## Code pour le remplissage des patterns

//		// Création de la textre pour la remplissage
//		$tileSize = 20;
//		$tile = @imagecreatetruecolor($tileSize, $tileSize);
//		imagecopyresized($tile, $source, 0, 0, 0, 0, $tileSize, $tileSize, $tileSize, $tileSize);
//
//		// Remplissage de la destination par la texture
//		imagesettile($destination, $tile);
//		imagefilledrectangle($destination, 0, 0, $width, $height, IMG_COLOR_TILED);

//########## Fin du code pour le remplissage des patterns


		$src_x = $offsetImage;
		$src_y = $offsetImage;
		$src_w = (imagesx($source)-($offsetImage*2));
		$src_h = (imagesy($source)-($offsetImage*2));

		$dst_x = ($width-$src_w*$multiplier)/2;
		$dst_y = ($height-$src_h*$multiplier)/2;
		$dst_w = $src_w*$multiplier;
		$dst_h = $src_h*$multiplier;

		imagecopyresized($destination, $source, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

		imagejpeg($destination, $path, 100);
	}

	//header('Location: http://localhost/druz/qwertee-to-wallpaper/'.$path);
	return $path;
}
?>
