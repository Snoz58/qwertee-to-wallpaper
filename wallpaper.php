<?php

//$image = $_GET['image'];

$path = 'images/'.md5($image).'.jpg';

if (!file_exists($path)) {
	// Récupération de la couleur de fond de l'image source
	$source = imagecreatefromjpeg($image);
	$rgb = imagecolorat($source, 1, 1);
	$colors = imagecolorsforindex($source, $rgb);


	// Taille de la future image
	$width = 1920;
	$height = 1080;

	// Paramètres de l'image
	//$recadrage = $_GET["recadrer"];
	// $recadrage = true;

	$destination = @imagecreatetruecolor($width, $height) or die ("Erreur lors de la création de l'image");
	imagefill ( $destination , 0 , 0 , $rgb );

	// Partie copiée de la source
	$src_x = 0;
	$src_y = 0;
	$src_w = imagesx($source);
	$src_h = imagesy($source);

	if ($recadrage){

		if ($height < $width){
			// Redimensionnement par la hauteur
			$dst_h = $height;
			$dst_w = $src_w*$dst_h/$src_h;
			$dst_x = ($width-$dst_w)/2;
			$dst_y = ($height-$dst_h)/2;
		}

		else{
			// Redimensionnement par la largeur
			$dst_w = $width;
			$dst_h = $src_h*$dst_w/$src_w;
			$dst_x = ($width-$dst_w)/2;
			$dst_y = ($height-$dst_h)/2;
		}

	}

	else{
		// Pas de redimensionnement
		$dst_x = ($width-$src_w)/2;
		$dst_y = ($height-$src_h)/2;
		$dst_w = $src_w;
		$dst_h = $src_h;
	}

	imagecopyresized($destination, $source, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);



	imagejpeg($destination, $path, 100);
}
//header('Location: http://localhost/druz/qwertee-to-wallpaper/'.$path);

?>
