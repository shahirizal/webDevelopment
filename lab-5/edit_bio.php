<?php
$univ = array(
    array("name" => "Universiti Putra Malaysia", "short" => "UPM"),
    array("name" => "Universiti Kebangsaan Malaysia", "short" => "UKM"),
    array("name" => "Universiti Malaya", "short" => "UM"),
    array("name" => "Universiti Sains Malaysia", "short" => "USM"),
    array("name" => "Universiti Teknologi Malaysia", "short" => "UTM")
); 

$record = array(
    'name'      => "Muhammad Shahir",
    'age'       => 20,
    'gender'    => "male",
    'address'   => "Bandar Baru Bangi, Selangor",
    'email'     => "a219426@siswa.ukm.edu.my",
    'dob'       => "2006-08-06",
    'height'    => 175,
    'phone'     => "+6012-3456789",
    'color'     => "#0284c7",
    'fbtwig'    => "https://github.com/shahir",
    'photo'     => "shahir.jpg",
    'univ'      => "UKM",
    'matricnum' => "a219426"
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata</title>
</head>
<body>
    <h1>Edit Biodata Form</h1>
    <hr>
    <form action="validate_biodata.php" method="post" enctype="multipart/form-data">
        <table border="1" cellpadding="10">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="<?= htmlspecialchars($record['name']); ?>" required></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="number" name="age" min="0" max="100" value="<?= htmlspecialchars($record['age']); ?>"></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" id="genderMale" name="gender" value="male" <?= $record['gender'] == 'male' ? 'checked' : '' ?>>
                    <label for="genderMale">Male</label>
                    <input type="radio" id="genderFemale" name="gender" value="female" <?= $record['gender'] == 'female' ? 'checked' : '' ?>>
                    <label for="genderFemale">Female</label>
                </td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><textarea name="address" cols="40" rows="4"><?= htmlspecialchars($record['address']); ?></textarea></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="<?= htmlspecialchars($record['email']); ?>"></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="date" name="dob" value="<?= htmlspecialchars($record['dob']); ?>"></td>
            </tr>
            <tr>
                <td>Height:</td>
                <td><input type="range" name="height" id="heightId" min="100" max="200" value="<?= htmlspecialchars($record['height']); ?>" oninput="outputId.value = heightId.value"><output id="outputId"><?= htmlspecialchars($record['height']); ?></output>cm</td>
            </tr>
            <tr>
                <td>Tel:</td>
                <td><input type="tel" name="phone" value="<?= htmlspecialchars($record['phone']); ?>"></td>
            </tr>
            <tr>
                <td>My Favorite Color:</td>
                <td><input type="color" name="color" value="<?= htmlspecialchars($record['color']); ?>"></td>
            </tr>
            <tr>
                <td>Fb/TW/IG:</td>
                <td><input type="url" name="fbtwig" value="<?= htmlspecialchars($record['fbtwig']); ?>"></td>
            </tr>
            <tr>
                <td>My Face Photo:</td>
                <td><input type="file" name="photo" accept="image/*"></td>
            </tr>
            <tr>
                <td>My University:</td>
                <td>
                    <select name="university">
                        <option value="">Select</option>
                        <?php foreach ($univ as $u): ?>
                            <option value="<?= $u['short']; ?>" <?= ($u['short'] == $record['univ']) ? 'selected' : ''; ?>>
                                <?= $u['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>
        <br>
        <input type="hidden" name="matricnum" value="<?= htmlspecialchars($record['matricnum']); ?>">
        <input type="submit" name="biodata_form" value="Update Biodata">
    </form>
</body>
</html>