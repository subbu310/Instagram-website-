<?php
  
  error_reporting(0);
 
  include('connect.php');
 
  session_start();
  
  if(isset($_POST['action_profile_info'])){
	  
	  $userId = $_SESSION['user_id'];
	  
	  $sql = "SELECT * FROM `user` WHERE `user_id`='$userId'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		    $user_id = $row['user_id'];
		    
			$fullname = $row['fullname'];
		  
		    $username = $row['username'];
		  
		    echo '<div class="profile-info-left">
		
		            <a><img src="icon/profile_image.jpg" /> </a>
 
                 </div>
		
		     <div class="profile-info-right">
             
			  <div class="profile-info-edit">
			  
                  <div class="profile-info-edit-name">
			  
                      <a>'.$username.'</a>
					  
                  </div>
				  
				  <div class="profile-info-edit-button">
			   
                      <button>Edit Profile</button>
					  
                  </div>
				  
				  <div class="profile-info-edit-setting">
			  
                    <a><img src="icon/settings.png" /> </a>
 
                  </div>
				  
              </div>
			  
			  
			  <div class="profile-info-posts">
			  
			       <div class="profile-info-post-count">
			  
			           <a><b>0</b> posts</a>
					   
                   </div>
				   
				   <div class="profile-info-followers-count">
			  
			          <a><b>0</b> followers</a>
					  
                   </div>
				   
				   <div class="profile-info-following-count">
			  
			         <a><b>0</b> following</a>
					 
                   </div>
				  
              </div>
			  
			  
			  <div class="profile-info-details">
			  
			         <a><b>'.$fullname.'</b></a>
					 
					  <a>bio</a>
					 		 
               </div>
			  
			  
           </div>';
		  
	  }
     
  }
 
?>