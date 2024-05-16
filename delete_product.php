// delete_product.php
<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];

$conn = new mysqli("localhost", "root", "", "db_webservices");

$sql = "DELETE FROM products WHERE id=$id";
$result = $conn->query($sql);

if ($result) {
    echo json_encode(["message" => "Product deleted successfully"]);
} else {
    echo json_encode(["message" => "Failed to delete product"]);
}

$conn->close();
?>
