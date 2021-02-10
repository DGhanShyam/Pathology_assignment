<?php
include_once 'demo.php';
?>


    <?php if (isset($_POST['form_submitted_patient'])): ?> 

<?php
     $name = $_POST['firstname'];
     $id = $_POST['id'];

        $query = "select * from patients where id= $id ";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $row = mysqli_fetch_row($result);

        if( ! $row)
        {
         echo("Incorrect Login data");
         ?>          <p>Go <a href="PatientHome.html"></a> to Login Page</p>
         <?php

        }else{

               ?> 
                 <?php
               
               if ( $row[2] == $id ) {   ?>
 <h2>Welcome <?php echo $row[0] ?> </h2>
 <center>
   <h3>Medical Report</h3>
   <table border="1px" style="width:600px; line-height:40px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Id</th>
                <th>fL</th>
                <th>Cmm</th>
                <th>mEq_L</th>
                <th>Pg</th>

            </tr>
        </thead>
        <tbody>
               <?php

                     $query1 = "select * from patients  where id= $id";
                     $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));                  
                     while($row = mysqli_fetch_assoc($result1)){   ?>

                     <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fL']; ?></td>
                        <td><?php echo $row['Cmm']; ?></td>
                        <td><?php echo $row['mEq_L']; ?></td>
                        <td><?php echo $row['Pg']; ?></td>
                           
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
                  ?>   <p>Go <a href="PatientHome.html">Login Page</a> to Login Page</p>   <?php
               }
               // mysqli_close($conn);           
        }
?>
        <?php else: ?>
      <?php endif;  ?> 
