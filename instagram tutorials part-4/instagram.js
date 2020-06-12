
 
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
	 
	 // profile sign out modal
	 
	  $(document).on('click', '.profile-setting', function (e){
			  
		  e.preventDefault(); 
		  
		  $('.profile-logout-container').css({'display':'block'});
	
	  });
	 
	 
	  $(document).on('click', '.profile-logout-cancel', function (e){
			  
		  e.preventDefault(); 
		  
		  $('.profile-logout-container').css({'display':'none'});
	
	  });
	  
	  
	  //Edit profile link
	  
	  $(document).on('click', '.profile-edit', function (e){
			  
		  e.preventDefault(); 
		  
		   $('.fill').hide();
		  
		  $('.outline').show();
		  
		  var href = $(this).attr('href');
		  
		  $('.home-page-container').removeClass('activepage');
		  
		  $('.home-page-container[id="'+href+'"]').addClass('activepage');
		  
		   if(!push)
			   
		  history.pushState({},'', href);
		  
		  push = false;
			
	  });
	 
	  
	 //fetch edit profile 
	  
	  
	   edit_profile_info();
	   
	   function edit_profile_info()
	   
	   {
		   
		   action = "edit_profile_info";
		   
		   $.ajax({
			   
			   url: "action_edit_profile.php" ,
			   
			   method:"post" ,
			  
			   data:{action_edit_profile:action } ,
			   
			   success: function (data){
				   
				   $('.edit-profile-right').html(data);
			   }
		   });
		   
	   }
	  
	  //change edit profile photo
	  
	  $(document).on('click', '.change-profile-photo', function (e){
			  
		  e.preventDefault(); 
		  
		  $('#profile_photo').trigger('click');
		  
	  });
	  
	  
	$(document).on('change', '#profile_photo', function (e){
			  
		  e.preventDefault(); 
		  
		 var profilePhoto = $('#profile_photo')[0].files[0];
		 
		 var form_data = new FormData();
		 
		  form_data.append("upload_photo", profilePhoto);
		  
		  $.ajax({
			   
			   url: "action_edit_profile.php" ,
			   
			   method:"post" ,
			  
			   data:form_data ,
			   
			   contentType:false,
			   
			   cache:false,
			   
			   processData:false,
			   
			   success: function (data){
				   
				  profile_info();
				  
				  edit_profile_info();
	   
	   
			   }
		   });
		  
	  });
	  
	  
	// update edit profile info


    $(document).on('click', '#edit_submit', function (e){
			  
		  e.preventDefault(); 
		  
		 var  fullname = $('#edit_fullname').val();
		 
         var  username = $('#edit_username').val();
		 
		 var  website = $('#edit_website').val();
		 
		 var  bio = $('#edit_bio').val();
		 
		 var  email = $('#edit_email').val();
		 
		 var  phonenumber = $('#edit_phonenumber').val();
		 
		 var  gender = $('#edit_gender').val();
		 
		 var action = 'update_edit_profile';
		 
		 $.ajax({
			   
			   url: "action_edit_profile.php" ,
			   
			   method:"post" ,
			  
			   data:{action_edit_profile_update:action, fullname:fullname, username:username, 

			         website:website, bio:bio, email:email, phonenumber:phonenumber, gender:gender } ,
			   
			   success: function (data){
				   
				   profile_info();
				  
				  edit_profile_info();
	   
			   }
		   });
		 
		 		 
	  });	
	  
	  
	  
	  
	  
	
	
	
	
	
	
	
	 
	 
 });