<?php
	class Index_Controller extends CI_Controller {
		public function index(){
			$this->load->model('Categorie');
			$data['categorie'] = $this->Categorie->getCategories();
			$this->load->view('inc/header', $data);
			$this->load->view('acceuil', $data);
			$this->load->view('inc/footer');
		}
	}
;?>