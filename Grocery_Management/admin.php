<?php

// Database configuration
$dbHost = 'localhost:3306';
$dbUsername = 'tejas';
$dbPassword = 'ILOVEKRISHNA';
$dbName = 'GROCERY';

// Connect to the database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the table
$sql = "SELECT * FROM register";
$result = $conn->query($sql);
echo "<h3> <mark style='background:#4CAF50;color:#fff;'>ADMIN PANEL</mark>, Registration Database </h3>";

echo "<h3 style='right:40%;position:absolute;top:0;'><a href='admin.php' style='background:#4CAF50;color:#fff;border-radius:6px;border-bottom-left-radius:0;border-bottom-right-radius:0;padding:8px;text-decoration:none;'>Registration</a></h3>";
echo "<h3 style='right:30%;position:absolute;top:0;'><a href='transaction.php' style='background:#A7A7A7;color:#fff;border-radius:6px;border-bottom-left-radius:0;border-bottom-right-radius:0;padding:8px;text-decoration:none;'>Transactions</a></h3>";
echo "<h3 style='right:23%;position:absolute;top:0;'><a href='entries.php' style='background:#A7A7A7;color:#fff;border-radius:6px;border-bottom-left-radius:0;border-bottom-right-radius:0;padding:8px;text-decoration:none;'>Entries</a></h3>";

echo "<h3 style='right:8%;position:absolute;top:0;'><a href='index.html' style='background:tomato;color:#fff;border-radius:6px;padding:6px;text-decoration:none;'>Home</a></h3>";
// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Start the HTML table and add CSS styles
    echo "<style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                text-align: left;
                padding: 8px;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #ddd;
            }
          </style>";
    echo "<table>";
    echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Pincode</th>";
    // echo "<th>Password</th>";
    echo "</tr>";

    // Loop through each row and display the data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["NAME"] . "</td>";
        echo "<td>" . $row["EMAIL"] . "</td>";
        echo "<td>" . $row["PHONE"] . "</td>";
        echo "<td>" . $row["ADDRESS"] . "</td>";
        echo "<td>" . $row["PINCODE"] . "</td>";
        //echo "<td>" . $row["PASSWORD"] . "</td>";
        echo "</tr>";
    }

    // End the HTML table
    echo "</table>";
} else {
    echo "No data found.";
}
// Close the MySQL connection
$conn->close();

?>
