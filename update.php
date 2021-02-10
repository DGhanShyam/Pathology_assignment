   <?php
include_once 'demo.php';  ?>

<center>             
<h4>Generate Patient Report</h4>

                  <form action="update.php" method="POST"> 
                  Patient ID:       <input type="text" name="u_id"> <br>
                  fL:       <input type="text" name="fL"> <br>
                  Cmm :     <input type="text" name="Cmm">    <br>              
                  g_Dl:     <input type="text" name="g_Dl">       <br>           
                  mEq_L:     <input type="text" name="mEq_L">         <br>         
                  Ng_mL:     <input type="text" name="Ng_mL">             <br>     
                  Pg:       <input type="text" name="Pg">                  <br>
                  <br>
                  <input type="hidden" name="form_submitted_report" value="1" />
                  <br>
                  <input type="submit" value="Save">
       
               </form>
               <p>Go <a href="p.php">back page</a> </p>

</center>

<?php

if (isset($_POST['form_submitted_report'])){ 

$u_id = $_POST['u_id'];
$fL = $_POST['fL'];
$Cmm = $_POST['Cmm'];
$g_Dl = $_POST['g_Dl'];
$mEq_L = $_POST['mEq_L'];
$Ng_mL = $_POST['Ng_mL'];
$Pg = $_POST['Pg'];

echo ("mysql 1 !");  ?>  <br>  <?php
echo ($u_id);
echo ($Pg);


$query_getShows = "INSERT INTO patients (Pg) VALUES ('$Pg') WHERE id= $u_id"; 
             
if (mysqli_query($conn, $query_getShows)) {
   echo ("<br>Patient record has been added successfully !");
}
else{ 
    echo ("<br>Un successfully !");

}

}
   ?>