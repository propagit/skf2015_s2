<?php
class Menu_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function add($data) {
		$this->db->insert('menus',$data);
		return $this->db->insert_id();
	}
	function id($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('menus');
		return $query->first_row('array');
	}
	function top($editable) {
		$this->db->where('position',1);
		$this->db->where('editable >= ',$editable);
		$query = $this->db->get('menus');
		return $query->result_array();
	}
	function mid(){
		$this->db->where('position',0);
		$query = $this->db->get('menus');
		return $query->result_array();
	}
	function get_menus()
	{
		 //$this->db->order_by('order','asc');
		 $query = $this->db->get('menus');
        return $query->result_array();
	}
	function get_links($menu_id,$parent_id) {
		$this->db->where('menu_id',$menu_id);
		$this->db->where('parent_id',$parent_id);
		$this->db->order_by('order','asc');
		$query = $this->db->get('links');
		return $query->result_array();
	}
	function get_link($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('links');
		return $query->first_row('array');
	}
	function get_child_links($parent_id) {
		$this->db->where('parent_id',$parent_id);
		$this->db->order_by('order','asc');
		$query = $this->db->get('links');
		return $query->result_array();
	}
	function insert_link($data) {
		$this->db->insert('links',$data);
		return $this->db->insert_id();
	}
	function update_link($id,$data) {
		$this->db->where('id',$id);
		return $this->db->update('links',$data);
	}
	function delete_link($id) {
		$this->db->where('id',$id);
		return $this->db->delete('links');
	}
	
	function get_opening_date()
	{
		$query = $this->db->get('opening_date');
		return $query->first_row('array');
	}
	function set_opening_date($data)
	{
		return $this->db->update('opening_date',$data);
		//$query = $this->db->get('opening_date');
		//return $query->first_row('array');
	}
}
?>