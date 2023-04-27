<?php
// Connect to the database
include_once "../../database/database.php";

// Request
$pageNum = $_REQUEST["page"];
if ($pageNum == 0) {
    $sql = "SELECT * FROM products ";
    $result = $conn->query($sql);
} else {
    $sql = "CALL getProductPage(" . $pageNum . ")";
    $result = $conn->query($sql);
}
// Fetch products from the database

if ($result->num_rows > 0) {
    // Output each product as an HTML element
    header("Content-type: text/xml");
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product_container'>";
        echo "<h2>" . $row["pName"] . "</h2>";
        echo "<p>" . $row["pDescription"] . "</p>";
        echo "<p>Price: $" . $row["pPrice"] . "</p>";
        echo "<img loading='lazy' class='product_img' src='" . $row["pImage"] . "'>";
        echo "</div>";
    }
} else {
    echo "No products found.";
}

$conn->close();
?>