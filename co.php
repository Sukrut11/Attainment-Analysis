<?php
// Replace DB_NAME, DB_USER, DB_PASSWORD, and DB_HOST with your database details
$mysqli = new mysqli('DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME');

// Check for errors
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Check if the form has been submitted
if (isset($_POST['course']) && isset($_POST['course_outcome']) && isset($_POST['attainment'])) {

    // Insert data from the HTML form into the database
    $course = $_POST['course'];
    $course_outcome = $_POST['course_outcome'];
    $attainment = $_POST['attainment'];

    $sql = "INSERT INTO course_attainment (course, course_outcome, attainment) VALUES ('$course', '$course_outcome', '$attainment')";

    if ($mysqli->query($sql) === true) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Insert data from the HTML table into the database
    $num_rows = $_POST['num_rows'];

    for ($i = 0; $i < $num_rows; $i++) {
        $name = $_POST['cell' . $i . '1'];
        $test = $_POST['cell' . $i . '2'];
        $assignment = $_POST['cell' . $i . '3'];
        $objective_test = $_POST['cell' . $i . '4'];
        $presentation = $_POST['cell' . $i . '5'];
        $lab_experiment = $_POST['cell' . $i . '6'];

        $sql = "INSERT INTO course_attainment_details (course, test, assignment, objective_test, presentation, lab_experiment) VALUES ('$course', '$test', '$assignment', '$objective_test', '$presentation', '$lab_experiment')";

        if ($mysqli->query($sql) !== true) {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }

    $mysqli->close();
}
echo ("This is something!!");
