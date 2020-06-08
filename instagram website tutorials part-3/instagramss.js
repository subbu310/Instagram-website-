
 
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
	 
	 //back home press tabs
	 
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
	 
	 
	 //profile mid tabs
	 
	 
	 $('.profile-tab').click(function (e){
			  
		  e.preventDefault();
		   
		  var profiletab = $(this).attr('id');
		  
		  $('.black').hide();
		  
		  $('.grey').show();
		  
		  $('.grey[id="'+profiletab+'"]').hide();
		  
		  $('.black[id="'+profiletab+'"]').show(); 
		  
		   var href = $(this).attr('href');
		  
		  $('.profile-main-pages').removeClass('active-profile');
		  
		  $('.profile-main-pages[id="'+href+'"]').addClass('active-profile');
		  
		  // if(!push)
			   
		  history.pushState({},'', href);
		  
		 // push = false;
		  
	     //  alert(profiletab);
		 
		 
     }); 
	 
	// profile mid back press tabs
	 
	 $(window).on("popstate", function (){
	 
        push = true;
		
		var prevTab = (window.location.href.indexOf("/") > -1) ? window.location.href.split("/").pop() : false ;
	    
		 if(prevTab == 'Profile'){
			
          $('.fill[id="Profile"]').click();  
		  
		  $('.black').hide();
		  
		  $('.grey').show();
		  
		  $('.grey[href="grid"]').hide();
		  
		  $('.black[href="grid"]').show(); 
		    
		  $('.profile-main-pages').removeClass('active-profile');
		  
		  $('.profile-main-pages[id="grid"]').addClass('active-profile');
		  
		   
		 }
		 if(prevTab == 'grid'){
			 
		  $('.black').hide();
		  
		  $('.grey').show();
		  
		  $('.grey[href="grid"]').hide();
		  
		  $('.black[href="grid"]').show(); 
		    
		  $('.profile-main-pages').removeClass('active-profile');
		  
		  $('.profile-main-pages[id="grid"]').addClass('active-profile');
		  
		 }
		 
		 if(prevTab == 'tv'){
			 
		  $('.black').hide();
		  
		  $('.grey').show(); 
			 
		  $('.grey[id="tv"]').hide();
		  
		  $('.black[id="tv"]').show(); 
		    
		  $('.profile-main-pages').removeClass('active-profile');
		  
		  $('.profile-main-pages[id="tv"]').addClass('active-profile');
		  
		 }
		 
		 if(prevTab == 'save'){
			 
          $('.black').hide();
		  
		  $('.grey').show();
			 
		  $('.grey[id="save"]').hide();
		  
		  $('.black[id="save"]').show(); 
		    
		  $('.profile-main-pages').removeClass('active-profile');
		  
		  $('.profile-main-pages[id="save"]').addClass('active-profile');
		  
		 }
		 
		 return false;
	 });
	 
	 
	 //fetch profile info
	 
	   profile_info();
	   
	   function profile_info()
	   
	   {
		   
		   action = "profile_info";
		   
		   $.ajax({
			   
			   url: "action_profile.php" ,
			   
			   method:"post" ,
			  
			   data:{action_profile_info:action } ,
			   
			   success: function (data){
				   
				   $('.profile-info-container').html(data);
			   }
		   });
		   
	   }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
 });