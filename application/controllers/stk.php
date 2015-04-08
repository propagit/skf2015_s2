<?php
class Stk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->model('film_model');
		$this->load->model('content_model');
		$this->load->model('news_sticker_model');
	}
	
	
	
	function index() {
		$this->load->view('stk/common/header');
		$this->load->view('stk/home');			
		$this->load->view('stk/common/footer');
	}
	function page($id="") {
		$data['links'] = $this->menu_model->get_links(1,0);
		$data['dates'] = $this->film_model->get_dates();
		$data['genres'] = $this->film_model->get_genres();
		$id = mysql_real_escape_string($id);
		$page = NULL;
		$valid = TRUE;
		if(!is_numeric($id))
		{
			$valid = FALSE;
		}
		else
		{
		   $page = $this->content_model->id($id);
		   $data['page'] = $page;
		   $data['films'] = $this->content_model->get_films($id);
		}
		
		if($page == NULL || !$valid)
		{
			#$this->load->view('stk/common/header-notfound',$data);
			$this->load->view('stk/common/header');
		}
		else
		{
		$this->load->view('stk/common/header',$data);
		}
		if($page == NULL || !$valid)
		{
			$this->load->view('stk/page-notfound');
		}
		else if($id == 70)
		{
			$this->load->view('stk/sound',$data);
		}
		else if($id == 71)
		{
			$this->load->view('stk/shortfilm',$data);
		}
		else if($id == 173)
		{
			$this->load->view('stk/competition',$data);
		}
		else
		{
		    $this->load->view('stk/page',$data);
		}
		#$this->load->view('stk/advertisement');	
		$this->load->view('stk/common/footer');
	}
	
	function app_404()
	{
		$this->load->view('stk/common/header');
		$this->load->view('stk/page-notfound');		
		$this->load->view('stk/common/footer');	
	}
	
	function vippack() {
		$data['page'] = array('title' => 'Festival VIP Pack');
		$data['links'] = $this->menu_model->get_links(1,0);
		$data['dates'] = $this->film_model->get_dates();
		$data['genres'] = $this->film_model->get_genres();
		$this->load->view('stk/common/header',$data);
		$this->load->view('stk/vippack',$data);
		$this->load->view('stk/common/footer');
	}
	function enter() {
		if (!isset($_POST['name']) || !isset($_POST['mobile']) || !isset($_POST['email'])) {
			redirect('');
		}
		$name = trim($_POST['name']);
		$mobile = trim($_POST['mobile']);
		$email = trim($_POST['email']);
		$valid = true;
		if ($name == "") { 
			$this->session->set_flashdata('error_name','Please enter your name'); 
			$valid = false; 
		} else { $this->session->set_userdata('vip_name',$name); }
		if ($mobile == "") { 
			$this->session->set_flashdata('error_mobile','Please enter your mobile number'); 
			$valid = false;
		} else { $this->session->set_userdata('vip_mobile',$mobile); }
		if ($email == "") {
			$this->session->set_flashdata('error_email','Please enter an email address');
			$valid = false;
		} else {
			$this->load->helper('email');
			if (!valid_email($email)) {
				$this->session->set_flashdata('error_email','Please enter a valid email address');
				$valid = false;
			} else { $this->session->set_userdata('vip_email',$email); }
		}
		if (!$valid) {
			redirect('VIP-pack');
		} else {
			$subscribe_stkilda = 0;
			if (isset($_POST['subscribe_stkilda'])) { $subscribe_stkilda = 1; }
			$subscribe_pepe = 0;
			if (isset($_POST['subscribe_pepe'])) { $subscribe_pepe = 1; }
			$subscribe_crumpler = 0;
			if (isset($_POST['subscribe_crumpler'])) { $subscribe_crumpler = 1; }
			$data = array(
				'name' => $name,
				'mobile' => $mobile,
				'email' => $email,
				'subscribe_stkilda' => $subscribe_stkilda,
				'subscribe_pepe' => $subscribe_pepe,
				'subscribe_crumpler' => $subscribe_crumpler
			);
			$vip = $this->content_model->search_vip($email);
			if ($vip) {
				$this->content_model->update_vip($vip['id'],$data);
			} else {
				$this->content_model->add_vip($data);
			}
			$this->session->set_flashdata('enter_ok',true);
			$this->session->unset_userdata('vip_name');
			$this->session->unset_userdata('vip_mobile');
			$this->session->unset_userdata('vip_email');
			redirect('VIP-pack');
		}
	}
	function advancesearch($option="",$option_id="") {
		if ($option == "australian-top-100:a-z") {
			$this->session->unset_userdata('keyword');
			$this->session->unset_userdata('date');
			$this->session->set_userdata('type',3);
			$this->session->unset_userdata('genre');
			$this->session->set_userdata('sort','title');
			$this->session->unset_userdata('soundkilda');
			$this->session->unset_userdata('session');
		} else if ($option == "session") {
			$this->session->unset_userdata('keyword');
			$this->session->unset_userdata('date');
			$this->session->set_userdata('type',3);
			$this->session->unset_userdata('genre');
			$this->session->set_userdata('sort','order');
			$this->session->set_userdata('session',$option_id);
			$this->session->unset_userdata('soundkilda');
		} else if ($option == "soundkilda") {
			$this->session->unset_userdata('keyword');
			$this->session->unset_userdata('date');
			$this->session->set_userdata('type',2);
			$this->session->set_userdata('soundkilda',true);
			$this->session->unset_userdata('genre');
			$this->session->set_userdata('sort','order');
			$this->session->unset_userdata('session');
		
		} else if ($option == "day") {
			$this->session->unset_userdata('keyword');
			$this->session->set_userdata('date','2012-05-'.$option_id);
			$this->session->set_userdata('type',0);
			$this->session->unset_userdata('genre');
			$this->session->set_userdata('sort','title');
			$this->session->unset_userdata('session');
			$this->session->unset_userdata('soundkilda');
		}
		redirect('search');
	}
	
	function search($row="") {
		
		$data['page'] = array('title' => 'Search'); 
		$data['links'] = $this->menu_model->get_links(1,0);
		$keyword = '';
		$date = '';
		$type = 0;
		$genre = 0;
		
		$sort = $this->session->userdata('sort');
		if (isset($_POST['keyword'])) {
			$keyword = $this->input->post('keyword',TRUE);		
			$this->session->set_userdata('keyword',$keyword);
			$this->session->unset_userdata('session');
			$sort = "";
		}
		if (isset($_POST['date'])) {
			$date = $_POST['date'];
			$this->session->set_userdata('date',$date);
		}
		
		if (isset($_POST['type'])) {
			$type = $_POST['type'];
			$this->session->set_userdata('type',$type);
		}
		$this->session->set_userdata('type',1);
        if (isset($_POST['genre'])) {
			$genre = $_POST['genre'];
			$this->session->set_userdata('genre',$genre);
		}
		
		$keyword = $this->session->userdata('keyword');
		$date = $this->session->userdata('date');
		$type = $this->session->userdata('type');
		
		$genre = $this->session->userdata('genre');
		$session = $this->session->userdata('session');
		$total = $this->film_model->search_count_all($keyword,$type,$date,$genre,$session);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'search/';
		$config['total_rows'] = $total;
		$config['per_page'] = 9;
		$config['num_links'] = 4;
		$config['uri_segment'] = 2;
		$config['cur_tag_open'] = '&nbsp;<span class="active" style="font-size:18px">';
		$config['cur_tag_close'] = '</span>';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['first_link'] = '&lt; First';
		$config['last_link'] = 'Last &gt;';
		$data['pages']='';
		$data['address']='';
		$this->pagination->initialize($config);
		if (!$session) {
			
			$data['pages'] = '<div class="pages">'.$this->pagination->create_links().'</div>';
			if($this->session->userdata('soundkilda'))
			{
				$data['heading'] = "SoundKilda";
			}
			else
			{
				$data['heading'] = "SEARCH RESULTS";
			}
			$data['next'] = "";
			$data['previous'] = "";
			$data['heading2'] = "";
		} else { 
			
			/*if ($session == 5 ) {
                $data['pages'] = '<div class="session_notice">Comedy</div>'; 
                $data['address'] = '<div class="address">The Astor Theatre</div>'; 
            }
            else{$data['address'] = '<div class="address">The Astor Theatre</div>'; }
            */
			$data['address'] = '<div class="address">The Astor Theatre</div>';
			$data['heading'] = "COMPETITION SESSION ".$session;
			if($session)
			{
				$data['heading'] = "TOP 100 SESSION ".$session;
			}
			//Author: Tom Nguyen, 23 May 2011
			if ($session == 12 ) {
				$data['pages'] .= '<div class="session_notice">This session contains content that may cause distress to some viewers.</div>'; 
			}
            
			//end
			
			if ($session == 1) {
				$data['previous'] = "";
			} else {				
				$data['previous'] = '<a href="'.base_url().'advancesearch/session/'.($session-1).'">Previous<br />Session</a>';
			}
			if ($session == 15) {
				$data['next'] = "";
			} else {
				$data['next'] = '<a href="'.base_url().'advancesearch/session/'.($session+1).'">Next<br />Session</a>';
			}
			$com_session = $this->content_model->get_session($session);
			$data['heading2'] = $com_session['date'].'<br />'.$com_session['time'];
		}
		
		$data['films'] = $this->film_model->search_row_all($keyword,$type,$date,$genre,$session,$row,$sort);
		#print var_dump($data['films']);
		#return;
		$data['dates'] = $this->film_model->get_dates();
		$data['genres'] = $this->film_model->get_genres();
		
		$this->load->view('stk/common/header',$data);
		$this->load->view('stk/search',$data);
		//$this->load->view('stk/common/right');
		$this->load->view('stk/common/footer');
		
	}
	function details($id="") {
		$data['links'] = $this->menu_model->get_links(1,0);
		$data['film'] = $this->film_model->id('films',$id);
		
		$data['page'] = array('title' => $data['film']['title']);
		$data['sessions'] = $this->film_model->get_sessions($id);
		$genres = $this->film_model->get_film_genres($id); 
		$genre = '';
		if ($genres) {
			$genre = $genres[0]['name'];
			for($i=1;$i<count($genres);$i++) { 
				$genre .= ', '.$genres[$i]['name'];
			} 
		}
		$data['genre'] = $genre;
		$data['dates'] = $this->film_model->get_dates();
		$data['genres'] = $this->film_model->get_genres();
		$this->load->view('stk/common/header',$data);
		$this->load->view('stk/details',$data);
		//$this->load->view('stk/common/right');
		$this->load->view('stk/advertisement');		
		$this->load->view('stk/common/footer');
	}
	function adredirect($banner_id) {
		$banner = $this->content_model->get_banner($banner_id);
		$clicked = $banner['clicked'] + 1;
		$this->content_model->update_banner($banner_id,array('clicked' => $clicked));
		redirect($banner['url']);
	}
	
	function isemail($email)
	{
		return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
	}
	
	function subscribe() {
		$email = $_POST['email'];
		$email = trim($email);
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		echo "Invalid Email";
			return;
		}		
		 
		$check = $this->content_model->is_subscribed($email);
		if ($check) {
			echo 'You are already subscribed to your newsletter';
		} else {
			$this->content_model->subscribe(array('email' => $email));
			echo 'You have successfully subscribed to your newsletter';
		}
	}
	function submit_form()
	{
		if($_POST['submit'] && $_POST['entry_form'])
		{
			$post = $this->input->xss_clean($_POST);
				$message = 'A '.$_POST['entry_form'].' form has just been submitted<br/>';
			$submit = '';
			foreach($post as $name => $value) 
			{
				if($name != 'submit')
				{
                $message .= "<b>$name</b> : $value<br/>";
				$find = array("~",",","\n");
				$replace = array("-");
				$value = str_replace($find,$replace,$value);
				$submit .= $name."~";
				$submit .= $value."~";
				}
            }
			$this->load->library('email');	
			
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
			$this->email->from('no-reply@stkildafilmfestival.com.au');
			$this->email->to('filmfest@portphillip.vic.gov.au');			
			$this->email->subject('2012 Entries Form at St Kilda Film Festival');
			$this->email->message($message);
			if(!$this->email->send())
			{
			 $this->session->set_flashdata('apply_message','Could not submit the application. Please try again.');
			}
			else
			{
			  $data = array(
							'content' => $submit,
							
							'date_time' =>  date('Y-m-d H:i:s')
							);
			   $this->session->set_userdata('entry_type',$_POST['entry_form']);
			   $this->session->set_userdata('payment_page','payment');
			  if($_POST['payment_option'] == 'credit card')
			  {
			   
			    if($_POST['entry_form'] == 'soundkilda')
			    {
			      $id = $this->content_model->submit_soundkilda($data);
			      
				  $this->session->set_userdata('entry_type','soundkilda');
				  $this->session->set_userdata('entry_id',$id);
			    }
			    else if($_POST['entry_form'] == 'shortfilm')
			    {
				  $id = $this->content_model->submit_shortfilm($data);  
				
				  $this->session->set_userdata('entry_type','shortfilm');
				  $this->session->set_userdata('entry_id',$id);
			     }
			     $payment = 'cc';
			  }
			  else
			  {
				  
				if($_POST['entry_form'] == 'soundkilda')
			    {
			      $id = $this->content_model->submit_soundkilda($data);
			    
			    }
			    else if($_POST['entry_form'] == 'shortfilm')
			    {
				  $id = $this->content_model->submit_shortfilm($data);  
				
			     }
				 $payment = 'cmo';
			  }
			 
			 
			}
			redirect('process-payment/'.$payment);
		}
	}
	function process_payment()
	{
		
		if($this->session->userdata('payment_page') != NULL)
		{
			$payment = $this->uri->segment(2);
			$data['links'] = $this->menu_model->get_links(1,0);
		   $data['dates'] = $this->film_model->get_dates();
		 
		
			if($payment == 'cc')
			{
			   if($this->session->userdata('entry_type') == 'soundkilda')
			   {
				      $data['page'] = $this->content_model->id(70);
			    $entry = $this->content_model->get_soundkilda($this->session->userdata('entry_id'));
			   }
			   else if($this->session->userdata('entry_type') == 'shortfilm')
			   {
				      $data['page'] = $this->content_model->id(71);
				$entry = $this->content_model->get_shortfilm($this->session->userdata('entry_id'));
		       }
			   $data['entry'] = $entry;
			   $this->load->view('stk/common/header',$data);
		       $this->load->view('stk/payment_form',$data);
		       $this->load->view('stk/common/footer');
			}
			else if($payment == 'cmo')
			{
				$this->load->view('stk/common/header',$data);
		       $this->load->view('stk/payment_form');
		       $this->load->view('stk/common/footer');
			}
		}
		else
		{
			if($this->session->userdata('entry_type') == 'soundkilda')
			{
				$page = 70;
			}
			if($this->session->userdata('entry_type') == 'shortfilm')
			{
				$page = 71;
			}
			redirect('page-'.$page);
		}
	}
	function payment_return()
	{
		$id = $_GET['id'];
		$form = $_GET['form'];
		$data['payment_number'] = $_GET['payment_number'];
		if($form == 'shortfilm')
		{
		  $this->content_model->update_shortfilm($id,$data);
		}
		else if($form == 'soundkilda')
		{
		  $this->content_model->update_soundkilda($id,$data);
		}
		
	}
	function news($id=0)
	{
		
			$this->load->model('news_model');
		$news = $this->news_model->id($id);
			$data['links'] = $this->menu_model->get_links(1,0);
		$data['dates'] = $this->film_model->get_dates();
		$data['genres'] = $this->film_model->get_genres();
			$data['title'] = $news['title'];
			$data['news'] = $news;
			$this->load->view('stk/common/header',$data);
			$this->load->view('stk/news',$data);
		
		$this->load->view('stk/common/right');
		$this->load->view('stk/common/footer');
		
	}
	function enter_competition() 
	{
		$back = $_POST['browser'];
		if (!isset($_POST['name']) || !isset($_POST['email'])) {
			redirect($back);
		}
		$name = trim($_POST['name']);
		$mobile = trim($_POST['mobile']);
		$email = trim($_POST['email']);
		
		$valid = true;
		if ($name == "") { 
			$this->session->set_flashdata('error_name','Please enter your name'); 
			$valid = false; 
		} 
		
		if ($email == "") {
			$this->session->set_flashdata('error_email','Please enter a valid email address');
			$valid = false;
		} else {
			$this->load->helper('email');
			if (!valid_email($email)) 
			{
				$this->session->set_flashdata('error_email','Please enter a valid email address');
				$valid = false;
			}
		}
		if (!$valid) {
			redirect($back);
		} 
		else 
		{
			$receive_email_stkildafilm = 'No';
			if(isset($_POST['receive_email_stkildafilm']))
			{ 
			  $receive_email_stkildafilm = $_POST['receive_email_stkildafilm']; 
			}
			$receive_email_contributors = 'No';
			if (isset($_POST['receive_email_contributors'])) 
			{ 
			  $receive_email_contributors = $_POST['receive_email_contributors']; 
			}
			$over18 = 'No';
			if(isset($_POST['over18']))
			{ 
			  $over18 = $_POST['over18']; 
			}
			$data = array(
				'name' => $name,
				'mobile' => $mobile,
				'email' => $email,
				'receive_email_stkildafilm' => $receive_email_stkildafilm,
				'receive_email_contributors' => $receive_email_contributors,
				'over18' => $over18
				
			);
			/*
			$exist = $this->content_model->search_competition($email);
			if ($exist) {
				$this->session->set_flashdata('error_email_exist','Sorry, you have entered the competition before with your email provided');
				
				
			} 
			else 
			{
				*/
				$this->content_model->add_competition($data);
				$this->session->set_flashdata('enter_ok','Thanks for entering the competition. The result will be notified soon!');
			//}
			
			
			redirect($back);
		}
	}
	
	function test2() {
		
		$data['page'] = array('title' => 'Home');
		$this->load->model('news_model');
		//$data['video'] = $this->content_model->id(37);
		$data['links'] = $this->menu_model->get_links(1,0);
		$data['dates'] = $this->film_model->get_dates();
		$data['genres'] = $this->film_model->get_genres();
		$data['film'] = $this->film_model->get_featuring();
		$data['featured_news'] = $this->news_model->latest(3);
		$data['all']=$this->news_sticker_model->get();
		$data['top_films'] = $this->film_model->get_publish_films2(3);
		$data['soundkilda_films'] = $this->film_model->get_publish_films2(2);

		$this->load->view('stk/test',$data);
		
	}
	
}
?>