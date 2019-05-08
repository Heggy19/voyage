<?php
	class Circuit_Controller extends CI_Controller {
		public function index() {
			$this->load->model('Circuit');
			$page = $this->input->get('page');
			$data['circuit'] = $this->Circuit->getCircuitPaginer($page);
			$data['page'] = $this->Circuit->getNbPage();
			$this->load->view('inc/header');
			$this->load->view('circuit', $data);
			$this->load->view('inc/footer');
		}
		
		public function recherche() {
			$this->load->model('Circuit');
			$page = $this->input->get('page');
			$critere = $this->input->post('critere');
			$data['circuit'] = $this->Circuit->getCircuitRecherchePaginer($page, $critere);
			$data['page'] = $this->Circuit->getNbPageRecherche($critere);
			$this->load->view('inc/header');
			$this->load->view('circuit', $data);
			$this->load->view('inc/footer');
		}
		
		public function admin() {
			$this->load->model('Categorie');
			$this->load->model('Circuit');
			
			$circ = array();
			$circ_tmp = $this->Circuit->getCircuits();
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
			$cat['categorie'] = $this->Categorie->getCategories();
			$this->load->view('inc/header', $cat);
			$this->load->view('admin', $circ);
			$this->load->view('inc/footer');
		}
		
		public function update() {
			$id = $this->input->post('a0');
			$nom = $this->input->post('a1');
			$durree = $this->input->post('a2');
			$prix = $this->input->post('a3');
			$img = $this->input->post('a4');
			$this->load->model('Circuit');
			$this->Circuit->update($id, $nom, $durree, $prix, $img);
			$this->admin();
		}

		public function insertion() {
			$nom = $this->input->post('a1');
			$durree = $this->input->post('a2');
			$prix = $this->input->post('a3');
			$img = $this->input->post('a4');
			$this->load->model('Circuit');
			$this->Circuit->inserer($nom, $durree, $prix, $img);
			$this->admin();
		}
		
		
		public function supprimer() {
			$this->load->model('Circuit');
			$id = $this->input->get('id');
			$this->Circuit->supprimer($id);
			$this->admin();
		}
	}
;?>