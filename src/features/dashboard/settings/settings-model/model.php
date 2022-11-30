<?php

include('../../../../database/database.php');


class Settings extends DatabaseManager{



  
      public function getAlltables(){


      $stmt=$this->connect()->prepare('SHOW TABLES');
      $stmt->execute();


            if($stmt->rowCount()>0){
              while($row=$stmt->fetchAll()){
                  
                  echo json_encode($row);
              

            }
    
    
          }

    }




    public function backupSQl($tables= '*'){

      
        $output = '';
        foreach($tables as $table)
        {
          $show_table_query = "SHOW CREATE TABLE " . $table . "";
          $statement = $this->connect()->prepare($show_table_query);
          $statement->execute();
          $show_table_result = $statement->fetchAll();

          foreach($show_table_result as $show_table_row)
          {
          $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
          }
          $select_query = "SELECT * FROM " . $table . "";
          $statement = $this->connect()->prepare($select_query);
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
        $file_name = 'arsys' . date('y-m-d') . '.sql';
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
    


    


}



?>

