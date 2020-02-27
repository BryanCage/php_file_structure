<?php

include_once 'functions.php';
include_once 'resource/database.php';

// Keep this API Key value to be compatible with the ESP32 code provided in the project page.
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";


echo "</br>";
pre_r("\$_GET Array");
pre_r($_GET);

$api_key = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vacancy = $_POST['vacancy'];
    $equipment_id = $_POST['equipment_id'];

    echo "api_key: " . $_POST["api_key"] . "</br>";
    $api_key = test_input($_POST["api_key"]);

    if ($api_key == $api_key_value) {
        echo "<h4>Your api_key is correct</h4>";
        echo "<p>INSERTING DATA TO YOUR DATABASE</p>";
        $sql = "UPDATE db_urec_app.equipment SET vacancy = :vacancy WHERE equipment_id = :equipment_id";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':vacancy' => $vacancy, ':equipment_id' => $equipment_id));

        if ($stmt->rowCount() == 1) {
            echo "Database Updated Successfully.";
        } else {
            echo "Update was not successful";
        }
    } else {
        echo "<h4>Your api_key is not correct.</h4>";
        echo "<p>ACCESS DENIED => CANNOT CONNECT TO DATABASE</p>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $vacancy = $_GET['vacancy'];
    $equipment_id = $_GET['equipment_id'];

    echo "api_key: " . $_GET["api_key"] . "</br>";
    $api_key = test_input($_GET["api_key"]);

    if ($api_key == $api_key_value) {
        echo "<h4>Your api_key is correct</h4>";
        echo "<p>INSERTING DATA TO YOUR DATABASE</p>";
        $sql = "UPDATE db_urec_app.equipment SET vacancy = :vacancy WHERE equipment_id = :equipment_id";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':vacancy' => $vacancy, ':equipment_id' => $equipment_id));

        if ($stmt->rowCount() == 1) {
            echo "Database Updated Successfully.";
        } else {
            echo "Update was not successful";
        }

    } else {
        echo "<h4>Your api_key is not correct.</h4>";
        echo "<p>ACCESS DENIED => CANNOT CONNECT TO DATABASE</p>";
    }

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

