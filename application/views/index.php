<!DOCTYPE html>
<html>
<head>
<title>Broadcast by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo css_url('main');?>" />
		<link rel="stylesheet" href="<?php echo css_url('style');?>" />
		</head>
<body>
<!-- Header -->
			
		<!-- Nav -->
		<nav id="menu">
			<ul class="links">
				<li><a href="index.html">Connexion</a></li>
				<li><a href="generic.html">Create a compte</a></li>
				<li><a href="elements.html">Panier</a></li>
			</ul>
		</nav>

		<?php
			if(!isset($_GET['page'])) {
				include('acceuil.php');
			}else {
				include($_GET['page'].'php');
			}
		;?>
		
		<!-- Scripts -->
		<script src="<?php echo js_url('jquery.min');?>"></script>
		<script src="<?php echo js_url('jquery.scrolly.min');?>"></script>
		<script src="<?php echo js_url('skel.min');?>"></script>
		<script src="<?php echo js_url('util');?>"></script>
		<script src="<?php echo js_url('main');?>"></script>

</body>
</html>
