<?php
	class ReservationHotel extends CI_Model {
		
		public $id = 0;
		public $idClient = 0;
		public $idHotel = 0;
		public $durree = ""; 
				
		protected $table = "reservationhotel";		
				
		public function __construct(id, idClient, idHotel, durree) {
			parent::__construct();
			$id = id;
			$idClient = idClient;
			$idSite = idHotel;
			$durree= durree;
		}
		
		public function getResHotel() {
			$res = $this->db->query("select * from reservationhotel");
			return $res;
		}

		public function inserer()
		{
			//	Ces données seront automatiquement échappées
			$this->db->set('Id',  $auteur);
			$this->db->set('titre',   $titre);
			$this->db->set('contenu', $contenu);
			
			//	Ces données ne seront pas échappées
			$this->db->set('date_ajout', 'NOW()', false);
			$this->db->set('date_modif', 'NOW()', false);
			
			//	Une fois que tous les champs ont bien été définis, on "insert" le tout
			return $this->db->insert($this->table);
		}
	
	}
;?>