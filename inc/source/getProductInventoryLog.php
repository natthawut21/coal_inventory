<?php
   // if(isset($_GET['prod_id']))
    //if(isset($_GET['param_table'])
        {
            $_inv_log_data ="";
            $_inv_log_data = getProductInventoryLog();
           // $_table_name = $_GET['table_name'];
            $_table_name = "receive_table_1";
            
            if(isset($_GET['param_table']))
                $_table_name = $_GET['param_table'];
           
               
           // echo "$_table_name";
?>

<table id="<?php echo $_table_name;?>" class="table table-bordered table-striped table-hover">
               <thead>
                <tr>
                  <th>วันที่</th>
                  <th>ประเภท</th>
                 
                  <th>สถานที่จัดเก็บ</th>
                  <th>ประเภทสินค้า</th>
                    
                  <th>จำนวน</th>
                  <th>สินค้าคงเหลือ</th>
                  <th>ผู้ทำรายการ</th>
                </tr>
                </thead>
                <tbody>
              <?php echo  $_inv_log_data;?>
 
                </tbody>
              
</table>
<?php  
    }
    function getProductInventoryLog()
    {
        include "db_connect_inc.php";
        $_sql =" SELECT tx.prod_id,tx.tx_type_id as tx_type_id,tx.tx_create_time,tx.amount,tx.prior_balance,tx.balance,tx.location_id,tx.remarks,tx.unit_id,tx.tx_log_time,tx.uid ".
                ",DATE_FORMAT(tx.tx_create_time,\"%d/%m/%Y\") as tx_date_1,tt.tx_code_TH as tx_code,lo.location_name as location,tx.amount as receive_amount,tx.balance as balance ,unit.unit_code as unit,user.username ".
                ",prd.prod_code_TH as prod_code_TH ,prd.prod_type_id as prod_type_id ".
               " FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user ".
               " WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and prd.prod_type_id = 2 order by tx_log_time";
       // echo "<BR> $_sql";
         $_table_row="";
        $result = $conn->query($_sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               // echo "<BR>".$row["tx_date_1"]."-".$row["tx_code"]."-".$row["location"].",( +".$row["receive_amount"]." ".$row["unit"].") - ".$row["balance"]."".$row["username"];
                $_bagdge ="bg-red";
                $_tx_sign ="";
                if($row["tx_type_id"]==1)
                {   $_bagdge ="bg-green";
                    $_tx_sign =" + ";
                }
                if($row["tx_type_id"]==2)
                {  
                    $_bagdge ="bg-red";
                    $_tx_sign =" - ";
                }
                
                else if($row["prod_type_id"]==2)
                {  
                    $_bagdge ="bg-blue";
                    $_tx_sign =" + ";
                }
                $_table_row.="\n <tr>
                  \n\t <td>".$row["tx_date_1"]."</td>
                  \n\t <td>".$row["tx_code"]."</td>
                  \n\t <td>".$row["location"]."</td>
                  \n\t <td>".$row["prod_code_TH"]."</td>
                  \n\t <td align=\"right\"><span class=\"badge  $_bagdge\"> $_tx_sign ".number_format($row["receive_amount"],0)." ".$row["unit"]."</span></td>
                  \n\t <td align=\"right\"><span class=\"badge bg-grey\">".number_format($row["balance"],0)." ".$row["unit"]."</span></td>
                  \n\t <td align=\"center\">".$row["username"]."</td>
                \n</tr>";
                
            }
         }
        $conn->close();
        return  $_table_row;
        
    }

?>