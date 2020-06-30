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
			
			$userImage = $row['user_image'];
			
			$website = $row['website'];
	
	        $bio = $row['bio'];
	
			
			   if($userImage == null){
				
				$userProfileImage = '<a><img src="icon/profile_image.jpg" /></a>';
				
			   }else{
				
				$userProfileImage = '<a><img src="'.$userImage.'" /></a>';
				
			   }
		  
		    echo '<div class="profile-info-left">
		
		             '.$userProfileImage.'
							
                 </div>
		
		     <div class="profile-info-right">
             
			  <div class="profile-info-edit">
			  
                  <div class="profile-info-edit-name">
			  
                      <a>'.$username.'</a>
					  
                  </div>
				  
				  <div class="profile-info-edit-button">
			   
                      <button class="profile-edit" href="Edit" style="cursor:pointer;">Edit Profile</button>
					  
                  </div>
				  
				  <div class="profile-info-edit-setting">
			  
                    <a class="profile-setting" style="cursor:pointer;"><img src="icon/settings.png" /> </a>
 
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
					 
					  <a>'.$bio.'</a>
					 		 
               </div>
			  
			  
           </div>';
		  
	  }
     
  }
  
  //fetch profile grid posts
  
  if(isset($_POST['profile_grid_posts'])){
	  
	  $userId = $_SESSION['user_id'];
	  
	  $sql = "SELECT * FROM `posts` WHERE `user_id`='$userId'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		    $user_id = $row['user_id'];
		    
			$postId = $row['post_id'];
		    
			$postUrl = $row['post_url'];
		  
		    $postDesc = $row['desc'];
		  
		    $postType = $row['type'];
		  
		   if($postUrl == null){
				
			$post_url = '<a><img src="icon/post_image.png" /></a>';
				
		    }else{
				
			 $post_url = '<a><img src="'.$postUrl.'" /></a>';
				
		    } 
			
			if($postType == 'single'){
				
				//single posts
			
			echo '<div class="profile-post-grid-image">
			  
                    '.$post_url.'   
				
                  </div> ';
				  
			}else{
				
				//multiple posts
				
				echo '<div class="profile-post-grid-image">
			           
					   <div class="profile-post-slide">
			  
                       '.make_multiple_post_grid($conn, $user_id, $postDesc).'
					   
				       </div>
					   
                     </div> ';
			
				
			}
	
	  }
	  
  }
  
  
  function make_multiple_post_grid($conn, $user_id, $postDesc){
	  
	  $sql = "SELECT * FROM `multiple_post` WHERE `user_id`='$user_id' AND `desc`='$postDesc'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		    $user_id = $row['user_id'];
			
			$postId = $row['post_id'];
		    
			$postUrl = $row['post_url'];
			
			if($postUrl == null){
				
			$post_url = '<a><img src="icon/post_image.png" /></a>';
				
		    }else{
				
			 $post_url = '<a><img src="'.$postUrl.'" /></a>';
				
		    } 
		  
		  $output .= '<div class="profile-post-grid-slide-image">
			  
                     '.$post_url.'  

					 <div class="profile-post-grid-multi-image">
			          
					   <a><img src="icon/gallery.png" /></a>
					   
				     </div>
					 
                    </div> ';
		  
	  }
	  
	  return  $output;
	  
  }
  
  
  
  
  
 
?>