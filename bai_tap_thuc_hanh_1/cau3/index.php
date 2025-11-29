<?php
$filename = "65HTTT_Danh_sach_diem_danh.csv";
$rows = [];

if (($handle = fopen($filename, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $rows[] = $data;
    }
    fclose($handle);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>BT3</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Dữ liệu CSV</h2>
    <table>
        <?php foreach ($rows as $index => $row): ?>
            <tr>
                <?php foreach ($row as $cell): ?>
                    <?php if ($index === 0): ?>
                        <th><?= htmlspecialchars($cell) ?></th>
                    <?php else: ?>
                        <td><?= htmlspecialchars($cell) ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>