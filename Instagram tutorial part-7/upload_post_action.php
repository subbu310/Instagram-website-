<?php
  
  error_reporting(0);
 
  include('connect.php');
 
  session_start();
 
  if($_FILES['upload_post']['name'] != ''){
	  
	 if(count($_FILES['upload_post']['name'])> 1){
		 
		 //multiple
		 
		 $userId = $_SESSION['user_id'];
	         
		 $desc = $_POST['post_desc'];
	   
		 
		 $sql = "INSERT INTO `posts`(`user_id`,  `desc`, `type`) VALUES ('$userId', '$desc','multiple')";
			 
		 $result = mysqli_query($conn, $sql);
	   
	      if($result){
				 
		   
		   }
			 
		 for($i=0; $i<count($_FILES['upload_post']['name']); $i++){
			 
			 $userId = $_SESSION['user_id'];
	         
			 $desc = $_POST['post_desc'];
	   
			 $name = $_FILES['upload_post']['name'][$i];
			 
			 $tmp_name = $_FILES['upload_post']['tmp_name'][$i];
			 
			 $target = "posts/".$name;
			 
			 move_uploaded_file($tmp_name, $target);
			 
			 $post_url = "http://localhost/instagram_tutorials/".$target;
			 
		     $sql_multi = "INSERT INTO `multiple_post`(`user_id`, `post_url`, `desc`) VALUES ('$userId','$post_url','$desc')";
			 
			  $result_multi = mysqli_query($conn, $sql_multi);
	   
	            if($result_multi){
		   
		           echo 'Insert posts success';
		 
	             }
				 
			
		 }
		 
		 
	 }else{
		 
		 //single
		 
		 for($i=0; $i<count($_FILES['upload_post']['name']); $i++){
			 
			$userId = $_SESSION['user_id'];
			
			$desc = $_POST['post_desc'];
			 
			$name = $_FILES['upload_post']['name'][$i];
			 
			$tmp_name = $_FILES['upload_post']['tmp_name'][$i];
			 
			 $target = "posts/".$name;
			 
			 move_uploaded_file($tmp_name, $target);
			 
			 $post_url = "http://localhost/instagram_tutorials/".$target;
			
			 $sql_multi = "INSERT INTO `posts`(`user_id`, `post_url`, `desc`,`type`) VALUES ('$userId','$post_url','$desc','single')";
			 
			 $result_multi = mysqli_query($conn, $sql_multi);
	   
	         if($result_multi){
		   
		           echo 'Insert posts success';
		 
	          }
		 }
		 
	 }
	
	}
	
?>
	