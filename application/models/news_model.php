<?php
class News_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	
	function add($data) {
		$this->db->insert('news',$data);
		return $this->db->insert_id();
	}
	function update($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('news',$data);
	}
	function id($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('news');
		return $query->first_row('array');
	}
	function get(){
		$this->db->order_by('order','desc');
		$query = $this->db->get('news');
		return $query->result_array();
	}
	function search($row) {
		$sql = "SELECT * FROM `news` ORDER BY `order` DESC LIMIT $row,10";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function delete($id) {
		$this->db->where('id',$id);
		$this->db->delete('news');
	}
	
	function latest($limit) {
		$this->db->where('published',1);
		$this->db->order_by('order','desc');
		if ($limit >= 1) {
			$this->db->limit($limit);
		}
		$query = $this->db->get('news');
		return $query->result_array();
	}
}
?>