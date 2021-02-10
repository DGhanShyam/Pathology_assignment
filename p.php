<?php
include_once 'demo.php';
session_start();
 ?>

<html>
<head>
	<title>Login Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>

    <?php if (isset($_POST['form_submitted'])): ?> 

<?php
     $name = $_POST['firstname'];
     $id = $_POST['id'];
     $mail = $_POST['mail'];

        $query = "select * from pathology where id= $id ";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $row = mysqli_fetch_row($result);

        if( ! $row)
        {
         echo("Incorrect Login data");
         ?>          <p>Go <a href="index.html"></a> to Login Page</p>
         <?php

        }else{

               ?> 
                 <?php
               
               if ($row[1] == $id and $row[2] == $mail ) {   ?>
 <center>               <h2>Welcome <?php echo $_POST['firstname']; ?> </h2>
                  <h4>Add Patients</h4>

                  <form action="p.php" method="POST"> 
                  Patient name:
                  <input type="text" name="pname"> <br>
                  Patient Phone no. :
                  <input type="text" name="pno">
         
                  <input type="hidden" name="form_submitted_patient" value="1" />
                  <Br>
                  <input type="submit" value="Save">
       
               </form>
</center>

               <center>
   <h3>Patients Information</h3>
   <table border="1px" style="width:600px; line-height:40px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Id</th>
                <th> Report</th>
            </tr>
        </thead>
        <tbody>
               <?php

                     $query1 = "select * from patients ";
                     $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));                  
                     while($row = mysqli_fetch_assoc($result1)){   ?>

                     <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['phone']; ?></td>

                        <td><?php echo $row['id']; ?></td>
                        <?php $p_name = $row['id']; ?>
                        
                         <?php   $_SESSION["name"]= "$p_name";  ?>     <!--  session -->
                           
                        <td>   <a href="update.php?id=<?php  echo $row['id']; ?>"> Update </a>  </td>
                     <tr>

                     <?php
                     }


                     ?>
                     </tbody>
                     </table>
                     </center>

               <?php
               } else {
                  echo ("<br> incorrect data");
                  ?>   <p>Go <a href="index.html">Login Page</a> to Login Page</p>   <?php
               }
               // mysqli_close($conn);           
        }
?>
        <?php else: ?>
      <?php endif;  ?> 




      <!-- after adding patients below executes-->

      
<?php if (isset($_POST['form_submitted_patient'])):

$name = $_POST['pname'];
$num = $_POST['pno'];

$sql = "INSERT INTO patients (name, phone) VALUES ('$name', '$num')";
if (mysqli_query($conn, $sql)) {
   echo ("Patient record has been added successfully !");
   ?>
<center>
                  <h4>Add Student</h4>
            <form action="p.php" method="POST"> 
                  Patient name:
                  <input type="text" name="pname"> <br>
                  Patient Phone no. :
                  <input type="text" name="pno">
         
                  <input type="hidden" name="form_submitted_patient" value="1" />
                  <Br>
                  <input type="submit" value="Submit">
       
               </form>
</center>

<center>
   <h3>Patients Information</h3>
   <table border="1px" style="width:600px; line-height:40px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Id</th>
                <th>Report</th>
            </tr>
        </thead>
        <tbody>
               <?php

$query1 = "select * from patients ";
$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));                  
while($row = mysqli_fetch_assoc($result1)){   ?>

<tr>
   <td><?php echo $row['name'] ?></td>
   <td><?php echo $row['phone']; ?></td>

   <td><?php echo $row['id']; ?></td>
   <td>   <a href="update.php?id=<?php  echo $row['id']; ?>"> Update </a>  </td>

<tr>

<?php
 }


?>
</tbody>
</table>
</center>
<?php

} else {
   echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
mysqli_close($conn);

?> 

<?php else: ?>
      <?php endif;  ?> 
</body> 
</html>