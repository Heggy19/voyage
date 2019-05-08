<?php
	class R_Controller extends CI_Controller {
		public function apropos() {
			$this->load->model('Categorie');
			$data['categorie'] = $this->Categorie->getCategories();
			$this->load->view('inc/header', $data);
			$this->load->view('apropos');
			$this->load->view('inc/footer');
		}
		
		public function page_login() {
			$this->load->model('Categorie');
			$data['categorie'] = $this->Categorie->getCategories();
			$this->load->view('login.php');
		}
		
		public function page_inscription() {
			$this->load->view('inscription');
		}
		
		public function recherche() {
			$table = $this->input->post('category');
			$critere = $this->input->post('critere');
			if($table == "client") {
				$this->load->model('Client');
				$cli = array();
				$cli_tmp = $this->Client->search($critere);
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
				$this->load->view('inc/header');
				$this->load->view('admin', $cli);
				$this->load->view('inc/footer');
			} else if($table == "circuit") {
				$this->load->model('Circuit');
				
				$circ = array();
				$circ_tmp = $this->Circuit->search($critere);
				$tmp = array();
				$i = 0;
				foreach($circ_tmp->result_array() as $c) {
					$tmp2 = array();
					$tmp2[0] = $c['id'];
					$tmp2[1] = $c['nom'];
					$tmp2[2] = $c['durree'];
					$tmp2[3] = $c['prix'];
					$tmp2[4] = $c['img'];
					$tmp[$i] = $tmp2;
					$i+=1;
				}
				$circ['table'] = 'Circuit';
				$circ['controlle'] = 'circuit';
				$circ['admin_data'] = $tmp;
				$circ['colonne_data'] = $this->Circuit->getColonnes();
				$this->load->view('inc/header');
				$this->load->view('admin', $circ);
				$this->load->view('inc/footer');
			}
		}
	}
;?>