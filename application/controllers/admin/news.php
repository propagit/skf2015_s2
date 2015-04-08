<?php

class News extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('a_loggedin')) {
			redirect('authorize');
		}
		$this->load->model('news_model');
	}
	
	
	function index() {
		$data['news'] = $this->news_model->get();
		$this->load->view('admin/common/header');
		$this->load->view('admin/news/list',$data);
		
		$this->load->view('admin/common/footer');
	}
	function add() {
		$this->load->model('cute_model');
		$this->cute_model->init();
		$this->cute_model->setConfigure("Simple");
		$this->cute_model->setWidth("600px");
		$this->cute_model->setHeight("300px");
		$this->load->view('admin/common/header');
		$this->load->view('admin/news/add');
	
		$this->load->view('admin/common/footer');
	}
	
	function adding() {
		$published = 0;
		if (isset($_POST['published'])) { $published = 1; }
		$data = array(
			'title' => $_POST['title'],
			'short_text' => $_POST['short_text'],
			'long_text' => $_POST['long_text'],
			'published' => $published
		);
		$news_id = $this->news_model->add($data);
		
		if($_FILES['userfile']['name'] != '')
		{
			
		$config['upload_path'] = "./uploads/news";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048'; // 2 MB
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		$config['overwrite'] = FALSE;
		$config['remove_space'] = TRUE;
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error_addimage',$this->upload->display_errors());			
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$image = $data['upload_data']['file_name'];
			
			
			$width = $data['upload_data']['image_width'];
			$height = $data['upload_data']['image_height'];
			if ($width > 600 || $height > 600) {
				$config = array();
				// Resize image
				$config['source_image'] = "./uploads/news/".$image;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = 100;
				$config['width'] = 600;
				$config['height'] = 600;
				$config['master_dim'] = 'auto';
				$this->load->library('image_lib');
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				unlink("./uploads/news/".$image);
				rename("./uploads/news/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./uploads/news/".$image);
				$this->image_lib->clear();
			}
						
			
			# Thumbnail creation
			$config = array();
			$config['source_image'] = "./uploads/news/".$image;
			$config['create_thumb'] = TRUE;
			$config['new_image'] = "./uploads/news/thumbnails/".$image;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = 100;
			if ($width < $height) {		
				$config['width'] = 100;
				$config['height'] = intval(100 * ($height/$width));
			} else {				
				$config['width'] = intval(100 * ($width/$height));
				$config['height'] = 100;
			}
			$this->load->library('image_lib');
			$this->image_lib->clear();
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			rename("./uploads/news/thumbnails/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./uploads/news/thumbnails/".$image);
			$this->image_lib->clear();
			
			# Crop thumbnail			
			$config['image_library'] = 'GD2';
			$config['source_image'] = "./uploads/news/thumbnails/".$image;
			
			$config['width'] = 90;
			$config['height'] = 90;
			if ($width > $height) {
				$config['x_axis'] = 5;
				$config['y_axis'] = 0;
			} else {
				$config['x_axis'] = 0;
				$config['y_axis'] = 5;
			}
			$config['maintain_ratio'] = FALSE;
			$this->image_lib->initialize($config);
			$crop_thumbnail = $this->image_lib->crop();
			if ( ! $crop_thumbnail)
			{
				$this->session->set_flashdata('error_addimage',$this->upload->display_errors());
			}
			unlink("./uploads/news/thumbnails/".$image);
			rename("./uploads/news/thumbnails/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./uploads/news/thumbnails/".$image);
		}

		
		$this->news_model->update($news_id,array('image' => $image, 'order' => $news_id));
		}
		redirect('admin/news');
	}
	
	function edit($news_id='') {
		$data['news'] = $this->news_model->id($news_id);
		$this->load->model('cute_model');
		$this->cute_model->init();
		$this->cute_model->setConfigure("Simple");
		$this->cute_model->setWidth("600px");
		$this->cute_model->setHeight("300px");
		$this->load->view('admin/common/header');
		$this->load->view('admin/news/edit',$data);
		
		$this->load->view('admin/common/footer');
	}
	function update() {
		$id = $_POST['news_id'];
		$published = 0;
		if (isset($_POST['published'])) {
			$published = 1;
		}
		$newdata = array(
			'title' => $_POST['title'],
			'short_text' => $_POST['short_text'],
			'long_text' => $_POST['long_text'],
			'published' => $published,
			'modified' => date('Y-m-d H:i:s')
		);
		if($_FILES['userfile']['name'] != '')
		{
			
		$config['upload_path'] = "./uploads/news";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048'; // 2 MB
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		$config['overwrite'] = FALSE;
		$config['remove_space'] = TRUE;
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error_addimage',$this->upload->display_errors());		
			
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$image = $data['upload_data']['file_name'];
			
			$width = $data['upload_data']['image_width'];
			$height = $data['upload_data']['image_height'];
			if ($width > 600 || $height > 600) {
				$config = array();
				// Resize image
				$config['source_image'] = "./uploads/news/".$image;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = 100;
				$config['width'] = 600;
				$config['height'] = 600;
				$config['master_dim'] = 'auto';
				$this->load->library('image_lib');
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				unlink("./uploads/news/".$image);
				rename("./uploads/news/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./uploads/news/".$image);
				$this->image_lib->clear();
			}
						
			
			# Thumbnail creation
			$config = array();
			$config['source_image'] = "./uploads/news/".$image;
			$config['create_thumb'] = TRUE;
			$config['new_image'] = "./uploads/news/thumbnails/".$image;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = 100;
			if ($width < $height) {		
				$config['width'] = 100;
				$config['height'] = intval(100 * ($height/$width));
			} else {				
				$config['width'] = intval(100 * ($width/$height));
				$config['height'] = 100;
			}
			$this->load->library('image_lib');
			$this->image_lib->clear();
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			rename("./uploads/news/thumbnails/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./uploads/news/thumbnails/".$image);
			$this->image_lib->clear();
			
			# Crop thumbnail			
			$config['image_library'] = 'GD2';
			$config['source_image'] = "./uploads/news/thumbnails/".$image;
			
			$config['width'] = 90;
			$config['height'] = 90;
			if ($width > $height) {
				$config['x_axis'] = 5;
				$config['y_axis'] = 0;
			} else {
				$config['x_axis'] = 0;
				$config['y_axis'] = 5;
			}
			$config['maintain_ratio'] = FALSE;
			$this->image_lib->initialize($config);
			$crop_thumbnail = $this->image_lib->crop();
			if ( ! $crop_thumbnail)
			{
				$this->session->set_flashdata('error_addimage',$this->upload->display_errors());
			}
			unlink("./uploads/news/thumbnails/".$image);
			rename("./uploads/news/thumbnails/".$data['upload_data']['raw_name']."_thumb".$data['upload_data']['file_ext'],"./uploads/news/thumbnails/".$image);
		}
		
		if (isset($image)) { $newdata['image'] = $image; }
		
		}
		$this->news_model->update($id,$newdata);
		redirect('admin/news/edit/'.$id);
	}
	function reorder() {
		$array = $_POST['news'];
		if ($_POST['update'] == "update"){			
			$count = 1;
			for($i=count($array)-1;$i>=0;$i--) {
			#foreach ($array as $idval) {
				$this->news_model->update($array[$i],array('order' => $count));
				$count ++;	
			}	
		}
	}
	function switchstatus() {
		$news = $this->news_model->id($_POST['id']);
		if ($news['published']) {
			$this->news_model->update($news['id'],array('published' => 0));
			print base_url().'images/icon-unpublished.png';
		} else {
			$this->news_model->update($news['id'],array('published' => 1));
			print base_url().'images/icon-published.png';
		}
	}
	function delete() {
		$this->news_model->delete($_POST['id']);
	}
}
?>