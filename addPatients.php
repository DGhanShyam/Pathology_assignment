<?php
include_once 'demo.php';
 ?>

<html>
<head>
	<title>Registration Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>

    <?php if (isset($_POST['form_submitted_patient'])):

        $name = $_POST['pname'];
        $num = $_POST['pno'];

        $sql = "INSERT INTO patients (name, phone) VALUES ('$name', '$num')";
        if (mysqli_query($conn, $sql)) {
           echo ("Patient record has been added successfully !");
        } else {
           echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
        
        ?> 


        <p>Go <a href="/registration_form.php">back</a> to the form</p>

        <?php else: ?>
      <?php endif;  ?> 
</body> 
</html>