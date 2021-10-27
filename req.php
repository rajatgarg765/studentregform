<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>Student Name</th>
<th>College Name</th>
<th>Specialisations</th>
<th>Degree Name</th>
<th>Internship Applied For</th>
<th>PhoneNo</th>
<th>Email ID</th>
<th>Gender</th>
<th>Notes</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "test");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, student, collegename, specialisations, degree, internship, location, gender, email, phone, notes FROM register1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["student"] . "</td><td>" . $row["collegename"] . "</td><td>" . $row["specialisations"] . "</td><td>" . $row["degree"] . "</td><td>" . $row["internship"] . "</td><td>" . $row["location"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>"
. $row["notes"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>