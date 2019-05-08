<?php
	class Single_Controller extends CI_Controller {
		public function index() {
			$this->load->model('Categorie');
			$cat['categorie'] = $this->Categorie->getCategories();
			$this->load->view('inc/header', $cat);
			$this->load->view('single');
			$this->load->view('inc/footer');
		}
		
		public function circuit() {
			$this->load->model('Categorie');
			$this->load->model('Circuit');
			$id = $this->input->get('id');
			$cat['categorie'] = $this->Categorie->getCategories();
			$circ['circuit'] = $this->Circuit->getCircuit($id);
			$this->load->view('inc/header', $cat);
			$this->load->view('single', $circ);
			$this->load->view('inc/footer');
		}
	}
;?>