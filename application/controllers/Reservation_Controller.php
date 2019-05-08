<?php 
	class Reservation_Controller extends CI_Controller {
		
		public function admin() {
			// $this->load->model('Categorie');
			$this->load->model('ReservationCircuit');
			// $cat['categorie'] = $this->Categorie->getCategories();
			$res = array();
			$res_tmp = $this->ReservationCircuit->getResCircuit();
			$tmp = array();
			$i = 0;
			foreach($res_tmp->result_array() as $c) {
				$tmp2 = array();
				$tmp2[0] = $c['id'];
				$tmp2[1] = $c['idclient'];
				$tmp2[2] = $c['idcircuit'];
				$tmp2[3] = $c['nbpersonne'];
				$tmp2[4] = $c['datedepart'];
				$tmp[$i] = $tmp2;
				$i+=1;
			}
			$res['table'] = 'Reservation';
			$res['controlle'] = 'reservation';
			$res['admin_data'] = $tmp;
			$res['colonne_data'] = $this->ReservationCircuit->getColonnes();
			$this->load->view('inc/header');
			$this->load->view('admin', $res);
			$this->load->view('inc/footer');
		}
		
		public function acceuil() {
			$this->load->model('Categorie');
			$data['categorie'] = $this->Categorie->getCategories();
			$this->load->view('inc/header', $data);
			$this->load->view('acceuil', $data);
			$this->load->view('inc/footer');
		}
		
		public function insertion()	{
			$this->load->model('ReservationCircuit');
			$idCli = $this->input->get('idCli');
			$idCirc = $this->input->get('idCirc');
			$nbP = $this->input->post('nbP');
			$dateDepart = $this->input->post('datedepart');
			$this->ReservationCircuit->inserer($idCli, $idCirc, $nbP, $dateDepart);
			$this->acceuil();
		}
		
		public function insertion_admin()	{
			$this->load->model('ReservationCircuit');
			$idCli = $this->input->post('a1');
			$idCirc = $this->input->post('a2');
			$nbP = $this->input->post('a3');
			$dateDepart = $this->input->post('a4');
			$this->ReservationCircuit->inserer($idCli, $idCirc, $nbP, $dateDepart);
			$this->admin();
		}
		
		public function update() {
			$id = $this->input->post('a0');
			$idCli = $this->input->post('a1');
			$idCirc = $this->input->post('a2');
			$nbp = $this->input->post('a3');
			$date = $this->input->post('a4');
			$this->load->model('ReservationCircuit');
			$this->ReservationCircuit->update($id, $idCli, $idCirc, $nbp, $date);
			$this->admin();
		}
		
		public function supprimer() {
			$this->load->model('ReservationCircuit');
			$id = $this->input->get('id');
			$this->ReservationCircuit->supprimer($id);
			$this->admin();
		}
		
	}
;?>