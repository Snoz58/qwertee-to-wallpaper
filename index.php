<?php

// Récupération de la résolution de l'utilisateur

if(!isset($_POST['screenw'])&&!isset($_POST['screenh'])){
	/*
	echo "<script type=\"text/javascript\">\n";

	echo "location.href='index.php?screenw='+screen.width+'&screenh='+screen.height;\n";

	echo "</script>\n";
*/
}
else {

	$screenw = $_POST["screenw"];
	$screenh = $_POST["screenh"];

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
		include('wallpaper.php');
	}
	else{
		echo "problème dans le chargement de l'url";
	}
}

include('template.php')

?>
