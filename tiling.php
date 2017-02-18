<?php 

function retournerVertical($image){

	$taillex = imagesx($image);
	$tailley = imagesy($image);

	$dest = imagecreatetruecolor($taillex, $tailley); 

	for($y=0; $y<=$tailley; $y++){
		imagecopy($dest, $image, 0, $tailley-$y-1, 0,$y, $taillex, 1);
	}
	return $dest;
}

function retournerHorizontal($image){

	$taillex = imagesx($image);
	$tailley = imagesy($image);

	$dest = imagecreatetruecolor($taillex, $tailley); 

	for($x=0; $x<=$taillex; $x++){
		imagecopy($dest, $image, $taillex-$x-1, 0, $x, 0, 1, $tailley);
	}
	return $dest;
}


function homeMadeTiling($source, $tile){


	$taillex = imagesx($source);
	$tailley = imagesy($source);
	$tailletile = imagesx($tile);

	$image  = imagecreatetruecolor($taillex, $tailley); 

	$tabtiles = array();

	$tabtiles[0] = $tile;
	$tabtiles[1] = retournerHorizontal($tabtiles[0]);
	$tabtiles[2] = retournerVertical($tabtiles[0]);

	$tabtiles[3] = imagerotate ($tabtiles[0] , 90 , 0);
	$tabtiles[4] = retournerHorizontal($tabtiles[3]);
	$tabtiles[5] = retournerVertical($tabtiles[3]);

	$tabtiles[6] = imagerotate ($tabtiles[0] , 180 , 0);
	$tabtiles[7] = retournerHorizontal($tabtiles[6]);
	$tabtiles[8] = retournerVertical($tabtiles[6]);

	$tabtiles[9] = imagerotate ($tabtiles[0] , 270 , 0);
	$tabtiles[10] = retournerHorizontal($tabtiles[9]);
	$tabtiles[11] = retournerVertical($tabtiles[9]);

	$row = ceil($taillex/$tailletile);
	$line = ceil($tailley/$tailletile);

	for ($i=0; $i<$line; $i++){
		for ($j=0; $j<$row; $j++){
			imagecopyresized ($image, $tabtiles[rand(0, count($tabtiles)-1)], $tailletile*$j, $tailletile*$i, 0, 0, $tailletile, $tailletile, $tailletile, $tailletile);
		}
	}

	return $image;
}

?>