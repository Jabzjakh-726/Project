<?php
$nameErr = "";
$passErr = "";
$emailErr = "";
$uname = "";
$pass = "";
$email = "";
$birth = "";
$birthErr = "";
$phno = "";
$phnoErr = "";
$gen = "";
$genErr = "";
$repass = "";
$repassErr = "";
$fileuploadErr = "";
$add = "";
$addErr = "";
$cErr = "";
$exam="";
$examErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $birth = $_POST["birth"];
    $phno = $_POST["phno"];
    $repass = $_POST["Repass"];
    $add = $_POST["address"];
    $exam=$_POST["Exam"];
    $gen = isset($_POST["gender"]) ? $_POST["gender"] : "";

    if (empty($uname)) {
        $nameErr = "Name is Required";
    } else {
        if (!preg_match('/^[a-zA-Z ]*$/', $uname)) {
            $nameErr = "Only alphabets and white space allowed";
        }
    }
    if($exam=="0"){
        $examErr="Exam name is Required";
    }
    else{
        if (!preg_match('/^[a-zA-Z ]*$/', $exam)){
          $examErr="Only alphabets and white space allowed";
        }
    }
    if (empty($pass)) {
        $passErr = "Password is Required";
    } else {
        $re = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/";
        if (!preg_match($re, $pass)) {
            $passErr = "Password should be alphanumeric with a special character";
        }
    }
    if (empty($repass)) {
        $repassErr = "Reenter the password is required";
    } else {
        if ($pass != $repass) {
            $repassErr = "Enter correct password";
        }
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } else {
        $reg = "/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/";
        if (!preg_match($reg, $email)) {
            $emailErr = "Email should be in the correct format";
        }
    }

    if (empty($phno)) {
        $phnoErr = "Phone number is required";
    } else {
        $reg1 = "/^\d{10}$/";
        if (!preg_match($reg1, $phno)) {
            $phnoErr = "10 digit number required";
        }
    }

    if (empty($gen)) {
        $genErr = "Gender is required";
    }

    if (empty($birth)) {
        $birthErr = "Birth date is Required";
    }
    if (empty($add)) {
        $addErr = "Address is required";
    }

    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["size"] > 50000) {
        $fileuploadErr = "Sorry, your file is too large. Maximum file size allowed is 50 KB.";
    } else {
        $targetDir = "C:/xampp/htdocs/project/";
        $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile);
    }

    if (isset($_FILES["cupload"]) && $_FILES["cupload"]["size"] > 50000) {
        $cErr = "Sorry, your file is too large. Maximum file size allowed is 50 KB.";
    } else {
        $targetDir = "C:/xampp/htdocs/project/";
        $targetFile = $targetDir . basename($_FILES["cupload"]["name"]);
        move_uploaded_file($_FILES["cupload"]["tmp_name"], $targetFile);
    }

    if (empty($nameErr) && empty($passErr) && empty($emailErr) && empty($birthErr) && empty($phnoErr) && empty($genErr) && empty($repassErr) && empty($fileuploadErr) && empty($addErr) && empty($fileuploadErr) && empty($cErr)) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($servername, $username, $password,'db4');
        $result=mysqli_query($conn,"insert into twelve(name,email,pass,repass,exam,phno,gender,birthdate,address) values('$uname','$email','$pass','$repass','$exam','$phno','$gen','$birth','$add');") or $val='email already exists';
        header('Location: sample.html');
    }
}
?>
<html>
  <head><title>Registration Form</title>
  <link rel="stylesheet" type="text/css" href="style4.css">
</head>
  
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        Name: <input type="text" name="uname" value="<?php echo $uname ?>">
        <span style="color:red"><?php echo $nameErr; ?></span><br><br>
        ExamName:    <select id="class" name="Exam" value="<?php echo $exam ?>">
        <option value="0">Select Class</option>
        <option value="JEEMAIN">JEEMAIN</option>
        <option value="JEEADAVANCE">JEEADAVANCE</option>
        <option value="APEMACET">APEMACET</option>
        <option value="TSEMACET">TSEMACET</option>
        <option value="VIT">VIT</option>
        <option value="SRM">SRM</option>

      </select>

        <span style="color:red"><?php echo $examErr; ?></span><br><br>
        Email: <input type="email" name="email" value="<?php echo $email ?>">
        <span style="color:red"><?php echo $emailErr; ?></span><br><br>
        Password: <input type="password" name="pass" value="<?php echo $pass ?>">
        <span style="color:red"><?php echo $passErr; ?></span><br><br>
        Reenterpassword: <input type="password" name="Repass" value="<?php echo $repass ?>">
        <span style="color:red"><?php echo $repassErr; ?></span><br><br>
        PhoneNum: <input type="text" name="phno" value="<?php echo $phno ?>">
        <span style="color:red"><?php echo $phnoErr; ?></span><br><br>
        Gender: <input type="radio" name="gender" value="Male" /><span>Male</span>
        <input type="radio" name="gender" value="Female" /><span>Female</span>
        <span style="color:red"><?php echo $genErr; ?></span><br><br>
        Birthdate: <input type="date" name="birth" value="<?php echo $birth ?>">
        <span style="color:red"><?php echo $birthErr; ?></span><br><br>
        Address:<textarea name="address" rows="5" cols="50" value="<?php echo $add ?>"></textarea>
        <span style="color:red"><?php echo $addErr; ?></span><br><br>
        Image: <input type="file" name="fileToUpload" >
        <span style="color:red"><?php echo $fileuploadErr; ?></span><br><br>
        certificateImage: <input type="file" name="cupload">
        <span style="color:red"><?php echo $cErr; ?></span><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
