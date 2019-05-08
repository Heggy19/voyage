<?php session_start() ;?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="keywords" content="voyages, madagascar, paysage, hotel, restaurant" />
	<head>
		<title>Maki HHH</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo css_url('main');?>" />
		<link rel="stylesheet" href="<?php echo css_url('style');?>" />
		<link rel="stylesheet" href="<?php //echo css_url('bootstrap');?>" />
	</head>
	<body>
		<header id="header">
			<h1><a href="#">Maki <span> HHH</span></a></h1>
			
			<a href="<?php echo base_url('');?>" class="menu button alt">Acceuil</a>
			<a href="<?php echo base_url('r_controller/apropos');?>" class="menu button alt">A propos</a>
			<a href="<?php echo base_url('liste-des-circuits-1');?>" class="menu button alt">Galerie</a>
			<a href="<?php echo base_url('liste-des-circuits-1');?>" class="menu button alt">Circuit</a>
			
			<?php if(isset($_SESSION['categorie']) && $_SESSION['categorie'] == "admin") { ?>
				<a href="<?php echo base_url('admin_controller');?>" class="menu button alt">Administrateur</a></li>
			<?php };?>
			<?php if(!isset($_SESSION['login'])) { ?>
				<a href="#menu">Login</a></li>
			<?php }else {?>	
				<a href="<?php echo base_url('login_controller/logout')?>">Log out</a></li>
			<?php };?>	
			
		</header>
		<nav id="menu">
			<ul class="links">
				<li><a href="<?php echo base_url('r_controller/page_login');?>">Connexion</a></li>
				<li><a href="<?php echo base_url('r_controller/page_inscription');?>">Inscritpion</a></li>
				<li><a href="<?php echo base_url('index_controller');?>">Acceuil</a></li>
			</ul>
		</nav>