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
           
          if($_selected_val==-1)
              $_blank_selected =" selected ";
          else
              $_blank_selected ="  ";
          $_return_val ="\n <option value=\"-1\" $_blank_selected></option>\n  $_return_val";
           
           return $_return_val;
           
       }
      function getRawMatList_v1($_selected_val)
      {
          
         include "db_connect_inc.php";
           
           $_query = "SELECT prod_id,prod_code_TH FROM product_code WHERE prod_type_id =1 order by prod_code_TH";
          
           $result = $conn->query($_query);
       // echo $_query;
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
          if($_selected_val== -1)
              $_blank_selected =" selected ";
          else
              $_blank_selected ="  ";
          $_return_val ="\n <option value=\"-1\" $_blank_selected></option>\n  $_return_val";
           return $_return_val;
           
          
      }
	  /* getProductList_v1 : use for show product list and not select rawmaterial */
	   function getProductList_v1($_selected_val)
      {
          
         include "db_connect_inc.php";
           
           $_query = "SELECT prod_id,prod_code_TH FROM product_code WHERE prod_type_id =1 order by prod_code_TH";
          
           $result = $conn->query($_query);
        //echo $_query;
            if ($result->num_rows > 0) {
            //echo "....".$result->num_rows;

            $_return_val ="";
            while($row = $result->fetch_assoc()) {

                //echo "\n <br>".$row["location_id"]."-".$row["location_name"];
                $_return_val .="\n<optgroup label=\"".$row["prod_code_TH"]."\">";
               $_return_val .= $this->getSubProduct($row["prod_id"]);
				
            }
            
            } else {
        
            }
           $conn->close();
          if($_selected_val== -1)
              $_blank_selected =" selected ";
          else
              $_blank_selected ="  ";
          $_return_val ="\n <option value=\"-1\" $_blank_selected></option>\n  $_return_val";
           return $_return_val;
           
          
      }
        
        
        function getSellProductList_v1($_selected_val)
      {
          
         include "db_connect_inc.php";
           
           $_query = "SELECT prod_id,prod_code_TH FROM product_code WHERE prod_type_id =1 order by prod_code_TH";
          
           $result = $conn->query($_query);
        //echo $_query;
            if ($result->num_rows > 0) {
            //echo "....".$result->num_rows;

            $_return_val ="";
            while($row = $result->fetch_assoc()) {

                
                //$_return_val .="\n<optgroup label=\"".$row["prod_code_TH"]."\">";
              //  $_return_val .="\n<optgroup label=\"".$row["prod_code_TH"]."\">";
                $_return_val .="\n <option value=\"".$row['prod_id']."\">".$row["prod_code_TH"]."</option>\n ";
               $_return_val .= $this->getSubSellProduct($row["prod_id"]);
				
            }
            
            } else {
        
            }
           $conn->close();
          if($_selected_val== -1)
              $_blank_selected =" selected ";
          else
              $_blank_selected ="  ";
          $_return_val ="\n <option value=\"-1\" $_blank_selected></option>\n  $_return_val";
           return $_return_val;
           
          
      }
        
        function getSubProduct($_rowmat_id)
        {
             include "db_connect_inc.php";
           
           $_query = "SELECT prod_id,prod_code_TH FROM product_code WHERE prod_type_id =2 and sub_product_type_id = $_rowmat_id order by prod_code_TH";
            //echo $_query;
             $_return_val ="";
            // $_return_val="";
           $result = $conn->query($_query);
          
           
            if ($result->num_rows > 0) {
            //echo "....".$result->num_rows;

           
            while($row = $result->fetch_assoc()) {
                $_return_val .="\n <option value=\"".$row["prod_id"]."\">".$row["prod_code_TH"]."</option>";
            }
            }
           return $_return_val;
            
            
        }
        function getSubSellProduct($_rowmat_id)
        {
             include "db_connect_inc.php";
           
           $_query = "SELECT prod_id,prod_code_TH FROM product_code WHERE prod_type_id =2 and sub_product_type_id = $_rowmat_id order by prod_code_TH";
            //echo $_query;
             $_return_val ="";
            // $_return_val="";
           $result = $conn->query($_query);
          
           
            if ($result->num_rows > 0) {
            //echo "....".$result->num_rows;

           
            while($row = $result->fetch_assoc()) {
                $_return_val .="\n <option value=\"".$row["prod_id"]."\">&nbsp;&nbsp;&nbsp; - &nbsp;".$row["prod_code_TH"]."</option>";
            }
            }
           return $_return_val;
            
            
        }
       function getRawMatList($_selected_val)
       {
           include "db_connect_inc.php";
           
           $_query = "SELECT prod_id,prod_code_TH FROM product_code WHERE prod_type_id =1 order by prod_code_TH";
          
           $result = $conn->query($_query);
       // echo $_query;
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
	   
	   function getWithdrawRawmatOption()
	   {
		    include "db_connect_inc.php";
          
           $_query = "SELECT wh_id,document_Date , DATE_FORMAT(document_date,'%d-%b-%Y') as document_date_2,document_no FROM `withdraw_document_header` order by document_date";
          
           $result = $conn->query($_query);
        //echo $_query;
            if ($result->num_rows > 0) {
            //echo "....".$result->num_rows;

            $_return_val ="";
            while($row = $result->fetch_assoc()) {

                //echo "\n <br>".$row["location_id"]."-".$row["location_name"];
                $_return_val .="\n <option value=\"".$row["wh_id"]."\">เอกสารหมายเลข : ".$row["document_no"]." / วันที่ :".$row["document_date_2"]."</option>";
            }
            
            } else {
        
            }
           $conn->close();
           return $_return_val;
		   
		   
		   
	   }
        
    
    }

?>