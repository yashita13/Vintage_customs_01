<?php

include 'connection\connection.php';

echo "<center><BR><BR><H1><U>Sell Requests From Customers</U></H1></center>";


$sql = "SELECT 
			Name, 
			MobileNo, 
			Email,
			Address,
			Model,
			CarAge,
			Image1,
			Image2,
			DATE_FORMAT(CreatedDateTime, '%d-%m-%Y %H:%i:%s') AS CreatedDateTime
		FROM 
			sell_request
		ORDER BY 
		Id ASC";
		
		//echo $sql;
		$result = $conn->query($sql);

		
if ($result) {
	$Row_Count = mysqli_num_rows($result);
	if ($Row_Count == 0)
	{
		 echo "<center><BR><BR><H2>No data found.</H2></center>";
		 echo "<center><a href='view_sell_request.php'>Refresh</a></center>";
		 exit();
	}
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	 
}
//mysqli_close($conn);
?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>View Sell Requests</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
        
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
				<th>S.No.</th>
                <th>Name</th>
                <th>Mobile No</th>
                <th>E-Mail</th>
                <th>Address</th>
				<th>Car Model</th>
                <th nowrap>Car Age</BR>(In Years)</th>
                <th>Image 1</th>
                <th>Image 2</th>
				<th>Created Date</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php 
                // LOOP TILL END OF DATA
				$SerialNo = 1;
                while($rows=$result->fetch_assoc())
					
                {
					$Image1 = "http://localhost:88/vintagecustoms/uploadedimages/".$rows['Image1'];
					$Image2 = "http://localhost:88/vintagecustoms/uploadedimages/".$rows['Image2'];
					//echo $Image1; echo "<BR>";
					//echo $Image2;echo "<BR>";
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
				<td><?php echo $SerialNo;?></td>
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['MobileNo'];?></td>
                <td><?php echo $rows['Email'];?></td>
				<td><?php echo $rows['Address'];?></td>
                <td><?php echo $rows['Model'];?></td>
				<td><?php echo $rows['CarAge'];?></td>                
                <td><img height=100px width=100px src=<?php echo $Image1;?>></td>
                <td><img height=100px width=100px src=<?php echo $Image2;?>></td>
				<td><?php echo $rows['CreatedDateTime']?></td>
            </tr>
            <?php
               $SerialNo = $SerialNo + 1; }
            ?>
        </table>
    </section>
</body>
 
</html>