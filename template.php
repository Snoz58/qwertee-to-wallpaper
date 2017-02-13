<!DOCTYPE html>
<html lang="fr">
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
        <div class="container">
			<div class="row">
				<div class="column column-50 column-offset-25">
					<a href="./index.php"><h1 class="title">Qwertee to Wallpaper</h1></a>
					<p class="description">
						Création de fond d'écran à partir d'images de <a href="https://www.qwertee.com/shop">Qwertee</a>.
					</p>
					<form action="index.php" method="post">
						<fieldset>
							<label for="url">Url de la source</label>
							<input type="text" placeholder="https://www.qwertee.com/product/..." id="url" name="url" value="<?= $url ?>">

							<input type="checkbox" id="recadrer" name="recadrer">
							<label class="label-inline" for="recadrer">Recadrer l'image (Provoque une perte de qualité)</label>

							<label for="screenx">Résolution souhaitée</label>
							<input type="number" value="" id="width" name="width" placeholder="Largeur">
							<input type="number" value="" id="height" name="height" placeholder="Hauteur">

							<input class="button-primary" type="submit" value="Générer" name="generer">
						</fieldset>
					</form>
<?php if (isset($_POST["generer"])) : ?>
					<div class="image">
						<img src="<?= $imageMini; ?>">
						<div class="clearfix"></div>
						<a download="qwertee_wallpaper.jpg" href="<?= $path ?>"><button class="button-primary">Télécharger</button></a>
						<a href="<?= $path ?>" target="_blank"><button class="button-primary">Afficher</button></a>
					</div>
<?php endif; ?>
				</div>
			</div>

		</div>

        <footer>
            <div class="float-left">Made with <3 by Corentin MÉTÉNIER & Arsène THIEFFRY - <a href="https://github.com/Snoz58/qwertee-to-wallpaper">GitHub</a></div>
            <div class="float-right">CSS : Milligram - <a href="https://github.com/milligram/milligram">GitHub</a></div>
        </footer>

		<script type="text/javascript">
			var screenw = document.getElementById('width').value = screen.width;
			var screenh = document.getElementById('height').value = screen.height;
		</script>

    </body>

</html>
