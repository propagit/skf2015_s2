<?php
class User_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function validate($data) {
		$this->db->where('username',$data['username']);
		$this->db->where('password',md5($data['password']));
		$this->db->where('level',9);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0){ 
			return $query->first_row('array');
		}
		return false;
	}
}
?>