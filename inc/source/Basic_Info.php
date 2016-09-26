<?php
    class Basic_Info
    {
       function getLocationList($_selected_val)
       {
           include "db_connect_inc.php";
           
           $_query = "SELECT location_id, location_name FROM location order by location_name";
          
           $result = $conn->query($_query);

            if ($result->num_rows > 0) {
            //echo "....".$result->num_rows;

            $_return_val ="";
            while($row = $result->fetch_assoc()) {

                //echo "\n <br>".$row["location_id"]."-".$row["location_name"];
                $_return_val .="\n <option value=\"".$row["location_id"]."\">".$row["location_name"]."</option>";
            }
            
            } else {
        
            }
           $conn->close();
           return $_return_val;
           
       }
        
       function getProductList($_selected_val)
       {
           include "db_connect_inc.php";
           
           $_query = "SELECT prod_id,prod_code_TH FROM product_code WHERE prod_type_id =2 order by prod_code_TH";
          
           $result = $conn->query($_query);
        //echo $_query;
            if ($result->num_rows > 0) {
            //echo "....".$result->num_rows;

            $_return_val ="";
            while($row = $result->fetch_assoc()) {

                //echo "\n <br>".$row["location_id"]."-".$row["location_name"];
                $_return_val .="\n <option value=\"".$row["prod_id"]."\">".$row["prod_code_TH"]."</option>";
            }
            
            } else {
        
            }
           $conn->close();
           return $_return_val;
           
       }
        
    
    }

?>