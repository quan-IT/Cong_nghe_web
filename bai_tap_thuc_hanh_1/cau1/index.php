<?php

$flowers = [
    [
        "name" => "Hoa Đỗ Quyên",
        "description" => "Loài hoa biểu tượng cho sự kiên trì và bền bỉ.",
        "image" => "images/doquyen"
    ],
    [
        "name" => "Hoa Hải Đường",
        "description" => "Loài hoa tượng trưng cho sự tươi sáng và phú quý.",
        "image" => "images/haiduong"
    ],
    [
        "name" => "Hoa Mai",
        "description" => "Biểu tượng của sự may mắn và thịnh vượng ngày Tết.",
        "image" => "images/mai"
    ],
    [
        "name" => "Hoa Tường Vy",
        "description" => "Loài hoa mang vẻ đẹp dịu dàng, tượng trưng cho sự duyên dáng.",
        "image" => "images/tuongvy"
    ]
];
?>


<!DOCTYPE html>
<html>

<head>
    <title>BT1</title>

</head>

<body>

    <!-- Thanh tab -->
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'User')">User</button>
        <button class="tablinks" onclick="openTab(event, 'Admin')">Admin</button>
    </div>

    <!-- Nội dung User -->
    <div id="User" class="tabcontent">
        <?php foreach ($flowers as $flower): ?>
            <li>
                <strong><?php echo htmlspecialchars($flower['name']); ?></strong><br>
                <?php echo htmlspecialchars($flower['description']); ?><br>
                <img src="<?php echo htmlspecialchars($flower['image'] . '.jpg'); ?>" width="120">
            </li>
            <hr>
        <?php endforeach; ?>
    </div>

    <!-- Nội dung Admin -->
    <div id="Admin" class="tabcontent">
        <h2>Flowers List</h2>
        <a href="add_Flowers.php">Add New Flowers</a>
        <?php foreach ($flowers as $flower): ?>
            <li>
                <strong><?php echo htmlspecialchars($flower['name']); ?></strong><br>
                <a href="delete_book.php?id=<?php echo $book['BookID']; ?>">Delete</a>
            </li>
            <hr>
        <?php endforeach; ?>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;

            // Ẩn tất cả nội dung tab
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Bỏ active tất cả nút
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Hiển thị tab hiện tại
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Mở tab User mặc định
        document.getElementsByClassName('tablinks')[0].click();
    </script>

</body>

</html>