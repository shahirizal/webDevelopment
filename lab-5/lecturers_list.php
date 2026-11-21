<?php
$lecturers = array(
    array('id' => "K004901", 'name' => "Prof. Dr. Abdullah Mohd Zin"),
    array('id' => "K012964", 'name' => "Prof. Dr. Azuraliza Abu Bakar"),
    array('id' => "K009683", 'name' => "Assoc. Prof. Dr. Haslina Arshad"),
    array('id' => "K007915", 'name' => "Assoc. Prof. Dr. Mohd Juzaiddin Ab Aziz"),
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Lecturers</title>
</head>
<body>
    <h1>List of Lecturers</h1>
    <hr>
    <table border="1" cellpadding="10">
        <?php foreach ($lecturers as $lecturer): ?>
            <tr>
                <td><?= htmlspecialchars($lecturer['name']); ?></td>
                <td><a href="lecturer_details.php?id=<?= urlencode($lecturer['id']); ?>">Details</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>