<?php

// Create a new database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
$dbname = "OnlineStore";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the database exits
if ($conn->select_db($dbname)) {
  // Drop database if it exists
  $conn->query("DROP DATABASE $dbname");
  echo "Database $dbname dropped successfully";
} else {
  echo "Database $dbname does not exist";
}

// Create a new database
$sql = "CREATE DATABASE " . $dbname;
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
  password VARCHAR(255) NOT NULL,
  userlevel INT(2) NOT NULL
  
)";

if ($conn->query($sql) === TRUE) {
  echo "Table 'users' created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert new products
$sql = "INSERT INTO products (pName, pDescription, pPrice, pImage) VALUES 
('iPhone XR', 'Apple iPhone XR, 64GB, Black, Unlocked', 699, '/assets/product_img/iPhone XR.jpg'),
('Samsung Galaxy S20', 'Samsung Galaxy S20, 128GB, Cosmic Gray, Unlocked', 799, '/assets/product_img/Samsung Galaxy S20.jpg'),
('HP Spectre x360', 'HP Spectre x360, 13.3\", Intel Core i7, 16GB RAM, 1TB SSD', 1399, '/assets/product_img/HP Spectre x360.jpg'),
('Sony PlayStation 5', 'Sony PlayStation 5, 1TB SSD, DualSense Wireless Controller', 499, '/assets/product_img/Sony PlayStation 5.jpg'),
('Samsung QLED TV', 'Samsung Q70T Series 55-inch 4K Ultra HD Smart QLED TV', 999, '/assets/product_img/Samsung QLED TV.jpg'),
('Bose QuietComfort', 'Bose QuietComfort 35 II Wireless Bluetooth Headphones', 299, '/assets/product_img/Bose QuietComfort.jpg'),
('Canon EOS R5', 'Canon EOS R5 Mirrorless Camera Body', 3899, '/assets/product_img/Canon EOS R5.jpg'),
('Apple Watch SE', 'Apple Watch SE GPS, 40mm, Space Gray Aluminum Case', 279, '/assets/product_img/Apple Watch SE.jpeg'),
('Dyson Air Purifier', 'Dyson Pure Cool, TP04 HEPA Air Purifier and Tower Fan', 549, '/assets/product_img/Dyson Air Purifier.jpg'),
  ('Google Pixel 6', 'Google Pixel 6, 128GB, Black, Unlocked', 699, '/assets/product_img/Google Pixel 6.jpg'),
('LG OLED TV', 'LG CX Series 65-inch 4K Ultra HD Smart OLED TV', 1999, '/assets/product_img/LG OLED TV.png'),
('Bose SoundLink Revolve+', 'Bose SoundLink Revolve+ Portable and Long-Lasting Bluetooth 360 Speaker', 299, '/assets/product_img/Bose SoundLink Revolve+.jpg'),
('Apple iPad Pro', 'Apple iPad Pro 12.9-inch, Wi-Fi, 128GB, Space Gray', 1099, '/assets/product_img/Apple iPad Pro.jpg'),
('Samsung Galaxy Buds Pro', 'Samsung Galaxy Buds Pro Wireless Earbuds with Active Noise Cancellation', 199, '/assets/product_img/Samsung Galaxy Buds Pro.jpg'),
('GoPro HERO10 Black', 'GoPro HERO10 Black 5.3K Action Camera with HyperSmooth 4.0 Video Stabilization', 499, '/assets/product_img/GoPro HERO10 Black.jpg'),
('Sony WH-1000XM4', 'Sony WH-1000XM4 Wireless Noise Cancelling Headphones with Mic', 349, '/assets/product_img/Sony WH-1000XM4.jpg'),
('Dell XPS 13', 'Dell XPS 13 Laptop, 13.4-inch, Intel Core i5, 8GB RAM, 256GB SSD', 1099, '/assets/product_img/Dell XPS 13.jpg'),
('Fitbit Charge 4', 'Fitbit Charge 4 Fitness and Activity Tracker', 149, '/assets/product_img/Fitbit Charge 4.jpg');
";

if ($conn->query($sql) === TRUE) {
  echo "New products inserted successfully<br>";
} else {
  echo "Error inserting products: " . $conn->error;
}

// Insert new users with hashed passwords
$password1 = password_hash("password1", PASSWORD_DEFAULT);
$password2 = password_hash("password2", PASSWORD_DEFAULT);
$password3 = password_hash("phong0123", PASSWORD_DEFAULT);

$sql = "CREATE DEFINER=`root`@`localhost` 
PROCEDURE `GetAllProducts`() 
NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
BEGIN SELECT * FROM products; END";

if ($conn->query($sql) === TRUE) {
  echo "New procedure inserted successfully<br>";
} else {
  echo "Error inserting users: " . $conn->error;
}

$sql = "CREATE DEFINER=`root`@`localhost` 
PROCEDURE `GetProductPage`(IN `pageNum` INT(11)) 
NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
SELECT * FROM products 
WHERE (pId <= pageNum*6) AND (pId > pageNum*6 - 6) ";

if ($conn->query($sql) === TRUE) {
  echo "New procedure inserted successfully<br>";
} else {
  echo "Error inserting users: " . $conn->error;
}


$sql = "INSERT INTO users (username, password, userlevel) VALUES
  ('user1', '$password1', 2),
  ('user2', '$password2', 2),
  ('phong', '$password3', 1)
  ";

if ($conn->query($sql) === TRUE) {
  echo "New users inserted successfully<br>";
} else {
  echo "Error inserting users: " . $conn->error;
}

$conn->close();

?>