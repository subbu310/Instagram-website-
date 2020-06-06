
 
 $(document).ready(function (){
	 
	 //home tabs click
	 
	    var push = false;
	 
	  $('.home-tab').click(function (e){
		  
		  e.preventDefault();
		  
		  var navtab = $(this).attr('id');
		  
		  $('.fill').hide();
		  
		  $('.outline').show();
		  
		  $('.outline[id="'+navtab+'"]').hide();
		  
		  $('.fill[id="'+navtab+'"]').show(); 
		  
		  var href = $(this).attr('href');
		  
		  $('.home-page-container').removeClass('activepage');
		  
		  $('.home-page-container[id="'+href+'"]').addClass('activepage');
		  
		   if(!push)
			   
		  history.pushState({},'', href);
		  
		  push = false;
		  
	     //alert(navtab);
		 
     });
	 
	 //back press tabs
	 
	 $(window).on("popstate", function (){
	 
        push = true;
		
		var prevTab = (window.location.href.indexOf("/") > -1) ? window.location.href.split("/").pop() : false ;
	    
		 if(prevTab == 'home.php'){
			 
			$('.fill[id="Home"]').click(); 
		   
		 }
		 if(prevTab == 'Message'){
			 
			$('.fill[id="Message"]').click(); 
		   
		 }
		 if(prevTab == 'Search'){
			 
			$('.fill[id="Search"]').click(); 
		   
		 }
		 if(prevTab == 'Follow'){
			 
			$('.fill[id="Follow"]').click(); 
		   
		 }
		 if(prevTab == 'Home'){
			 
			$('.fill[id="Home"]').click(); 
		   
		 }
		 //alert(prevTab);
		 
	 });
	 
	 
 });