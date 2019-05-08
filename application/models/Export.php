<?php 
	
	// require('fonction/connexion.php');
	
	class Export extends CI_Model {
		
		public function getDataInBase($sql) {
			$data = mysqli_query(getConnection(), $sql);
			return $data;
		}
		
		function lectureData($file) {
			$lignes = file($file);
			$data = array();
			foreach($lignes as $l) {
				$data[] = explode(";", trim($l));
			}return $data;
		}
		
		public function getcolonne($table) {
			$colonne = $this->db->query("select column_name from information_schema.columns where table_name = '".$table."' and table_schema='voyage'");
			$col = array();
			$i=0;
			foreach($colonne->result_array() as $c) {
				$col[$i] = $c['column_name'];
				$i++;
			}
			return $col;
		}
		
		public function toCsv($table) {
			$data = $this->db->get($table);
			$file = fopen("".$table.".csv", "a");
			$col = $this->getColonne($table);
			foreach($data->result_array() as $d) {
				for($i=0; $i<count($col)-1; $i++) {
					fputs($file, $d[$col[$i]].";");
				}fputs($file, $d[$col[count($col)-1]]."\r\n");
			}fclose($file);
		}
		
	}
	
;?>