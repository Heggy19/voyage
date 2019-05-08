<?php
	class Admin extends CI_Model {
		
		protected $table = "admin";
		
		public function getClients() {
			$client = $this->db->query("select * from client");
			return $client;
		}
		
		public function getcolonnes() {
			$colonne = $this->db->query("select column_name from information_schema.columns where table_name = 'client' and table_schema='voyage'");
			return $colonne;
		}

		public function inserer() {
			//	Ces données seront automatiquement échappées
			$this->db->set('id',  $this->id);
			$this->db->set('login',   $this->login);
			$this->db->set('mdp', $this->mdp);
			$this->db->set('nom', $this->nom);
			$this->db->set('contact', $this->contact);
			
			//	Une fois que tous les champs ont bien été définis, on "insert" le tout
			return $this->db->insert($this->table);
		}
		
		public function update($id, $login, $mdp, $nom) {
			$data = array(
				'login' => $login,
				'mdp' => $mdp,
				'nom' => $nom
			);
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
		}
		
		public function supprimer($id) {
			$this->db->delete($this->table, 'id = '.$id);
		}
	
		public function login($login, $mdp) {
			$client = $this->db->query("select count(*) from administrateur where login ='".$login."' and mdp ='".$mdp."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getHash($login) {
			$client = $this->db->query("select mdp from administrateur where login ='".$login."'")->row_array();
			foreach($client as $c)
			return $c;
		}
	}
;?>