





<!DOCTYPE html>
<html lang="en">
<?php include('../settings/settings-header/index.php'); ?>


<?php include('../settings/setting-body/index.php'); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<body>

<?php

 $connect = new PDO("mysql:host=localhost;dbname=arrsys", "root", "");


$get_all_table_query = "SHOW TABLES";
$statement = $connect->prepare($get_all_table_query);
$statement->execute();
$result = $statement->fetchAll();


function validate($data) { // Input fields validator to avoid XSS and SQL Injection
   $data = trim($data); // remove extra white space(s)
   $data = stripslashes($data); // remove forward and back slashes
   $data = htmlspecialchars($data); // remove special characters
   return $data;
}



    if(isset($_POST['submit'])){

    $tables = '*';


          
      $output = "-- database backup - ".date('Y-m-d H:i:s').PHP_EOL;
      $output .= "SET NAMES utf8;".PHP_EOL;
      $output .= "SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';".PHP_EOL;
      $output .= "SET foreign_key_checks = 0;".PHP_EOL;
      $output .= "SET AUTOCOMMIT = 0;".PHP_EOL;
      $output .= "START TRANSACTION;".PHP_EOL;
        //get all table names
        if($tables == '*') {
          $tables = [];
          $query = $connect->prepare('SHOW TABLES');
          $query->execute();
          while($row = $query->fetch(PDO::FETCH_NUM)) {
            $tables[] = $row[0];
          }
          $query->closeCursor();
        }
        else {
          $tables = is_array($tables) ? $tables : explode(',',$tables);
        }

        foreach($tables as $table) {

          $query = $connect->prepare("SELECT * FROM `$table`");
          $query->execute();
          $output .= "DROP TABLE IF EXISTS `$table`;".PHP_EOL;

          $query2 = $connect->prepare("SHOW CREATE TABLE `$table`");
          $query2->execute();
          $row2 = $query2->fetch(PDO::FETCH_NUM);
          $query2->closeCursor();
          $output .= PHP_EOL.$row2[1].";".PHP_EOL;

            while($row = $query->fetch(PDO::FETCH_NUM)) {
              $output .= "INSERT INTO `$table` VALUES(";
              for($j=0; $j<count($row); $j++) {
                $row[$j] = addslashes($row[$j]);
                $row[$j] = str_replace("\n","\\n",$row[$j]);
                if (isset($row[$j]))
                  $output .= "'".$row[$j]."'";
                else $output .= "''";
                if ($j<(count($row)-1))
                  $output .= ',';
              }
              $output .= ");".PHP_EOL;
            }
          }
          $output .= PHP_EOL.PHP_EOL;

        $output .= "COMMIT;";
   //save filename

        
      $file_name = 'arsys_backup' . date('y-m-d') . '.sql';
      $file_handle = fopen($file_name, 'w+');
      fwrite($file_handle, $output);
      fclose($file_handle);
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename=' . basename($file_name));
      header('Content-Transfer-Encoding: binary');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);


  echo  '<script>swal({title: "Database succesfully exported.", icon: "success",});</script>';
          

        // exit();

      

    }

?>


<?php 

if(isset($_POST["restore"]))
{
 if($_FILES["database"]["name"] != '')
 {
  $array = explode(".", $_FILES["database"]["name"]);
  $extension = end($array);
  if($extension == 'sql')
  {
   $connect = mysqli_connect("localhost", "root", "", "arrsys");
   $output = '';
   $count = 0;
   $file_data = file($_FILES["database"]["tmp_name"]);
   foreach($file_data as $row)
   {
    $start_character = substr(trim($row), 0, 2);
    if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
    {
     $output = $output . $row;
     $end_character = substr(trim($row), -1, 1);
     if($end_character == ';')
     {
      if(!mysqli_query($connect, $output))
      {
       $count++;
      }
      $output = '';
     }
    }
   }
   if($count > 0)
   {
  
    echo  '<script>swal({title: "Something went wrong file exist.", icon: "error",});</script>';

   }
   else
   {
  echo  '<script>swal({title: "Database uploaded successfully.", icon: "success",});</script>';

    header('Location:/arsys/settings');

   }
  }
  else
  {
     echo  '<script>swal({title: "Invalid file "error",});</script>';

  }
 }
 else
 {
  echo  '<script>swal({title: "Please select sql file.", icon: "error",});</script>';
 }
 
}
?>




<?php



 $db = new PDO("mysql:host=localhost;", "root", "");


 if(isset($_POST['createDb'])){
  

  $sql = "CREATE DATABASE IF NOT EXISTS arrsys";
	$db->exec($sql);
	$sql = "use arrsys";
	$db->exec($sql);

	$sql = "CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";


	$db->exec($sql);

	$sql = "CREATE TABLE IF NOT EXISTS `department_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

  $db->exec($sql);

  $sql= "SET foreign_key_checks = 0;".PHP_EOL;

  $db->exec($sql);

	$sql = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `id_number` varchar(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `department_specify` varchar(20) DEFAULT NULL,
  `phone_number` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department_office` (`id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

	$db->exec($sql);

  $sql= "SET foreign_key_checks = 1;".PHP_EOL;

  $db->exec($sql);

  
  $sq="CREATE TABLE IF NOT EXISTS `facilities_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

  $db->exec($sql);


  $sql="CREATE TABLE IF NOT EXISTS `motorpool_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `plate_number` varchar(50) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `gear` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `capacity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

  $db->exec($sql);

$sql="CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	$db->exec($sql);

$sql="CREATE TABLE IF NOT EXISTS `reservation_status` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";


  
	$db->exec($sql);

$sql="CREATE TABLE IF NOT EXISTS `reservation_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  
	$db->exec($sql);

$sql="CREATE TABLE IF NOT EXISTS `reset_password` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  
	$db->exec($sql);


$sql="CREATE TABLE IF NOT EXISTS `travel_reason` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  
	$db->exec($sql);

	
$sql="CREATE TABLE IF NOT EXISTS `travel_reason` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  
	$db->exec($sql);

  $sql= "SET foreign_key_checks = 0;".PHP_EOL;

  $db->exec($sql);

  $sql="CREATE TABLE IF NOT EXISTS `reservation_motorpool` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `reservation_type_id` int(11) DEFAULT NULL,
  `motorpool_type_id` int(11) DEFAULT NULL,
  `date_filling` varchar(255) NOT NULL,
  `borrowing_office` varchar(255) NOT NULL,
  `date_return` varchar(11) NOT NULL,
  `assigned_person` varchar(255) NOT NULL,
  `assigned_contact_number` varchar(11) NOT NULL,
  `reason_travel_id` int(11) DEFAULT NULL,
  `number_participant` varchar(255) NOT NULL,
  `target_day_use` varchar(255) NOT NULL,
  `scan_file` varchar(255) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  
	$db->exec($sql);

  $sql= "SET foreign_key_checks = 1;".PHP_EOL;

  $db->exec($sql);

  $sql= "SET foreign_key_checks = 0;".PHP_EOL;

  $db->exec($sql);

  $sql="CREATE TABLE IF NOT EXISTS `reservation_facilities` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `reservation_type_id` int(11) DEFAULT NULL,
  `facilities_type_id` int(11) DEFAULT NULL,
  `date_filling` varchar(255) NOT NULL,
  `date_return` varchar(11) NOT NULL,
  `borrowing` varchar(255) NOT NULL,
  `assigned_person` varchar(255) NOT NULL,
  `assigned_contact_number` varchar(11) NOT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `activity_name` varchar(255) NOT NULL,
  `brief_description` varchar(255) NOT NULL,
  `number_participant` varchar(255) NOT NULL,
  `target_day_use` varchar(255) NOT NULL,
  `scan_file` varchar(255) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  
	$db->exec($sql);

  $sql= "SET foreign_key_checks = 1;".PHP_EOL;

  $db->exec($sql);

  $db->exec($sql);

    if(isset($_POST['createDb'])){
        echo  '<script>swal({title: "Database created successfully", icon: "success",});</script>';
        header('Location:/arsys/settings');

    }


 }




?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


</html>