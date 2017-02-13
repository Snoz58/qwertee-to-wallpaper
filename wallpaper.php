<?php

//$image = $_GET['image'];

function createWallpaper($image, $width = 1920, $height = 1080, $multiplier = 1.0) {

	$path = 'images/'.md5($image.$width.$height.$multiplier).'.jpg';

	if (!file_exists($path)) {
		// Récupération de la couleur de fond de l'image source
		$source = imagecreatefromjpeg($image);
		$rgb = imagecolorat($source, 1, 1);
		$colors = imagecolorsforindex($source, $rgb);


		// Taille de la future image

		// Paramètres de l'image
		//$recadrage = $_GET["recadrer"];
		// $recadrage = true;

		$destination = @imagecreatetruecolor($width, $height) or die ("Erreur lors de la création de l'image");
		// imagefill ( $destination , 0 , 0 , $rgb );

		$tileSize = 10;
		$tile = @imagecreatetruecolor($tileSize, $tileSize);
		imagecopyresized($tile, $source, 0, 0, 0, 0, $tileSize, $tileSize, $tileSize, $tileSize);
		// imagecopyresized($tile, $source, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

		imagesettile($destination, $tile);
		imagefilledrectangle($destination, 0, 0, $width, $height, IMG_COLOR_TILED);

		// Partie copiée de la source
		$src_x = 0;
		$src_y = 0;
		$src_w = imagesx($source);
		$src_h = imagesy($source);


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
