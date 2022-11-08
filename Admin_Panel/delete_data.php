<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


          <!-- Delete Blood Doner Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['blood_doner_id']))
            {
              $blood_doner_id = $_GET['blood_doner_id'];

              $sql = "DELETE FROM tb_blood_doner WHERE blood_doner_id = $blood_doner_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Blood Doner details deleted successfully.");
                  window.location='blood_doner.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>



          <!-- Delete Blood Donation Center Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['blood_donation_center_id']))
            {
              $blood_donation_center_id = $_GET['blood_donation_center_id'];

              $sql = "DELETE FROM tb_blood_donation_center WHERE blood_donation_center_id = $blood_donation_center_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Blood Donation Center details deleted successfully.");
                  window.location='manage_donation_center.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>



          <!-- Delete Ambulance Service Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['ambulance_service_id']))
            {
              $ambulance_service_id = $_GET['ambulance_service_id'];

              $sql = "DELETE FROM tb_ambulance_service WHERE ambulance_service_id = $ambulance_service_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Ambulance Service details deleted successfully.");
                  window.location='manage_ambulance_service.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>



          <!-- Delete Ambulance Service Details -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['foundation_id']))
            {
              $foundation_id = $_GET['foundation_id'];

              $sql = "DELETE FROM tb_charity_foundation WHERE foundation_id = $foundation_id";

              $delete_row = $db->delete($sql);

              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Charity Foundation details deleted successfully.");
                  window.location='manage_charity_foundation.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>






