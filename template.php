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
		<meta charset="UTF-8">
	</head>

 	<body>




<a href="https://github.com/Snoz58/qwertee-to-wallpaper" class="github-corner" aria-label="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#9b4dca; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>





        <div class="container">
			<div class="row">
				<div class="column column-50 column-offset-25">
					<a href="./index.php"><h1 class="title">Qwertee to Wallpaper</h1></a>
					<p class="description">
						Création de fond d'écran à partir d'images de <a target="_blank" href="https://www.qwertee.com/shop">Qwertee</a>.
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
						<a download="<?= $nomImage; ?>.jpg" href="<?= $path ?>"><button class="button-primary">Télécharger</button></a>
						<a href="<?= $path ?>" target="_blank"><button class="button-primary">Afficher</button></a>
						<p class="description">Image <?= $nomAuteur; ?></p>
					</div>
<?php endif; ?>
				</div>
			</div>

		</div>

        <footer>
            <div class="float-left">Made with <3 by Corentin MÉTÉNIER & Arsène THIEFFRY</div>
            <div class="float-right">CSS : Milligram - <a href="https://github.com/milligram/milligram">GitHub</a></div>
        </footer>

		<script type="text/javascript">
			var screenw = document.getElementById('width').value = screen.width;
			var screenh = document.getElementById('height').value = screen.height;
		</script>

    </body>

</html>
