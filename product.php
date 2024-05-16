// create_product.php
<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$description = $data['description'];
$price = $data['price'];

$conn = new mysqli("localhost", "root", "", "db_webservices");

$sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', $price)";
$result = $conn->query($sql);

if ($result) {
    echo json_encode(["message" => "Product created successfully"]);
} else {
    echo json_encode(["message" => "Failed to create product"]);
}

$conn->close();
?>
