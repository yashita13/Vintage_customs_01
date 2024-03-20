<?php

include 'connection\connection.php';

$Nm = "";
$Id = "0";

if (!isset($_GET['Id'])) 
{
	echo "Please provide input parameters.";
	exit();
	
}
if ($_GET["Nm"] != "")
{
	echo "<H4>Welcome<BR>".$_GET["Nm"]."</H4>";
	$Nm = $_GET["Nm"];
}
echo "<center><H1><U>My Orders</U></H1></center>";


if ($_GET["Id"] != null)
{
	$Id = $_GET["Id"];
}

$sql = "SELECT 
			OrderId, 
			Item, 
			OrderStatus,
			BaseAmount,
			GSTAmount,
			TotalAmount,
			ExecutiveName,
			DATE_FORMAT(OrderDate, '%d-%m-%Y') AS 	OrderDate,
			Image
		FROM 
			orders
		WHERE UserId = ".$Id." 
		ORDER BY 
		Id ASC";
		
		//echo $sql;
		$result = $conn->query($sql);

		
if ($result) {
	$Row_Count = mysqli_num_rows($result);
	if ($Row_Count == 0)
	{
		 echo "<center><BR><BR><H2>No orders found. <BR>You haven't placed any order yet.</H2></center>";
		 echo "<center><a href='myorders.php?Id='.$Id.'&Nm='.$Nm'>Refresh</a></center>";
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
    <title>My Orders</title>
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
		
		
		
		<?php 
                // LOOP TILL END OF DATA
				$SerialNo = 1;
                while($rows=$result->fetch_assoc())
					
                {
					$Image = "http://localhost/vintagecustoms/img2/".$rows['Image'];
					
            ?>
		<table>
			<table width="80%">			
            <tr>
				<td width="20%">S.No.:<BR><?php echo $SerialNo;?></td>
                <td width="20%">Order Id: <BR><?php echo $rows['OrderId'];?></td>
                <td width="20%" nowrap>Order Date: <BR><?php echo $rows['OrderDate'];?></td>
				<th width="40%" rowspan="4"><img height=300px width=400px src=<?php echo $Image;?>></th>					
            </tr>
			<tr>
				<th colspan="3">Item: <BR><?php echo $rows['Item'];?></th>                				
            </tr>
			<tr>
				<th>Base Amount: <BR><?php echo $rows['BaseAmount'];?></th>
				<th>Tax Amount: <BR><?php echo $rows['GSTAmount'];?></th>
                <th >Total Amount: <BR><?php echo $rows['TotalAmount'];?></th>             				
            </tr>
			<tr>
				<th colspan="2">Executive Name: <BR><?php echo $rows['ExecutiveName'];?></th>
                <th >Order Status: <BR><?php if ($rows['OrderStatus'] == 0) echo "Order Placed"; else if ($rows['OrderStatus'] == 1) echo "In Process"; else echo "Delivered";?></th>    
							
            </tr>
			
			<tr>
			</tr>
			<BR>
			<?php
               $SerialNo = $SerialNo + 1; }
            ?>
		</table>
    </section>
</body>
 
</html>