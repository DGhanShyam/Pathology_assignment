
<?php
     $name = $_POST['firstname'];
     $id = $_POST['id'];
     $mail = $_POST['mail'];

        $sql = "INSERT INTO pathology (name, id,mail) VALUES ('$name','$id','$mail')";
     if (mysqli_query($conn, $sql)) {
        echo ("New record has been added successfully !");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
?>
