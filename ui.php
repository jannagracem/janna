<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $lastname = $_GET["Lastname"];
    $firstname = $_GET["firstname"];
    $gender = $_GET["sex"];
    $department = $_GET["Department"];
    $campus = $_GET["Campus"];
    $seminars = $_GET["Seminars"];
    $comments = $_GET["Comments"];

    echo "First Name: " . $lastname . "<br>";
    echo "Last Name: " . $firstname . "<br>";

    if ($gender == 1) {
        echo "Gender: Female" . "<br>";
    } elseif ($gender == 0) {
        echo "Gender: Male" . "<br>";
    } else {
        echo "Gender: Other" . "<br>";
    }

    echo "Department: " . $department . "<br>";
    echo "Campus: " . $campus . "<br>";
    echo "Seminars: " . $seminars . "<br>";
    echo "Comments and Suggestions: " . $comments . "<br>";
    echo "Submit: " . $_GET["Submit"] . "<br>";
}
?>
