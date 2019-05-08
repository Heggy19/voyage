<?php 
	
	class Dashboard extends CI_Model {
		
		public function getDash() {
			$data = $this->db->query("select count(idcircuit)as nombre,nom from reservationcircuit join circuit on reservationcircuit.idcircuit = circuit.id group by idcircuit ");
			return $data;
		}
	}
	
;?>