<?php
	class ReservationCircuit extends CI_Model {
		
		protected $table = "reservationcircuit";
				
		
		public function getResCircuit() {
			$res = $this->db->query("select * from reservationcircuit");
			return $res;
		}
		
		public function getColonnes() {
			$colonne = $this->db->query("SELECT column_name FROM information_schema.columns WHERE table_name = 'ReservationCircuit' AND table_schema='voyage'");
			return $colonne;
		}
		
		public function search($critere) {
			$res = $this->db->query("select * from reservationcircuit where IdClient like '%".$critere."%' ");
			return $res;
		}
		
		public function getNextSeq() {
			$seq = $this->db->query("select max(Id) from reservationcircuit")->row_array();
			foreach($seq as $s)
			return $s+1;
		}
		
		public function inserer($idCli, $idCirc, $nbP, $dateDep) {
			//	Ces données seront automatiquement échappées
			$this->db->set('id',  $this->getNextSeq());
			$this->db->set('idclient',   $idCli);
			$this->db->set('idcircuit', $idCirc);
			$this->db->set('nbpersonne', $nbP);
			$this->db->set('datedepart', $dateDep);
			
			//	Une fois que tous les champs ont bien été définis, on "insert" le tout
			return $this->db->insert($this->table);
		}
		
		public function update($id, $idCl, $idCr, $nbP, $date) {
			$data = array(
				'idclient' => $idCl,
				'idcircuit' => $idCr,
				'nbpersonne' => $nbP,
				'datedepart' => $date
			);
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
		}
		
		public function supprimer($id) {
			$this->db->delete($this->table, 'id = '.$id);
		}
		
	}
;?>