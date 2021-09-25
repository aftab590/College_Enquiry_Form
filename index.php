<?php //error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
    $insert = false;
    if(isset($_POST['fname'])){
    $server = "localhost:3307";
    $username= "root";
    $password= "";
    $dbname = "enquiry";


    $con = mysqli_connect($server, $username, $password, $dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $enq = $_POST['enq'];

    $sql = "INSERT INTO `college` (`fname`, `lname`, `email`, `phone`, `other`) VALUES ( '$fname', '$lname', '$email', '$phone', '$enq')";
    //echo $sql;

    if ($con->query($sql) === TRUE) {
        //echo "New record created successfully";
        $insert = true;
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital@1&display=swap" rel="stylesheet">
    <title>College Enquiry Form</title>
</head>
<body>
    <img class="bg" src="vesit.jpg" alt="Vesit">
    <div class="container">
        <h1>Welcome to VESIT</h1>
        <p>Fill the below form for any admission related enquiry.</p>
        
        <?php 
        if($insert== true){
           echo" <p class='smsg'>Thanks for Submitting the form. We will get in touch with you soon!!</p>";
            }
        ?>
        <form action="index.php" method="post">
        <input type="text" name="fname" id="fname" placeholder="Enter your First Name" required>
        <input type="text" name="lname" id="lname" placeholder="Enter your Last Name" required>
        <input type="email" name="email" id="email" placeholder="Enter your Email" required>
        <input type="phone" name="phone" id="phone" placeholder="Enter your Contact Number" required>
        <textarea name="enq" id="enq" cols="30" rows="10" placeholder="Enter your Query here..." required></textarea>
        <button class="btn">Submit</button>
        
    </form>
    </div>

    <script src="index.js"></script>
</body>
</html>