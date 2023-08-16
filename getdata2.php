<?php 
   $servername = "localhost";
   $username = "root";
   $password = "";
   $conn = mysqli_connect($servername, $username, $password,'db4');
   $result=mysqli_query($conn,"select * from twelve");
   if(!$result) echo 'error'; ;
   $t="<table border='1px' style='border-collapse:collapse;'><tr><th> Name</th><th>Email</th><th>Password</th><th>Confirm Password</th><th>Exam</th><th>Mobile Number</th><th>Gender</th><th>Birthdate</th><th>Address</th></tr>";
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $t.="<tr><td>$row[name]</td><td>$row[email]</td><td>$row[pass]</td><td>$row[repass]</td><td>$row[exam]</td><td>$row[phno]</td><td>$row[gender]</td><td>$row[birthdate]<td>$row[address]</td></td></tr>";
    }
    }
    $t.="</table>";
    echo $t;
?>