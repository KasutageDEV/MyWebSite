<?php
require('./php/pdo.php');

if(isset($_POST['submit_email'])) {
	if(!empty($_POST['email'])) {
		$email = htmlspecialchars($_POST['email']);

		$email_verif = $bdd->prepare('SELECT id FROM newslatter WHERE email = ?');
		$email_verif->execute(array($email));
		$email_count = $email_verif->rowCount();

		if($email_count == 0) {
			if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$insert = $bdd->prepare('INSERT INTO newslatter(email) VALUES(?)');
				$insert->execute(array($email));

				$validate = 'Parfait ! Vous recevrez un e-mail lorsque le site sera disponible.';
			} else {
				$erreur = 'Cette adresse e-mail est incorrecte.';
			}
		} else {
			$erreur = 'Cette adresse e-mail est déjà inscrite à notre Newslatter.';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Développeur web freelance - Maxence VASBIEN</title>
	<meta name="description" content="Développeur web freelance et créateur de site internet depuis 2022. Développement web, création ou refonte de site internet, intégration, référencement, etc.">
	<meta name="author" content="Maxence VASBIEN">
	<meta property="og:locale" content="fr_FR">
	<meta property="og:image" content="https://www.maxence-vasbien.com/img/thumbnail.png">
	<meta property="og:image:width" content="100%">
	<meta property="og:image:height" content="100%">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://www.maxence-vasbien.com/">
	<meta property="og:title" content="Développeur web freelance - Création site internet">
	<meta property="og:description" content="Développeur web freelance et créateur de site internet depuis 2022. Développement web, création ou refonte de site internet, intégration, référencement, etc.">
	<link rel="canonical" href="https://www.maxence-vasbien.fr/">
	<link rel="stylesheet" type="text/css" href="./@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/global.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
</head>
<body>

	<main class="soon">
		<img src="./assets/imgs/waves2.svg" class="soon__top">

		<img src="./assets/imgs/logo-header.png" class="soon__logo">
		<p class="soon__infos">
			<span>Le site internet sera bientôt disponible !</span>
			Développeur web freelance et créateur de site internet depuis 2022. Création ou refonte de site internet, intégration, référencement, etc.
		</p>

		<div class="soon__newslatter">
			<h1 class="soon__title">Inscrivez-vous à ma newslatter</h1>
			<h3 class="soon__subtitle">Pour être tenu informé de l'ouverture du site !</h3>
			<?php if(isset($erreur)) { ?>
			<div class="soon__alert soon__alert--danger"><?= $erreur; ?></div>
			<?php } if(isset($validate)) { ?>
			<div class="soon__alert soon__alert--success"><?= $validate; ?></div>
			<?php } ?>
			<form method="POST">
				<div class="soon__form">
					<input type="email" name="email" placeholder="Votre e-mail" class="soon__input">
					<button type="submit" name="submit_email" class="soon__btn"><i class="fas fa-paper-plane"></i></button>
				</div>
			</form>
		</div>

		<img src="./assets/imgs/waves.svg" class="soon__bottom">
	</main>

</body>
</html>