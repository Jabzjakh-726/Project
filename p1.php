<?php
$nameErr="";
$name="";
$classErr="";
$cls="";
$perErr="";
$per="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST["name"];
    $cls=$_POST["class"];
    $per=$_POST["per"];
    if(empty($name)){
        $nameErr="Name is Required";
     }
     else{
        if(!preg_match('/^[a-zA-Z ]*$/',$name)){
            $nameErr="only alphabets and white space allowed";
        }
     }
     if (empty($cls)) 
	{
        $classErr = 'class is required';
   }
   if(empty($per)){
    $perErr="percentage required";
   }
   else{
    $reg1="/^100$|^(\d{1,2}(?:\.\d)?)$/";
   
         if(!preg_match($reg1,$per)){
            $perErr="2-3 digit number required";
         }
   }
   if(empty($nameErr) && empty($perErr) && empty($classErr)){
   if($cls=="10"){
    header('Location:tenth.html');
   }
   
   else if($cls=="12"){
    header('Location:twelve.html');
   }
   }

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Competitive Exams and Scholarships</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="container">
    <h1>Competitive Exams and Scholarships</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" action="sample.php" name="myform">
      <label for="name">Name:</label>
      <input type="text"  name="name" id="name" >
    <span style="color:red"><?php echo $nameErr; ?></span><br><br>
      <label for="class">Class:</label>
      <select id="class" name="class">
      <option>10</option>
      <option>12</option>
      </select>
  <span style="color:red"><?php echo $classErr; ?></span><br><br>
      <label for="percentage">Previous Class Percentage:</label>
      <input type="text" id="percentage" name="per">
      <span style="color:red"><?php echo $perErr; ?></span><br><br>
      <button type="submit" >Submit</button>
    </form>

</div>
</body>
</html>