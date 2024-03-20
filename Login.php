<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Customer Login</title>
    <style>
      body {
        background-image: url("img2/bck1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
      }

      .form-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(231, 229, 229, 0.662);
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }

      .form-container input[type="text"],
      .form-container input[type="tel"],
      .form-container input[type="file"],
      .form-container input[type="password"]	  {
        width: 100%;
        padding: 5px;
        margin-bottom: 2px;
        border: none;
        border-radius: 3px;
      }

      .form-container button[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 10px;
        border-radius: 3px;
        cursor: pointer;
      }

      .form-container button[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
  </head>
  <?php
  include 'connection\connection.php';
  if ( isset($_POST["userid"]) &&
		isset($_POST["password"]) && 
		isset($_POST["login"]))
	{
		
	$User_Id = 0;
	$sql = "SELECT *		
			
		FROM 
			users
		WHERE 
		userid = '".$_POST["userid"]."'
		AND password = '".$_POST["password"]."'";
		
		
		//echo $sql;
		$result = $conn->query($sql);

		
	
		if ($result) 
		{
		$Row_Count = mysqli_num_rows($result);
		if ($Row_Count == 0)
		{
			 echo "<center><BR><BR><H2><p> <font color=red>User credentials are invalid, Please try again!!!</font></p></H2></center>";	 
			 
		}
		else if ($Row_Count > 0) 
		{
			$rows=$result->fetch_assoc();
			$User_Id = $rows["Id"];
			if ($rows["UserType"] == -1)
			{
				header("Location: view_sell_request.php"); 
				//exit();
			}	
			else
			{
				header("Location: myorders.php?Id=".$User_Id."&Nm=".$rows["Name"] ); 
				//exit();
			}
		  
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}

  ?>
  <body>
  
    <div class="form-container">
      <form method = "post">
	  <H3><center>Enter Login Credential to login to<BR>Vintage Customs </H3></Center><BR>
        <label for="User Id">User Id:</label>
        <input type="text" id="userid" name="userid" required placeholder="User Id">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Password" >
		
		<input type="hidden" id="user_Id" name="user_Id" value="<?php echo $User_Id;?>">
		<BR>
		<BR>
        <center><button type="submit" id="login" name="login" >Login</button></center>
		<BR>		
		<label >New User?  </label><a href="signup.php?">&nbsp;&nbsp;Sign Up</a>
      </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
