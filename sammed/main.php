<!DOCTYPE html>
<html>
<head>
	<title>Customer Bookings</title>
	<style>
		header {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: rgb(100,200,50);
			color: #fff;
			padding: 20px;
		}

		.logo img {
			height: 100px;
			width: 100px;
			margin-right: 10px;
		}

		.name h1 {
			font-size: 100px;
			margin: 0;
		}		
		body {
			background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
			background-size: 400% 400%;
			animation: gradient 15s ease infinite;
			height: 100vh;
			}
			
			@keyframes gradient {
			0% {
			background-position: 0% 50%;
			}
			
			50% {
			background-position: 100% 50%;
			}
			
			100% {
			background-position: 0% 50%;
			}
		}

		h1, h2 {
			text-align: center;
			margin-top: 50px;
			margin-bottom: 30px;
		}

		form {
			width: 500px;
			margin: 0 auto;
			padding: 20px;
			background-color: #FFF;
			border-radius: 5px;
			box-shadow: 0px 0px 5px #999;
		}

		label {
			display: inline-block;
			width: 150px;
			margin-bottom: 10px;
		}

		input[type=text],
		input[type=email],
		input[type=date],
		input[type=time] {
			width: 250px;
			padding: 10px;
			border-radius: 3px;
			border: 1px solid #CCC;
			box-sizing: border-box;
			margin-bottom: 20px;
			font-size: 16px;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: #FFF;
			border: none;
			border-radius: 3px;
			padding: 10px 20px;
			font-size: 16px;
			cursor: pointer;
		}

		input[type=submit]:hover {
			background-color: #3e8e41;
		}

		a {
			display: block;
			text-align: center;
			margin-top: 30px;
			font-size: 18px;
			color: #4CAF50;
		}

		a:hover {
			text-decoration: underline;
		}
		a.button {
			display: inline-block;
			background-color: red;
			border: none;
			color: white;
			padding: 15px 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.3s ease;
			margin-left :700px;
			}

			a.button:hover {
			background-color: #3e8e41;
		}
		#one{
			background-color:white;
		}

	</style>
</head>
<body>
	<header>
	<div class="logo">
		<img src="logo.jpg" alt="Logo">
	</div>
	<div class="name">
		<h1><i>Droame Registration</i></h1>
	</div>
	</header>
	<h1>Customer Bookings</h1>

	<!-- Insert form -->
	<h2>insert data for registration</h2>
	<form method="post" action="">
		<input type="submit" value="" id="one">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name"><br>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email"><br>

		<label for="phone">Phone:</label>
		<input type="text" name="phone" id="phone"><br>

		<label for="booking_date">Booking Date:</label>
		<input type="date" name="booking_date" id="booking_date"><br>

		<label for="booking_time">Booking Time:</label>
		<input type="time" name="booking_time" id="booking_time"><br>

		<label for="dsn">DSN:</label>
		<input type="text" name="dsn" id="dsn"><br>

		<input type="submit" name="insert" value="Insert">
	</form>

	<!-- Delete form -->
	<h2>Delete data</h2>
	<form method="post" action="">
		<label for="id">ID:</label>
		<input type="text" name="id" id="id"><br>

		<input type="submit" name="delete" value="Delete">
	</form>

	<!-- Update form -->
	<h2>Update data </h2>
	<form method="post" action="">
		<label for="id">ID:</label>
		<input type="text" name="id" id="id"><br>

		<label for="name">Name:</label>
		<input type="text" name="name" id="name"><br>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email"><br>

		<label for="phone">Phone:</label>
		<input type="text" name="phone" id="phone"><br>

		<label for="booking_date">Booking Date:</label>
		<input type="date" name="booking_date" id="booking_date"><br>

		<label for="booking_time">Booking Time:</label>
		<input type="time" name="booking_time" id="booking_time"><br>

		<label for="dsn">DSN:</label>
		<input type="text" name="dsn" id="dsn"><br>

		<input type="submit" name="update" value="Update">
	

	</form>
	<a href="view.php" target="_blank"class="button">view database</a>
    

	<?php
		// here we connect to database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "droame";
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// inserting data into table
		if(isset($_POST['insert'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$booking_date = $_POST['booking_date'];
			$booking_time = $_POST['booking_time'];
            $dsn = $_POST['dsn'];
			static $id=1;
            $sql = "INSERT INTO bookings (name, email, phone, booking_date, booking_time, dsn) VALUES ('$name', '$email', '$phone', '$booking_date', '$booking_time', '$dsn')";
			$id =$id+1;
			if(mysqli_query($conn, $sql)) {
				echo "<script>alert('Record inserted successfully!');</script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		// deleting the data
		if(isset($_POST['delete'])) {
			$id = $_POST['id'];
			$sql = "DELETE FROM bookings WHERE id='$id'";
			if(mysqli_query($conn, $sql)) {
				echo "<script>alert('Record deleted successfully!');</script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		// updating the data
		if(isset($_POST['update'])) {
			$id = $_POST['id'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$booking_date = $_POST['booking_date'];
			$booking_time = $_POST['booking_time'];
			$dsn = $_POST['dsn'];

			$sql = "UPDATE bookings SET name='$name', email='$email', phone='$phone', booking_date='$booking_date', booking_time='$booking_time', dsn='$dsn' WHERE id='$id'";
			if(mysqli_query($conn, $sql)) {
				echo "<script>alert('Record updated successfully!');</script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		// closing the database 
		mysqli_close($conn);
?>
</body>
</html>