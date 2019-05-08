<?php
	class Categorie extends CI_model {
		
		public function getCategories() {
			$cat = $this->db->query("select * from categorie");
			return $cat;
		}
		
	}
?>