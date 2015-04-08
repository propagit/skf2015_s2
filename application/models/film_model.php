<?php
class Film_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function add($table,$data) {
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	function update($table,$id,$data) {
		$this->db->where('id',$id);
		return $this->db->update($table,$data);
	}
	function id($table,$id) {
		$this->db->where('id',$id);
		$query = $this->db->get($table);
		return $query->first_row('array');
	}
	function get_publish_films($type)
	{
		$this->db->where('published',1);
		$this->db->where('type',$type);
		$this->db->order_by('order','asc');
		$query = $this->db->get('films');
		return $query->result_array();
	}
	function get_publish_films2($type)
	{
		$sql = "SELECT `films`.*,films_sessions.*
				FROM `films`,`films_sessions` where published = 1 and type = $type and films_sessions.film_id = films.id group by films.id order by films_sessions.time asc limit 100";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function search_count($keyword,$type,$date,$genre,$session) {
		
		// $sql = "SELECT distinct `films`.*
				// FROM `films` where `films`.`title` LIKE '%$keyword%' OR `films`.`director` LIKE '%$keyword%' OR `films`.`producer` LIKE '%$keyword%' OR `films`.`artist` LIKE '%$keyword%'";
        $sql = "SELECT `films`.*
				FROM `films`,`films_sessions`";
		if ($type != 2) {
			$sql .= ",`films_genres`";
		}
		$sql .= " WHERE `films`.`published` = 1			
				AND `films`.`id` = `films_sessions`.`film_id`";
		if ($type != 2) {
			$sql .= " AND `films`.`id` = `films_genres`.`film_id`";
		}
		if ($keyword != "") {
			$sql .= ' AND (`films`.`title` LIKE "%'.$keyword.'%" OR `films`.`director` LIKE "%'.$keyword.'%" OR `films`.`producer` LIKE "%'.$keyword.'%" OR `films`.`artist` LIKE "%'.$keyword.'%")';
		}
		if ($genre != 0 ) {
			if($type!=2){
            $sql .= " AND `films_genres`.`genre_id` = $genre";
            }
		}
		if ($date != "") {
			$sql .= " AND `films_sessions`.`time` LIKE '$date%'";
		}
		if ($type != 0) {
			//$sql .= " AND `films`.`type` = $type";
		}
		if ($session) {
			$sql .= " AND `films`.`competition_session` = $session";
		}
		
		$query = $this->db->query($sql);
        
		return $query->num_rows();
	}
	function search_row($keyword,$type,$date,$genre,$session,$row,$sort) {
		
		// $sql = "SELECT distinct `films`.*
				// FROM `films` where `films`.`title` LIKE '%$keyword%' OR `films`.`director` LIKE '%$keyword%' OR `films`.`producer` LIKE '%$keyword%' OR `films`.`artist` LIKE '%$keyword%'";
        $sql = "SELECT `films`.*
				FROM `films`,`films_sessions`";
		if ($type != 2) {
			$sql .= ",`films_genres`";
		}
		$sql .= " WHERE `films`.`published` = 1			
				AND `films`.`id` = `films_sessions`.`film_id`";
		if ($type != 2) {
			$sql .= " AND `films`.`id` = `films_genres`.`film_id`";
		}
		if ($keyword != "") {
			$sql .= ' AND (`films`.`title` LIKE "%'.$keyword.'%" OR `films`.`director` LIKE "%'.$keyword.'%" OR `films`.`producer` LIKE "%'.$keyword.'%" OR `films`.`artist` LIKE "%'.$keyword.'%")';
		}
		if ($genre != 0 ) {
            if($type!=2){
            $sql .= " AND `films_genres`.`genre_id` = $genre";
            }
			//$sql .= " AND `films_genres`.`genre_id` = $genre";
		}
		if ($date != "") {
			$sql .= " AND `films_sessions`.`time` LIKE '$date%'";
		}
		if ($type != 0) {
			//$sql .= " AND `films`.`type` = $type";
		}
		if ($session) {
			$sql .= " AND `films`.`competition_session` = $session";
		}
		$sql .=  " GROUP BY `films`.`id`";
		if ($sort == "title") {
			$sql .= " ORDER BY `films`.`title` ASC";
		} else if ($sort == "order") {
			$sql .= " ORDER BY `films`.`order` ASC";
		}
		if (!$session) {
			if ($row != "") { $sql .= " LIMIT $row,9"; }
			else { $sql .= " LIMIT 9"; }
		}
		   
		 $query = $this->db->query($sql);
		 //echo $sql;
		 //exit;
		 
		#return $sql;
		return $query->result_array();
	}
	
	
	
	function search_count_all($keyword,$type,$date,$genre,$session) {			
        
		
		
		
		$this->db->like('name',$keyword);
		$query = $this->db->get('genres');
		$genre_data = $query->first_row('array');
		
		
		$type_gen=0;
		if(count($genre_data)>0){$type_gen = $genre_data['id'];}
		
		
		$sql = "SELECT `films`.*
				FROM `films`,`films_sessions`";
		
		if ($type != 2) {
			$sql .= ",`films_genres`";
		}
		$sql .= " WHERE `films`.`published` = 1			
				AND `films`.`id` = `films_sessions`.`film_id`";
		
		if ($type_gen > 0) {
			$sql .= " AND `films`.`id` = `films_genres`.`film_id`";
		}
		
		if ($type != 2) {
			$sql .= " AND `films`.`id` = `films_genres`.`film_id`";
		}
		if ($keyword != "") {
			$sql .= ' AND ( `films_genres`.`genre_id` = '.$type_gen.' OR `films_sessions`.`venue` LIKE "%'.$keyword.'%" OR `films_sessions`.`time` LIKE "%'.date('Y-m-d',strtotime($keyword)).'%" OR `films`.`title` LIKE "%'.$keyword.'%" OR `films`.`country` LIKE "%'.$keyword.'%" OR `films`.`year` LIKE "%'.$keyword.'%" OR `films`.`director` LIKE "%'.$keyword.'%" OR `films`.`producer` LIKE "%'.$keyword.'%" OR `films`.`artist` LIKE "%'.$keyword.'%" OR `films`.`synopsis` LIKE "%'.$keyword.'%" OR `films`.`running_time` LIKE "%'.$keyword.'%")';
		}
		if ($genre != 0 ) {
			if($type!=2){
            $sql .= " AND `films_genres`.`genre_id` = $genre";
            }
		}
		if ($date != "") {
			$sql .= " AND `films_sessions`.`time` LIKE '$date%'";
		}
		if ($type != 0) {
			//$sql .= " AND `films`.`type` = $type";
		}
		if ($session) {
			$sql .= " AND `films`.`competition_session` = $session";
		}
		
		$query = $this->db->query($sql);
        
		return $query->num_rows();
	}
	function search_row_all($keyword,$type,$date,$genre,$session,$row,$sort) {
		
		//echo 'date: '.$keyword. strtotime($keyword).'<br>'. date('Y-m-d',strtotime($keyword));
		
		//exit;
		
		$this->db->like('name',$keyword);
		$query = $this->db->get('genres');
		$genre_data = $query->first_row('array');
		$type_gen=0;				
		if(count($genre_data)>0){$type_gen = $genre_data['id'];}
		
		
        $sql = "SELECT `films`.*
				FROM `films`,`films_sessions`";
		
		
		if ($type != 2) {
			$sql .= ",`films_genres`";
		}
		$sql .= " WHERE `films`.`published` = 1			
				AND `films`.`id` = `films_sessions`.`film_id`";
				
		if ($type_gen > 0) {
			$sql .= " AND `films`.`id` = `films_genres`.`film_id`";
		}		
		
		if ($type != 2) {
			$sql .= " AND `films`.`id` = `films_genres`.`film_id`";
		}
		if ($keyword != "") {
			$sql .= ' AND (`films_genres`.`genre_id` = '.$type_gen.' OR `films_sessions`.`venue` LIKE "%'.$keyword.'%" OR `films_sessions`.`time` LIKE "%'.date('Y-m-d',strtotime($keyword)).'%" OR `films`.`title` LIKE "%'.$keyword.'%" OR `films`.`country` LIKE "%'.$keyword.'%" OR `films`.`year` LIKE "%'.$keyword.'%" OR `films`.`director` LIKE "%'.$keyword.'%" OR `films`.`producer` LIKE "%'.$keyword.'%" OR `films`.`artist` LIKE "%'.$keyword.'%" OR `films`.`synopsis` LIKE "%'.$keyword.'%" OR `films`.`running_time` LIKE "%'.$keyword.'%")';
		}
		if ($genre != 0 ) {
            if($type!=2){
            $sql .= " AND `films_genres`.`genre_id` = $genre";
            }
			//$sql .= " AND `films_genres`.`genre_id` = $genre";
		}
		if ($date != "") {
			$sql .= " AND `films_sessions`.`time` LIKE '$date%'";
		}
		if ($type != 0) {
			//$sql .= " AND `films`.`type` = $type";
		}
		if ($session) {
			$sql .= " AND `films`.`competition_session` = $session";
		}
		$sql .=  " GROUP BY `films`.`id`";
		if ($sort == "title") {
			$sql .= " ORDER BY `films`.`title` ASC";
		} else if ($sort == "order") {
			$sql .= " ORDER BY `films`.`order` ASC";
		}
		if (!$session) {
			if ($row != "") { $sql .= " LIMIT $row,9"; }
			else { $sql .= " LIMIT 9"; }
		}
		   
		 $query = $this->db->query($sql);
		 //echo $sql;
		 //exit;
		 
		#return $sql;
		return $query->result_array();
	}
	
	function search_total($keyword,$type) {
		if ($keyword != '') {
			$this->db->like('title',$keyword);
		}
		if ($type != '0') {
			$this->db->where('type',$type);
		}
		$query = $this->db->get('films');
		return $query->result_array();
	}
	function search_in_rows($keyword,$type,$row) {
		if ($keyword != '') {
			$this->db->like('title',$keyword);
		}
		if ($type != '0') {
			$this->db->where('type',$type);
		}
		$this->db->order_by('title','asc');
		$query = $this->db->get('films',10,$row);
		return $query->result_array();
	}
	function delete($table,$id) {
		$this->db->where('id',$id);
		return $this->db->delete($table);
	}
	function get_genres() {
		$this->db->order_by('id','asc');
		$query = $this->db->get('genres');
		return $query->result_array();
	}
	function get_film_genres($film_id) {
		$sql = "SELECT `genres`.`name` 
				FROM `genres`,`films_genres`
				WHERE `films_genres`.`film_id` = $film_id
				AND `films_genres`.`genre_id` = `genres`.`id`
				ORDER BY `genres`.`order` ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function check_genre($film_id,$genre_id) {
		$this->db->where('film_id',$film_id);
		$this->db->where('genre_id',$genre_id);
		$query = $this->db->get('films_genres');
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}
	function reset_genres($film_id) {
		$this->db->where('film_id',$film_id);
		return $this->db->delete('films_genres');
	}
	function get_dates() {
		$this->db->order_by('id','asc');
		$query = $this->db->get('dates');
		return $query->result_array();
	}
	function get_venues() {
		$this->db->order_by('id','asc');
		$query = $this->db->get('venues');
		return $query->result_array();
	}
	function get_sessions($film_id) {
		$this->db->where('film_id',$film_id);
		//$this->db->group_by("title"); 
        $query = $this->db->get('films_sessions');
        
		return $query->result_array();
	}
	function reset_sessions($film_id) {
		$this->db->where('film_id',$film_id);
		return $this->db->delete('films_sessions');
	}
	function update_featuring()
	{
		$data = array(
					  'featuring' => 0
					  );
		return $this->db->update('films',$data);
	}
	function get_featuring()
	{
		$this->db->where('featuring',1);
		$query = $this->db->get('films');
		return $query->first_row('array');
	}
}
?>