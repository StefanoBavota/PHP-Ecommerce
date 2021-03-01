<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.css">
	<link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<title>PHP E-commerce</title>
</head>

<body>

	<!-- NAVBAR -->
	<nav id="header" class="navbar navbar-expand-md bg-secondary fixed-top">
		<div class="container-fluid ml-5 mr-5">
			<a class="navbar-brand" href="<?php echo ROOT_URL; ?>shop?page=products-list"><img src="<?php echo ROOT_URL; ?>assets/img/prova_logo_4.png" alt="Home" width="160" height="65" /></a>
			<button class="navbar-toggler navbar-button-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"> <i class="fa fa-bars hamburger-icon" aria-hidden="true"></i> </span>
			</button>

			<div class="collapse navbar-collapse" id="navbarToggleExternalContent">
				<ul class="navbar-nav me-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo ROOT_URL; ?>public?page=faq">FAQ</a>
					</li>
					<?php if ($loggedInUser && !($loggedInUser->is_admin)) : ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>user?page=message-list">Assistenza</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>shop?page=wish-list">Lista dei desideri</a>
						</li>
					<?php endif; ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo ROOT_URL; ?>public?page=services">Servizi</a>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo ROOT_URL; ?>shop?page=cart">
							<i class="fas fa-shopping-cart"></i>
							<span class="badge badge-success rounded-pill bg-dark js-totCartItems"></span>
						</a>
					</li>
				</ul>

				<?php if (!$loggedInUser) : ?>
					<ul class="navbar-nav ml-5">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Area Riservata
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdown01">
								<a class="dropdown-item" href="<?php echo ROOT_URL; ?>auth?page=login">Login / Registrazione</a>
							</div>
						</li>
					</ul>
				<?php endif; ?>

				<?php if ($loggedInUser) : ?>
					<ul class="navbar-nav ml-5">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $loggedInUser->email ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdown01">
								<a class="dropdown-item" href="<?php echo ROOT_URL; ?>user?page=profile">Account</a>
								<?php if ($loggedInUser && !($loggedInUser->is_admin)) : ?>
									<a class="dropdown-item" href="<?php echo ROOT_URL; ?>user?page=message-list">Assistenza</a>
								<?php endif; ?>
								<a class="dropdown-item" href="<?php echo ROOT_URL; ?>shop?page=my-orders">Ordini</a>
								<a class="dropdown-item" href="<?php echo ROOT_URL; ?>auth?page=logout">Logout</a>
							</div>
						</li>
					</ul>
				<?php endif; ?>

				<?php if ($loggedInUser && $loggedInUser->is_admin) : ?>
					<ul class="navbar-nav ml-5">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Amministrazione
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdown01">
								<a class="dropdown-item" href="<?php echo ROOT_URL; ?>admin?page=products-list">Gestione Prodotti</a>
								<a class="dropdown-item" href="<?php echo ROOT_URL; ?>admin?page=users-list">Gestione Utenti</a>
								<a class="dropdown-item" href="<?php echo ROOT_URL; ?>admin?page=admin-faq">Gestione FAQ</a>
								<a class="dropdown-item" href="<?php echo ROOT_URL; ?>admin?page=add-others">Aggiungi specifiche</a>
								<a class="dropdown-item" href="<?php echo ROOT_URL; ?>admin?page=others-list">Modifica specifiche</a>
							</div>
						</li>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</nav>
	<!-- END NAVBAR -->