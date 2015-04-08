$(document).ready(function()
{
    $("#film-container img[title]").tooltip({effect: 'fade',
	           // make fadeOutSpeed similar to the browser's default
		       //fadeOutSpeed: 100,
			   // tweak the position
		       position: "top center",
			   opacity: 0.7});
	
	$("#soundkilda-container img[title]").tooltip({effect: 'fade',
	           // make fadeOutSpeed similar to the browser's default
		       //fadeOutSpeed: 100,
			   // tweak the position
		       position: "top center",
			   opacity: 0.7});
   
	var items = $('#films-all li'),itemsByTags = {};
	
	var itemsByTags2 = {};
	
	// Looping though all the li items:
	
	items.each(function(i){
		var elem = $(this),
			tags = elem.data('tags').split(',');
		
		// Adding a data-id attribute. Required by the Quicksand plugin:
		elem.attr('data-id',i);
		
		$.each(tags,function(key,value)
		{
			
		   if(value != 'Drama' && value != 'Comedy' && value != 'Thriller' && value != 'Horror' && value != 'Animation' && value != 'Documentary' && value != 'Science Fiction' && value !='Childrens')
		  {
		  // edited by Hieu (12/12/2011)
		 
			// Removing extra whitespace:
			value = $.trim(value);
			
			if(!(value in itemsByTags)){
				// Create an empty array to hold this item:
				itemsByTags[value] = [];
			}
			
			// Each item is added to one array per tag:
			// this is for the menu of all the dates
			itemsByTags[value].push(elem);
		  }
		   else
		  {
		  
			// Removing extra whitespace:
			value = $.trim(value);
			
			if(!(value in itemsByTags2)){
				// Create an empty array to hold this item:
				itemsByTags2[value] = [];
			}
			
			// Each item is added to one array per tag:
			// this is for the menu of all the locations
			// edited by Hieu (12/12/2011)
            
			itemsByTags2[value].push(elem);
		  }
		 
		});
		
	});
	
  
	// Creating the "Everything" option in the menu:
	// this is for the menu of everything -> Reset - show all music
	createList3('RESET - SHOW ALL FILMS',items);
	//createList4('TUESDAY 22 MAY',items);

	// Looping though the arrays in itemsByTags:
	$.each(itemsByTags,function(k,v){
		createList(k,v);
	});
	
	// Looping though the arrays in itemsByTags2:
	$.each(itemsByTags2,function(k,v){
		createList2(k,v);
	});
	
	// this is action control for the menu of all the dates
	$('#filter-menu a').live('click',function(e){
		var link = $(this);
		
		link.addClass('active').siblings().removeClass('active');
		//$('#filter2 a').removeClass('active');
		//$('#filterAll a').removeClass('active');
		// Using the Quicksand plugin to animate the li items.
		// It uses data('list') defined by our createList function:
		
		$('#films-all').quicksand(link.data('list').find('li'),
		   function()
		   {
             
			  // for the tooltip
	           $("#film-container img[title]").tooltip({effect: 'fade',
	           // make fadeOutSpeed similar to the browser's default
		       //fadeOutSpeed: 100,
		       // tweak the position
		       position: "top center",
			  opacity: 0.7});
               $('#film-container img').mouseleave(function() { 
                $('.tooltip').hide();
               });
			
		   }
		);
		e.preventDefault();
	});
	
	// this is action control for the menu of all the locations
	$('#filter-menu2 a').live('click',function(e){
		var link = $(this);
		
		link.addClass('active').siblings().removeClass('active');
		
		//$('#filterAll a').removeClass('active');
		// Using the Quicksand plugin to animate the li items.
		// It uses data('list') defined by our createList function:
		
		$('#films-all').quicksand(link.data('list').find('li'),
		   function()
		   {
			  // for the tooltip
	           $("#film-container img[title]").tooltip({effect: 'fade',
	           // make fadeOutSpeed similar to the browser's default
		       //fadeOutSpeed: 100,
		       // tweak the position
		       position: "top center",
			   opacity: 0.7});
			  
			   $('#film-container img').mouseleave(function() {
		        
                $('.tooltip').hide();
               });
			   
		   }
		);
		e.preventDefault();
	});
	
    $('#filterAll a').live('click',function(e){
        var link = $(this);
        
        link.addClass('active').siblings().removeClass('active');
        $('#filter-menu a').removeClass('active');
        $('#filter-menu2 a').removeClass('active');
        // Using the Quicksand plugin to animate the li items.
        // It uses data('list') defined by our createList function:
        
        $('#films-all').quicksand(link.data('list').find('li'),
           function()
           {
              // for the tooltip
               $("#film-container img[title]").tooltip({effect: 'fade',
               // make fadeOutSpeed similar to the browser's default
               //fadeOutSpeed: 100,
               // tweak the position
               position: "top center",
               opacity: 0.7});
               //$("#band-wrapper img").removeAttr("title");
               $('#film-container img').mouseleave(function() {
                $('.tooltip').hide();
               });
               
           }
        );
        e.preventDefault();
    });
	
	$('#filterTue a').live('click',function(e){
        var link = $(this);
        
        /*
		link.addClass('active').siblings().removeClass('active');
        $('#filter-menu a').removeClass('active');
        $('#filter-menu2 a').removeClass('active');
		//$('#filterAll a').removeClass('active');
        // Using the Quicksand plugin to animate the li items.
        // It uses data('list') defined by our createList function:
        
        $('#films-all').quicksand(link.data('list').find('li'),
           function()
           {
              // for the tooltip
               $("#film-container img[title]").tooltip({effect: 'fade',
               // make fadeOutSpeed similar to the browser's default
               //fadeOutSpeed: 100,
               // tweak the position
               position: "top center",
               opacity: 0.7});
               //$("#band-wrapper img").removeAttr("title");
               $('#film-container img').mouseleave(function() {
                $('.tooltip').hide();
               });
               
           }
        );*/
		window.location='http://www.stkildafilmfestival.com.au/2012-s2/page-143/opening-night';
        e.preventDefault();
    });
	
    //$('#band-wrapper img').mouseleave(function() {
       //$('.tooltip').hide();
    //});
	//$('#filter a:first').click();
	//this is for the menu of all the dates
	function createList(text,items){
		
		// This is a helper function that takes the
		// text of a menu button and array of li items
		
		// Creating an empty unordered list:
		var ul = $('<ul>',{'class':'hidden'});
		
		$.each(items,function(){
			// Creating a copy of each li item
			// and adding it to the list:
			
			$(this).clone().appendTo(ul);
			
		});

		ul.appendTo('#film-container');

		// Creating a menu item. The unordered list is added
		// as a data parameter (available via .data('list'):
		// use the date as the id and remove white space otherwise it is not working
		var newText = text.replace(/\s/g, "")
		//var newText2 = newText+'me';
		if(newText == 'Wednesday29May')
		{
			var div = $('<div class="lowerdate">');
		}
		else if(newText == 'Thursday30May')
		{
			var div = $('<div class="lowerdate">');
		}
		else if(newText == 'Friday31May')
		{
			var div = $('<div class="lowerdate">');
		}
		else if(newText == 'Saturday01Jun')
		{
			var div = $('<div class="lowerdate">');
		}
		else
		{
			var div = $('<div class="lowerdate">');
		}
		
		var a = $('<a>',{
			html: text,
			id: newText,// use the date as the id added by Hieu (12/12/2011)
			href:'#',
			data: {list:ul}
		}).appendTo(div);
		
		div.appendTo('#filter-menu');
		
	}
	function createList2(text,items){
		
		// This is a helper function that takes the
		// text of a menu button and array of li items
		
		// Creating an empty unordered list:
		var ul = $('<ul>',{'class':'hidden'});
		
		$.each(items,function(){
			// Creating a copy of each li item
			// and adding it to the list:
			
			$(this).clone().appendTo(ul);
			
		});

		ul.appendTo('#film-container');

		// Creating a menu item. The unordered list is added
		// as a data parameter (available via .data('list'):
		// use the date as the id and remove white space otherwise it is not working
		var newText = text.replace(/\s/g, "")
		
		var div = $('<div>');
		var a = $('<a>',{
			html: text,
			id: newText,// use the date as the id added by Hieu (12/12/2011)
			href:'#',
			data: {list:ul}
		}).appendTo(div);
		
		div.appendTo('#filter-menu2');
		
	}
    function createList3(text,items){
        
        // This is a helper function that takes the
        // text of a menu button and array of li items
        
        // Creating an empty unordered list:
        var ul = $('<ul>',{'class':'hidden'});
        
        $.each(items,function(){
            // Creating a copy of each li item
            // and adding it to the list:
            
            $(this).clone().appendTo(ul);
            
        });

        ul.appendTo('#film-container');
        // use the Reset - show all music as the id and remove white space otherwise it is not working
        var newText = text.replace(/\s/g, "")
        // Creating a menu item. The unordered list is added
        // as a data parameter (available via .data('list'):
        
        var a = $('<a>',{
            html: text,
            id: newText, // use the Reset - show all music as the id added by Hieu (12/12/2011)
            href:'#',
            data: {list:ul}
        }).appendTo('#filterAll');
    }
	
	function createList4(text,items){
        
        // This is a helper function that takes the
        // text of a menu button and array of li items
        
        // Creating an empty unordered list:
        var ul = $('<ul>',{'class':'hidden'});
        
        $.each(items,function(){
            // Creating a copy of each li item
            // and adding it to the list:
            
            $(this).clone().appendTo(ul);
            
        });

        ul.appendTo('#film-container');
        // use the Reset - show all music as the id and remove white space otherwise it is not working
        var newText = text.replace(/\s/g, "")
        // Creating a menu item. The unordered list is added
        // as a data parameter (available via .data('list'):
        
        var a = $('<a>',{
            html: text,
            id: newText, // use the Reset - show all music as the id added by Hieu (12/12/2011)
            href:'#',
            data: {list:ul}
        }).appendTo('#filterTue');
    }
	
});