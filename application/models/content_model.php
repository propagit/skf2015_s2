<?php
class Content_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function add($data) {
		$this->db->insert('pages',$data);
		return $this->db->insert_id();
	}
	function delete($id) {
		$this->db->where('id',$id);
		$this->db->delete('pages');
	}
	function id($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('pages');
		return $query->first_row('array');
	}
	function check($name) {
		$this->db->where('name',$name);
		$query = $this->db->get('pages');
		return $query->first_row('array');
	}
	function update($id,$data) {
		$this->db->where('id',$id);
		return $this->db->update('pages',$data);
	}
	function get($category_id) {
		$this->db->where('category_id',$category_id);
		$this->db->order_by('name','asc');
		$query = $this->db->get('pages');
		return $query->result_array();
	}
	function add_category($data) {
		$this->db->insert('categories',$data);
		return $this->db->insert_id();
	}
	function root_categories() {
		$this->db->where('parent_id',0);
		$this->db->order_by('name','asc');
		$query = $this->db->get('categories');
		return $query->result_array();
	}
	function sub_categories($parent_id) {
		$this->db->where('parent_id',$parent_id);
		$this->db->order_by('name','asc');
		$query = $this->db->get('categories');
		return $query->result_array();
	}	
	
	function add_banner($data) {
		$this->db->insert('banners',$data);
		return $this->db->insert_id();
	}
	function get_banners() {
		$this->db->order_by('id','desc');
		$query = $this->db->get('banners');
		return $query->result_array();
	}
	function get_banner($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('banners');
		return $query->first_row('array');
	}
	function get_random_banner() {
		$this->db->order_by('id', 'RANDOM');
		$query = $this->db->get('banners');
		return $query->first_row('array');
	}
	function update_banner($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('banners',$data);
	}
	function delete_banner($id) {
		$this->db->where('id',$id);
		$this->db->delete('banners');
	}
	
	
	function add_film($data) {
		$this->db->insert('pages_films',$data);
	}
	function remove_film($data) {
		$this->db->where('page_id',$data['page_id']);
		$this->db->where('film_id',$data['film_id']);
		$this->db->delete('pages_films');
	}
	function check_film($data) {
		$this->db->where('page_id',$data['page_id']);
		$this->db->where('film_id',$data['film_id']);
		$query = $this->db->get('pages_films');
		return $query->num_rows();
	}
	function get_films($page_id) {
		$sql = "SELECT `films`.* FROM `films`,`pages_films`
				WHERE `films`.`id` = `pages_films`.`film_id`
				AND `pages_films`.`page_id` = $page_id
				ORDER BY `pages_films`.`order` ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function subscribe($data) {
		$this->db->insert('subscribers',$data);
	}
	function update_subscribe($email,$data) {
		$this->db->where('email',$email);
		$this->db->update('subscribers',$data);
	}
	function is_subscribed($email) {
		$this->db->where('email',$email);
		$query = $this->db->get('subscribers');
		return $query->first_row('array');
	}
	function subscribers() {
		$this->db->order_by('id','asc');
		$query = $this->db->get('subscribers');
		return $query->result_array();
	}
	function get_session($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('sessions');
		return $query->first_row('array');
	}
	
	function add_vip($data) {
		$this->db->insert('vips',$data);
		return $this->db->insert_id();
	}
	function search_vip($email) {
		$this->db->where('email',$email);
		$query = $this->db->get('vips');
		return $query->first_row('array');
	}
	function update_vip($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('vips',$data);
	}
	function get_vips() {
		$this->db->order_by('created','asc');
		$query = $this->db->get('vips');
		return $query->result_array();
	}
	function submit_soundkilda($data)
	{
		$this->db->insert('sound_form',$data);
		return $this->db->insert_id();
	}
	function get_soundkilda($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('sound_form');
		return $query->first_row('array');
	}
	function update_soundkilda($id,$data)
	{
		$this->db->where('id',$id);
	    return $this->db->update('sound_form',$data);
	}
	function submit_shortfilm($data)
	{
		$this->db->insert('short_film_form',$data);
		return $this->db->insert_id();
	}
	function get_shortfilm($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('short_film_form');
		return $query->first_row('array');
	}
	function update_shortfilm($id,$data)
	{
		$this->db->where('id',$id);
	    return $this->db->update('short_film_form',$data);
	}
	function get_all_soundkilda()
	{
	    $query = $this->db->get('sound_form');
		return $query->result_array();
	}
	function get_all_shortfilm()
	{
	    $query = $this->db->get('short_film_form');
		return $query->result_array();
	}
	function add_competition($data) {
		$this->db->insert('competition',$data);
		return $this->db->insert_id();
	}
	function search_competition($email) {
		$this->db->where('email',$email);
		$query = $this->db->get('competition');
		return $query->first_row('array');
	}
	function get_all_competition()
	{
	    $query = $this->db->get('competition');
		return $query->result_array();
	}

}
?>