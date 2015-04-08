<?php
class Omt extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->userdata('a_loggedin')) {
			redirect('authorize');
		}
		$this->load->model('content_model');
	}
	
	function index() {
		$this->load->view('admin/common/header');
		$this->load->view('admin/omt/subscribers');
		$this->load->view('admin/common/footer');
	}
	
	function subscriber() {
		$this->load->view('admin/common/header');
		$this->load->view('admin/omt/subscribers');
		$this->load->view('admin/common/footer');
	}
	
	function exportsubscribers() {
		$csvname = 'subscribers_'.date('d-m-Y');
		$csvname = $csvname.'.csv';
		header('Content-type: application/csv; charset=utf-8;');
		header("Content-Disposition:attachment;filename=$csvname");
		$fp = fopen("php://output", 'w');
		//$csvdir = getcwd();
		//$csvdir = $csvdir.'/csv/';
		
		//$csvname = $csvname.'.csv';
		//$fp = fopen($csvdir.$csvname, 'w');
		$headings = array('Email');
		fputcsv($fp,$headings);
		$subscribers = $this->content_model->subscribers();
		foreach ($subscribers as $row) {
			fputcsv($fp,array($row['email']));
		}
        fclose($fp);
		//redirect(base_url().'csv/'.$csvname);
	}
	function exportvip() {
		//$csvdir = getcwd();
		//$csvdir = $csvdir.'/csv/';
		$csvname = 'vippack_'.date('d-m-Y');
		$csvname = $csvname.'.csv';
		header('Content-type: application/csv; charset=utf-8;');
		header("Content-Disposition:attachment;filename=$csvname");
		$fp = fopen("php://output", 'w');
		$headings = array('Name','Mobile','Email','St Kilda Film Festvial Subscribe','Pepe Jeans Subscribe','Crumpler Subscribe');
		fputcsv($fp,$headings);
		$subscribers = $this->content_model->get_vips();
		foreach ($subscribers as $row) {
			$one = "No";
			if ($row['subscribe_stkilda']) { $one = "Yes"; }
			$two = "No";
			if ($row['subscribe_pepe']) { $two = "Yes"; }
			$three = "No";
			if ($row['subscribe_crumpler']) { $three = "Yes"; }
			fputcsv($fp,array($row['name'],$row['mobile'],$row['email'],$one,$two,$three));
		}
        fclose($fp);
		//redirect(base_url().'csv/'.$csvname);
	}
}
?>