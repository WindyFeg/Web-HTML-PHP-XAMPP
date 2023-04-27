<?php
// Connect to the database
include_once "../../database/database.php";

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output each product as an HTML element
    header("Content-type: text/xml");
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row["pName"] . "</h2>";
        echo "<p>" . $row["pDescription"] . "</p>";
        echo "<p>Price: $" . $row["pPrice"] . "</p>";
        echo "<img src='" . $row["pImage"] . "'>";
        echo "</div>";
    }
} else {
    echo "No products found.";
}

$conn->close();
?>