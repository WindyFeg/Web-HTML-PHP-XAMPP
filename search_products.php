<?php

$q = $_REQUEST["q"];
$hint = "";

$xml = new SimpleXMLElement('<xml/>');

include_once "database.php";

$sql = "SELECT * FROM products WHERE pName LIKE '%" . $q . "%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    Header('Content-type: text/xml');
    while ($row = $result->fetch_assoc()) {
        $product = $xml->addChild('product');
        $product->addChild('id', $row['pId']);
        $product->addChild('name', $row['pName']);
        $product->addChild('description', $row['pDescription']);
        $product->addChild('price', $row['pPrice']);
        $product->addChild('image', $row['pImage']);
    }
}


// Save XML as a file
$file = 'search_response.xml';
$xml->asXML($file);


if (file_exists('search_response.xml')) {
    $hint = file_get_contents('search_response.xml');
    //$Is the same as: 
    //@echo $xml->asXML();
    //@print($xml->asXML());
    echo $hint;

} else {
    echo "&lt;?xml version=\"1.0\"?>&lt;Error>404 - File not found!&lt;/Error>";
}



?>