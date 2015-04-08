<?php
class Fsm extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->userdata('a_loggedin')) {
			redirect('authorize');
		}
		$this->load->model('film_model');
	}
	function index($row="") {
		$this->load->view('admin/common/header');
		$this->load->view('admin/fsm/search');
		$this->load->view('admin/common/footer');
	}
	function set_type() {
		$this->session->set_userdata('a_keyword',$_POST['keyword']);
		$this->session->set_userdata('a_type',$_POST['type']);
	}
	function getfilms() {
		$keyword = $this->session->userdata('a_keyword');
		$type = $this->session->userdata('a_type');
		$films = $this->film_model->search_in_rows($keyword,$type,$_POST['row']);
		$total = count($this->film_model->search_total($keyword,$type));
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/fsm/';
		$config['total_rows'] = $total;
		$config['per_page'] = 10;
		$config['num_links'] = ceil($total/10);
		$config['uri_segment'] = 3;
		$config['cur_tag_open'] = '&nbsp;<span class="active">';
		$config['cur_tag_close'] = '</span>';
		
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();
		
		$row = $_POST['row'];
		$current = $row/10 + 1;
		if ($current != 1) {
			$links = str_replace('<span class="active">1</span>','<a href="'.base_url().'admin/fsm">1</a>',$links);
		}
		$links = str_replace('<a href="'.base_url().'admin/fsm/10">&gt;</a>','',$links);
		$links = str_replace('<a href="'.base_url().'admin/fsm/'.$row.'">'.$current.'</a>','<span class="active">'.$current.'</span>',$links);
		
		$out = '<div class="pages">'.$links.'</div>
			<div class="row-title">
				<div class="film-name">Menu name</div>
				<div class="film-func">Delete</div>
				<div class="film-func">Publish</div>
				<div class="film-func">Update</div>
			</div>';
		foreach($films as $film) {			
			$out .= '
			<div class="row-item">
				<div class="film-name">'.$film['title'].'</div>
				<div class="film-func"><a href="javascript:deletefilm('.$film['id'].')"><img src="'.base_url().'img/admin/delete.png" /></a></div>
				<div class="film-func"><a href="javascript:switchstatus('.$film['id'].')"><img src="'.base_url().'img/admin/published'.$film['published'].'.png" id="stat-'.$film['id'].'" /></a></div>
				<div class="film-func"><a href="'.base_url().'admin/fsm/edit/'.$film['id'].'"><img src="'.base_url().'img/admin/view.png" /></a></div>
			</div>';
		}
		print $out;
	}
	function switchstatus() {
		$id = $_POST['id'];
		$film = $this->film_model->id('films',$id);
		if ($film['published'] == 0) {
			$this->film_model->update('films',$id,array('published' => 1));
			print '1';			
		} else {
			$this->film_model->update('films',$id,array('published' => 0));
			print '0';
		}
	}
	function film() {
		$data['genres'] = $this->film_model->get_genres();
		$data['dates'] = $this->film_model->get_dates();
		$data['venues'] = $this->film_model->get_venues();
		$this->load->view('admin/common/header');
		$this->load->view('admin/fsm/film',$data);
		$this->load->view('admin/common/footer');
	}
	function createfilm() {
		$data = array(
			'type' => 1,
			'country' => $_POST['country'],
			'title' => $_POST['title'],
			'year' => $_POST['year'],
			'running_time' => $_POST['running_time'],
			'format' => $_POST['format'],
			'producer' => $_POST['producer'],
			'director' => $_POST['director'],
			'screen_writer' => $_POST['screen_writer'],
			'photography_director' => $_POST['photography_director'],
			'animator' => $_POST['animator'],
			'cast' => $_POST['cast'],
			'synopsis' => $_POST['synopsis'],
			'publicity_blurb' => $_POST['publicity_blurb'],
			'facebook' => $_POST['facebook'],
			'blogger' => $_POST['blogger'],
			'twitter' => $_POST['twitter']
		);
	
		$film_id = $this->film_model->add('films',$data);
		if(isset($_POST['featuring']))
		{
			$data['featuring'] = 1;
			$this->film_model->update_featuring();
		$this->film_model->update('films',$film_id,$data);
		}
		
		
		if (isset($_POST['genres'])) {
			foreach($_POST['genres'] as $genre_id) {
				$this->film_model->add('films_genres',array('film_id' => $film_id,'genre_id' => $genre_id));
			}
		}
		$sessions = $_POST['sessions'];
		$n = count($sessions[0]); # Number of sessions
		for($i=0;$i<$n;$i++) {
			$session = array(
				'film_id' => $film_id,
				'time' => $sessions[0][$i].' '.$sessions[1][$i].':00',
				'finish_time' => $sessions[0][$i].' '.$sessions[2][$i].':00',
				'venue' => $sessions[3][$i]
			);
			$this->film_model->add('films_sessions',$session);
		}
		
		if ($_FILES['small_image']['name'] != "") {
			$small_image = $this->uploadimage("./uploads/films","small_image");
			if (isset($small_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('small_image' => $small_image['file_name']));
			} else {
				$this->session->set_flashdata('err_upload',$small_image);
			}
		}
		if ($_FILES['large_image']['name'] != "") {
			$large_image = $this->uploadimage("./uploads/films","large_image");
			if (isset($large_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('large_image' => $large_image['file_name']));
			} else {
				$this->session->set_flashdata('err_upload',$large_image);
			}
		}
		
		redirect('admin/fsm');
	}
	function sound() {
		$data['dates'] = $this->film_model->get_dates();
		$data['venues'] = $this->film_model->get_venues();
		$this->load->view('admin/common/header');
		$this->load->view('admin/fsm/sound',$data);
		$this->load->view('admin/common/footer');
	}
	function createsound() {
		$data = array(
			'type' => 2,
			'order' => $_POST['order'],
			'title' => $_POST['title'],
			'artist' => $_POST['artist'],
			'year' => $_POST['year'],
			'producer' => $_POST['producer'],
			'director' => $_POST['director'],
			'synopsis' => $_POST['synopsis'],
			'facebook' => $_POST['facebook'],
			'twitter' => $_POST['twitter'],
			'blogger' => $_POST['blogger'],
			'publicity_blurb' => $_POST['publicity_blurb']
		);
	
		$film_id = $this->film_model->add('films',$data);
		if(isset($_POST['featuring']))
		{
			$data['featuring'] = 1;
			$this->film_model->update_featuring();
		$this->film_model->update('films',$film_id,$data);
		}
		$sessions = $_POST['sessions'];
		$n = count($sessions[0]); # Number of sessions
		for($i=0;$i<$n;$i++) {
			$session = array(
				'film_id' => $film_id,
				'time' => $sessions[0][$i].' '.$sessions[1][$i].':00',
				'finish_time' => $sessions[0][$i].' '.$sessions[2][$i].':00',
				'venue' => $sessions[3][$i]
			);
			$this->film_model->add('films_sessions',$session);
		}
		
		if ($_FILES['small_image']['name'] != "") {
			$small_image = $this->uploadimage("./uploads/films","small_image");
			if (isset($small_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('small_image' => $small_image['file_name']));
				$this->resizephoto($small_image['file_name'],"./uploads/films","thumbnails",66,50);
			} else {
				$this->session->set_flashdata('err_upload',$small_image);
			}
		}
		if ($_FILES['large_image']['name'] != "") {
			$large_image = $this->uploadimage("./uploads/films","large_image");
			if (isset($large_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('large_image' => $large_image['file_name']));
				$this->resizephoto($large_image['file_name'],"./uploads/films","thumbnails",66,50);
			} else {
				$this->session->set_flashdata('err_upload',$large_image);
			}
		}
		
		redirect('admin/fsm');
	}
	function top() {
		$data['genres'] = $this->film_model->get_genres();
		$data['dates'] = $this->film_model->get_dates();
		$data['venues'] = $this->film_model->get_venues();
		$this->load->view('admin/common/header');
		$this->load->view('admin/fsm/top',$data);
		$this->load->view('admin/common/footer');
	}
	function createtop() {

		$data = array(
			'type' => 3,
			'title' => $_POST['title'],
			'year' => $_POST['year'],
			'running_time' => $_POST['running_time'],
			'format' => $_POST['format'],
			'producer' => $_POST['producer'],
			'director' => $_POST['director'],
			'screen_writer' => $_POST['screen_writer'],
			'photography_director' => $_POST['photography_director'],
			'animator' => $_POST['animator'],
			'cast' => $_POST['cast'],
			'synopsis' => $_POST['synopsis'],
			'facebook' => $_POST['facebook'],
			'twitter' => $_POST['twitter'],
			'blogger' => $_POST['blogger'],
			'publicity_blurb' => $_POST['publicity_blurb'],
			'competition_session' => $_POST['competition_session'],
			'order' => $_POST['order']
		);
	
		$film_id = $this->film_model->add('films',$data);
		if(isset($_POST['featuring']))
		{
			$data['featuring'] = 1;
			$this->film_model->update_featuring();
		$this->film_model->update('films',$film_id,$data);
		}
		if (isset($_POST['genres'])) {
			foreach($_POST['genres'] as $genre_id) {
				$this->film_model->add('films_genres',array('film_id' => $film_id,'genre_id' => $genre_id));
			}
		}
		$sessions = $_POST['sessions'];
		$n = count($sessions[0]); # Number of sessions
		for($i=0;$i<$n;$i++) {
			$session = array(
				'film_id' => $film_id,
				'time' => $sessions[0][$i].' '.$sessions[1][$i].':00',
				'finish_time' => $sessions[0][$i].' '.$sessions[2][$i].':00',
				'venue' => $sessions[3][$i]
			);
			$this->film_model->add('films_sessions',$session);
		}
		
		if ($_FILES['small_image']['name'] != "") {
			$small_image = $this->uploadimage("./uploads/films","small_image");
			if (isset($small_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('small_image' => $small_image['file_name']));
				$this->resizephoto($small_image['file_name'],"./uploads/films","thumbnails",220,150);
			} else {
				$this->session->set_flashdata('err_upload',$small_image);
			}
		}
		if ($_FILES['large_image']['name'] != "") {
			$large_image = $this->uploadimage("./uploads/films","large_image");
			if (isset($large_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('large_image' => $large_image['file_name']));
				$this->resizephoto($large_image['file_name'],"./uploads/films","thumbnails",220,150);
			} else {
				$this->session->set_flashdata('err_upload',$large_image);
			}
		}
		
		redirect('admin/fsm');
	}
	function edit($id="") {
		$data['genres'] = $this->film_model->get_genres();
		$data['dates'] = $this->film_model->get_dates();
		$data['venues'] = $this->film_model->get_venues();
		$data['sessions'] = $this->film_model->get_sessions($id);
		$data['film'] = $this->film_model->id('films',$id);
		$this->load->view('admin/common/header');
		$this->load->view('admin/fsm/edit/'.$data['film']['type'],$data);
		$this->load->view('admin/common/footer');
	}
	function updatefilm() {
		
		$film_id = $_POST['film_id'];
		$data = array(
			'title' => $_POST['title'],
			'country' => $_POST['country'],
			'year' => $_POST['year'],
			'running_time' => $_POST['running_time'],
			'format' => $_POST['format'],
			'producer' => $_POST['producer'],
			'director' => $_POST['director'],
			'screen_writer' => $_POST['screen_writer'],
			'photography_director' => $_POST['photography_director'],
			'animator' => $_POST['animator'],
			'cast' => $_POST['cast'],
			'synopsis' => $_POST['synopsis'],
			'facebook' => $_POST['facebook'],
			'twitter' => $_POST['twitter'],
			'blogger' => $_POST['blogger'],
            'youtube' => '"'.$_POST['youtube'].'"',
			'publicity_blurb' => $_POST['publicity_blurb']
		);
		if(isset($_POST['featuring']))
		{
			$data['featuring'] = 1;
		}
		$this->film_model->update_featuring();
		$this->film_model->update('films',$film_id,$data);
		
		$this->film_model->reset_genres($film_id);
		if (isset($_POST['genres'])) {
			foreach($_POST['genres'] as $genre_id) {
				$this->film_model->add('films_genres',array('film_id' => $film_id,'genre_id' => $genre_id));
			}
		}
		$this->film_model->reset_sessions($film_id);
		$sessions = $_POST['sessions'];
		$n = count($sessions[0]); # Number of sessions
		for($i=0;$i<$n;$i++) {
			$session = array(
				'film_id' => $film_id,
				'time' => $sessions[0][$i].' '.$sessions[1][$i].':00',
				'finish_time' => $sessions[0][$i].' '.$sessions[2][$i].':00',
				'venue' => $sessions[3][$i]
			);
			$this->film_model->add('films_sessions',$session);
		}
		
		
		if ($_FILES['small_image']['name'] != "") {
			$small_image = $this->uploadimage("./uploads/films","small_image");			
			if (isset($small_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('small_image' => $small_image['file_name']));
			} else {
				$this->session->set_flashdata('err_upload',$small_image);
			}
		}
		if ($_FILES['large_image']['name'] != "") {
			$large_image = $this->uploadimage("./uploads/films","large_image");
			if (isset($large_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('large_image' => $large_image['file_name']));
			} else {
				$this->session->set_flashdata('err_upload',$large_image);
			}
		}
		
		redirect('admin/fsm');
	}
	function updatesound() {
		$film_id = $_POST['film_id'];
		$data = array(
			'order' => $_POST['order'],
			'title' => $_POST['title'],
			'artist' => $_POST['artist'],
			'year' => $_POST['year'],
			'producer' => $_POST['producer'],
			'director' => $_POST['director'],
			'synopsis' => $_POST['synopsis'],
			'facebook' => $_POST['facebook'],
			'twitter' => $_POST['twitter'],
			'blogger' => $_POST['blogger'],
            'youtube' => $_POST['youtube'],
			'publicity_blurb' => $_POST['publicity_blurb']
		);
		if(isset($_POST['featuring']))
		{
			$data['featuring'] = 1;
		}
		$this->film_model->update_featuring();
		$this->film_model->update('films',$film_id,$data);
		$this->film_model->reset_sessions($film_id);
		$sessions = $_POST['sessions'];
		$n = count($sessions[0]); # Number of sessions
		for($i=0;$i<$n;$i++) {
			$session = array(
				'film_id' => $film_id,
				'time' => $sessions[0][$i].' '.$sessions[1][$i].':00',
				'finish_time' => $sessions[0][$i].' '.$sessions[2][$i].':00',
				'venue' => $sessions[3][$i]
			);
			$this->film_model->add('films_sessions',$session);
		}
		
		if ($_FILES['small_image']['name'] != "") {
			$small_image = $this->uploadimage("./uploads/films","small_image");
			if (isset($small_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('small_image' => $small_image['file_name']));
				$this->resizephoto($small_image['file_name'],"./uploads/films","thumbnails",220,150);
			} else {
				$this->session->set_flashdata('err_upload',$small_image);
			}
		}
		if ($_FILES['large_image']['name'] != "") {
			$large_image = $this->uploadimage("./uploads/films","large_image");
			if (isset($large_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('large_image' => $large_image['file_name']));
				$this->resizephoto($large_image['file_name'],"./uploads/films","thumbnails",220,150);
				
			} else {
				$this->session->set_flashdata('err_upload',$large_image);
			}
		}
		
		redirect('admin/fsm');
	}
	function updatetop() {
		//get the youtube id
		
		$film_id = $_POST['film_id'];
		$data = array(
			'title' => $_POST['title'],
			'year' => $_POST['year'],
			'running_time' => $_POST['running_time'],
			'format' => $_POST['format'],
			'producer' => $_POST['producer'],
			'director' => $_POST['director'],
			'screen_writer' => $_POST['screen_writer'],
			'photography_director' => $_POST['photography_director'],
			'animator' => $_POST['animator'],
			'cast' => $_POST['cast'],
			'synopsis' => $_POST['synopsis'],
			'publicity_blurb' => $_POST['publicity_blurb'],
			'facebook' => $_POST['facebook'],
			'twitter' => $_POST['twitter'],
			'blogger' => $_POST['blogger'],
            'youtube' => $_POST['youtube'],
			'competition_session' => $_POST['competition_session'],
			'order' => $_POST['order']
		);
		if(isset($_POST['featuring']))
		{
			$data['featuring'] = 1;
		}
		$this->film_model->update_featuring();
		$this->film_model->update('films',$film_id,$data);
		$this->film_model->reset_genres($film_id);
		if (isset($_POST['genres'])) {
			foreach($_POST['genres'] as $genre_id) {
				$this->film_model->add('films_genres',array('film_id' => $film_id,'genre_id' => $genre_id));
			}
		}
		$this->film_model->reset_sessions($film_id);
		$sessions = $_POST['sessions'];
		$n = count($sessions[0]); # Number of sessions
		for($i=0;$i<$n;$i++) {
			$session = array(
				'film_id' => $film_id,
				'time' => $sessions[0][$i].' '.$sessions[1][$i].':00',
				'finish_time' => $sessions[0][$i].' '.$sessions[2][$i].':00',
				'venue' => $sessions[3][$i]
			);
			$this->film_model->add('films_sessions',$session);
		}
		if ($_FILES['small_image']['name'] != "") {
			$small_image = $this->uploadimage("./uploads/films","small_image");
			if (isset($small_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('small_image' => $small_image['file_name']));
				$this->resizephoto($small_image['file_name'],"./uploads/films","thumbnails",220,150);
			} else {
				$this->session->set_flashdata('err_upload',$small_image);
			}
		}
		if ($_FILES['large_image']['name'] != "") {
			$large_image = $this->uploadimage("./uploads/films","large_image");
			if (isset($large_image['file_name'])) {
				$this->film_model->update('films',$film_id,array('large_image' => $large_image['file_name']));
				$this->resizephoto($large_image['file_name'],"./uploads/films","thumbnails",220,150);
			} else {
				$this->session->set_flashdata('err_upload',$large_image);
			}
		}
		
		redirect('admin/fsm');
	}
	function deletefilm($film_id="") {
		$this->film_model->reset_genres($film_id);
		$this->film_model->reset_sessions($film_id);
		$this->film_model->delete('films',$film_id);
		redirect('admin/fsm');
	}
	function uploadimage($path,$filename) {
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1024'; // 1 MB
		//$config['max_width']  = '800';
		//$config['max_height']  = '500';
		$config['overwrite'] = FALSE;
		$config['remove_space'] = TRUE;
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload($filename)) {
			return $this->upload->display_errors();
		}
		else
		{
			return $this->upload->data();
		}		
	}
	function resizephoto($name,$directory,$sub,$width,$height) {
		$config = array();
		$config['source_image'] = $directory."/".$name;
		$config['create_thumb'] = FALSE;
		$config['new_image'] = $directory."/".$sub."/".$name;
		$config['maintain_ratio'] = FALSE;
		$config['quality'] = 100;
		$config['width'] = $width;
		$config['height'] = $height;
		$this->load->library('image_lib');
		$this->image_lib->initialize($config);
		$this->image_lib->resize();		
		$this->image_lib->clear();	
	}
}
?>