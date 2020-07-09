<?php
  
  error_reporting(0);
 
  include('connect.php');
 
  session_start();
  
  if(!isset($_SESSION['user_id'])){
	  
     header('location:signin.php');
	 
  }else{
	  
	 // echo $_SESSION['user_id'];
  }
 
?>

<!DOCTYPE html>
<html>
<head>

<title>Home Instagram</title>
 
<meta charset="utf-8">
  
<meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!----add jquery link----> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 <!---font awesome link ---->
 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

 <!---link css page ---->
 
<link rel="stylesheet" href="instagram.css" >

<!---link js page ---->

 <script src="instagram.js"></script>


<style>


</style>

</head>

<body>
  
  <div class="home-container">
     
	 <div class="home-top-nav">
         
		 <div class="home-top-nav-icon">
             
			 <div class="home-top-nav-image">
			 
			  <img src="icon/instagram_name.png" />
   
             </div>
			 
         </div>
		 
		 <div class="home-top-nav-icon">
		 
		     <div class="home-top-nav-search">
			 
			  <input type="text" name="search" placeholder="Search"/>
			  
             </div>
     
         </div>
		 
		 <div class="home-top-nav-icon">
		 
		    <div class="home-top-nav-icon-icons">
			 
			   <div class="home-top-nav-icons">
			
			     <a class="home-tab outline unactive" id="Home" href="Home"><img src="icon/home_outline.png" /></a>
              
			     <a class="home-tab fill active" id="Home" href="Home"><img src="icon/home_fill.png" /></a>
               
			    </div>
				
				<div class="home-top-nav-icons">
			
			     <a class="home-tab outline" id="Message" href="Message"><img src="icon/cursor.png" /></a>
              
			     <a class="home-tab fill" id="Message" href="Message"><img src="icon/cursor_fill.png" /></a>
               
			    </div>
				
				<div class="home-top-nav-icons">
			
			     <a class="home-tab outline" id="Search" href="Search"><img src="icon/explore_outline.png" /></a>
              
			     <a class="home-tab fill" id="Search" href="Search"><img src="icon/explore_fill.png" /></a>
               
			    </div>
				
				<div class="home-top-nav-icons">
			
			     <a class="home-tab outline" id="Follow" href="Follow"><img src="icon/heart_outline.png" /></a>
              
			     <a class="home-tab fill" id="Follow" href="Follow"><img src="icon/heart_fill.png" /></a>
               
			    </div>
				
				<div class="home-top-nav-icons">
			
			     <a class="home-tab outline" id="Profile" href="Profile"><img src="icon/profile_image.jpg" /></a>
              
			     <a class="home-tab fill" id="Profile" href="Profile"><img src="icon/profile_image.jpg" /></a>
              
			    </div>
				
             </div>
			 
         </div>
		 
     </div>
	 
	 <div class="home-page-container activepage" id="Home">
	 
	     <div class="home-container-page">
	 
	         <div class="home-container-page-left">
			 
			   
	         </div>
			 
			 <div class="home-container-page-right">
	 
	              <div class="home-user-profile">
	 
	   
	              </div>
				  
				  <div class="home-user-suggestion">
	 
	                   <div class="home-suggestion-heading">
	 
	                        <div class="home-suggestion-heading-left">
	 
	                          <a><b>Suggestion For You</b></a>
	   
	                        </div>  

                            <div class="home-suggestion-heading-right">
	 
	                          <a><b>See All</b></a>
	   
	                        </div>  						   
	   
	                   </div>
					   
					   <div class="home-suggestion-follow">
					   
					      
					   
					   </div>
	   
	              </div>
	   
	         </div>
	   
	     </div>
	   
	 </div>
	 
	 <div class="home-page-container" id="Message">
	  
	      message
	 </div>
	 
	 <div class="home-page-container" id="Search">
	  
	      search
	 </div>
	 
	 <div class="home-page-container" id="Follow">
	  
	      follow
	 </div>
	 
	 <div class="home-page-container" id="Profile">
	  
	     <?php include('profile.php'); ?>
		 
	 </div>
	 
	 <div class="home-page-container" id="Edit">
	  
	     <?php include('edit_profile.php'); ?>
		 
	 </div>
	
  </div>
   
<script>

</script>

</body>

</html>