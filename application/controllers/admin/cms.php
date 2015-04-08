<?php
class Cms extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->userdata('a_loggedin')) {
			redirect('authorize');
		}
		$this->load->model('menu_model');
		$this->load->model('content_model');
		$this->load->model('film_model');
	}
	
	function index() {
		$this->load->view('admin/common/header');		
		$this->load->view('admin/cms/home');
		$this->load->view('admin/common/footer');
	}
	
	function navigation($action="",$menu_id="") {		
		if ($action == "") {
			$data['top'] = $this->menu_model->top(1);
			$data['mid'] = $this->menu_model->mid();
		} else if ($action == "update") {
			$data['menu'] = $this->menu_model->id($menu_id);
			$data['links'] = $this->menu_model->get_links($menu_id,0);
			$data['root'] = $this->content_model->root_categories();
		}
		$this->load->view('admin/common/header');
		$this->load->view('admin/cms/nav'.$action,$data);
		$this->load->view('admin/common/footer');
	}
	function addnav() {
		$menu_id = $this->menu_model->add(array('name' => $_POST['name']));
		redirect('admin/cms/navigation');
	}
	function addlink() {
		$url = $_POST['url'];
		if ($url == "http://" || $url == "") { $url = "#"; }
		$data = array(
			'menu_id' => $_POST['menu_id'],
			'parent_id' => $_POST['parent_id'],
			'name' => $_POST['name'],
			'url' => $url
		);
		$link_id = $this->menu_model->insert_link($data);
		$pos = $_POST['position'];
		$order = $link_id;
		if ($pos != "") { 
			$after = $this->menu_model->get_link($pos);
			$order = $after['order'];
			$this->menu_model->update_link($after['id'],array('order' => $link_id));
		}
		$this->menu_model->update_link($link_id,array('order' => $order));
		redirect('admin/cms/navigation/update/'.$_POST['menu_id']);
	}
	function getlink() {
		$link = $this->menu_model->get_link($_POST['id']);
		$root = $this->content_model->root_categories();
		$out = '';
		if ($link) {
			$out = '<h3>Edit link</h3>
        <form name="editForm" method="post" action="'.base_url().'admin/cms/updatelink">
		<input type="hidden" name="id" value="'.$link['id'].'" />
        <p>Name</p>
        <p><input type="text" class="textfield rounded" name="name" value="'.$link['name'].'" /></p>
        <p>Url &nbsp; <select id="page-title2"  onchange="updateurl2()">
                <option>Please select a page</option>';
				foreach($root as $category) {
					$out .= '<option disabled="disabled">'.$category['name'].'</option>';
					$pages = $this->content_model->get($category['id']);
					if ($pages) { 
						foreach($pages as $page) {
							$out .= '<option value="page-'.$page['id'].'/'.$page['name'].'"';
							if ($link['url'] == 'page-'.$page['id'].'/'.$page['name']) { $out .= ' selected="selected"'; }
							$out .= '>|-- '.$page['title'].'</option>';
						}
					} 
					$children = $this->content_model->sub_categories($category['id']); 
					if ($children) {
						foreach($children as $child) {
							$out .= '<option disabled="disabled">'.$category['name'].' &raquo; '.$child['name'].'</option>';
							$pages = $this->content_model->get($child['id']);
							if ($pages) {
								foreach($pages as $page) {
									$out .= '<option value="page-'.$page['id'].'/'.$page['name'].'"';
									if ($link['url'] == 'page-'.$page['id'].'/'.$page['name']) { $out .= ' selected="selected"'; }
									$out .= '>|-- '.$page['title'].'</option>';
								}
							}
							$children2 = $this->content_model->sub_categories($child['id']);
							if($children2) {
								foreach($children2 as $child2) {
									$out .= '<option disabled="disabled">'.$category['name'].' &raquo; '.$child['name'].' &raquo; '.$child2['name'].'</option>';
									$pages = $this->content_model->get($child2['id']);
									if ($pages) {
										foreach($pages as $page) {
											$out .= '<option value="page-'.$page['id'].'/'.$page['name'].'"';
											if ($link['url'] == 'page-'.$page['id'].'/'.$page['name']) { $out .= ' selected="selected"'; }
											$out .= '>|-- '.$page['title'].'</option>';
										}
									}
								}
							}
						}
					} 
				}
			$out .= '</select>
        </p>
        <p><input type="text" class="textfield rounded" name="url" id="url2" value="'.$link['url'].'" /></p>
        <p><input type="submit" class="button rounded" value="Update" /></p>
        </form>';
		}
		print $out;
	}
	function updatelink() {
		$id = $_POST['id'];
		$link = $this->menu_model->get_link($id);
		$data = array(
			'name' => $_POST['name'],
			'url' => $_POST['url']
		);
		$this->menu_model->update_link($id,$data);
		redirect('admin/cms/navigation/update/'.$link['menu_id']);
	}
	function deletelink($id="") {
		$link = $this->menu_model->get_link($id);
		if ($link) {
			$this->menu_model->delete_link($id);
			redirect('admin/cms/navigation/update/'.$link['menu_id']);
		}
	}
	function getposlist() {
		$parentid = $_POST['parentid'];
		$out = '';
		if ($parentid == 0) {
			$links = $this->menu_model->get_links($_POST['menuid'],0);
			$out .= '<select name="position">
                <option value="">At the end</option>';
				foreach($links as $link) {
                	$out .= '<option value="'.$link['id'].'">Before : '.$link['name'].'</option>';
                }
            $out .= '</select>';
		} else {
			$links = $this->menu_model->get_links($_POST['menuid'],$parentid);
			$parent = $this->menu_model->get_link($parentid);
			$out .= '<select name="position">
				<option disabled="disabled">'.$parent['name'].'</option>
                <option value="">-- At the end</option>';
				foreach($links as $link) {
                	$out .= '<option value="'.$link['id'].'">-- Before : '.$link['name'].'</option>';
                }
            $out .= '</select>';
		}
		print $out;
	}
	function updatemenu() {
		$array	= $_POST['arrayorder'];
		if ($_POST['update'] == "update"){
			$count = 1;
			foreach ($array as $idval) {				
				$count ++;	
			}
		}
		print var_dump($array);
	}
	
	
	function page($action="",$page_id="") {
		if ($action == "") {
			$data['root'] = $this->content_model->root_categories();
			$this->load->view('admin/common/header');
			$this->load->view('admin/cms/page',$data);
			$this->load->view('admin/common/footer');
		} else if ($action == "content") {
			$data['page'] = $this->content_model->id($page_id);
			$this->load->model('cute_model');
			$this->cute_model->init();
			$this->cute_model->setConfigure("Content");
			$this->load->view('admin/cms/pagecontent',$data);
		} else if ($action == "film") {
			$data['page'] = $this->content_model->id($page_id);
			$data['films'] = $this->film_model->search_total('',0);
			$this->load->view('admin/cms/pagefilm',$data);
		}
	}
	function settype() {
		$this->session->set_userdata('s_keyword',$_POST['keyword']);
		$this->session->set_userdata('s_type',$_POST['type']);
	}
	function getfilms() {
		$page_id = $_POST['page_id'];
		$keyword = $this->session->userdata('s_keyword');
		$type = $this->session->userdata('s_type');
		$films = $this->film_model->search_in_rows($keyword,$type,$_POST['row']);
		$total = count($this->film_model->search_total($keyword,$type));
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/cms/page/film/'.$page_id.'/';
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
			$links = str_replace('<span class="active">1</span>','<a href="'.base_url().'admin/cms/page/film/'.$page_id.'">1</a>',$links);
		}
		$links = str_replace('<a href="'.base_url().'admin/cms/page/film/'.$page_id.'/10">&gt;</a>','',$links);
		$links = str_replace('<a href="'.base_url().'admin/cms/page/film/'.$page_id.'/'.$row.'">'.$current.'</a>','<span class="active">'.$current.'</span>',$links);
		
		$out = '<div class="pages">'.$links.'</div>';
		foreach($films as $film) {			
			$out .= '
			<div class="rowfilm">
				<div class="title">'.$film['title'].'</div>
				<div class="button">';
			$data = array(
				'page_id' => $page_id,
				'film_id' => $film['id']
			);
			if ($this->content_model->check_film($data)) {
				$out .= '<a href="'.base_url().'admin/cms/removefilm/'.$page_id.'/'.$film['id'].'/'.$row.'">Remove</a>';
			} else {
				$out .= '<a href="'.base_url().'admin/cms/addfilm/'.$page_id.'/'.$film['id'].'/'.$row.'">Add</a>';
			}
			
			$out .= '</div>
			</div>';
		}
		print $out;
	}
	function addfilm($page_id="",$film_id="",$row="") {
		$this->content_model->add_film(array('page_id' => $page_id, 'film_id' => $film_id));
		redirect('admin/cms/page/film/'.$page_id.'/'.$row);
	}
	function removefilm($page_id="",$film_id="",$row="") {
		$this->content_model->remove_film(array('page_id' => $page_id, 'film_id' => $film_id));
		redirect('admin/cms/page/film/'.$page_id.'/'.$row);
	}
	function addcat() {
		$data = array(
			'parent_id' => $_POST['parent_id'],
			'name' => $_POST['name']
		);
		$category_id = $this->content_model->add_category($data);
		redirect('admin/cms/page');
	}
	function getpages() {
		$category_id = $_POST['category_id'];
		$pages = $this->content_model->get($category_id);
		$out = '';
		foreach($pages as $page) {
			$out .= '
			<div class="row-item" id="page-'.$page['id'].'">
				<div class="menu-name">'.$page['title'].'</div>
				<div class="menu-func"><a href="javascript:deletepage('.$page['id'].')"><img src="'.base_url().'img/admin/delete.png" /></a></div>
				<div class="menu-func"><a href="javascript:content('.$page['id'].')"><img src="'.base_url().'img/admin/view.png" /></a></div>
				<div class="menu-func"><a href="javascript:film('.$page['id'].')"><img src="'.base_url().'img/admin/film.png" /></a></div>
			</div>';
		}
		print $out;
	}
	function deletepage() {
		$this->content_model->delete($_POST['id']);
	}
	function addpage() {
		$category_id = $_POST['category_id'];
		$out = '
		<form name="addPageForm" method="post" action="'.base_url().'admin/cms/addingpage">
		<input type="hidden" name="category_id" value="'.$category_id.'" />
		<div class="row-item">
			<div class="page-name"><input type="text" class="textfield rounded" name="title" id="title" /></div>
			<div class="page-button">
				<input type="button" class="button rounded" value="Add" onClick="addingpage()" />
				<input type="button" class="button rounded" value="Cancel" onClick="cancel()" />
			</div>
		</div>
		</form>';
		print $out;
	}
	function addingpage() {
		$title = $_POST['title'];
		$name = trim(strtolower($title));
		$name = str_replace('/','',$name);
		$name = str_replace('&','',$name);
		$name = str_replace("'",'',$name);
		$name = str_replace('  ',' ',$name);
		$name = str_replace(' ','-',$name);
		$data = array(
			'category_id' => $_POST['category_id'],
			'name' => $name,
			'title' => $title,
			'created' => date('Y-m-d H:i:s'),
			'modified' => date('Y-m-d H:i:s')
		);
		$this->session->set_userdata('category_id',$_POST['category_id']);
		$page_id = $this->content_model->add($data);
		redirect('admin/cms/page');
	}
	function updatecontent() {
		$id = $_POST['id'];
		$data = array(
			'content' => $_POST['content_text'],			
			'modified' => date('Y-m-d H:i:s')
		);
		$this->content_model->update($id,$data);
		$this->session->set_flashdata('updated',true);
		//redirect('admin/cms/page/content/'.$id);
		echo '<script>window.close();</script>';
	}

	function banner() {
		$data['banners'] = $this->content_model->get_banners();
		$this->load->view('admin/common/header');
		$this->load->view('admin/cms/banner',$data);
		$this->load->view('admin/common/footer');
	}
	function addbanner() {
		error_reporting(E_ALL);
		//echo "test123";
			//exit;
		if ($_FILES['banner']['name'] != "") {
			//echo "test";
			//exit;
			$banner = $this->uploadimage("./uploads/banners","banner");
			
			if (isset($banner['file_name'])) {
				$this->content_model->add_banner(array('name' => $banner['file_name']));
			} else {
				$this->session->set_flashdata('err_upload',$banner);
			}
		}
		redirect('admin/cms/banner');
	}
	function updatebanner() {
		$id = $_POST['id'];
		$this->content_model->update_banner($id,array('url' => $_POST['url']));
		redirect('admin/cms/banner');
	}
	function deletebanner() {
		$banner = $this->content_model->get_banner($_POST['id']);
		$this->content_model->delete_banner($banner['id']);
		unlink('./uploads/banners/'.$banner['name']);
	}
	function uploadimage($path,$filename) {
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|swf';
		$config['max_size']	= '2048'; // 2 MB
		//$config['max_width']  = '500';
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
	function soundkilda_export()
	{
	
		$all = $this->content_model->get_all_soundkilda();
		$out = '';
		$title='';
		for($i=0; $i<count($all); $i++)
		{
			 $find = array(",","\n");
				$replace = array("-");
			$content = explode('~',$all[$i]['content']);
			$content = str_replace($find,$replace,$content);
			$title = 'id,';
			for($m=0;$m<count($content);$m = $m + 2)
	        {
		      
		      
		       if($m + 2 > count($content))
			   {
			     $title .= $content[$m];
			   }
			   else
			   {
			    $title .= $content[$m].',';
			   }
	        }
			$title .= 'payment number';
			$out .= "\n";
			$out .= $all[$i]['id'].',';			
			for($k=1; $k<count($content); $k = $k + 2)
		    {
			   if($k + 2 > count($content))
			   {
			     $out .= $content[$k];
			   }
			   else
			   {
			    $out .= $content[$k].',';
			   }
			 
		    }
			$out .= $all[$i]['payment_number'];				
		}
		header("Content-type:text/octect-stream");
		header("Content-Disposition:attachment;filename=soundkilda.csv");
		print $title.$out;
		exit;
	
	}
	function shortfilm_export()
	{
	
		$all = $this->content_model->get_all_shortfilm();		
		$title = '';
		$out = '';
		for($i=0; $i<count($all); $i++)
		{
			 $find = array(",","\n");
				$replace = array("-");
			$content = explode('~',$all[$i]['content']);
			$content = str_replace($find,$replace,$content);		
			$title = 'id,';
			for($m=0;$m<count($content);)
	        {
		      
		      
		       if($m + 2 > count($content))
			   {
			     $title .= $content[$m];
			   }
			   else
			   {
			    $title .= $content[$m].',';
			   }
			   $m=$m + 2;
	        }
			$title .= 'payment number';
			$out .= "\n";
			$out .= $all[$i]['id'].',';			
			for($k=1; $k<count($content); )
		    {
			   if($k + 2 > count($content))
			   {
			     $out .= $content[$k];
			   }
			   else
			   {
			    $out .= $content[$k].',';
			   }
			   $k=$k + 2;
			 
		    }
			$out .= $all[$i]['payment_number'];								
		}
		
		header("Content-type:text/octect-stream");
		header("Content-Disposition:attachment;filename=shortfilm.csv");
		print $title.$out;
		exit;
	
	}
	function competition_export()
	{
	
		$all = $this->content_model->get_all_competition();
		$out = '';
		$title='';
		for($i=0; $i<count($all); $i++)
		{
			
			$title = 'name,mobile,email,receive email updates from St Kilda Film Festival,receive email updates from St Kilda Film Festival partners, confirm that I am over 18 years of age, date entered';
			
			$out .= "\n";
			$out .= $all[$i]['name'].','.$all[$i]['mobile'].','.$all[$i]['email'].','.$all[$i]['receive_email_stkildafilm'].','.$all[$i]['receive_email_contributors'].','.$all[$i]['over18'].','.$all[$i]['date_entered'];			
					
		}
		header("Content-type:text/octect-stream");
		header("Content-Disposition:attachment;filename=enter-competition.csv");
		print $title.$out;
		exit;
	
	}
	
	function set_opening_date() {
		$date = $_POST['date'];
		$data['opening_date'] = $date;
		$this->menu_model->set_opening_date($data);
		redirect(base_url().'admin/cms/opening_date');
	}
	
	function opening_date() {
		$this->load->view('admin/common/header');		
		$this->load->view('admin/cms/openingdate');
		$this->load->view('admin/common/footer');
	}
	
}
?>