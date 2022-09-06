<?php
require('./php/pdo.php');
$works_count = $bdd->query('SELECT id FROM works');
$works_verif = $works_count->rowCount();

$website = $bdd->query('SELECT * FROM settings');
$website_infos = $website->fetch();

if(isset($_POST['submit_contact'])) {
	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['tel']) AND !empty($_POST['email']) AND !empty($_POST['objet']) AND !empty($_POST['message'])) {

		$nom 		= htmlspecialchars($_POST['nom']);
		$prenom 	= htmlspecialchars($_POST['prenom']);
		$tel 		= htmlspecialchars($_POST['tel']);
		$email 		= htmlspecialchars($_POST['email']);
		$objet 		= htmlspecialchars($_POST['objet']);
		$message 	= htmlspecialchars($_POST['message']);

		$objet_utf8 = utf8_decode($objet);

		$destination 	= "contact@maxence-vasbien.fr";
		$entetes 		= "From: ".$email."\n";
		$entetes 	   .= "Content-Type: text/html; charset=utf8\n";

		$body = "Nom : ".$nom."<br />Prénom : ".$prenom."<br />Téléphone : ".$tel."<br />E-mail : ".$email."<br /><br />Message : ".$message;
		
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			if(mail($destination,$objet_utf8,$body,$entetes)) {
				$validate = 'Votre message à bien été envoyé.';
			} else {
				$erreur = 'Une erreur est survenue, veuillez réessayez.';
			}
		} else {
			$erreur = 'Cette adresse e-mail est incorrecte.';
		}
	} else {
		$erreur = 'Vous devez remplir tous les champs.';
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

	<header class="header" id="section_1">
		<div class="container header__flex">
			<img src="./assets/imgs/logo-header.png" class="header__logo" align="Logo Maxence VASBIEN Web Desginer">
			<nav class="navigation">
				<ul class="navigation__ulist">
					<li class="navigation__list"><a class="navigation__link active" href="#section_1">Accueil</a></li>
					<li class="navigation__list"><a class="navigation__link" href="#section_2">Qui suis-je ?</a></li>
					<li class="navigation__list"><a class="navigation__link" href="#section_3">Mes compétences</a></li>
					<?php if($works_verif >= 1) { ?>
					<li class="navigation__list"><a class="navigation__link" href="#section_4">Mes créations</a></li>
					<?php } ?>
					<li class="navigation__list"><a class="navigation__link" href="#section_5">Mes tarifs</a></li>
					<li class="navigation__list"><a class="navigation__link" href="#section_6">Contact</a></li>
				</ul>
			</nav>
			<button class="header__hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
	          	<span></span>
	          	<span></span>
	          	<span></span>
	        </button>
		</div>
	</header>

	<section class="landing">
		<div class="container landing__flex">
			<div class="landing__content">
				<h1 class="landing__name">Maxence Vasbien</h1>
				<h3 class="landing__poste">Web designer</h3>
				<a href="#section_6" class="landing__link">Demander un devis</a>
			</div>
			<img src="./assets/imgs/vecteur-dev.svg" class="landing__vecteur" alt="Vecteur illustratuif">
		</div>
		<img src="./assets/imgs/waves.svg" class="landing__waves" alt="Vagues bleues">
	</section>

	<section class="presentation" id="section_2">
		<div class="container">
			<h1 class="section__title">Qui suis-je ?</h1>
			<div class="row">
				<div class="col-lg-4 col-sm-12">
					<p class="presentation__text">
						<span class="presentation__title">Un développeur web passionné !</span>
						<br>
						Ma passion pour le développement web commence en 2014 à l'âge de 12ans.
						<br><br>
						Dès lors, je mis tout en oeuvre pour percer dans cette voie, tout en prenant du plaisir sur les divers projets développés.
						<br><br>
						En Août 2022, je décide de devenir développeur web indépendant afin de vivre de ma passion et d'être libre professionnellement.
					</p>
				</div>
				<div class="col-lg-4 col-sm-12">
					<img src="./assets/imgs/moi.jpg" class="presentation__imgs" alt="Photo de Maxence VASBIEN">
				</div>
				<div class="col-lg-4 col-sm-12">
					<p class="presentation__text">
						<span class="presentation__title">Expérience en développement</span>
						<br>
						Mon expérience acquise au fil des projets me permet de mieux comprendre les attentes d'un client et de répondre précisement au besoin demandé en fonction du domaine d'activité.
						<br><br>
						Du site vitrine au projet plus complexe, je vous propose une expertise et un développement web qui correspond à vos attentes & à vos besoins.
						<br><br>
						<span class="presentation__title">Un tarif adapté à votre projet</span>
						<br>
						Travaillant régulièrement avec des PME, associations ou particuliers, je vous propose des solutions à votre portée & adaptée à votre budget.
					</p>
				</div>
			</div>
		</div>
		<img src="./assets/imgs/waves2.svg" class="presentation__waves" alt="Vagues bleues">
	</section>

	<section class="skills" id="section_3">
		<div class="container">
			<h1 class="section__title">Mes compétences</h1>
			<div class="row">
				<div class="col-lg-7 col-sm-12">
					<div class="skills__content">
						<?php
						$skills = $bdd->query('SELECT * FROM skills');
						while($skills_infos = $skills->fetch()) {
						?>
						<div class="skills__box" style="background-color: #<?= $skills_infos->bg; ?>; width: <?= $skills_infos->value; ?>%;">
							<div class="skills__logo">
								<img src="./assets/imgs/langages/<?= $skills_infos->image; ?>" class="skills__img" alt="Logo <?= $skills_infos->name; ?>">
							</div>
							<h1 class="skills__name"><?= $skills_infos->name; ?></h1>
							<p class="skills__value"><?= $skills_infos->value; ?>%</p>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-5 col-sm-12">
					<img src="./assets/imgs/langages/computer.jpg" class="skills__illu" alt="Vecteur informatique">
				</div>
			</div>
		</div>
	</section>

	<?php if($works_verif >= 1) { ?>
	<section class="work" id="section_4">
		<div class="container">
			<h1 class="section__title">Mes créations</h1>
			<div class="row">
				<?php
				$works = $bdd->query('SELECT * FROM works ORDER BY id DESC LIMIT 0,6');
				while($works__infos = $works->fetch()) {
				?>
				<div class="col-lg-3 col-sm-12">
					<div class="work__box">
						<div class="word__illustration">
							<img src="./assets/imgs/works/<?= $works__infos->image; ?>" class="work__img">
						</div>
						<div class="word__body">
							<h1 class="work__name"><?= $works__infos->name; ?></h1>
							<h3 class="work__type"><?= $works__infos->type; ?></h3>
						</div>
						<button class="work__button">Voir plus</button>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<div class="work__modal" id="WorkModal">
		
	</div>

	<section class="tarifs" id="section_5">
		<div class="container">
			<h1 class="section__title">Mes tarifs</h1>
			<div class="tarifs__content">
				<?php
				$orders = $bdd->query('SELECT * FROM orders ORDER BY id');
				while($orders_infos = $orders->fetch()) {
					$list = $bdd->prepare('SELECT * FROM orders_list WHERE order_id = ?');
					$list->execute(array($orders_infos->id));
				?>
				<div class="tarifs__card">
					<h3 class="tarifs__name"><?= $orders_infos->name; ?></h3>
					<div class="tarifs__sep"></div>
					<span class="tarifs__muted">à partir de</span>
					<h1 class="tarifs__price"><?= $orders_infos->price; ?><sup>€</sup></h1>
					<div class="tarifs__sep"></div>
					<ul>
						<?php
						while($list_infos = $list->fetch()) {
						?>
						<li><?= $list_infos->text; ?></li>
						<?php } ?>
					</ul>
					<div class="tarifs__sep"></div>
					<a href="#section_6" class="tarifs__btn">Demander un devis</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="contact" id="section_6">
		<div class="container">
			<h1 class="section__title">Contact</h1>
			<div class="row">
				<div class="col-lg-4 col-sm-12">
					<a href="mailto:<?= $website_infos->email; ?>" class="contact__infos" target="_blank">
						<i class=" fas fa-envelope"></i> <?= $website_infos->email; ?>
					</a>
					<a href="tel:<?= $website_infos->phone_link; ?>" class="contact__infos" target="_blank">
						<i class=" fas fa-phone-alt"></i> <?= $website_infos->phone; ?>
					</a>
					<a href="<?= $website_infos->city_link; ?>" class="contact__infos" target="_blank">
						<i class=" fas fa-map-marker-alt"></i> <?= $website_infos->city; ?>
					</a>
				</div>
				<div class="col-lg-8 col-sm-12">
					<?php if(isset($validate)) { ?>
					<div class="contact__alert contact__alert--success"><?= $validate; ?></div>
					<?php } if(isset($erreur)) { ?>
					<div class="contact__alert contact__alert--danger"><?= $erreur; ?></div>
					<?php } ?>
					<form method="POST" action="">
						<div class="row">
							<div class="col-lg-6 col-sm-12">
								<input type="text" name="nom" placeholder="Votre nom" class="contact__input">
							</div>
							<div class="col-lg-6 col-sm-12">
								<input type="text" name="prenom" placeholder="Votre prénom" class="contact__input">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-sm-12">
								<input type="tel" name="tel" placeholder="Votre numéro de téléphone" class="contact__input">
							</div>
							<div class="col-lg-6 col-sm-12">
								<input type="email" name="email" placeholder="Votre adresse e-mail" class="contact__input">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-sm-12">
								<input type="text" name="objet" placeholder="Objet (Ex: Je souhaite avoir un devis)" class="contact__input">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-sm-12">
								<textarea name="message" placeholder="Votre message" class="contact__textarea"></textarea>
							</div>
						</div>
						<button type="submit" name="submit_contact" class="submit__contact">Envoyer</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<footer class="footer">
		<div class="container">
			<div class="footer__flex">
				<div class="footer__elmt">
					<a href="#section_1"><img src="./assets/imgs/logo-header.png" class="footer__logo"></a>
				</div>
				<div class="footer__elmt">
					<h3>DÉVELOPPEUR INFORMATIQUE INDÉPENDANT</h3>
					<p>Développeur Web front & back-end & Webdesigner freelance, je suis à votre disposition pour répondre à tout type de projets de création de sites internet, de développement spécifique ou d'applications web.</p>
					<p>Passionné par les technologies liées au Web, je mets mes compétences au service de vos besoins dans divers domaines.</p>
				</div>
				<div class="footer__elmt">
					<h3>Maxence Vasbien</h3>
					<a href="<?= $website_infos->city_link; ?>" target="_blank"><?= $website_infos->city; ?></a>
					<a href="tel:<?= $website_infos->phone_link; ?>" target="_blank"><?= $website_infos->phone; ?></a>
					<a href="mailto:<?= $website_infos->email; ?>" target="_blank"><?= $website_infos->email; ?></a>
					<a href="#" target="_blank">www.maxence-vasbien.fr</a>
				</div>
			</div>
		</div>
	</footer>
	<div class="footer__sub">&copy; Tous droits réservés !</div>

	<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="./assets/js/scrollspy.js"></script>
	<script type="text/javascript" src="./assets/js/navbar.js"></script>
</body>
</html>