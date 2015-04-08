<?php
class Form extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	function index() {
		redirect('');
	}
	
	function vippack() {
		$data['links'] = $this->menu_model->get_links(1,0);
		$data['dates'] = $this->film_model->get_dates();
		$data['genres'] = $this->film_model->get_genres();
		$data['page'] = $this->content_model->id($id);
		$data['films'] = $this->content_model->get_films($id);
		$this->load->view('stk/common/header');
		$this->load->view('stk/common/footer');
	}
}
?>