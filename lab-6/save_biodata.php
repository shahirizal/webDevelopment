<?php
if (isset($_POST['biodata_validate'])) {

    // Connection variables
    $servername = "lrgs.ftsm.ukm.my";
    $username = "a219426";
    $password = "littlepinkhorse";
    $dbname = "a219426";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO biodata(name, age, gender, address, email, dob, height, phone, color, fbtwig, photo, university, matricnum) 
            VALUES (:name, :age, :gender, :address, :email, :dob, :height, :phone, :color, :fbtwig, :photo, :university, :matricnum)");

        // Bind the parameters
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
        $stmt->bindParam(':height', $height, PDO::PARAM_INT);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->bindParam(':fbtwig', $fbtwig, PDO::PARAM_STR);
        $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
        $stmt->bindParam(':university', $univ, PDO::PARAM_STR);
        $stmt->bindParam(':matricnum', $matricnum, PDO::PARAM_STR);

        // Grab posted values
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $height = $_POST['height'];
        $phone = $_POST['phone'];
        $color = $_POST['color'];
        $fbtwig = $_POST['fbtwig'];
        $photo = $_POST['photo'];
        $univ = $_POST['university'];
        $matricnum = $_POST['matricnum'];

        $stmt->execute();

        echo "New records created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>