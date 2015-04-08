// JavaScript Document

var ladders = {
	
	// our large screen width 1905
	
	init:function(){	
		
		var default_top = 135;
		var ladders_h = $('#side-ladder').height();
		var body_h = $(document.body).height();
		var correction = body_h - (default_top+ladders_h);
	
		//console.log('body - ' + body_h + ' - LH - ' + ladders_h);
		$('#side-ladder').css({'top': correction});
		ladders.respond();
	},
	
	respond:function(){
		var padding = 30; // bootstrap default left and right padding
		var offset = 150.5;
		var cur_container_width = $('#app-container').width() - padding;
		var cur_width = $(document).width(); 
		
		// correction is container width + offset minus (the left and right padding or empty space dividedby 2 will get the right padding)
		var correction = (cur_container_width) + ((cur_width - cur_container_width) / 2); 
		
		// for col-sm
		/*if(cur_width <= 968 ){
			var correction = 0;	
		}*/

		$('#side-ladder').css({'right': correction - offset});	
	}
		
};

