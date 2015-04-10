<?php
class Data_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	
	function events($key = "")
	{
		
		$events = array(
				"session-1" => 
					array(
						"name" => "top 100 session 1",
						"ticket_link" => "http://www.ticketmaster.com.au/event/13004C92E345D3FE",
						"date" => "23-05-2014",
						"time" => "6:00 PM",
						"venue" => "the astor theatre"		
					),
				
				"session-2" => 
					array(
						"name" => "top 100 session 2",
						"ticket_link" => "http://www.ticketmaster.com.au/event/13004C92E345D3FE",
						"date" => "23-05-2014",
						"time" => "7:45 PM",
						"venue" => "the astor theatre"		
					),
				
				"session-3" => 
					array(
						"name" => "top 100 session 3",
						"ticket_link" => "http://www.ticketmaster.com.au/event/13004C92E345D3FE",
						"date" => "23-05-2014",
						"time" => "9:30 PM",
						"venue" => "the astor theatre"		
					),
					
				"session-4" => 
					array(
						"name" => "top 100 session 4",
						"ticket_link" => "http://www.ticketmaster.com.au/event/13004C92E345D3FE",
						"date" => "24-05-2014",
						"time" => "7:15 PM",
						"venue" => "the astor theatre"		
					),
					
				"session-5" => 
					array(
						"name" => "top 100 session 5",
						"ticket_link" => "http://www.ticketmaster.com.au/event/13004C92E345D3FE",
						"date" => "25-05-2014",
						"time" => "5:45 PM",
						"venue" => "the astor theatre"		
					),
					
				"session-6" => 
					array(
						"name" => "top 100 session 6",
						"ticket_link" => "http://www.ticketmaster.com.au/event/13004C92E345D3FE",
						"date" => "25-05-2014",
						"time" => "6:30 PM",
						"venue" => "the astor theatre"		
					),
					
				"session-7" => 
					array(
						"name" => "top 100 session 7",
						"ticket_link" => "http://www.ticketmaster.com.au/event/13004C92E345D3FE",
						"date" => "23-05-2014",
						"time" => "6 PM",
						"venue" => "the astor theatre"		
					),
				
				"session-8" => 
					array(
						"name" => "top 100 session 8",
						"ticket_link" => "http://www.ticketmaster.com.au/event/13004C92E345D3FE",
						"date" => "23-05-2014",
						"time" => "6 PM",
						"venue" => "the astor theatre"		
					),
					
				"session-9" => 
					array(
						"name" => "top 100 session 9",
						"ticket_link" => "http://www.ticketmaster.com.au/event/13004C92E345D3FE",
						"date" => "23-05-2014",
						"time" => "6 PM",
						"venue" => "the astor theatre"		
					),
				
				"session-10" => 
					array(
						"name" => "top 100 session 10",
						"ticket_link" => "http://www.ticketmaster.com.au/event/13004C92E345D3FE",
						"date" => "23-05-2014",
						"time" => "6 PM",
						"venue" => "the astor theatre"		
					)
					
				
		);	
		
		
		if($key){
			# check array key exists
			if(array_key_exists($key,$events)){
				return $events[$key];	
			}
			return false;
		}
		return $events;
		
	}
}
?>