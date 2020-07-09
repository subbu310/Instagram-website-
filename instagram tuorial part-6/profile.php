
<!DOCTYPE html>
<html>
<head>

<title>Profile Instagram</title>
 
<meta charset="utf-8">
  
<meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!----add jquery link----> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 <!---font awesome link ---->
 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


<style>


</style>

</head>

<body>
   
 <div class="profile-container">
     
	  <div class="profile-info-container">
	  
	    
 
     </div>
	 
	  <div class="profile-mid-tab">
	     
		 <div class="profile-mid-tab-inside">
		 
		    <div class="profile-mid-tab-icon">
		 
		          <div class="profile-mid-tab-image">
			  
                    <a class="profile-tab black profile-active" id="grid" href="grid"><img src="icon/square_black.png" /> </a>
                    
					<a class="profile-tab grey profile-unactive" id="grid" href="grid"><img src="icon/square_grey.png" /> </a>
 
                 </div>
				
				 <div class="profile-mid-tab-name">
			  
                    <a class="profile-tab black profile-active" style="color:black;" id="grid" href="grid">POSTS</a>
                    
					<a class="profile-tab grey profile-unactive" style="color:#aaa;" id="grid" href="grid">POSTS</a>
                    
                 </div>
	  
	        </div>
			
			<div class="profile-mid-tab-icon">
		 
		          <div class="profile-mid-tab-image">
			  
                    <a class="profile-tab black" id="tv" href="tv"><img src="icon/igtv_black.png" /> </a>
                    
					<a class="profile-tab grey" id="tv" href="tv"><img src="icon/igtv_grey.png" /> </a>
 
                 </div>
				
				 <div class="profile-mid-tab-name">
			  
                    <a class="profile-tab black" style="color:black;" id="tv" href="tv">IGTV</a>
                    
					<a class="profile-tab grey" style="color:#aaa;" id="tv" href="tv">IGTV</a>
                    
                 </div>
	  
	        </div>
			
			<div class="profile-mid-tab-icon">
		 
		          <div class="profile-mid-tab-image">
			  
                    <a class="profile-tab black" id="save" href="save"><img src="icon/bookmark.png" /> </a>
                    
					<a class="profile-tab grey" id="save" href="save"><img src="icon/bookmark_grey.png" /> </a>
 
                 </div>
				
				 <div class="profile-mid-tab-name">
			  
                    <a class="profile-tab black" style="color:black;" id="save" href="save">SAVED</a>
                    
					<a class="profile-tab grey" style="color:#aaa;" id="save" href="save">SAVED</a>
                    
                 </div>
	  
	        </div>
			
			<div class="profile-mid-tab-icon">
		 
		          <div class="profile-mid-tab-image">
			  
                    <a class="profile-tab black" id="tag" href="tag"><img src="icon/tag_black.png" /> </a>
                    
					<a class="profile-tab grey" id="tag" href="tag"><img src="icon/tag_grey.png" /> </a>
 
                 </div>
				
				 <div class="profile-mid-tab-name">
			  
                    <a class="profile-tab black" style="color:black;" id="tag" href="tag">TAGGED</a>
                    
					<a class="profile-tab grey" style="color:#aaa;" id="tag" href="tag">TAGGED</a>
                    
                 </div>
	  
	        </div>
					
	     </div>
	  
	  </div>
	  
	  <div class="profile-main-page">
			 
           <div class="profile-main-page-inside">
			   
			   <div class="profile-main-pages active-profile" id="grid">
			  
                     <div class="profile-post-grid">
			  
                       
					 
                    </div>
					 
               </div>
			   
			   <div class="profile-main-pages" id="tv">
			  
                     <div class="profile-upload-files">
			  
                       <a class="profile-files"><img src="icon/add.png" /></a>
					   
					    <input type="file" name="upload-file[]" id="upload_post" onchange="preview()" multiple/>
								
					 
                     </div>
					 
               </div>
			   
			   <div class="profile-main-pages" id="save">
			  
                     save
					 
               </div>
			   
			   <div class="profile-main-pages" id="tag">
			  
                     tag
					 
               </div>
                    
           </div>		   
                    
      </div>
	  
	  <div class="profile-logout-container">
			  
            <div class="profile-logout-container-inside">
			  
                <div class="profile-logout-name">
			  
                   <a>Change Password</a>
					 
                </div>

                <div class="profile-logout-name">
			  
                   <a>Nametag</a>
					 
                </div>
                
                <div class="profile-logout-name">
			  
                   <a>Apps and Websites</a>
					 
                </div>
                
                <div class="profile-logout-name">
			  
                   <a>Notifications</a>
					 
                </div>

                <div class="profile-logout-name">
			  
                   <a>Privacy and Security</a>
					 
                </div>	

				<div class="profile-logout-name">
			  
                   <a>Login Activity</a>
					 
                </div>	
				
				<div class="profile-logout-name">
			  
                   <a>Emails from Instagram</a>
					 
                </div>	
				
				<div class="profile-logout-name">
			  
                   <a>Report a Problem</a>
					 
                </div>	
				
				<div class="profile-logout-name">
			  
                   <a href="signout.php" style="text-decoration:none;color:black;">Log Out</a>
					 
                </div>

 				<div class="profile-logout-name">
			  
                   <a class="profile-logout-cancel">Cancel</a>
					 
                </div>
					 
            </div>       
					 
      </div>
	  
	   <div class="profile-upload-container">
	   
	      <div class="profile-upload-post">
		  
		    <div class="profile-upload-post-top-nav">
	   
	              <div class="profile-upload-top-nav-name">
	   
	                 <a class="profile-upload-cancel">X</a>
					
	              </div>
				  
				  <div class="profile-upload-top-nav-name">
	   
	                <a class="profile-upload-name">Share Post</a>
					
	              </div>
				  
				  <div class="profile-upload-top-nav-name">
	   
	                <a class="profile-upload-share">Share</a>
					
	              </div>
				  
	        </div>
			
			<div class="profile-upload-preview">
	            
				
					
	        </div>
			
			<div class="profile-upload-file-text">
	   
	               <input type="text" name="upload-desc" id="upload_desc" placeholder="desc.."/>
						
	         </div>
	   
	   
	      </div>
		  
		  
	   </div>
	
	 
 </div>
   
<script>

</script>

</body>

</html>