
<?php

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: index.php");
    exit();
    
}


$conn = mysqli_connect("localhost","root","","gbdb"); 
if (isset($_POST['submit']) ||!empty($_POST['submit'])) {
    $reg=$_POST['regno'];
    $name=$_POST['fnu'];
    $addr=$_POST['addru'];
    $not=$_POST['spnu'];
    
    $query="UPDATE `register` SET `name`=' $name',`address`='$addr',`note`='$not' WHERE `regno`='$reg';";

    if ($conn->query($query) === TRUE) {

        echo "
      

        <style>
        .msgbox{display: none;}
        .msgbox2{display: block;}
        
        </style>
        <script> window.location.href = 'trnsuc.php';</script>
       
        ";
    } else {
        echo "<p class='err'>Error: " . $query . "<br>" . $conn->error."</p>";
     
    }
}


?>
