<?php
	class Client extends CI_Model {
		
		protected $table = "client";
		
		public function getClients() {
			$client = $this->db->query("select * from client");
			return $client;
		}
		
		public function getColonnes() {
			$colonne = $this->db->query("SELECT column_name FROM information_schema.columns WHERE table_name = 'Client' AND table_schema='voyage'");
			return $colonne;
		}
		
		public function getNextSeq() {
			$seq = $this->db->query("select max(Id) from client")->row_array();
			foreach($seq as $s)
			return $s+1;
		}
		
		public function search($critere) {
			$client = $this->db->query("select * from client where Nom like '%".$critere."%'");
			return $client;
		}
		
		public function inserer($login, $mdp, $nom, $contact) {
			//	Ces données seront automatiquement échappées
			// $this->db->set('Id',  $this->getNextSeq());
			$this->db->set('Login',   $login);
			$this->db->set('Mdp', $mdp);
			$this->db->set('Nom', $nom);
			$this->db->set('Contact', $contact);
			
			//	Une fois que tous les champs ont bien été définis, on "insert" le tout
			return $this->db->insert($this->table);
		}
		
		public function update($login, $mdp, $nom, $contact) {
			$data = array(
				'login' => $login,
				'mdp' => $mdp,
				'nom' => $nom,
				'contact' => $contact
			);
			$this->db->where('login', $login);
			$this->db->update($this->table, $data);
		}
		
		public function supprimer($id) {
			echo 'login = '.$id;
			$this->db->delete($this->table, "login = '".$id."'");
		}
	
		public function login($login, $mdp) {
			$client = $this->db->query("select count(*) from client where login ='".$login."' and mdp ='".$mdp."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getHash($login) {
			$client = $this->db->query("select mdp from client where login ='".$login."'")->row_array();
			foreach($client as $c)
			return $c;
		}
	}
;?>