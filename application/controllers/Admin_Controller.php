<?php
	class Admin_Controller extends CI_Controller {
		public function index() {
			$this->load->model('Categorie');
			$cat['categorie'] = $this->Categorie->getCategories();
			
			$cli = $this->acceuil();
			
			$this->load->view('inc/header', $cat);
			$this->load->view('admin', $cli);
			$this->load->view('inc/footer');
		}
		
		public function acceuil() {
			$cli = array();
			$this->load->model('Client');
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
			return $cli;
		}
	
		public function login() {
			
		}
		
		public function logout() {
			
		}
	}
;?>