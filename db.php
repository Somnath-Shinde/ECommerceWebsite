<?php
$host = "localhost";  // Server
$user = "root";       // Default username
$password = "";       // Default password
$dbname = "sam_communication"; // Your database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $image = $_POST['image']; // Ensure file path is sent
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "INSERT INTO products (category, name, image, price, description)
            VALUES ('$category', '$name', '$image', '$price', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
