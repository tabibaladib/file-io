<!DOCTYPE html>
<html>
<head>
	<title>Form Submission</title>
</head>
<body>
	<h1>Form Submission</h1>

	<?php
    define("filepath", "user.json");

    $fname = $lname = $gender = $dob = $religion = $email = $username = $password = $phone = $pra = $pa = $pw = "";

	$fnameErr = $lnameErr = $genderErr = $dobErr = $religionErr = $emailErr = $usernameErr = $passwordErr = "";

	$successMessage = $errMessage ="";
	$flag = false;
	
	   if($_SERVER['REQUEST_METHOD'] === "POST") 
	   	{ 
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $gender = $_POST['gender'];
          $dob = $_POST['dob'];
          $religion = $_POST['religion'];
          $pra = $_POST['pra'];
          $pa = $_POST['pa'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];
          $pw = $_POST['pw'];
          $username = $_POST['username'];
          $password = $_POST['password'];
           
	   	  if(empty($_POST['fname']))
	      {
            $fnameErr = "First Name can not be empty!";
            $flag = true;
	      }

	      if(empty($_POST['lname']))
	      {
            $lnameErr = "Last Name can not be empty!";
            $flag = true;
	      }

	      if(empty($_POST['gender']))
	      {
            $genderErr = "Gender can not be empty!";
            $flag = true;
	      }

          if(empty($_POST['dob']))
	      {
            $dobErr = "Date of Birth can not be empty!";
            $flag = true;
	      }

	      if(empty($_POST['religion']))
	      {
            $religionErr = "Religion can not be empty!";
            $flag = true;
	      }

	      if(empty($_POST['email']))
	      {
            $emailErr = "Email can not be empty!";
            $flag = true;
	      }

	      if(empty($_POST['username']))
	      {
            $usernameErr = "Username can not be empty!";
            $flag = true;
	      }

	      if(empty($_POST['password']))
	      {
            $passwordErr = "Password can not be empty!";
            $flag = true;
	      }

	      if(!$flag)
	      {
	      	
	      	$fname = test_input($fname);
	      	$lname = test_input($lname);
	      	$gender = test_input($gender);
	      	$dob = test_input($dob);
	      	$religion = test_input($religion);
	      	$pra = test_input($pra);
	      	$pa = test_input($pa);
	      	$phone = test_input($phone);
	      	$email = test_input($email);
	      	$pw = test_input($pw);
	      	$username = test_input($username);
	      	$password = test_input($password);



	      	$data = array("First_Name"=>$fname, "Last_Name"=>$lname, "Gender"=>$gender, "Date_of_Birth"=>$dob, "Religion"=>$religion, "Present_Address"=>$pra, "Permanent_Address"=>$pa, "Phone"=>$phone, "Email"=>$email, "Personal_Website"=>$pw, "Username"=>$username, "Password"=>$password);
	      	$data_encode = json_encode($data);
	      	$result1 = write($data_encode);
            if($result1)
            {
               $successMessage = "User Registered Successfully!";
            }


            
	      }

	      else
	      {
	      	$errMessage = "Error while saving!";
	      }

	    }

     function write($content)
     {
           $resource = fopen(filepath, "a");
           $fw = fwrite($resource, $content."\n");
           fclose($resource);
           return$fw;
     }
	     
     function test_input($data)
     {
     	$data = trim($data);
     	$data = stripslashes($data);
     	$data = htmlspecialchars($data);
     		return $data;
     }

     $fo1 = fopen("data.txt","r");
     //$fr1 = fread($fo1, filesize("data.txt")); 
     //echo $fr1;
     fclose($fo1);
	    
 
	?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
	   <fieldset>	
	   <legend> Basic Information:</h3> </legend>
	   <label for="fname">First name: </label> 
	   <input type="text" id="fname" name="fname" value="<?php //echo $fname;?>">
	   <span style="color: red;"><?php echo $fnameErr; ?></span>
	   <br><br>

	   <label for="lname">Last name: </label> 
	   <input type="text" id="lname" name="lname" value="<?php //echo $lname;?>">
	   <span style="color: red;"><?php echo $lnameErr; ?></span>
	   <br> <br>

	   <label for="gender">Gender: </label>
	   <input type="radio" id="male" name="gender" value="male">
	   <label for="male">Male</label>
	   <input type="radio" id="female" name="gender" value="female">
	   <label for="male">Female</label>
	   <span style="color: red;"><?php echo $genderErr; ?></span>
	   <br><br>

	   <label for="dob">DOB:</label>
       <input type="date" id="dob" name="dob">
       <span style="color: red;"><?php echo $dobErr; ?></span>
	   <br><br>

	   <label for="religion">Religion: </label>
	   <select name = "religion" id="religion">
	  	<option value = "islam">Islam</option>
	  	<option value = "hindu">Hindu</option>
	  	<option value = "buddhism">Buddhism</option>
	  	<option value = "christianity">Christianity</option>
	  	<option value = "other">Other</option>
	   <span style="color: red;"><?php echo $religionErr; ?></span>
	   </select>

	   </fieldset>

       <br>
       <fieldset>
	   <legend> Contact Information:</legend>
	   <label for="pra">Present Address: </label> 
	   <input type="textarea" id="pra" name="pra">
	   <br> <br>

	   <label for="pa">Permanent Address: </label> 
	   <input type="textarea" id="pa" name="pa">
	   <br> <br>

	   <label for="phone">Phone: </label>
	   <input type="tel" id="phone" name="phone">
	   <br> <br>

	   <label for="email">Email: </label>
	   <input type="email" id="email" name="email">
	   <span style="color: red;"><?php echo $emailErr; ?></span>
	   <br> <br>

	   <label for="pw">Personal Website: </label> 
	   <input type="url" id="pw" name="pw">
	   <br>

	   </fieldset>
	   <br>
       <fieldset>
	   <legend> Account Information:</legend>
	   <label for="username">Username: </label> 
	   <input type="text" id="username" name="username">
	   <span style="color: red;"><?php echo $usernameErr; ?></span>
	   <br> <br>

	   <label for="password">Password: </label> 
	   <input type="password" id="password" name="password">
	   <span style="color: red;"><?php echo $passwordErr; ?></span>
	   <br>

	   </fieldset>
	   <br> 
	   <input class="submit" type="submit" value="Register">
	   <span style="color: green;"><?php echo $successMessage; ?></span>
       <span style="color: red;"><?php echo $errMessage; ?></span>

	     
</form>




</body>	
</html>
