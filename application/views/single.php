	<style type="text/css">
		p {
			color: black;
		}
		#carteId{ height: 20% }
	</style>
	<script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?callback=initialize"></script>
	<script type="text/javascript">
		function initialize() {
		var mapOptions = {
		<?php $circ = $circuit->row_array();?>
		center: new google.maps.LatLng(<?php echo $circ['Latitude'] ;?>, <?php echo $circ['Longitude'] ;?>),
		zoom: 10,
		mapTypeId:google.maps.MapTypeId.PLAN
		};
		var carte = new google.maps.Map(document.getElementById("carteId"),
		mapOptions);
		var location = new google.maps.LatLng(<?php echo $circ['Latitude'] ;?>, <?php echo $circ['Longitude'] ;?> );
			var marker = new google.maps.Marker({
				position: location,
				draggable: false,				
				map: carte
			});
		};
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	<body class="subpage">
		<div id="main">

		<!-- One -->
			<section class="wrapper style1">
				<div class="inner">
					<div class="container">
						<div class="row">
							<div class=" flex flex-2">
								<?php $circ = $circuit->row_array();?>
								<div class="video col">
									<hr>
									<div class="col-sm-4">
										<h4 style="text-align:center; line-height:1.3em;" class="font_4">PROGRAMME</h4>
									</div>
									<hr>
									<div class="caption">
										<h5>Jour 01 : ANTANANARIVO</h5>
										<p>
											Après le petit déjeuner, départ le matin pour une visite des sites et monuments historiques de la ville d’Antananarivo et ses environs; des marchés artisanaux ; du parc Botaniques et Zoologiques de Tsimbazaza ou le parc des lémuriens à imeritsiatosika. Dîner et nuit à l’hôtel.
										</p>
										<h5>Jour 02 : ANTANANARIVO – PARC NATIONAL ANDASIBE</h5>
										<p>
											Après le petit déjeuner, départ le matin direction Andasibe .Visite guidée du parc national. Dîner et nuit à l’hôtel.
										</p>
										<h5>Jour 03 : ANDASIBE – TAMATAVE – MAHAMBO</h5>
										<p>
											Après le petit déjeuner, départ le matin en direction de Tamatave .Journée excursion à l’arrivée, visite de la ville et ses environs, continuation sur Mahambo après le déjeuner. Installation et nuit à l’hôtel .
										</p>
										<h5>Jour 04 : MAHAMBO</h5>
										<p>
											Après le petit déjeuner, départ le matin pour une visite de la forteresse du roi Radama à foulpointe. Activités à voir directement sur place : baignades ; plongées sous-marines … Dîner et nuit à l’hôtel.
										</p>
										<h5>Jour 05 : MAHAMBO – SOANIERANA IVONGO – SAINTE MARIE</h5>
										<p>
											Après le petit déjeuner, départ le matin en direction de Soanierana Ivongo. Embarquement sur un canot à moteur, direction Sainte Marie. Déjeuner. Visite de la ville et ses environs : cimetières des pirates, le phare d’albrand… Dîner et nuit à l’hôtel
										</p>
										<h5>Jour 06-07 : SAINTE MARIE</h5>
										<p>
											Journées libres. Dîners et nuits à l’hôtel.
										<p>
										<h5>Jour 08 : SAINTE MARIE – ANTANANARIVO</h5>
										<p>
											Après le petit déjeuner, transfert à l’aéroport et envol pour Antananarivo. Accueil à l’aéroport puis transfert à l’hôtel. Fin de prestation.
										</p>
									</div>
								</div>
								

								<div class="video col">
									
									<hr>	
									<div class="col-sm-4">
										<div ><h4 style="text-align:center; line-height:1.3em;" class="font_4"><?php echo $circ['nom'] ;?></h4>
										</div>
									</div>
									<hr>
									
									<div class="image fit">
										<img width="100" height="300" src="<?php echo img_url($circ['img'].'.jpg');?>" alt="" />
									</div>
									<div class="col-sm-4">
										<div ><h4 style="text-align:center; line-height:1.3em;" class="font_4">Tarif:  <?php echo $circ['prix'] ;?>$</h4>
										</div>
									</div>
									<h3 style="margin-left:30px;">Description :</h3>
									<p style="margin-left:30px;">
										Paragraphe. Cliquez ici pour ajouter votre propre texte. Cliquez sur "Modifier Texte"
										ou double-cliquez ici pour ajouter votre contenu et personnaliser les polices.
										Relatez ici votre parcours et présentez votre activité à vos visiteurs.
									</p>
									<div class="inner">
											<?php if(isset($_SESSION['login'])) {?>
												<form method="post" action="<?php echo base_url('reservation_controller/insertion/'.$circ['id'].'/'.$_SESSION['login']);?>" style="margin-left:30px;">
											<?php } else { ?>
												<form method="" action="#" style="margin-left:30px;">
											<?php }  ?>
													<div class="row uniform">
															<div class="6u 12u$(xsmall)">
																<label>Date de depart</label>
																<input style="width: 500px;color: black; border-radius:5px; opacity: 0.7; padding-left:5px;" type="date" min="2018-07-05" name="datedepart" value="2018-07-05" />
																<hr>
																<!--<label>Date de retour</label>
																<input style="width: 500px;color: black; border-radius:5px; opacity: 0.7; padding-left:5px;" type="date"  name="name" value="2018-08-05" placeholder="Date retour" />
																<hr>-->
															</div>
												
															<!-- Break -->
															<div class=" 8u$">
																<div class="select-wrapper">
																	<label>Nombre de personnes</label>
																	<select name="nbP" id="category"  style="width :200px;">
																	<?php for($i=1; $i<=15; $i++) {;?>
																		<option value="<?php echo $i ;?>"><?php echo $i ;?></option>
																	<?php };?>
																	</select>
																</div>
															</div>
															<!-- Break -->
															<div class="12u$">
															<?php if(isset($_SESSION['login']) && $_SESSION['categorie'] == 'client') {?>
																<input style="width :200px;" type="submit" value="Reserver"/>
															<?php } else if(isset($_SESSION['login']) && $_SESSION['categorie'] == 'admin') { ?>
																<input style="width :200px;" type="submit" value="Reserver" disabled/>
															<?php } else { ?>
																<a href="<?php echo base_url('r_controller/page_login') ;?>" class="button alt menu" style="background-color: rgb(1, 11, 19); border-color: rgb(1, 11, 19);">Reserver</a>
															<?php } ?>
															</div>
															
													</div>
												</form>
									</div>
									<hr>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		</div>
	</body>
