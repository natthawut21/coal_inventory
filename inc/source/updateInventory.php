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
            
            //echo "receive raw mat: $_receive_date , $_receive_qty , $_store_location ,$_receive_remark ";
             $_update_status = addNewRawMat($_receive_date , $_receive_qty , $_store_location ,$_receive_remark);
             echo $_update_status;
        }
        else if( $_action == "withdraw_rawmat")
        {
            
            //var param_withdraw_rawmat ="withdraw_date="+val_withdraw_date+"&withdraw_qty="+val_withdrawe_qty+"&store_location="+val_store_location+"&withdraw_remark="+val_withdraw_remarks;;
            $_withdraw_date = $_GET['withdraw_date'];
            $_withdraw_qty = $_GET['withdraw_qty'];
            $_store_location = $_GET['store_location'];
            $_withdraw_remark = $_GET['withdraw_remark'];
            
            //echo "receive raw mat: $_receive_date , $_receive_qty , $_store_location ,$_receive_remark ";
             $_update_status = withdrawRawMat($_withdraw_date , $_withdraw_qty , $_store_location ,$_withdraw_remark);
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
    }
    function getRawMatBalance()
    {
        $_balance=0;
        include "db_connect_inc.php";
        $sql="Select Balance from product_code Where prod_id = 1";
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
    function addNewRawMat($_receive_date , $_receive_qty , $_store_location ,$_receive_remark )
    {
        include "db_connect_inc.php";
        $_product_id =1;
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
        $_prior_balnace = getRawMatBalance();
        $_new_balance =  $_receive_qty+$_prior_balnace;
        $sql_1 = "INSERT INTO tx_log (prod_id,tx_type_id,tx_create_time,amount,prior_balance,balance,location_id,remarks,unit_id,tx_log_time,uid)  ".
                            " VALUES ( $_product_id, $_tx_type_id,'$insertdate', $_receive_qty, $_prior_balnace,$_new_balance ,$_store_location,'$_receive_remark',$_unit_id,now(),$_user_login_id);";
        // echo "<BR> $sql_1 ";
        
        
        
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
     function withdrawRawMat($_withdraw_date , $_withdraw_qty , $_store_location ,$_withdraw_remark )
    {
        include "db_connect_inc.php";
        $_product_id =1;
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
        $_prior_balnace = getRawMatBalance();
        $_new_balance =  $_prior_balnace-$_withdraw_qty;
         
        $sql_1 = "INSERT INTO tx_log (prod_id,tx_type_id,tx_create_time,amount,prior_balance,balance,location_id,remarks,unit_id,tx_log_time,uid)  ".
                            " VALUES ( $_product_id, $_tx_type_id,'$insertdate', $_withdraw_qty, $_prior_balnace,$_new_balance ,$_store_location,'$_withdraw_remark',$_unit_id,now(),$_user_login_id);";
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
        
?>