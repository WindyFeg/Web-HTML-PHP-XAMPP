<!-- products.php -->
<?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "OnlineStore";
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch products from the database
  $sql = "SELECT * FROM products";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Output each product as an HTML element
    while($row = $result->fetch_assoc()) {
      echo "<div>";
      echo "<h2>" . $row["pName"] . "</h2>";
      echo "<p>" . $row["pDescription"] . "</p>";
      echo "<p>Price: $" . $row["pPrice"] . "</p>";
      // echo "<img src='" . $row["pImage"] . "'>";
      echo "</div>";
    }
  } else {
    echo "No products found.";
  }

  $conn->close();
  ?>


