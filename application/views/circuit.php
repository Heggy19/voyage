<style type="text/css">
	
	.pagination {
		margin: 0 auto;
		width: 40%;
		// margin-left: 30%;
		// margin-right: 30%;
	}
	
	.pagination ul {
		display: inline-block;
		list-style-type:none;
		color:  rgb(2, 11, 19);
		// margin-left: 30%;
	}
	
	.pagination ul li {
		display: inline;
		margin-left:2px;
		float:left;
	}

	.pagination ul li a {
		color: black;
		float: left;
		padding: 8px 16px;
		border-radius: 5px;
		// border: 2px solid rgb(20, 34, 19);
		border: 1px solid #999; /* Gray */
		text-decoration: none;
    }
	
	.pagination ul li a.active {
		background-color: rgb(2, 11, 19);
		// color: white;
	}

	.pagination ul li a:hover:not(.active) {background-color: #999;}
	
	img {
		float: left;
		margin-top: 30px;
		margin-left: 20px;
		margin-right: 20px;
		// margin-bottom: 20px;
	}
	
	circ:hover {
		background-color: white;
	}
	
	p {
		padding: 20px;
		color: white;
		text-align: justify;
		font-size: 18px;
	}
	
</style>
<div id="main">
		<!-- Two -->
	<section class="wrapper style1">
		<div class="inner" style="min-height: 500px;">
		<form method="post" action="<?php echo site_url('circuit_controller/recherche?page=1');?>" style="margin-left: 30px;">
			<div class="row">
				<div class="2u 12u$(xsmall)">
					<input name="critere" type="text" placeholder="Search..">
				</div>
				<div class="3u$ 12u$(small)">
					<input class="button alt" type="submit" value="Search" class="fit" />
				</div>
			</div>
		</form>
			<!-- Tabbed Video Section -->
				<div class="flex flex-tabs">
					
					<div class="tabs">
						<div class="tabs tab-1 flex flex-2" style="padding: 30px;">
							<?php foreach($circuit->result_array() as $circ) { ;?>
								<div class="video col circ">
									<div>
										<img width="275" height="175" src="<?php echo img_url($circ['img'].'.jpg');?>" alt="" />
										<p > 
											Plus de 1200 kilomètres et de 13 espèces de lémuriens, les 3 parcs nationaux les plus visités, 3 sites classés au patrimoine mondial de l’UNESCO, 6 groupes ethniques et 4 zones climatiques différentes, l’une des plus belles plages du monde, le troisième plus grand récif de corail au monde. Et avant de se séparer, le dîner d’adieu à la Malagasy avec musiciens locaux et dégustation de rhum !
										</p>
									</div>
									<p class="">
										<b><?php echo $circ['nom'];?></b>
									</p>
									<a href="<?php echo base_url('single_controller/circuit/'.$circ['id']);?>" class="link"><span>Voir</span></a>
								</div>
							<?php };?>
						</div>
					</div>
				</div>
				<div class="pagination">
					<ul>
						<?php for($i=1; $i<=$page; $i++) {?>
							<li><a style="color: #999;" href="<?php echo base_url('liste-des-circuits-'.$i)?>"><?php echo $i;?></a></li>
						<?php };?>
					</ul>
				</div>
		</div>
	</section>

</div>