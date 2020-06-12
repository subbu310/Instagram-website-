<?php
  
  error_reporting(0);
 
  include('connect.php');
 
  session_start();
  
   //fetch edit profile 
  
  if(isset($_POST['action_edit_profile'])){
	  
	  $userId = $_SESSION['user_id'];
	  
	  $sql = "SELECT * FROM `user` WHERE `user_id`='$userId'";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		    $user_id = $row['user_id'];
		    
			$fullname = $row['fullname'];
		  
		    $username = $row['username'];
		    
			$userImage = $row['user_image'];
			
			$email = $row['email'];
			
			$userImage = $row['user_image'];
			
			
			   if($userImage == null){
				
				$userProfileImage = '<a><img src="icon/profile_image.jpg" /></a>';
				
			   }else{
				
				$userProfileImage = '<a><img src="'.$userImage.'" /></a>';
				
			   }
		  
		    echo ' <div class="edit-profile-right-image">
		
                        <div class="edit-profile-image">
		
                            '.$userProfileImage.'
							
                        </div>
						
						<div class="edit-profile-name">
		
                             <div class="edit-profile-user-name">
		
                                 <a><b>'.$username.'</b></a>
								 
                             </div>
							 
							 <div class="edit-profile-change-photo">
		
                                 <a class="change-profile-photo"><b>Change Profile Photo</b></a>
								 
								 <input type="file" name="changephoto" id="profile_photo"/>
								 
                             </div>
							 
                        </div>
					   
                   </div>
				   
				    <div class="edit-profile-right-name">
		
                        <div class="edit-profile-name-name">
		
                            <a><b>Name</b></a>
								
                        </div>
						
						 <div class="edit-profile-name-input">
		
                             <input type="text" name="fullname" id="edit_fullname" placeholder="fullname" value="'.$fullname.'"/>
								 
                          </div>
					   
                    </div>
					
					<div class="edit-profile-right-name">
		
                        <div class="edit-profile-name-name">
		
                            <a><b>Username</b></a>
								
                        </div>
						
						 <div class="edit-profile-name-input">
		
                             <input type="text" name="username" id="edit_username" placeholder="username" value="'.$username.'"/>
								 
                          </div>
					   
                    </div>
					
					<div class="edit-profile-right-name">
		
                        <div class="edit-profile-name-name">
		
                            <a><b>Website</b></a>
								
                        </div>
						
						 <div class="edit-profile-name-input">
		
                             <input type="text" name="website" id="edit_website" placeholder="website"/>
								 
                          </div>
					   
                    </div>
					
					<div class="edit-profile-right-name">
		
                        <div class="edit-profile-name-name">
		
                            <a><b>Bio</b></a>
								
                        </div>
						
						 <div class="edit-profile-name-input">
		
                             <input type="text" name="bio" id="edit_bio" placeholder="bio"/>
								 
                          </div>
					   
                    </div>
					
					
					<div class="edit-profile-right-personal">
		
                        <div class="edit-profile-personal-name">
		
                           	
                        </div>
						
						 <div class="edit-profile-personal-input">
		
                             <div class="edit-profile-personal-info">
		
                              <a><b>Personal Information</b></a>
							  
							  <a>Provide your personal information, even if the account is used for a

							  business, a</a>
							  
							  <a>pet or something else. This wont be a part of your</a>
						      
							  <a>public profile.</a>
						 
                             </div>	
							 
                          </div>
					   
                    </div>
					
					<div class="edit-profile-right-name">
		
                        <div class="edit-profile-name-name">
		
                            <a><b>Email</b></a>
								
                        </div>
						
						 <div class="edit-profile-name-input">
		
                             <input type="text" name="email" id="edit_email" placeholder="email" value="'.$email.'"/>
								 
                          </div>
					   
                    </div>
					
					<div class="edit-profile-right-name">
		
                        <div class="edit-profile-name-name">
		
                            <a><b>Phone Number</b></a>
								
                        </div>
						
						 <div class="edit-profile-name-input">
		
                             <input type="text" name="phonenumber" id="edit_phonenumber" placeholder="phonenumber"/>
								 
                          </div>
					   
                    </div>
					
					<div class="edit-profile-right-name">
		
                        <div class="edit-profile-name-name">
		
                            <a><b>Gender</b></a>
								
                        </div>
						
						 <div class="edit-profile-name-input">
		
                             <input type="text" name="gender" id="edit_gender" placeholder="gender"/>
								 
                          </div>
					   
                    </div>
					
					<div class="edit-profile-right-name">
		
                        <div class="edit-profile-name-name">
		
                           	
                        </div>
						
						 <div class="edit-profile-name-input">
		
                             <button id="edit_submit" style="cursor:pointer;">Submit</button>
							 
                          </div>
					   
                    </div>';
			
	  }
  }
  
   //change edit profile photo
  
  if($_FILES['upload_photo']['name'] != ''){
	  
       $userId = $_SESSION['user_id'];
	   
	   $name = $_FILES['upload_photo']['name'];
	  
	   $target_file = "profile_photo/";
	   
	   $move_file = $target_file.basename($name);
	   
	   move_uploaded_file($_FILES['upload_photo']['tmp_name'], $move_file);
	   
	   //change localhost to network ip address
	   
	   $photo_url = "http://192.168.225.217/instagram_tutorials/profile_photo/".$name;
	   
	   $sql = "UPDATE `user` SET `user_image`='$photo_url' WHERE `user_id`='$userId'";
	   
	   $result = mysqli_query($conn, $sql);
	   
	   if($result){
		   
		 echo 'Insert profile photo success';
		 
	   }
	  
  }  
	  
 //update edit profile



   if(isset($_POST['action_edit_profile_update'])){
	  
	  $userId = $_SESSION['user_id'];
	  
	  $fullname = $_POST['fullname'];
	  
	  $username = $_POST['username'];
	
	  $website = $_POST['website'];
	
	  $bio = $_POST['bio'];
	
	  $email = $_POST['email'];
	
	  $phonenumber = $_POST['phonenumber'];
	
	  $gender = $_POST['gender'];
	
	
      $sql = "UPDATE `user` SET `fullname`='$fullname', `username`='$username', `website`='$website', 

	          `bio`='$bio', `email`='$email', `phonenumber`='$phonenumber', `gender`='$gender' WHERE `user_id`='$userId'";
	   
	  $result = mysqli_query($conn, $sql);
	   
	  if($result){
		   
		 echo 'update success';
		 
	   }
   }	
	  
	  
	  
	  
	  
	  
  
  ?>
		