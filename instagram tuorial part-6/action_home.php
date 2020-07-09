<?php
  
  error_reporting(0);
 
  include('connect.php');
 
  session_start();
  
  //home profile info
  
  if(isset($_POST['action_home_profile_info'])){
	  
	  $userId = $_SESSION['user_id'];
	  
	  $sql = "SELECT * FROM `user` WHERE `user_id`='$userId'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		    $user_id = $row['user_id'];
		    
			$fullname = $row['fullname'];
		  
		    $username = $row['username'];
			
			$userImage = $row['user_image'];
			
			   if($userImage == null){
				
				$userProfileImage = '<a><img src="icon/profile_image.jpg" /></a>';
				
			   }else{
				
				$userProfileImage = '<a><img src="'.$userImage.'" /></a>';
				
			   }
			   
			   echo '<div class="home-user-profile-image">
	 
	                     '.$userProfileImage.'
	   
	                   </div>
					   
					   <div class="home-user-profile-name">
	 
	                      <a><b>'.$fullname.'</b></a>
	   
	                      <a>'.$username.'</a>
	   
	                   </div>';
		  
		}

 }
	
   // fetch home post

   if(isset($_POST['action_home_post'])){
	  
	  $userId = $_SESSION['user_id'];
	  
	  echo '<div class="home-post-container">
				 
				     '.make_home_post($conn).'					  
			 
	             </div>';
				 
	  
		 
   }

	
	function make_home_post($conn){
		
	  $i = 0;
	  
	  $j = 0;
	  
	  $userId = $_SESSION['user_id'];
		
	  $sql = "SELECT * FROM `posts` INNER JOIN `user` ON posts.user_id = user.user_id
	  
              LEFT JOIN `user_follow` ON posts.user_id = user_follow.receiver_id
			  
			  WHERE user_follow.sender_id = '$userId' OR posts.user_id = '$userId'
	  
			  GROUP BY posts.post_id ORDER BY post_id DESC ";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		  if($i== 2){
			  
			  // after first two post display slide suggest user
			  
			 $output .= ' <div class="home-post-suggestion">
	 
	                    <div class="home-post-suggestion-heading">
						
	                         <div class="home-post-suggestion-heading-left">
						
	                          <a><b>Suggestion For You</b></a>
	                          
	                        </div> 
							
							<div class="home-post-suggestion-heading-right">
						
	                           <a><b>See All</b></a>
	                          
	                        </div> 
	                          
	                    </div> 
						
						<div class="home-post-suggestion-profile">
						
						    '.make_home_post_suggestion_users($conn).'
							 
	                    </div> 

	             </div>	';  
			  
		  }
		  
		   if($j== 3){
			  
			  // every 3 post display add
			  
			  $output .= '<div class="home-post-nav">
				 
				         <div class="home-post-nav-image">
	 
	                        <a><img src="icon/add.jpg" /></a>
	   
	                      </div>
					   
					      <div class="home-post-nav-name">
	 
	                         <a><b>Add</b></a>
	                 
	                      </div>
						  
						  <div class="home-post-nav-menu">
	 
	                         <a><img src="icon/menu.png" /></a>
	   
	                      </div>
						  
					  </div> 

                      <div class="home-post-display">
	 
	                     <a><img src="icon/add.jpg" /></a>
	   
	                  </div>

                      <div class="home-post-icon">
	 
	                       <div class="home-post-icon-icons">
	 
	                         <a><img src="icon/heart_outline.png" /></a>
	                         
							 <a><img src="icon/comment.png" /></a>
	                          
	                         <a><img src="icon/share.png" /></a>
	   
	                       </div>
						   
						   <div class="home-post-icon-dots">
	 
	                     
	                       </div>
						   
						   <div class="home-post-icon-bookmark">
	 
	                         <a><img src="icon/bookmark.png" /></a>
	   
	                       </div>
						  
	                  </div>

                      <div class="home-post-details">
	 
	                         <a><b>0 Likes</b></a>
	                         
							 <a><b>Username</b> description</a>
	                         
							 <a>View all 0 comments</a>
	                         
							 <a>comments</a>
	                         
							 <a>Time</a>
	   
	                  </div>

                      <div class="home-post-comments">
	 
	                        <div class="home-post-comments-input">
	 
	                          <input type="text" name="comments" placeholder="Add a comment.." />
							  
	                        </div> 
                            
                            <div class="home-post-comments-button">
	 
	                          <button>Post</button>
							  
	                        </div>	
							
	                  </div>'; 
			  
			  $j = 0;
			  
		  }
		  
		    $user_id = $row['user_id'];
		    
			$postId = $row['post_id'];
		    
			$postUrl = $row['post_url'];
		  
		    $postDesc = $row['desc'];
			
			$postDate = $row['date'];
		  
		    $postType = $row['type'];
			
			$userName = $row['username'];
			
			$userImage = $row['user_image'];
		  
		   if($postUrl == null){
				
			$post_url = '<a><img src="icon/post_image.png" /></a>';
				
		    }else{
				
			 $post_url = '<a><img src="'.$postUrl.'" /></a>';
				
		    } 
			
			if($userImage == null){
				
				$userPostImage = '<a><img src="icon/profile_image.jpg" /></a>';
				
			 }else{
				
				$userPostImage = '<a><img src="'.$userImage.'" /></a>';
				
		    }
			
			if($postType == 'single'){
				
				//single post
				
		     $output .= '<div class="home-post-nav">
				 
				         <div class="home-post-nav-image">
	 
	                        '.$userPostImage.'
							
	                      </div>
					   
					      <div class="home-post-nav-name">
	 
	                         <a><b>'.$userName.'</b></a>
	                 
	                      </div>
						  
						  <div class="home-post-nav-menu">
	 
	                         <a><img src="icon/menu.png" /></a>
	   
	                      </div>
						  
					  </div> 

                      <div class="home-post-display">
	 
	                       '.$post_url.'
	   
	                  </div>

                      <div class="home-post-icon">
	 
	                       <div class="home-post-icon-icons">
	 
	                         '.make_home_post_like($conn, $postId).'
	                         
							 <a><img src="icon/comment.png" /></a>
	                          
	                         <a><img src="icon/share.png" /></a>
	   
	                       </div>
						   
						   <div class="home-post-icon-dots">
	 
	                     
	                       </div>
						   
						   <div class="home-post-icon-bookmark">
	 
	                         <a><img src="icon/bookmark.png" /></a>
	   
	                       </div>
						  
	                  </div>

                      <div class="home-post-details">
	 
	                         <a><b>0 Likes</b></a>
	                         
							 <a><b>'.$userName.'</b> '.$postDesc.'</a>
	                         
							 <a>View all 0 comments</a>
	                         
							 <a>comments</a>
	                         
							 <a>Time</a>
	   
	                  </div>

                      <div class="home-post-comments">
	 
	                        <div class="home-post-comments-input">
	 
	                          <input type="text" name="comments" placeholder="Add a comment.." />
							  
	                        </div> 
                            
                            <div class="home-post-comments-button">
	 
	                          <button>Post</button>
							  
	                        </div>	
							
	                  </div>';
			 
			}else{
				
				//multiple post
				$output .= '<div class="home-post-nav">
				 
				         <div class="home-post-nav-image">
	 
	                       '.$userPostImage.'
							
	                      </div>
					   
					      <div class="home-post-nav-name">
	 
	                         <a><b>'.$userName.'</b></a>
	                 
	                      </div>
						  
						  <div class="home-post-nav-menu">
	 
	                         <a><img src="icon/menu.png" /></a>
	   
	                      </div>
						  
					  </div> 

                      <div class="home-post-display">
	 
	                       <div class="home-post-slide">
			  
                             '.make_multiple_home_post($conn, $user_id, $postDesc).'
					 
                            </div> 
	   
	                  </div>

                      <div class="home-post-icon">
	 
	                       <div class="home-post-icon-icons">
	 
	                        '.make_home_post_like($conn, $postId).'
	                         
							 <a><img src="icon/comment.png" /></a>
	                          
	                         <a><img src="icon/share.png" /></a>
	   
	                       </div>
						   
						   <div class="home-post-icon-dots">
	 
	                     
	                       </div>
						   
						   <div class="home-post-icon-bookmark">
	 
	                         <a><img src="icon/bookmark.png" /></a>
	   
	                       </div>
						  
	                  </div>

                      <div class="home-post-details">
	 
	                         <a><b>0 Likes</b></a>
	                         
							 <a><b>'.$userName.'</b> '.$postDesc.'</a>
	                         
							 <a>View all 0 comments</a>
	                         
							 <a>comments</a>
	                         
							 <a>Time</a>
	   
	                  </div>

                      <div class="home-post-comments">
	 
	                        <div class="home-post-comments-input">
	 
	                          <input type="text" name="comments" placeholder="Add a comment.." />
							  
	                        </div> 
                            
                            <div class="home-post-comments-button">
	 
	                          <button>Post</button>
							  
	                        </div>	
							
	                  </div>';

			}
			
			$i++;
			
            $j++;
	     }
		 
		 return $output;
	}
	
	
	function make_multiple_home_post($conn, $user_id, $postDesc){
		
	// select first Id
	
       $sql = "SELECT * FROM `multiple_post` WHERE `user_id`='$user_id' 
	   
	   AND `desc`='$postDesc' ORDER BY `post_id` ASC LIMIT 1";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		    $user_id = $row['user_id'];
			
			$firstId = $row['post_id'];
	  }
	  
	  // select last Id
	  
	   $sql = "SELECT * FROM `multiple_post` WHERE `user_id`='$user_id' 
	   
	   AND `desc`='$postDesc' ORDER BY `post_id` DESC LIMIT 1";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		    $user_id = $row['user_id'];
			
			$lastId = $row['post_id'];
	  }
	  
	  
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
			
			if($firstId == $postId){
				
			  $slidePrev ='<div class="home-post-prev" style="display:none" data-post_id="'.$postId.'">
			  
					         <a>&#10094</a>
						  
					        </div>';
			  
			}else{
				
			  $slidePrev ='<div class="home-post-prev" data-post_id="'.$postId.'">
			  
					          <a>&#10094</a>
						  
					        </div>';
			}
			
			if($lastId == $postId){
				
			  $slidNext ='<div class="home-post-next" style="display:none" data-post_id="'.$postId.'">
			  
					         <a>&#10095</a>
						  
					        </div>';
			  
			}else{
				
			  $slidNext ='<div class="home-post-next" data-post_id="'.$postId.'">
			  
					      <a>&#10095</a>
						  
					      </div>';
			}
		  
		  $output .= '<div class="home-post-slide-image" id="'.$postId.'">
			  
                     '.$post_url.'

					 '.$slidePrev.'
					 
					 '.$slidNext.'
					  
                    </div> ';
		  
	  }
	  
	  return  $output;
	  
  }
  
  
  function make_home_post_suggestion_users($conn){
	  
	  $userId = $_SESSION['user_id'];
	  
	  $sql = "SELECT * FROM `user` WHERE `user_id` !='$userId'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		    $user_id = $row['user_id'];
		    
			$fullname = $row['fullname'];
		  
		    $username = $row['username'];
			
			$userImage = $row['user_image'];
			
			   if($userImage == null){
				
				$userProfileImage = '<a><img src="icon/profile_image.jpg" /></a>';
				
			   }else{
				
				$userProfileImage = '<a><img src="'.$userImage.'" /></a>';
				
			   }
			  
	      $output .= '<div class="home-post-suggestion-user">
						        
								    <a>x</a>
								  
								 <div class="home-post-suggestion-user-image">
						       
								    '.$userProfileImage.'
								  
								  </div>
								  
	                              <div class="home-post-suggestion-user-name">
						       
	                                <a><b>'.$username.'</b></a>
								  
								  </div>
								  
								  <div class="home-post-suggestion-user-button">
								  
								   '.make_home_post_suggest_users($conn, $user_id).'
								   
	                              </div>
								  
	                         </div> '; 
	  }
	  
	  return $output;
  }

    // fetch home suggest users
	

  if(isset($_POST['action_home_suggestion_users'])){
	  
	  $userId = $_SESSION['user_id'];
	  
	  $sql = "SELECT * FROM `user` WHERE `user_id` !='$userId'
	  
	         ORDER BY `user_id` DESC LIMIT 4";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		    $user_id = $row['user_id'];
		    
			$fullname = $row['fullname'];
		  
		    $username = $row['username'];
			
			$userImage = $row['user_image'];
			
			   if($userImage == null){
				
				$userProfileImage = '<a><img src="icon/profile_image.jpg" /></a>';
				
			   }else{
				
				$userProfileImage = '<a><img src="'.$userImage.'" /></a>';
				
			   }
			
           echo ' <div class="home-suggestion-follow-users">
					  
                     <div class="home-suggestion-follow-image">
	 
	                        '.$userProfileImage.'
							
	                      </div>
					   
					      <div class="home-suggestion-follow-name">
	 
	                         <a><b>'.$fullname.'</b></a>
	                 
	                      </div>
						  
						  <div class="home-suggestion-follow-button">
	                         
							 '.make_home_follow_suggest_users($conn, $user_id).'
	                         
	                      </div>
						  
					 </div>';			
	  }
	  
  }
  
   function make_home_post_like($conn, $postId){
	  
	  $userId = $_SESSION['user_id'];
	  
	  $sql = "SELECT * FROM `post_like` WHERE `post_id` ='$postId' AND `user_id` ='$userId'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  if($row = mysqli_num_rows($result)>0){
		  
		$output .= '<a class="home-post-like" data-action="unlike" data-user_id="'.$userId.'" data-post_id="'.$postId.'"><img src="icon/red_heart.png" /></a>'; 
		
	  }else{
		  
		$output .= '<a class="home-post-like" data-action="like" data-user_id="'.$userId.'" data-post_id="'.$postId.'"><img src="icon/heart_outline.png" /></a>';    
	 
	  }
	  
	  return $output;
   }
   
   //insert like post
   
   if($_POST['action'] == 'like'){
	  
	  $userId = $_SESSION['user_id'];
	  
	  $postId = $_POST['post_id'];
	
	  $sql = "INSERT INTO `post_like`(`post_id`, `user_id`) VALUES ('$postId','$userId')";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  if($result){
		
		
	  }
	  
   }
   
    //delet like post
   
   if($_POST['action'] == 'unlike'){
	  
	  $userId = $_SESSION['user_id'];
	  
	  $postId = $_POST['post_id'];
	
	  $sql = "DELETE FROM `post_like` WHERE `post_id`='$postId' AND `user_id`='$userId'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  if($result){
		
		
	  }
	  
   }
   
   // suggestion follow and unfollow users
   
   function make_home_follow_suggest_users($conn, $reciever_id){
	  
	  $senderId = $_SESSION['user_id'];
	  
	  $sql = "SELECT * FROM `user_follow` WHERE `receiver_id` ='$reciever_id' AND `sender_id` ='$senderId'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  if($row = mysqli_num_rows($result)>0){
		  
		$output .= '<button class="home-suggest-follow" data-action="unfollow" style="background-color:white; color:black;" data-receiver_id="'.$reciever_id.'">Unfollow</button>'; 
		
	  }else{
		  
		$output .= '<button class="home-suggest-follow" data-action="follow" data-receiver_id="'.$reciever_id.'">Follow</button>'; 
		
	  }
	  
	  return $output;
   }
   
   // home post follow and unfollow users
   
   function make_home_post_suggest_users($conn, $reciever_id){
	  
	  $senderId = $_SESSION['user_id'];
	  
	  $sql = "SELECT * FROM `user_follow` WHERE `receiver_id` ='$reciever_id' AND `sender_id` ='$senderId'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  if($row = mysqli_num_rows($result)>0){
		  
		$output .= '<button class="home-suggest-follow" data-action="unfollow" style="background-color:white; color:black;" data-receiver_id="'.$reciever_id.'">Unfollow</button>'; 
		
	  }else{
		  
		$output .= '<button class="home-suggest-follow" data-action="follow" data-receiver_id="'.$reciever_id.'">Follow</button>'; 
		
	  }
	  
	  return $output;
   }
   
   //home suggest follow users
   
   if($_POST['action'] == 'follow'){
	  
	  $senderId = $_SESSION['user_id'];
	  
	  $recieveId = $_POST['recieve_id'];
	
	  $sql = "INSERT INTO `user_follow`(`receiver_id`, `sender_id`) VALUES ('$recieveId','$senderId')";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  if($result){
		
		
	  }
	  
   }
   
    //home suggest unfollow users
   
   if($_POST['action'] == 'unfollow'){
	  
	  $senderId = $_SESSION['user_id'];
	  
	  $recieveId = $_POST['recieve_id'];
	
	  $sql = "DELETE FROM `user_follow` WHERE `receiver_id`='$recieveId' AND `sender_id`='$senderId'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  if($result){
		
		
	  }
	  
   }
   
   
?>





