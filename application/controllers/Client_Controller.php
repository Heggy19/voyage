<?php
	class Client_Controller extends CI_Controller {
		
		public function admin() {
			$this->load->model('Categorie');
			$this->load->model('Client');
			$cat['categorie'] = $this->Categorie->getCategories();
			$cli = array();
			$cli_tmp = $this->Client->getClients();
			$tmp = array();
			$i = 0;
			foreach($cli_tmp->result_array() as $c) {
				$tmp2 = array();
				$tmp2[0] = $c['login'];
				$tmp2[1] = $c['mdp'];
				$tmp2[2] = $c['nom'];
				$tmp2[3] = $c['contact'];
				$tmp[$i] = $tmp2;
				$i+=1;
			}
			$cli['table'] = 'Client';
			$cli['controlle'] = 'client';
			$cli['admin_data'] = $tmp;
			$cli['colonne_data'] = $this->Client->getColonnes();
			$this->load->view('inc/header', $cat);
			$this->load->view('admin', $cli);
			$this->load->view('inc/footer');
		}
		
		public function update() {
			// $id = $this->input->get('a0');
			$log = $this->input->post('a0');
			$mdp = $this->input->post('a1');
			$nom = $this->input->post('a2');
			$ctct = $this->input->post('a3');
			$this->load->model('Client');
			$this->Client->update($log, $mdp, $nom, $ctct);
			$this->admin();
		}
		
		public function supprimer() {
			$this->load->model('Client');
			$id = $this->input->get('id');
			$this->Client->supprimer($id);
			$this->admin();
		}
		
		public function insertion() {
			$log = $this->input->post('a0');
			$mdp = $this->input->post('a1');
			$nom = $this->input->post('a2');
			$ctct = $this->input->post('a3');
			$this->load->model('Client');
			$this->Client->inserer($log, $mdp, $nom, $ctct);
			$this->admin();
		}
		
		public function login() {
			
		}
		
		public function logout() {
			
		}
		
	}
;?>