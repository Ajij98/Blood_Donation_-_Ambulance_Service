<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


  <!--Blood Donation Center Activation Section-->
  <?php
   $db = new Database();

     if(isset($_GET['blood_donation_center_id']))
     {
       $blood_donation_center_id = $_GET['blood_donation_center_id'];

       $sql = "SELECT is_verified FROM tb_blood_donation_center WHERE is_verified = 0 AND blood_donation_center_id = $blood_donation_center_id LIMIT 1";

       $result = $db->link->query($sql) or die($this->link->error.__LINE__);

       if($result->num_rows == 1)
       {
         $sql = "UPDATE tb_blood_donation_center SET is_verified = 1 WHERE blood_donation_center_id = $blood_donation_center_id LIMIT 1";

         $update = $db->link->query($sql) or die($this->link->error.__LINE__);

         if($update)
         {
           ?>
           <script type="text/javascript">

             window.alert("Blood Donation Center activated successfully.");
             window.location='manage_donation_center.php';

           </script>
           <?php
         }
         else
         {
           echo $db->link->error;
         }
       }
       else
       {
         $msg = '<br /><br /><br /><div class="alert alert-danger w-50 m-auto text-center">Something went wrong!</div><br />';
         echo $msg;
       }
     }
     else
     {
       die("Something went wrong!");
     }
   ?>
