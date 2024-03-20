<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Customer Sign-up</title>
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
		isset($_POST["confirmpassword"]) )
	{
		
	$User_Id = 0;
	$sql = "SELECT *		
			
		FROM 
			users
		WHERE 
		userid = '".$_POST["userid"]."'";	
		
		//echo $sql;
		
		//Begin transaction
		$conn->begin_transaction();
		$result = $conn->query($sql);		
	
		if ($result) 
		{
			$Row_Count = mysqli_num_rows($result);
			if ($Row_Count > 0)
			{
				 echo "<center><BR><BR><H2><p> <font color=red>This User Id already exists,<BR>Please try with another user Id.</font></p></H2></center>";	
				
				 
			}
			else if ($Row_Count == 0) 
			{
				//Insert new user
				$sql = "INSERT INTO users
							(Name, 
							UserId, 
							Password,							
							UserType) 
						VALUES 
							('".$_POST["name"]."', 
							'".$_POST["userid"]."', 
							'".$_POST["password"]."', 
							0)";

		
				if (mysqli_query($conn, $sql)) 
				{
					$LastInsertId = mysqli_insert_id($conn);
					$OrderId = date("Ymd-His");
					$OrderId = $OrderId."01";
					$sql1 = "INSERT INTO `orders` (`OrderId`, `UserId`, `Item`, `OrderDate`, `OrderStatus`, `BaseAmount`, `GSTAmount`, `TotalAmount`, `ExecutiveName`, `Image`) VALUES ('".$OrderId."',".$LastInsertId.", 'BENTLY TOURER 4 WHEEL DRIVE 5000cc Petrol 5 SEATER OFF ROADER', current_timestamp(), 0, 36000, 3600, 39600, 'Thomas Mathews', 'BENTLYTOURER.png')";
					
					if (mysqli_query($conn, $sql1)) 
					{
						$OrderId = date("Ymd-His");
						$OrderId = $OrderId."02";
						$sql2 = "INSERT INTO `orders` (`OrderId`, `UserId`, `Item`, `OrderDate`, `OrderStatus`, `BaseAmount`, `GSTAmount`, `TotalAmount`, `ExecutiveName`, `Image`) VALUES ('".$OrderId."',".$LastInsertId.", 'CADILAC 62 COUPE 4 WHEEL DRIVE 4000cc Petrol 5 SEATER LUXURY CAR for SMOOTH DRIVE', current_timestamp(), 0, 38000, 3800, 41800, 'Lily Mohan', 'CADILLAC62COUPE.png')";
						
						if (mysqli_query($conn, $sql2)) 
						{
							$conn->commit();
							echo "<center><BR><BR><BR><BR><BR><BR><H2><p> <font color=lightgreen>New customer registered successfully.<font></p></H2></center>";
							echo "<BR><BR><center><a href='Login.php'><H4>Go back to Sign In</H4></a></center> ";
							exit();
						}
						else
						{
							$conn->rollback();
							echo "<center><BR><BR><BR><BR><BR><BR><H2><p> <font color=red>New customer could not be registered successfully.<font></p></H2></center>";
							echo "Error: " . mysqli_error($conn);
							exit();
						}
					}
					else
						{
							$conn->rollback();
							echo "<center><BR><BR><BR><BR><BR><BR><H2><p> <font color=red>New customer could not be registered successfully.<font></p></H2></center>";
							echo "Error: " . mysqli_error($conn);
							exit();
						}
				}
				else
				{
					$conn->rollback();
					echo "<center><BR><BR><BR><BR><BR><BR><H2><p> <font color=red>New customer could not be registered successfully.<font></p></H2></center>";
					echo "Error: " . mysqli_error($conn);
					exit();
				}	  
			}
			else
			{
				$conn->rollback();
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
	
  ?>
  <body>
  
    <div class="form-container">
      <form method = "post" id="signupform" name="signupform">
	  <H3><center>Register as New customer</H3></Center><BR>
        <label for="User Id">User Id:</label>
        <input type="text" id="userid" name="userid" required placeholder="User Id">
		<label for="Name">Name:</label>
        <input type="text" id="name" name="name" required placeholder="Name">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Password" >
		
		<label for="confirmpassword">Confirm Password:</label>
        <input type="password" id="confirmpassword" name="confirmpassword" required placeholder="Confirm Password" >
		
		
		<BR>
		<BR>
        <center><button type="button" id="register" name="register" onclick="OnRegister();">Register</button></center>
		
      </form>
    </div>

	<script>
	function OnRegister()
	{
		//alert("In register");
		if (document.getElementById("password").value !== document.getElementById("confirmpassword").value)
		{
			alert("Password and Confirm Password does not match.");
			return;
		}
		document.getElementById("signupform").submit();
	}
	</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
