<!DOCTYPE html>

<html lang="en">
  <head>
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

      .form-container input[type="text"],
      .form-container input[type="tel"],
      .form-container input[type="file"] {
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
  <body>
  
    <div class="form-container">
      <form method = "post" action="post_sell_request.php" enctype="multipart/form-data">
	  <H3><center>Enter your details to sell your car to <BR>Vintage </H3></Center>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required placeholder="Full Name">

        <label for="mobile">Mobile No:</label>
        <input type="tel" id="mobile" name="mobile" required placeholder="Mobile No to contact" maxlength=10>
		
		<label for="email">Email Id:</label>
        <input type="text" id="email" name="email" required placeholder="Valid Email Id">
		
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required placeholder="Address for correspondence">

        <label for="car-model">Car Model:</label>
        <input type="text" id="carmodel" name="carmodel" required placeholder="Car make and model">

        <label for="car-age">Age of the Car (in years):</label><BR>
        <input type="number" id="carage" name="carage" required placeholder="How old your car is">
        <br>
        <br>
       <b>Upload only 2 Images of Your Car:</b>
        <input type="file" id="carimages1" name="carimages1" accept="image/*" required>
		<input type="file" id="carimages2" name="carimages2" accept="image/*" required>
        <center><button type="submit" >Submit</button></center>
      </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
