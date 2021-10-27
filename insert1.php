<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['student']) && isset($_POST['collegename']) &&
        isset($_POST['specialisations']) && isset($_POST['degree']) &&
        isset($_POST['internship']) && isset($_POST['location']) &&
        isset($_POST['gender']) && isset($_POST['email']) &&
        isset($_POST['phone']) && isset($_POST['notes']))  {
        
        $student = $_POST['student'];
        $collegename = $_POST['collegename'];
        $specialisations = $_POST['specialisations'];
        $degree = $_POST['degree'];
        $internship = $_POST['internship'];
        $location = $_POST['location'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $notes = $_POST['notes'];
        $phone = $_POST['phone'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "test";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register1 WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register1(student, collegename, specialisations, degree, internship, location, gender, email, phone, notes) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssssssis",$student, $collegename, $specialisations, $degree, $internship, $location, $gender, $email, $phone, $notes);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>