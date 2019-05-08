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
					<form method="post" action="<?php echo base_url('r_controller/recherche');?>" style="margin-left: 30%;">
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
									<li><a href="<?php echo base_url('client_controller/admin') ;?>">Client</a></li>
									<li><a href="<?php echo base_url('circuit_controller/admin') ;?>">Circuit</a></li>
									<li><a href="<?php echo base_url('reservation_controller/admin') ;?>">Reservation</a></li>
									<li><a href="<?php echo base_url('export_controller/toPdf') ;?>">Exporter</a></li>
								</ul>
							</div>
							<hr>
							<section class="12u 12u$">
								<h2><?php echo $table ;?></h2>
								<input style="width: 17%; color: black; border-radius:5px; opacity: 0.7; padding-left:5px;" name="<?php echo 'a' ;?>" placeholder="<?php echo 'column_name' ;?>"/>
								<form action="<?php echo base_url(''.$controlle.'_controller/insertion') ;?>" method="post">
								<?php
									$a=0;
									foreach($colonne_data->result_array() as $col) {?>
									<input style="width: 17%; color: black; border-radius:5px; opacity: 0.7; padding-left:5px;" name="<?php echo 'a'.$a;?>" placeholder="<?php echo 'column_name' ;?>"/>
								<?php $a++;};?>
									<input style="width: 13%;" type="submit" value="Inserer"/>
								</form>
								<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<?php foreach($colonne_data->result_array() as $col) {?>
														<th><?php echo $col['column_name'] ;?></th>
													<?php };?>
														<th>-</th>
														<th>-</th>
												</tr>
											</thead>
											<tbody>
												<?php for($i=0; $i<count($admin_data); $i++) { ?>
													<tr>
													<form action="<?php echo base_url(''.$controlle.'_controller/update') ;?>" method="post">
														<?php for($a=0; $a<count($admin_data[$i]); $a++) { ?>
															<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $admin_data[$i][$a] ;?>"/></td>
														<?php };?>
															<td><input type="submit" value="Modifier" class="button alt"/></td>
													</form>	
													<form action="<?php echo base_url(''.$controlle.'_controller/supprimer/'.$admin_data[$i][0].'') ;?>" method="GET">
														<td><input type="submit" value="Supprimer" class="button alt"/></td>
													</form>
													</tr>
												<?php };?>
											</tbody>
										</table>
									</div>
							</section>
					</div>
			</div>
		</div>
	</section>

</div>