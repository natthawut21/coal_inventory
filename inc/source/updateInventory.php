<?php
// Start the session
    session_start();
?>

<?php
 
    if(isset($_GET['action']))
    {   
        $_action =$_GET['action'];
        if( $_action == "receive_rawmat")
        {
            
            //var param_receive_rawmat ="receive_date="+val_receive_date+"&receive_qty="+val_receive_qty+"&store_location="+val_store_location+"&receive_remark="+val_receive_remarks;
            $_receive_date = $_GET['receive_date'];
            $_receive_qty = $_GET['receive_qty'];
            $_store_location = $_GET['store_location'];
            $_receive_remark = $_GET['receive_remark'];
            
            $_product_id = $_GET['product_id'];
            $_TM_value = $_GET['TM_value'];
            
            
            //echo "receive raw mat: $_receive_date , $_receive_qty , $_store_location ,$_receive_remark ";
             $_update_status = addNewRawMat($_receive_date , $_product_id,$_receive_qty,$_TM_value , $_store_location ,$_receive_remark);
             echo $_update_status;
        }
        else if( $_action == "withdraw_rawmat")
        {
            
            //var param_withdraw_rawmat ="withdraw_date="+val_withdraw_date+"&withdraw_qty="+val_withdrawe_qty+"&store_location="+val_store_location+"&withdraw_remark="+val_withdraw_remarks;;
            $_withdraw_date = $_GET['withdraw_date'];
            $_withdraw_qty = $_GET['withdraw_qty'];
            $_store_location = $_GET['store_location'];
            $_withdraw_remark = $_GET['withdraw_remark'];
            
             $_product_id = $_GET['product_id'];
            $_TM_value = $_GET['TM_value'];
            //echo "receive raw mat: $_receive_date , $_receive_qty , $_store_location ,$_receive_remark ";
             $_update_status = withdrawRawMat($_withdraw_date, $_product_id, $_withdraw_qty ,$_TM_value , $_store_location ,$_withdraw_remark);
             echo $_update_status;
        }
        else if( $_action == "receive_product")
        {
            
            //var param_receive_rawmat ="receive_date="+val_receive_date+"&receive_qty="+val_receive_qty+"&store_location="+val_store_location+"&receive_remark="+val_receive_remarks;
            $_receive_date = $_GET['receive_date'];
            $_receive_qty = $_GET['receive_qty'];
            $_prod_id = $_GET['prod_id'];
            $_store_location = $_GET['store_location'];
            $_receive_remark = $_GET['receive_remark'];
            
            //echo "receive raw mat: $_receive_date , $_receive_qty , $_store_location ,$_receive_remark ";
             $_update_status = addNewProduct($_receive_date , $_prod_id, $_receive_qty , $_store_location ,$_receive_remark);
             echo $_update_status;
        }
        else if($_action == "sell_product")    
        {
            // var param_receive_product ="sell_date="+val_sell_date+"&sell_qty="+val_sell_qty+"&prod_id="+val_sell_product+"&store_location="+val_sell_location+"&sell_remark="+val_sell_remarks;
            $_sell_date = $_GET['sell_date'];
            $_sell_qty = $_GET['sell_qty'];
            $_prod_id = $_GET['prod_id'];
            $_store_location = $_GET['store_location'];
            $_sell_remark = $_GET['sell_remark'];
             $_update_status = sellProduct($_sell_date , $_prod_id, $_sell_qty , $_store_location ,$_sell_remark);
             echo $_update_status;
            
            
        }
        
        else if($_action=="add_receive_rawmat_header")
        {
            $_receive_date = $_GET['receive_date'];
            $_receive_doc_no = $_GET['document_no'];
            $_receive_remark = $_GET['receive_remark'];
            $_header_update_status = updateRecRawMat_Header("addnew",$_receive_date , $_receive_doc_no,$_receive_remark);
            
            if($_header_update_status>-1)
            {
                $_product_array = $_GET['product_id'];
                $_TM_value_array = $_GET['TM_value'];
                $_receive_qty_array = $_GET['receive_qty'];
                $_store_location_array = $_GET['store_location'];
                for($p=0;$p<count($_product_array);$p++)
                {
                    if($_product_array[$p]!=-1 && $_receive_qty_array[$p]>0)
                    {
                        
                      $_update_header_detail_status = updateHeader_Detail( $_header_update_status,$_product_array[$p],$_TM_value_array[$p],$_receive_qty_array[$p],$_store_location_array[$p],"");
                      $_update_status = addNewRawMat($_receive_date ,$_product_array[$p], $_receive_qty_array[$p],$_TM_value_array[$p] , $_store_location_array[$p] ,"HEADER_ID=$_header_update_status");  
                        
                        
                    }
                    
                }
             echo $_update_status;   
            }
           
            
        }
         else if($_action=="add_withdraw_rawmat_header")
        {
            $_withdraw_date = $_GET['withdraw_date'];
            $_withdraw_doc_no = $_GET['document_no'];
            $_withdraw_remark = $_GET['receive_remark'];
            $_header_update_status = updateWithdrawRawMat_Header("addnew",$_withdraw_date , $_withdraw_doc_no,$_withdraw_remark);
            
            if($_header_update_status>-1)
            {
                $_product_array = $_GET['product_id'];
                $_TM_value_array = $_GET['TM_value'];
                $_withdraw_qty_array = $_GET['withdraw_qty'];
                $_withdraw_location_array = $_GET['store_location'];
                for($p=0;$p<count($_product_array);$p++)
                {
                    if($_product_array[$p]!=-1 && $_withdraw_qty_array[$p]>0)
                    {
                        
                      $_update_status = updateWithdraw_Detail( $_header_update_status,$_product_array[$p],$_TM_value_array[$p],$_withdraw_qty_array[$p],$_withdraw_location_array[$p],"");
                      $_update_status = withdrawRawMat($_withdraw_date, $_product_array[$p], $_withdraw_qty_array[$p],$_TM_value_array[$p],  $_withdraw_location_array[$p] ,"HEADER_ID=$_header_update_status");
                        
                        
                    }
                    
                }
             echo $_update_status;   
            }
           
            
        }
    
    }
    function getRawMatBalance($_product_id)
    {
        $_balance=0;
        include "db_connect_inc.php";
        $sql="Select Balance from product_code Where prod_id = $_product_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                $_balance=$row["Balance"];
            }
         } else {
            //echo "0 results";
        }
        $conn->close();
        return $_balance;
    }
  function getProductBalance($_prod_id)
    {
        $_balance=0;
        include "db_connect_inc.php";
        $sql="Select Balance from product_code Where prod_id = $_prod_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                $_balance=$row["Balance"];
            }
         } else {
            //echo "0 results";
        }
        $conn->close();
        return $_balance;
    }

 function getMaxReceiveRawMatHeader()
    {
        $max_rh_id=0;
        include "db_connect_inc.php";
        $sql="Select max(rh_id) as max_rh_id from receive_rawmat_document_header ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                $max_rh_id=$row["max_rh_id"];
            }
         } else {
            //echo "0 results";
        }
        $conn->close();
        return $max_rh_id;
    }

  function updateWithdrawRawMat_Header($_action_type,$_withdraw_date , $_receive_doc_no,$_receive_remark )
  {
      include "db_connect_inc.php";
       // $_product_id =1;
        $_tx_type_id =1;
        $_unit_id =1;
        
        if(isset($_SESSION['user_login_id']))
        {
            $_user_login_id = $_SESSION['user_login_id'];
        }
        else 
        {
             $_user_login_id=4;
            
        }
        $_withdraw_date_array = explode("/",$_withdraw_date);
        $insertdate =  $_withdraw_date_array[2]."/". $_withdraw_date_array[1]."/". $_withdraw_date_array[0];
        
        if($_action_type=="addnew")
        {
           $_rh_id = getMaxReceiveRawMatHeader();
            
            $_query = "Insert into withdraw_document_header(document_date,document_no,remarks,create_date,create_by_uid,modify_date,modify_by_uid,document_status)".
            " VALUES('$insertdate','$_receive_doc_no','$_receive_remark',now(),$_user_login_id,now(),$_user_login_id ,1)";

            if ($conn->query($_query) === TRUE) {
                $last_id = $conn->insert_id;
                
            
        }
      
        }
        
        
        
   
      $conn->close();
        return  $last_id; 
      
  }
    
  function updateRecRawMat_Header($_action_type,$_receive_date , $_receive_doc_no,$_receive_remark )
    {
        include "db_connect_inc.php";
       // $_product_id =1;
        $_tx_type_id =1;
        $_unit_id =1;
        
        if(isset($_SESSION['user_login_id']))
        {
            $_user_login_id = $_SESSION['user_login_id'];
        }
        else 
        {
             $_user_login_id=4;
            
        }
        $_receive_date_array = explode("/",$_receive_date);
        $insertdate =  $_receive_date_array[2]."/". $_receive_date_array[1]."/". $_receive_date_array[0];
        
        if($_action_type=="addnew")
        {
           $_rh_id = getMaxReceiveRawMatHeader();
            
            $_query = "Insert into receive_rawmat_document_header(document_date,document_no,remarks,create_date,create_by_uid,modify_date,modify_by_uid,document_status,status_code)".
            " VALUES('$insertdate','$_receive_doc_no','$_receive_remark',now(),$_user_login_id,now(),$_user_login_id ,1,'RM-ADD')";
            
         // echo "<BR>$_query ";


            if ($conn->query($_query) === TRUE) {
                $last_id = $conn->insert_id;
                
            
        }
      
        }
        
        
        
   
      $conn->close();
        return  $last_id;
    }

function  updateWithdraw_Detail($_hdeader_id,$_product_id,$_TM_value,$_receive_qty,$_location_id,$_status)
  {
       include "db_connect_inc.php";
       $_tx_type_id =1;
       $_unit_id =1;
      $last_id=-1;
       if(isset($_SESSION['user_login_id']))
        {
            $_user_login_id = $_SESSION['user_login_id'];
        }
        else 
        {
             $_user_login_id=4;
            
        }
        $_sql ="INSERT INTO withdraw_document_detail(wh_id,prod_id,TM_PCT,amount,location_id,unit_id,status_code) VALUES ($_hdeader_id,$_product_id,$_TM_value,$_receive_qty,$_location_id,$_unit_id,'$_status')";
     //echo "<BR>$_sql";
        if ($conn->query($_sql) === TRUE) {
            $last_id = $conn->insert_id;
        }
      return $last_id;
      
  }


  function  updateHeader_Detail($_hdeader_id,$_product_id,$_TM_value,$_receive_qty,$_location_id,$_status)
  {
       include "db_connect_inc.php";
       $_tx_type_id =1;
       $_unit_id =1;
      $last_id=-1;
       if(isset($_SESSION['user_login_id']))
        {
            $_user_login_id = $_SESSION['user_login_id'];
        }
        else 
        {
             $_user_login_id=4;
            
        }
        $_sql ="INSERT INTO receive_rawmat_document_detail(rh_id,prod_id,TM_PCT,amount,location_id,unit_id,status_code) VALUES ($_hdeader_id,$_product_id,$_TM_value,$_receive_qty,$_location_id,$_unit_id,'$_status')";
     //echo "<BR>$_sql";
        if ($conn->query($_sql) === TRUE) {
            $last_id = $conn->insert_id;
        }
      return $last_id;
      
  }
    function addNewRawMat($_receive_date , $_product_id,$_receive_qty,$_TM_value, $_store_location ,$_receive_remark )
    {
        include "db_connect_inc.php";
       // $_product_id =1;
        $_tx_type_id =1;
        $_unit_id =1;
        
        if(isset($_SESSION['user_login_id']))
        {
            $_user_login_id = $_SESSION['user_login_id'];
        }
        else 
        {
             $_user_login_id=4;
            
        }
        $_receive_date_array = explode("/",$_receive_date);
        $insertdate =  $_receive_date_array[2]."/". $_receive_date_array[1]."/". $_receive_date_array[0];
        //$_prior_balnace = getRawMatBalance($_product_id);
        $_prior_balnace = getProductBalance($_product_id);
        $_new_balance =  $_receive_qty+$_prior_balnace;
        $sql_1 = "INSERT INTO tx_log (prod_id,tx_type_id,tx_create_time,amount,prior_balance,balance,location_id,remarks,unit_id,tx_log_time,uid,TM_PCT)  ".
                            " VALUES ( $_product_id, $_tx_type_id,'$insertdate', $_receive_qty, $_prior_balnace,$_new_balance ,$_store_location,'$_receive_remark',$_unit_id,now(),$_user_login_id,$_TM_value);";
       //  echo "<BR> $sql_1 ";
        
        
        
        $_update_status =0;
        if ($conn->query($sql_1) === TRUE) {
            $last_id = $conn->insert_id;
            // echo "<BR>  $last_id > update Product Balance ";
            
           $sql_2="update product_code set balance = balance+$_receive_qty,modify_date=now(),modify_by_uid=$_user_login_id  where prod_id =$_product_id";
           // echo "<BR> $sql_2 ";
           if ($conn->query($sql_2) === TRUE)
           {
               $_update_status =1;
           }
                  
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        return  $_update_status;
    }
     function withdrawRawMat($_withdraw_date , $_product_id,  $_withdraw_qty ,$_TM_value , $_store_location ,$_withdraw_remark )
    {
        include "db_connect_inc.php";
        //$_product_id =1;
        $_tx_type_id =2;
        $_unit_id =1;
        
        if(isset($_SESSION['user_login_id']))
        {
            $_user_login_id = $_SESSION['user_login_id'];
        }
        else 
        {
             $_user_login_id=4;
            
        }
        $_temp_date_array = explode("/",$_withdraw_date);
        $insertdate =  $_temp_date_array[2]."/". $_temp_date_array[1]."/". $_temp_date_array[0];
        //$_prior_balnace = getRawMatBalance($_product_id);
        $_prior_balnace = getProductBalance($_product_id);
        $_new_balance =  $_prior_balnace-$_withdraw_qty;
         
        $sql_1 = "INSERT INTO tx_log (prod_id,tx_type_id,tx_create_time,amount,prior_balance,balance,location_id,remarks,unit_id,tx_log_time,uid,TM_PCT)  ".
                            " VALUES ( $_product_id, $_tx_type_id,'$insertdate', $_withdraw_qty, $_prior_balnace,$_new_balance ,$_store_location,'$_withdraw_remark',$_unit_id,now(),$_user_login_id,$_TM_value );";
         //echo "<BR> $sql_1 ";
        
        
        
        $_update_status =0;
        if ($conn->query($sql_1) === TRUE) {
            $last_id = $conn->insert_id;
            // echo "<BR>  $last_id > update Product Balance ";
            
           $sql_2="update product_code set balance = balance-$_withdraw_qty,modify_date=now(),modify_by_uid=$_user_login_id  where prod_id =$_product_id";
           //echo "<BR> $sql_2 ";
           if ($conn->query($sql_2) === TRUE)
           {
               $_update_status =1;
           }
                  
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        return  $_update_status;
    }

function addNewProduct($_receive_date ,$_prod_id, $_receive_qty , $_store_location ,$_receive_remark )
    {
        include "db_connect_inc.php";
        $_product_id =$_prod_id;
        $_tx_type_id =3;
        $_unit_id =1;
        
        if(isset($_SESSION['user_login_id']))
        {
            $_user_login_id = $_SESSION['user_login_id'];
        }
        else 
        {
             $_user_login_id=4;
            
        }
        $_receive_date_array = explode("/",$_receive_date);
        $insertdate =  $_receive_date_array[2]."/". $_receive_date_array[1]."/". $_receive_date_array[0];
        $_prior_balance = getProductBalance($_product_id);
        $_new_balance =  $_receive_qty+$_prior_balance;
        $sql_1 = "INSERT INTO tx_log (prod_id,tx_type_id,tx_create_time,amount,prior_balance,balance,location_id,remarks,unit_id,tx_log_time,uid)  ".
                            " VALUES ( $_product_id, $_tx_type_id,'$insertdate', $_receive_qty, $_prior_balance,$_new_balance ,$_store_location,'$_receive_remark',$_unit_id,now(),$_user_login_id);";
        // echo "<BR> $sql_1 ";
        
        
        
        $_update_status =0;
        if ($conn->query($sql_1) === TRUE) {
            $last_id = $conn->insert_id;
            // echo "<BR>  $last_id > update Product Balance ";
            
           $sql_2="update product_code set balance = balance+$_receive_qty,modify_date=now(),modify_by_uid=$_user_login_id  where prod_id =$_product_id";
           //echo "<BR> $sql_2 ";
          //  
           if ($conn->query($sql_2) === TRUE)
           {
               $_update_status =1;
           }
                  
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        return  $_update_status;
    }

function sellProduct($_sell_date ,$_prod_id, $_sell_qty , $_store_location ,$_sell_remark )
    {
        include_once "db_connect_inc.php";
        $_product_id =$_prod_id;
        $_tx_type_id =4;
        $_unit_id =1;
        
        if(isset($_SESSION['user_login_id']))
        {
            $_user_login_id = $_SESSION['user_login_id'];
        }
        else 
        {
             $_user_login_id=4;
            
        }
        $_sell_date_array = explode("/",$_sell_date);
        $insertdate =  $_sell_date_array[2]."/". $_sell_date_array[1]."/". $_sell_date_array[0];
        $_prior_balance = getProductBalance($_prod_id);
        $_new_balance =  $_prior_balance-$_sell_qty;
        $sql_1 = "INSERT INTO tx_log (prod_id,tx_type_id,tx_create_time,amount,prior_balance,balance,location_id,remarks,unit_id,tx_log_time,uid)  ".
                            " VALUES ( $_product_id, $_tx_type_id,'$insertdate', $_sell_qty, $_prior_balance,$_new_balance ,$_store_location,'$_sell_remark',$_unit_id,now(),$_user_login_id);";
        // echo "<BR> $sql_1 ";
        
        
        
        $_update_status =0;
        if ($conn->query($sql_1) === TRUE) {
            $last_id = $conn->insert_id;
            // echo "<BR>  $last_id > update Product Balance ";
            
           $sql_2="update product_code set balance = balance - $_sell_qty,modify_date=now(),modify_by_uid=$_user_login_id  where prod_id =$_prod_id";
           //echo "<BR> $sql_2 ";
          //  
           if ($conn->query($sql_2) === TRUE)
           {
               $_update_status =1;
           }
                  
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        return  $_update_status;
    }
        
?>