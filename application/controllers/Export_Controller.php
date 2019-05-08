<?php 
	class Export_Controller extends CI_Controller {
		
		public function toCsv($table) {
			$this->load->model('Export');
			$this->Export->toCsv($table);
		}
		
		public function toPdf() {
			$this->toCsv('Client');
			$this->load->library('fpdf');
			$this->load->model('Export');
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$this->fpdf->Open();
	
			$data = $this->Export->lectureData(base_url().'Client.csv');
			$header = $this->Export->getColonne('Client');
			$this->fpdf->SetFont('Arial', '', 14);
			$this->fpdf->AddPage();
			$this->fpdf->Ln();
			// Police Arial gras 15
    $this->fpdf->SetFont('Arial','B',15);
    // Décalage à droite
    $this->fpdf->Cell(60);
    // Titre
    $this->fpdf->Cell(60,10,'Liste des clients',1,0,'C');
    // Saut de ligne
    $this->fpdf->Ln(20);
			$this->fpdf->Cell(15);
			foreach($header as $col)
				$this->fpdf->Cell(40,7,$col,1);
			$this->fpdf->Ln();
			foreach($data as $d) {
			$this->fpdf->Cell(15);
				foreach($d as $col)
					$this->fpdf->Cell(40, 6, $col, 1); 
				$this->fpdf->Ln();
			}
			
			// $this->fpdf->createTable($header, $data);
			$this->fpdf->Output();
		}
		
		// function ecritureData($data) {
			// foreach($data as $d) {
				// foreach($d as $col)
					// $this->Cell(40, 6, $col, 1); 
				// $this->Ln();
			// }
		// }
		
		// function createTable($header, $data) {
			// foreach($header as $col)
				// $this->Cell(40,7,$col,1);
			// $this->Ln();
			// $this->ecritureData($data);
		// }
	}
;?>