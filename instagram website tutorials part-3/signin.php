<?php

 error_reporting(0);
 
 include('connect.php');
 
 session_start();
 
 if(isset($_POST['submit'])){
	 
	 $email = $_POST['email'];
	 
	 $password = $_POST['password'];
	  
	 $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";
	 
	 $result = mysqli_query($conn , $sql);
	 
	 if($row = mysqli_num_rows($result) > 0){
		 
	    while($user_row = mysqli_fetch_assoc($result)){
				   
	       $_SESSION['user_id'] = $user_row['user_id'];  
	       
		   header('location:home.php');
	 
		   $message ="<h6>"."Login successfully"."</h6>";
		 
		}
		 
	 }else{
		 
		 if(empty($email)||empty($password)){
			 
			  $message ="<h6>"."All field are requierd"."</h6>";
		
		 }else{
			 
		        $message ="<h6>"."Email and Password doesn't match"."</h6>";
		 
	       
		 }
	 }
 }

?>

<!DOCTYPE html>
<html>
<head>

<title>Sign In Instagram</title>
 
<meta charset="utf-8">
  
<meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!----add jquery link----> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 <!---font awesome link ---->
 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<style>
*{
	margin:0;
	padding:0;
	box-sizing:border-box;
}
.signup-main-container{
	
	width:100%;
	height:100%;
}
.signup-container{
	
	width:100%;
	max-width:350px;
	margin:auto;
	background-color:white;
	margin-top:20px;
	border:1px solid #ccc;
}
.signup-icon-image{
	
	width:100%;
	max-width:200px;
	margin:auto;
}
.signup-icon-image img{
	
	width:100%;
	height:100%;
}
.signup-container p{
	
	margin-top:10px;
	text-align:center;
	font-size:18px;
	color:#aaa;
}
.signup-inside-container{
	
	padding:25px;
}
.signup-inside-container button{
	
	margin:8px;
	padding:8px;
	width:100%;
	border:none;
	background-color:#3897f0;
	color:white;
	border-radius:5px;

}
.signup-inside-container input[type=text], input[type=email], input[type=password]{
   
    margin:8px;
	padding:5px;
	width:100%;
	font-size:12px;
	border:none;
	background-color:#F0F0F0;
	border-radius:5px;
	border:1px solid #e9e9e9;
}
.signup-inside-container p{
	
	margin-top:10px;
	text-align:center;
	font-size:16px;
	color:#aaa;
}
.signup-inside-container h5{
	
	margin-top:10px;
	text-align:center;
	font-size:16px;
	color:#aaa;
}
.signup-bottom-container{
	
	width:100%;
	max-width:350px;
	margin:auto;
	background-color:white;
	margin-top:10px;
	border:1px solid #ccc;
	padding:20px;
}
.signup-bottom-container h4{
   
   text-align:center;
}
.signup-inside-container h6{
	
	text-align:center;
	color:red;
	font-size:18px;
}
</style>

</head>

<body>
 
 <div class="signup-main-container">
    
	<div class="signup-container">
 
         <div class="signup-icon-image">
 
            <img src="icon/instagram_name.png"/>
			
         </div>
		  
		 <form action="signin.php" method="post" >
		 
		 <div class="signup-inside-container">
		 
		      <?php echo $message; ?>
  
			 <input type="email" name="email" placeholder="Phone number, username or email"/>
			 
			 <input type="password" name="password" placeholder="Password" />
				
			 <button type="submit" name="submit">Log In</button>
			 
			  <h5>OR</h5>
			  
			 <button style="background-color:white; color:#3897f0;"><i class="fab fa-facebook-square"></i> Log in with facebook</button>
			 
			  <p>Forgot password?</p>
		 
		     
         </div>
		 
		 </form>
		 
    </div>
	
	 <div class="signup-bottom-container">
	 
	   <h4> Don't Have an account? <a href="signup.php" style="text-decoration:none;color:#3897f0;">Sign Up</a></h4>
	 
	 </div>
 
 </div>

<script>

</script>

</body>

</html>