<?php
	session_start();
	if(isset($_SESSION['login']))
		header('Location:apropos');
?>
<!DOCTYPE HTML>
<!--
	Broadcast by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo css_url('main');?>" />
		<link rel="stylesheet" href="<?php echo css_url('style');?>" />
	</head>
	<body class="subpage" style="background-image:<?php echo img_url('banner.jpg');?>">

		<!-- Header -->
			<header id="header">
				<h1><a href="#">Maki <span>HHH</span></a></h1>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="<?php echo base_url('r_controller/page_inscription');?>">Inscription</a></li>
					<li><a href="<?php echo base_url('');?>">Acceuil</a></li>
					<li><a href="elements.html">Elements</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<div id="main">

			<!-- One -->
				<section class="wrapper style1">
					<div class="inner">
									<?php
										if(isset($error))
											echo $error;
									;?>
									<form method="post" action="<?php echo base_url('login_controller');?>">
									<div class="row uniform">
										<div class="6u 12u$(xsmall)">
											<input type="text" name="login" id="name" value="" placeholder="Email" />
											<hr></hr>
											<input type="password" name="mdp" id="name" value="" placeholder="Mot de passe" />
											<hr></hr>
										</div>
								
										<!-- Break -->
										<div class=" 8u$">
											<div class="select-wrapper">
												<select name="categorie" id="category" style="width: 570px;">
													<option value="client">Client</option>
													<option value="admin">Administrateur</option>
												</select>
											</div>
										</div>
										
										<!-- Break -->
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" value="Connexion" /></li>
												<li><input type="reset" value="Reset" class="alt" /></li>
											</ul>
										</div>
									</div>
								</form>
						
					</div>
				</section>

			</div>

		<!-- Footer -->
			

		<!-- Scripts -->
		<script src="<?php echo js_url('jquery.min');?>"></script>
		<script src="<?php echo js_url('jquery.scrolly.min');?>"></script>
		<script src="<?php echo js_url('skel.min');?>"></script>
		<script src="<?php echo js_url('util');?>"></script>
		<script src="<?php echo js_url('main');?>"></script>

	</body>
</html>