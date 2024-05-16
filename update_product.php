// update_product.php
<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = $data['name'];
$description = $data['description'];
$price = $data['price'];

$conn = new mysqli("localhost", "root", "", "db_webservices");

$sql = "UPDATE products SET name='$name', description='$description', price=$price WHERE id=$id";
$result = $conn->query($sql);

if ($result) {
    echo json_encode(["message" => "Product updated successfully"]);
} else {
    echo json_encode(["message" => "Failed to update product"]);
}

$conn->close();
?>
