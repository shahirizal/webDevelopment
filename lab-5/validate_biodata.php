<?php
// Terima hanya POST daripada borang biodata yang betul.
if (
    ($_SERVER["REQUEST_METHOD"] ?? "") !== "POST" ||
    !isset($_POST["biodata_form"])
) {
    exit("Invalid access.");
}

$valid_universities = ["UPM", "UKM", "UM", "USM", "UTM"];

$data = [
    "name"       => trim($_POST["name"] ?? ""),
    "age"        => trim($_POST["age"] ?? ""),
    "gender"     => $_POST["gender"] ?? "",
    "address"    => trim($_POST["address"] ?? ""),
    "email"      => trim($_POST["email"] ?? ""),
    "dob"        => trim($_POST["dob"] ?? ""),
    "height"     => trim($_POST["height"] ?? ""),
    "phone"      => trim($_POST["phone"] ?? ""),
    "color"      => trim($_POST["color"] ?? ""),
    "fbtwig"     => trim($_POST["fbtwig"] ?? ""),
    "photo"      => trim($_FILES["photo"]["name"] ?? ""),
    "university" => trim($_POST["university"] ?? ""),
    "matricnum"  => trim($_POST["matricnum"] ?? "")
];

$errors = [];

// Nama mesti diisi.
if ($data["name"] === "") {
    $errors[] = "Please insert your name.";
}

// Umur mesti integer antara 0 hingga 100.
// Perbandingan === false membolehkan nilai 0 diterima.
$age = filter_var(
    $data["age"],
    FILTER_VALIDATE_INT,
    ["options" => ["min_range" => 0, "max_range" => 100]]
);

if ($data["age"] === "" || $age === false) {
    $errors[] = "Age must be an integer between 0 and 100.";
}

// Gender mesti salah satu daripada nilai yang dibenarkan.
if (!in_array($data["gender"], ["male", "female"], true)) {
    $errors[] = "Please select a valid sex.";
}

// Alamat wajib diisi dan tidak boleh melebihi 255 aksara.
if ($data["address"] === "") {
    $errors[] = "Please insert your address.";
} else {
    $addressLength = function_exists("mb_strlen")
        ? mb_strlen($data["address"], "UTF-8")
        : strlen($data["address"]);

    if ($addressLength > 255) {
        $errors[] = "Address cannot exceed 255 characters.";
    }
}

// E-mel mesti mengandungi "ukm" selepas tanda @.
if (!preg_match('/.+@.*[Uu][Kk][Mm].*/', $data["email"])) {
    $errors[] = "Please enter a valid email address.";
}

// Tarikh mesti dalam format YYYY-MM-DD dan benar-benar sah.
$dobDate = DateTimeImmutable::createFromFormat("!Y-m-d", $data["dob"]);
$dateIssues = DateTimeImmutable::getLastErrors();

$dobIsValid =
    $dobDate !== false &&
    (
        $dateIssues === false ||
        (
            $dateIssues["warning_count"] === 0 &&
            $dateIssues["error_count"] === 0
        )
    ) &&
    $dobDate->format("Y-m-d") === $data["dob"];

if (!$dobIsValid) {
    $errors[] = "Please enter a valid date of birth.";
}

// Tinggi mesti integer antara 100 hingga 200 cm.
$height = filter_var(
    $data["height"],
    FILTER_VALIDATE_INT,
    ["options" => ["min_range" => 100, "max_range" => 200]]
);

if ($data["height"] === "" || $height === false) {
    $errors[] = "Height must be between 100 and 200 cm.";
}

// Format telefon: +60##-#######.
if (!preg_match('/^\+60\d{2}-\d{7}$/', $data["phone"])) {
    $errors[] = "Phone number must follow +60##-####### format.";
}

// Warna mesti dalam format #rrggbb.
if (!preg_match('/^#[0-9a-fA-F]{6}$/', $data["color"])) {
    $errors[] = "Please select a valid colour.";
}

// Pautan sosial mesti diisi.
if ($data["fbtwig"] === "") {
    $errors[] = "Please enter a valid URL.";
}

// Nama fail gambar mesti ada.
if ($data["photo"] === "") {
    $errors[] = "Select a valid photo.";
}

// Universiti mesti dipilih daripada senarai yang dibenarkan.
if (!in_array($data["university"], $valid_universities, true)) {
    $errors[] = "Please select a valid university.";
}

// Nombor matrik mesti diisi.
if ($data["matricnum"] === "") {
    $errors[] = "Please insert your matric number.";
}

// Fungsi untuk paparkan nilai dengan selamat dalam HTML.
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

// Paparkan semua ralat sekali gus.
if (!empty($errors)) {
    echo "<!DOCTYPE html>";
    echo "<html lang=\"en\">";
    echo "<head><meta charset=\"UTF-8\"><title>Validation Errors</title></head>";
    echo "<body>";
    echo "<h2>Validation Errors</h2>";
    echo "<ul>";

    foreach ($errors as $error) {
        echo "<li>" . e($error) . "</li>";
    }

    echo "</ul>";
    echo count($errors) . " error(s) detected.";
    echo "</body></html>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validate Biodata</title>
</head>
<body>
    <h1>Validate Biodata</h1>
    <p>Please review your information before saving.</p>

    <table border="1" cellpadding="10">
        <tr>
            <td>Name:</td>
            <td><?= e($data["name"]); ?></td>
        </tr>
        <tr>
            <td>Age:</td>
            <td><?= e($data["age"]); ?></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><?= e($data["gender"]); ?></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><?= nl2br(e($data["address"])); ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?= e($data["email"]); ?></td>
        </tr>
        <tr>
            <td>Date of Birth:</td>
            <td><?= e($dobDate->format("d-m-Y")); ?></td>
        </tr>
        <tr>
            <td>Height:</td>
            <td><?= e($data["height"]); ?> cm</td>
        </tr>
        <tr>
            <td>Tel:</td>
            <td><?= e($data["phone"]); ?></td>
        </tr>
        <tr>
            <td>My Favorite Color:</td>
            <td>
                <span style="background:<?= e($data["color"]); ?>; padding:2px 10px; border:1px solid #000;"></span>
                <?= e($data["color"]); ?>
            </td>
        </tr>
        <tr>
            <td>Fb/TW/IG:</td>
            <td><?= e($data["fbtwig"]); ?></td>
        </tr>
        <tr>
            <td>Photo:</td>
            <td><?= e($data["photo"]); ?></td>
        </tr>
        <tr>
            <td>My University:</td>
            <td><?= e($data["university"]); ?></td>
        </tr>
        <tr>
            <td>My Matric Number:</td>
            <td><?= e($data["matricnum"]); ?></td>
        </tr>
    </table>

    <hr>

    <form action="save_biodata.php" method="post">
        <?php foreach ($data as $key => $value): ?>
            <input
                type="hidden"
                name="<?= e($key); ?>"
                value="<?= e($value); ?>"
            >
        <?php endforeach; ?>

        <!-- Baris matrik tambahan seperti yang diminta dalam tutorial. -->
        <input
            type="hidden"
            name="matricnum"
            value="<?= e($data["matricnum"]); ?>"
        >

        <button type="button" onclick="history.back()">Back</button>
        <input
            type="submit"
            name="biodata_validate"
            value="Save My Biodata"
        >
    </form>
</body>
</html>