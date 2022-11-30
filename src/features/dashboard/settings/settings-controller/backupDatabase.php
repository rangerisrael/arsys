<?php

 $connect = new PDO("mysql:host=localhost;dbname=arrsys", "root", "");


$get_all_table_query = "SHOW TABLES";
$statement = $connect->prepare($get_all_table_query);
$statement->execute();
$result = $statement->fetchAll();


    if($_POST['submit']){

    $tables = '*';


if($tables == '*') {
    $tables = [];
    $query =  $connect->prepare('SHOW TABLES');
    $query->execute();
    while($row = $query->fetch(PDO::FETCH_NUM)) {
    $tables[] = $row[0];
    }
    $query->closeCursor();
}
else {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
}


 $output = '';
 foreach($tables as $table)
 {
  $show_table_query = "SHOW CREATE TABLE " . $table . "";
  $statement = $connect->prepare($show_table_query);
  $statement->execute();
  $show_table_result = $statement->fetchAll();

  foreach($show_table_result as $show_table_row)
  {
   $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
  }
  $select_query = "SELECT * FROM " . $table . "";
  $statement = $connect->prepare($select_query);
  $statement->execute();
  $total_row = $statement->rowCount();

  for($count=0; $count<$total_row; $count++)
  {
   $single_result = $statement->fetch(PDO::FETCH_ASSOC);
   $table_column_array = array_keys($single_result);
   $table_value_array = array_values($single_result);
   $output .= "\nINSERT INTO $table (";
   $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
   $output .= "'" . implode("','", $table_value_array) . "');\n";
  }
 }
 $file_name = 'arsys_backup_' . date('y-m-d') . '.sql';
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


    }

?>