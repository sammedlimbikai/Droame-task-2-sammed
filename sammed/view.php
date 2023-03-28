<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Droame database</title>
    <style>
        /* giving background to page */
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
        /* Style the table */
        table {
        border-collapse: collapse;
        width: 100%;
        margin: 20px 0;
        }

        /* Add a border to the table cells */
        td, th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        /* Add a background color to the table header cells */
        th {
        background-color: #f2f2f2;
        }

        /* Change the font family and size */
        table, td, th {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        }

        /* Alternate row colors */
        tbody tr:nth-child(even) {
        background-color: #f2f2f2;
        }

        /* Hover effect on rows */
        tbody tr:hover {
        background-color: #ddd;
        }

        /* Set the width of the ID column */
        #id {
        width: 50px;
        }

        /* Set the width of the DSN column */
        #dsn {
        width: 100px;
        }

        /* Center align the Name and Email columns */
        #name, #email {
        text-align: center;
        }

        /* Center align the Booking Date and Booking Time columns */
        #booking_date, #booking_time {
        text-align: center;
        }

        /* Style the table header */
        thead {
        background-color: #4CAF50;
        color: white;
        }

    </style>
</head>
<body>
    <!-- View table -->
    <h2>View Table</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>DSN</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Connect to the database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "droame";
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Retrieve data
                $sql = "SELECT * FROM bookings";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['booking_date'] . "</td>";
                    echo "<td>" . $row['booking_time'] . "</td>";
                    echo "<td>" . $row['dsn'] . "</td>";
                    echo "</tr>";
                }

                // Close the database connection
                mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>
