<?php

	/*
	$to = "sanjeev_ritam@yahoo.co.in";
	$subject = "New sell request has arrived";
	$txt = "Dear Team, New sell request has arrived from customer please attend the request. Thanks, Web Master";
	

try
{

	if (mail($to,$subject,$txt))
		echo "Mail sent";
	else
		echo "Mail could not be sent ";
		print_r (error_get_last());
		
}
catch(Exception $e) {
	echo "Falied ".$e->getMessage();
}
	exit();
	
	*/
	
include 'connection\connection.php';

echo "<style>H1 {color:white;}</style><center><BR><BR><H1>Request To Sell A Car</H1></center>";
//echo $_FILES["carimages1"]["path"];
//echo "<BR>";
$Image1WithoutSpaces = str_replace(" ","_",$_FILES["carimages1"]["name"]);
$Image2WithoutSpaces = str_replace(" ","_",$_FILES["carimages2"]["name"]);

move_uploaded_file($_FILES["carimages1"]["tmp_name"], 'uploadedimages/'.$Image1WithoutSpaces);
move_uploaded_file($_FILES["carimages2"]["tmp_name"], 'uploadedimages/'.$Image2WithoutSpaces);

$sql = "INSERT INTO sell_request
			(Name, 
			MobileNo, 
			Email,
			Address,
			Model,
			CarAge,
			Image1,
			Image2) 
		VALUES 
			('".$_POST["name"]."', 
			'".$_POST["mobile"]."', 
			'".$_POST["email"]."', 
			'".$_POST["address"]."', 
			'".$_POST["carmodel"]."', 
			'".$_POST["carage"]."', 
			'".$Image1WithoutSpaces."','"			
			.$Image2WithoutSpaces."')";
//echo $sql;
		
if (mysqli_query($conn, $sql)) {
	echo '<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>REGISTER SELL REQUEST</title>
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

	  </style>
	  </head>
	  ';

     echo "<body><div class='form-container'><form><BR><BR><H2>Dear ".$_POST["name"].", <BR>Your request to sell your car has been registered successfully. <BR> Our representative will contact you soon for further details.</H2>
	 <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
	 ";
	 echo "<BR><center><a href='sell.php'><H4>Go Back</H4></a></center> </form></div></body></html>";
	 
	
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	 
}
//mysqli_close($conn);
?>