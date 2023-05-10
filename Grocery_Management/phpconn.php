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

$name = $_POST["username"];
$psw = $_POST["password"];

if($name == "admin" && $psw =="1234"){

// Retrieve data from the database
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Display data in HTML
echo '<div class="container">';
echo '<h2>Welcome admin !!!</h2>';
echo '<div class="products">';
/*
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="product">';
    echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
    echo '<h3>' . $row['name'] . '</h3>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<span class="price">' . $row['price'] . '</span>';
    echo '</div>';
}
*/
while ($row = mysqli_fetch_assoc($result)) {
    echo '<span class="names">'.$row['name'].'</span>';
}
echo '</div>';
echo '</div>';
echo '<style> .names{color:#f00;} </style>';
}
else{
echo "<span style='color:#f00;'>LOGIN DETAILS INCORRECT</span>";
//echo "<script>alert('Login Details Are Incorrect!')</script>";
//echo "<script>location.replace='http://127.0.0.1:8999/login.html');</script>";

header("Location: http://127.0.0.1:8999/login.html");
}
// Close the database connection
mysqli_close($conn);
?>
