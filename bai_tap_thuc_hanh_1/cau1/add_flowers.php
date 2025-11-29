<?php
// Nếu muốn xử lý dữ liệu submit, bạn có thể thêm code ở đây
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image']; // Có thể là đường dẫn hoặc tên file upload

    // Ví dụ: chỉ echo ra kiểm tra
    echo "<p>Đã thêm hoa: $name</p>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add New Flower</title>
</head>

<body>
    <h2>Add New Flower</h2>
    <form method="post">
        <label for="name">Flower Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>

        <label for="image">Image Path:</label><br>
        <input type="text" id="image" name="image" placeholder="images/tenhoa" required><br><br>

        <input type="submit" value="Add Flower">
    </form>
</body>

</html>