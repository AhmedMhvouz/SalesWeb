<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Rigesteration Form</title>
    <link rel="stylesheet" type="text/css" href="style1.css"> 
	
</head>
<body style="background: #128184 ">

    <div class="header">
		<h2> Register</h2>
	</div>

    <form method="post" action="Register.php">
        
         <div class="input">
        <label>Full_Name</label>
			<input type="text" name="name"  value="<?php echo $name?>">
            </div>
        <div class="input">
        <label>User_Name</label>
			<input type="text" name="username"  value="<?php echo $username?>">
            </div>
		 <div class="input">
			<label>E_Mail</label>
			<input type="email" name="email"  value="<?php echo $email?>">
        </div>
              <div class="input">
        <label>Password</label>
			<input type="password" name="password_1"  value="<?php echo $password?>">
      </div>
                   <div class="input">
		<label>Re_Password</label>
			<input type="password" name="password_2" >
        </div>
        <div>
        <button type="submit"class="btn" name="reg_user">Register</button>
		</div>
		<p>
			   Have Acount?<a href="login.php">Login</a>
		</p>
	</form>
</body>
</html>
<?php 

if (isset($_POST['reg_user'])) {
    
    // receive all input values from the form
            $name = mysqli_real_escape_string($db, $_POST['name']);
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
            $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
            
          
            //check empty stack
            if(empty($name)){ array_push($errors, "Fullname is requiered");}
             if(empty($username)){ array_push($errors, "Username is required");}
              if(empty($email)){ array_push($errors, "Email is required");}
               if(empty($password_1)){ array_push($errors, "Passwoed is required");}
    
               
            if ($password_1 != $password_2) {
                 array_push($errors, "Password not match");
            }
    
             if (count($errors) == 0){
            
    
            $password=md5($password_1);
            $query="insert into user(name,username,email,password)Values('$name','$username','$email','$password')";
            mysqli_query($db,$query);
            
            $_SESSION['username'] = $username;
                $_SESSION['success'] = "Register Successfull";
                header('location: home.php');
    }
    }

?>