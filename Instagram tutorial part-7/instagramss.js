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
	 
	 
	 //home profile info
	 
	    home_profile_info();
	   
	   function home_profile_info()
	   
	   {
		   
		   action = "home_profile_info";
		   
		   $.ajax({
			   
			   url: "action_home.php" ,
			   
			   method:"post" ,
			  
			   data:{action_home_profile_info:action } ,
			   
			   success: function (data){
				   
				   $('.home-user-profile').html(data);
			   }
		   });
		   
	   }
	 
	 //home suggestion users 
	 
	    home_suggestion_users();
	   
	   function home_suggestion_users()
	   
	   {
		   
		   action = "home_suggestion_users";
		   
		   $.ajax({
			   
			   url: "action_home.php" ,
			   
			   method:"post" ,
			  
			   data:{action_home_suggestion_users:action } ,
			   
			   success: function (data){
				   
				   $('.home-suggestion-follow').html(data);
			   }
		   });
		   
	   }
	 
	 
	 //fetch home post
	 
	    fetch_home_post();
	   
	   function fetch_home_post(suggestPage)
	   
	   {
		   
		   action = "fetch_home_post";
		   
		   $.ajax({
			   
			   url: "action_home.php" ,
			   
			   method:"post" ,
			  
			   data:{action_home_post:action, suggest_page:suggestPage} ,
			   
			   success: function (data){
				   
				   $('.home-container-page-left').html(data);
			   }
		   });
		   
	   }
	   
	 // home multiple post slide
	   
	   $(document).on('click', '.home-post-next', function (e){
			  
		  e.preventDefault(); 
		  
		 var postId = $(this).data('post_id');
		 
		 $('.home-post-slide-image[id="'+postId+'"]').hide();
		  
	
	   });
	   
	   $(document).on('click', '.home-post-prev', function (e){
			  
		  e.preventDefault(); 
		  
		 var postId = $(this).data('post_id');
		 
		 $('.home-post-slide-image[id="'+(postId-1)+'"]').show();
		  
	
	   });
	   
	   //home post like

	    $(document).on('click', '.home-post-like', function (e){
			  
		  e.preventDefault(); 
		  
		 var postId = $(this).data('post_id');
		 
		 var userId = $(this).data('user_id');
		 
         var action = $(this).data('action');
		  
		   $.ajax({
			   
			   url: "action_home.php" ,
			   
			   method:"post" ,
			  
			   data:{action:action, post_id:postId} ,
			   
			   success: function (data){
				   
				  fetch_home_post();
				  
				  fetch_post_comments(postId);
					
			   }
		   });
		 		 
	
	   });
	   
	   //home suggest users follow and unfollow

	    $(document).on('click', '.home-suggest-follow', function (e){
			  
		  e.preventDefault(); 
		  
		 var recieveId = $(this).data('receiver_id');
		 
         var action = $(this).data('action');
		 
		 
		   $.ajax({
			   
			   url: "action_home.php" ,
			   
			   method:"post" ,
			  
			   data:{action:action, recieve_id:recieveId} ,
			   
			   success: function (data){
				   
				  fetch_home_post();
				  
				  home_suggestion_users();
				   
			   }
		   });
		 		 
	
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
	  
// upload post

	 $(document).on('click', '.profile-files', function (e){
			  
		  e.preventDefault(); 
		  
		  $('#upload_post').trigger('click');
		  
	  });
	  
	 	
	  $(document).on('click', '.profile-upload-cancel', function (e){
			  
		  e.preventDefault(); 
		  
		  $('.profile-upload-container').hide();
		  
	  });
	  
	  //upload post to server
	  
	  $(document).on('click', '.profile-upload-share', function (e){
			  
		  e.preventDefault(); 
		  
		 var posts = $('#upload_post')[0].files;
		 
		 var post_desc = $('#upload_desc').val();
		 
		 if(post_desc == ''){
			 
			 alert('Plss choose file or field not empty');
			 
		 }else{
			 
			var form_data = new FormData();
		 
		  for(var i=0; i< posts.length; i++ ){
	  
		  form_data.append("upload_post[]", posts[i]);
		  
		  form_data.append("post_desc", post_desc);
		  
		  }
		  
		  $.ajax({
			   
			   url: "upload_post_action.php" ,
			   
			   method:"post" ,
			  
			   data:form_data ,
			   
			   contentType:false,
			   
			   cache:false,
			   
			   processData:false,
			   
			   success: function (data){
				   
				  $('#upload_desc').val('');
				  
				  profile_grid_posts();
				  
				  $('.profile-upload-container').css({'display':'none'});
	  
				   fetch_home_post();
				   
				  //edit_profile_info();
	   
	   
			   }
		   }); 
		 }
		 
		 
		  
	  });
	  
	  //fetch profile grid posts
	  
	   profile_grid_posts();
	   
	   function profile_grid_posts()
	   
	   {
		   
		   action = "profile_grid_posts";
		   
		   $.ajax({
			   
			   url: "action_profile.php" ,
			   
			   method:"post" ,
			  
			   data:{profile_grid_posts:action } ,
			   
			   success: function (data){
				   
				   $('.profile-post-grid').html(data);
			   }
		   });
		   
	   }
	 
   // post comments

    $(document).on('click', '.comment-tab', function (e){
			  
		  e.preventDefault(); 
		  
		  var href = $(this).attr('href'); 
		 
		  var postId = $(this).data('id');
		  
		  $('.home-page-container').removeClass('activepage');
		  
		  $('.home-page-container[id="'+href+'"]').addClass('activepage');
		  
		  fetch_post_comments(postId);
		 
		  // if(!push)
			   
		  history.pushState({},'', href);
		  
		 // push = false;
		
	});	
	
	
	   
	   function fetch_post_comments(postId)
	   
	   {
		   
		   action = "post_comments";
		   
		   $.ajax({
			   
			   url: "action_home.php" ,
			   
			   method:"post" ,
			  
			   data:{action_post_comments:action, post_id:postId } ,
			   
			   success: function (data){
				   
				   $('.comment-post-container').html(data);
			   }
		   });
		   
	   }
	   
	   //post comment insert
	   
	    $(document).on('click', '#comment-send', function (e){
			  
		  e.preventDefault(); 
		  
		  var postId = $(this).data('post_id');
		  
		  var postComment = $('#comment-type').val();
		  
		    comment_insert(postId, postComment);
		
        });
		
		//home comment insert
		
		$(document).on('click', '#home-comment-send', function (e){
			  
		  e.preventDefault(); 
		  
		  var postId = $(this).data('post_id');
		  
		  var postComment = $('.home-comment-type[id="'+postId+'"]').val();
		  
		   comment_insert(postId, postComment);
		   
        });
		
		
		function comment_insert(postId, postComment){
			
			action = "post_insert_comments";
		   
		   $.ajax({
			   
			   url: "action_home.php" ,
			   
			   method:"post" ,
			  
			   data:{action_post_insert_comments:action, post_id:postId, post_comment:postComment } ,
			   
			   success: function (data){
				   
				    fetch_post_comments(postId);
					
					fetch_home_post();
	              
				    $('.home-comment-type').val('');
		 
			   }
		   });
		
			
		}
		
		
		//home post suggestion users slide
		
		var numbPage = 0;
		
		$(document).on('click', '.home-post-suggest-next', function (e){
			  
		  e.preventDefault(); 
		  
		  numbPage = numbPage + 4;
		  
		  var suggestPage = $(this).data('suggest');
		  
		   fetch_home_post(numbPage);
		   
        });
		
		$(document).on('click', '.home-post-suggest-prev', function (e){
			  
		  e.preventDefault(); 
		  
		  numbPage = numbPage - 4;
		  
		   fetch_home_post(numbPage);
		   
        });
		
 });
 
 
  function preview(){ 
	  
	   $('.profile-upload-container').show();
	   
	   $('.profile-upload-preview-image').empty();
	   
	   var uploadPreview = document.getElementById('upload_post').files ;
	   
	   for(var i=0; i<uploadPreview.length; i++ ){
	   
	   $('.profile-upload-preview').prepend('<div class="profile-upload-preview-image"><a><img src="'+URL.createObjectURL(event.target.files[i])+'" /></a></div>');
	   
	   }
		 
  }
 
 