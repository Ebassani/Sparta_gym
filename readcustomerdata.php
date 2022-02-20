<?php
include 'db.php'; 
$sql = "select * from customers";
$result = $conn->query($sql);
if($result -> num_rows > 0) {
//fetch_assoc(): It fetches result as an associative array.
echo "<table class=\"table\"><tr><th>ID</th><th>First Name</th><th>Last Name</th>
<th></th><th>username</th><th>phone_number</th> </tr>";
    while($row = $result ->fetch_assoc()){
        echo "<tr><td>" . $row["id"] . "</td><td>". $row["fname"]."</td> <td>". $row["lname"]

        ."</td><td>". $row["username"]. "</td><td>". $row["phone-number"]."</td><td>". 

        $row["registration_date"] . "</td><td>". $row["payment-id"]."</td></tr>";
    }
    echo "</table>";
}
// You can type different sql queries based on your needs
// The output as of now does not look good. Your task is to format it properly with HTML tables. 
else 
{
    echo "no results";
}

$conn->close();
?>