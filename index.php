<?php
//9. Connect to a mysql database and read something from it and display

$HOST = "localhost";
$USERNAME = "root";
$PASSWORD = "root";
$DBNAME = "test";

//Create connection
$conn = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME);

//Check Connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

    //Query table and display 
    $sql = "SELECT id, firstname, lastname, email, type FROM interns";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        
        
        // output data of each row
        echo "<table>
            <tr>
                <th>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Role</th>
            </tr>";
        while($row = $result->fetch_assoc()) {

            $id = $row["id"];
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $email = $row["email"];
            $role = $row["type"];
            
            // Output a row
            echo "<tr>";
            echo "<td>$id</td>";       
            echo "<td>$firstname</td>";    
            echo "<td>$lastname</td>";                                    
            echo "<td><a href=\"mailto:$email\">$email</a></td>";
            echo "<td>$role</td>";                                                
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
?>