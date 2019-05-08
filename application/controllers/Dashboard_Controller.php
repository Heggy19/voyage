<?php 
	class Dashboard_Controller extends CI_Controller {
		public function reservation(){
			$this->load->model('Dashboard');
			$data['nombre'] = $this->Dashboard->getDash();
			$this->load->view('inc/header');
			$this->load->view('board',$data);
			$this->load->view('inc/footer');
		}
	}
;?>