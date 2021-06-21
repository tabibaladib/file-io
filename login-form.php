<?php
    define("filepath", "user.json");

    $username = $password = "";
    $isValid = true;
    $usernameErr = $passwordErr = "";
	
	   if($_SERVER['REQUEST_METHOD'] === "POST") 
	   	{ 
          $username = $_POST['username'];
          $password = $_POST['password'];
          $isValid = true;
          

	      if(empty($username))
	      {
            $usernameErr = "Username can not be empty!";
            $isValid = false;
	      }

	      if(empty($password))
	      {
            $passwordErr = "Password can not be empty!";
            $isValid = false;
	      }

	      if($isValid)
	      {

           $user_data = read();
           $user_data_array = explode("\n", $user_data);
           $found = false;
           for($i = 0; $i < count($user_data_array) - 1; $i++)
           {
           	  $user_data_array_decode = json_decode($user_data_array[$i]);
              if($username === $user_data_array_decode->Username && $password === $user_data_array_decode->Password)
              {
              	$found = true;
              	break;
              }
           }

           if($found)
           {
           	header("Location: homepage.php");
           }

           else
           {
           	echo '<span style="color:red;">Log In failed! Invalid username or password!</span>';
           }

            
	      }

	    }

	    function read()
	      {
	      	$resource = fopen(filepath, "r");
	      	$fz = filesize(filepath);
	      	$fr = "";
	      	if($fz > 0)
	      	{
	      		$fr = fread($resource, $fz);
	      	}
	      	fclose($resource);
	      	return $fr;
	      }

	    
 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log In Form</title>
</head>
<body>
	<h1>Log In Form</h1>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
	   

	   </fieldset>
	   <br>
       <fieldset>
	   <legend>Log In form:</legend>
	   <label for="username">Username: </label> 
	   <input type="text" id="username" name="username">
	   <span style="color: red;"><?php echo $usernameErr; ?></span>
	   <br> <br>

	   <label for="password">Password: </label> 
	   <input type="password" id="password" name="password">
	   <span style="color: red;"><?php echo $passwordErr; ?></span>
	   <br>
       <br>

	   <input class="submit" type="submit" value="Log In">
	  

	     
</form>

</body>
</html>