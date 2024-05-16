// read_products.php
<?php
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "db_webservices");

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

echo json_encode($products);

$conn->close();
?>
