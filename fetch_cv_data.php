<?php
function fetchAndImplode($conn, $query, $fieldName)
{
    $result = $conn->query($query);

    // Check if there are any rows
    if ($result->num_rows > 0) {
        $data = [];

        // Fetch all data and store them in an array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row[$fieldName];
        }

        // Concatenate the data with a comma and space
        return implode(', ', $data);
    } else {
        // If there are no rows, return an empty string or any default value
        return '';
    }
}

$cvID = isset($_GET['cvID']) ? $_GET['cvID'] : '';
$conn = new mysqli('localhost', 'root', NULL, 'cvbuilderDB');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//FETCH CV DATA
$cvQuery = "SELECT * FROM cv WHERE id = '$cvID'";
$result_cv = $conn->query($cvQuery);
if ($result_cv && $result_cv->num_rows > 0) {
    // Fetch the data as an associative array
    $cvData = $result_cv->fetch_assoc();
    // Access individual fields
    $fname = $cvData['fname'];
    $lname = $cvData['lname'];
    $title = $cvData['title'];
    $dob = $cvData['dob'];
    $location = $cvData['location'];
    $objective = $cvData['objective'];
    $img = $cvData['img'];
    $hobby = $cvData['hobby'];
} else {
    // Throw 404 error if no cv found
    header("HTTP/1.0 404 Not Found");
    echo "<h1>CV does not exist in Database</h1>";
    exit;
}
//Throw 404 error if no cv found

// email addresses
$emailQuery = "SELECT email FROM emailAddress WHERE cvID = '$cvID'";
$email = fetchAndImplode($conn, $emailQuery, 'email');

//  phone numbers
$phoneQuery = "SELECT numbers FROM phoneNumber WHERE cvID = '$cvID'";
$phone = fetchAndImplode($conn, $phoneQuery, 'numbers');

//  languages
$languagesQuery = "SELECT lang FROM languages WHERE cvID = '$cvID'";
$lang = fetchAndImplode($conn, $languagesQuery, 'lang');

// social link
$socialQuery = "SELECT * FROM socialLink WHERE cvID = '$cvID'";
$socialLinks = fetchAndImplode($conn, $socialQuery, 'link');

// Work Experience
$workExperienceQuery = "SELECT * FROM workExperience WHERE cvID = '$cvID'";
$resultWorkExperience = $conn->query($workExperienceQuery);

// Education
$educationQuery = "SELECT * FROM degree WHERE cvID = '$cvID'";
$resultEducation = $conn->query($educationQuery);

//Certification
$certificationQuery = "SELECT * FROM certification WHERE cvID = '$cvID'";
$resultCertification = $conn->query($certificationQuery);

//Award
$awardQuery = "SELECT * FROM award WHERE cvID = '$cvID'";
$resultAward = $conn->query($awardQuery);

//activity
$activityQuery = "SELECT * FROM activity WHERE cvID = '$cvID'";
$resultActivity = $conn->query($activityQuery);

$conn->close();
