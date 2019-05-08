<?php
	class Circuit extends CI_Model {
		
		public $id = 0;
		public $nom = "";
		public $contact = "";
		public $img = "";
		
		protected $table = "circuit";
		
		// public function __construct($id, $nom, $contact, $img) {
			// parent::__construct();
			// $this->id = $id;
			// $this->nom = $nom;
			// $this->contact = $contact;
			// $this->img = $img;
		// }
		
		public function getCircuit($id) {
			$circuit = $this->db->query("select * from circuit where Id = '".$id."'");
			return $circuit;
		}
		
		public function getColonnes() {
			$colonne = $this->db->query("SELECT column_name FROM information_schema.columns WHERE table_name = 'Circuit' AND table_schema='voyage'");
			return $colonne;
		}
		
		public function search($critere) {
			$circuit = $this->db->query("select * from circuit where Nom like '%".$critere."%'");
			return $circuit;
		}
		
		public function getCircuits() {
			$circuit = $this->db->query("select * from circuit");
			return $circuit;
		}
		
		public function getNbPage() {
			$circuit = $this->db->query("select count(*) from circuit")->row_array();
			foreach($circuit as $c)
			return $c/4;
		}
		
		public function getNbPageRecherche($critere) {
			$circuit = $this->db->query("select count(*) from circuit where Nom like '%".$critere."%'")->row_array();
			foreach($circuit as $c)
			return $c/4;
		}
		
		public function getCircuitPaginer($page) {
			$circuit = $this->db->query("select * from circuit limit 4 offset ".$page*4);
			return $circuit;
		}
		
		public function getCircuitRecherchePaginer($page, $critere) {
			$circuit = $this->db->query("select * from circuit where Nom like '%".$critere."%'");
			return $circuit;
		}
			
		
		public function getNextSeq() {
			$seq = $this->db->query("select max(Id) from circuit")->row_array();
			foreach($seq as $s)
			return $s+1;
		}
		
		public function inserer($nom, $durree, $prix, $img) {
			//	Ces données seront automatiquement échappées
			$this->db->set('id',  $this->getNextSeq());
			$this->db->set('nom',   $nom);
			$this->db->set('durree', $durree);
			$this->db->set('prix', $prix);
			$this->db->set('img', $img);
			
			//	Une fois que tous les champs ont bien été définis, on "insert" le tout
			return $this->db->insert($this->table);
		}
		
		public function update($id, $nom, $durree, $prix, $img) {
			$data = array(
				'nom' => $nom,
				'durree' => $durree,
				'prix' => $prix,
				'img' => $img
			);
			$this->db->where('Id', $id);
			$this->db->update($this->table, $data);
		}
		
		public function supprimer($id) {
			$this->db->delete($this->table, 'Id = '.$id);
		}
		
	}
;?>