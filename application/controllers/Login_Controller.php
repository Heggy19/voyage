<?php
	class Login_Controller extends CI_Controller {
		public function index() {
			$error = "<p>Erreur login/mot de passe</p>";
			$cat = $this->input->post('categorie');
			if($cat == 'client') {
				$this->load->model('Client');
				$log = $this->input->post('login');
				$mdp = $this->input->post('mdp');
				$reps = $this->Client->login($log, $mdp);
				$hash=$this->Client->getHash($log);
				if(password_verify($mdp, $hash)){
					$this->load->model('Circuit');
					$data['circuit'] = $this->Circuit->getCircuits();
					$data['page'] = $this->Circuit->getNbPage();
					$this->load->view('inc/header');
					$this->load->view('circuit', $data);
					$this->load->view('inc/footer');
					// session_start();
					$_SESSION['categorie'] = $cat;
					$_SESSION['login'] = $log;
					$_SESSION['mdp'] = $mdp;
				}else {
					echo 'Le mot de passe est invalide.';
					$this->load->view('login', $error);
				} 
			}else {
				$this->load->model('Admin');
				$log = $this->input->post('login');
				$mdp = $this->input->post('mdp');
				$reps = $this->Admin->login($log, $mdp);
				$hash=$this->Admin->getHash($log);
				if(password_verify($mdp, $hash)){
					$data = $this->acceuil();
					$this->load->view('inc/header');
					$this->load->view('admin', $data);
					$this->load->view('inc/footer');
					// session_start();
					$_SESSION['categorie'] = $cat;
					$_SESSION['login'] = $log;
					$_SESSION['mdp'] = $mdp;
					echo password_hash($mdp, PASSWORD_DEFAULT);
				}else {
					echo 'Le mot de passe est invalide.';
					$this->load->view('login', $error);
				} 
			}
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
		
		public function s_inscrire() {
			$nom = $this->input->post('nom');
			$ct = $this->input->post('contact');
			$log = $this->input->post('login');
			$mdp = $this->input->post('mdp');
			$this->load->model('Client');
			$this->Client->inserer($nom, $ct, $log, $mdp);
			$this->load->model('Circuit');
			$page = $this->input->get('page');
			$data['circuit'] = $this->Circuit->getCircuitPaginer($page);
			$data['page'] = $this->Circuit->getNbPage();
			$this->load->view('inc/header');
			$this->load->view('circuit', $data);
			$this->load->view('inc/footer');
			// session_start();
			$_SESSION['categorie'] = 'client';
			$_SESSION['login'] = $log;
			$_SESSION['mdp'] = $mdp;
		}
		
		public function logout() {
			session_start ();
			// On détruit les variables de notre session
			session_unset ();
			// On détruit notre session
			session_destroy ();
			
			$this->load->view('inc/header');
			$this->load->view('acceuil');
			$this->load->view('inc/footer');
		}
		
	}
;?>