 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages: ["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Statut', 'pourcentage'],
					<?php foreach ($nombre->result_array()as $nb){ ?>
                    ['<?php echo $nb['nom'];?>',<?php echo $nb['nombre'];?>],
					<?php } ?>
                ]);

                var options = {
                    is3D:true
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data,options);
            }
        </script>
<style type="text/css">
	
	.menu_admin {
		margin-left: 30%;
		// margin-right: 30%;
	}
	
	.menu_admin ul {
		display: inline;
		color:red;
		list-style-type:none;
		// margin-left: 30%;
	}
	
	.menu_admin ul li {
		margin-left:2px;
		float:left;
	}

	.menu_admin ul li a {
		display:block;
		float:left;
		width:100px;
		background-color: rgb(104, 102, 76);
		color:black;
		text-decoration:none;
		text-align:center;
		padding:5px;
		border:2px solid;
		border-color:rgb(89, 78, 60);
    }
	
	
</style>
<div id="main">

<!-- One -->
	<section class="wrapper style1">
		<div class="inner">
			<div class="container">
				<form method="post" action="<?php echo site_url('r_controller/recherche');?>" style="margin-left: 30%;">
						<div class="row">
							<div class="2u 12u$(xsmall)">
								<div class="select-wrapper">
									<select name="category" id="category" >
										<option value="client">Client</option>
										<option value="circuit">Circuit</option>
									</select>
								</div>
							</div>
							<div class="2u 12u$(xsmall)">
								<input name="critere" type="text" placeholder="Search..">
							</div>
							<div class="3u$ 12u$(small)">
								<input class="button alt" type="submit" value="Search" class="fit" />
							</div>
						</div>
					</form>
					<div class="row">
							<div class="menu_admin" style="margin-left: 16%;">
								<ul>
									<li><a href="<?php echo site_url('client_controller/admin') ;?>">Client</a></li>
									<li><a href="<?php echo site_url('circuit_controller/admin') ;?>">Circuit</a></li>
									<li><a href="<?php echo site_url('reservation_controller/admin') ;?>">Reservation</a></li>
									<li><a href="<?php echo site_url('dashboard_controller/reservation') ;?>">Daschboard</a></li>
									<li><a href="<?php echo site_url('export_controller/toPdf') ;?>">Exporter</a></li>
								</ul>
							</div>
							<section class="12u 12u$">
								<h2>Dashboard</h2>
								<div class="content-wrapper">
									<div class="container">
										<div class="row">
											<div class="col-lg-12">
												<div id="donutchart" style="width: 900px; height: 500px; margin-left: 200px;"></div>
											</div>
										</div>


									</div>
								</div>
							</section>
					</div>
			</div>
		</div>
	</section>

</div>