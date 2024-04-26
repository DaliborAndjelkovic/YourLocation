<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=developerdb', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $streetNumber = isset($_POST['streetNumber']) ? $_POST['streetNumber'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';

 
    if (!empty($firstName) && !empty($lastName) && !empty($streetNumber) && !empty($city) && !empty($country)) {
        
            $stmt = $pdo->prepare("INSERT INTO userss (firstName, lastName, streetNumber, city, country) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$firstName, $lastName, $streetNumber, $city, $country]);
        
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details and Map</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="main-container">
        <div class="login-container">
    <div class="user-details">
        <h2 class="user-details-title">User Details</h2>
        <form id="userDetailsForm" onsubmit="submitUserDetails(event)">
            <div class="input-container-wrapper">
            <div class="input-container">
                <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
            </div>

            <div class="input-container">
                <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
            </div>
            </div>

            <div class="input-container">
                <input type="text" id="streetNumber" name="streetNumber" placeholder="Street/Number" required>
            </div>

            <div class="input-container">
                <input type="text" id="city" name="city" placeholder="City" required>
            </div>

            <div class="input-container">
                <input type="text" id="country" name="country" placeholder="Country" required>
            </div>

            <button type="submit">Add User</button>
        </form>
    </div>
            <div class="map-container" id="mapContainer"></div>
        </div>
    </div>

    <div id="errorMessage"></div>

    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHksoiJjnL4DIV2kruTb_0-5eahWkeyks&libraries=places&callback=initMap"></script>

    <script defer src="script.js"></script>
</body>
</html>

