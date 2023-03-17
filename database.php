<?php

// Create a new database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create a new database
$sql = "CREATE DATABASE OnlineStore";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

// Connect to the new database
$dbname = "OnlineStore";
$conn = new mysqli($servername, $username, $password, $dbname);

// Create a new products table
$sql = "CREATE TABLE products (
    pId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pName VARCHAR(255) NOT NULL,
    pDescription TEXT,
    pPrice DECIMAL(10,2) NOT NULL,
    pImage VARCHAR(255) NOT NULL
  )";

if ($conn->query($sql) === TRUE) {
  echo "Table 'products' created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create a new users table
$sql = "CREATE TABLE users (
  userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table 'users' created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert new products
$sql = "INSERT INTO products (pName, pDescription, pPrice, pImage) VALUES 
('iPhone XR', 'Apple iPhone XR, 64GB, Black, Unlocked', 699, 'https://example.com/iphone'),
('Samsung Galaxy S20', 'Samsung Galaxy S20, 128GB, Cosmic Gray, Unlocked', 799, 'https://example.com/s20'),
('HP Spectre x360', 'HP Spectre x360, 13.3\", Intel Core i7, 16GB RAM, 1TB SSD', 1399, 'https://example.com/hp'),
('Sony PlayStation 5', 'Sony PlayStation 5, 1TB SSD, DualSense Wireless Controller', 499, 'https://example.com/ps5'),
('Samsung QLED TV', 'Samsung Q70T Series 55-inch 4K Ultra HD Smart QLED TV', 999, 'https://example.com/tv'),
('Bose QuietComfort', 'Bose QuietComfort 35 II Wireless Bluetooth Headphones', 299, 'https://example.com/bose'),
('Canon EOS R5', 'Canon EOS R5 Mirrorless Camera Body', 3899, 'https://example.com/canon'),
('Apple Watch SE', 'Apple Watch SE GPS, 40mm, Space Gray Aluminum Case', 279, 'https://example.com/watch'),
('Dyson Air Purifier', 'Dyson Pure Cool, TP04 HEPA Air Purifier and Tower Fan', 549, 'https://example.com/dyson'),
('Fitbit Charge 4', 'Fitbit Charge 4 Fitness and Activity Tracker', 149, 'https://example.com/fitbit');
";

if ($conn->query($sql) === TRUE) {
  echo "New products inserted successfully<br>";
} else {
  echo "Error inserting products: " . $conn->error;
}

// Insert new users with hashed passwords
$password1 = password_hash("password1", PASSWORD_DEFAULT);
$password2 = password_hash("password2", PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES
  ('user1', '$password1'),
  ('user2', '$password2')";

if ($conn->query($sql) === TRUE) {
  echo "New users inserted successfully<br>";
} else {
  echo "Error inserting users: " . $conn->error;
}

$conn->close();

?>