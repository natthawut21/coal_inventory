<?php
    if(isset($_GET['prod_type_id']) && isset($_GET['tran_type']))
    {
       
        
            $_inv_log_data ="";
            $_table_name="receive_table_1";
             $_inv_log_data = getInventory_DocumentHeder($_GET['prod_type_id'],$_GET['tran_type']);
            
            $_table_name = "receive_table_1";
            if(isset($_GET['param_table']))
                $_table_name = $_GET['param_table'];
            
           // echo "$_table_name";
            
            
          
?>




<table id="<?php echo $_table_name;?>" class="table table-bordered table-striped table-hover">
               <thead>
                 <tr>
                  <th>วันที่</th>
                  <th>หมายเลขเอกสาร</th>
                  <th>รายละเอียด</th>
                  <th>จำนวนรวม</th>
                  <th>ผู้ทำรายการ</th>
                </tr>
                   
                </thead>
                <tbody>
              <?php echo  $_inv_log_data;?>
 
                </tbody>
              
</table>

<?php  }?>
<?php  
    
   
function getInventory_DocumentHeder($product_type_id,$trans_type)
{
    
     include "db_connect_inc.php";
    if($trans_type=="receive_rawmat")
    {
        $_sql_header ="SELECT h1.rh_id as rh_id,DATE_FORMAT(h1.document_date,'%d-%b-%Y') as document_date,h1.document_no,h1.remarks,h1.create_by_uid,u1.username 
        ,( select sum(amount) from receive_rawmat_document_detail d1 where d1.rh_id = h1.rh_id) as sum_receive
        
        FROM receive_rawmat_document_header h1,mgnt_user u1 where h1.create_by_uid =u1.uid order by h1.create_date desc ";
       // echo $_sql_header;
        $result = $conn->query($_sql_header);
        if ($result->num_rows > 0) {
            // output data of each row
            $_table_row="";
            while($row = $result->fetch_assoc()) {
                 $_table_row.="\n <tr onclick=\"jsOpenReceiveRawmat(".$row['rh_id'].")\">
                  \n\t <td>".$row["document_date"]."</td>
                  \n\t <td>".$row["document_no"]."</td>
                  \n\t <td>".$row["remarks"]."</td>
                  \n\t <td align=\"right\">".number_format($row["sum_receive"])."</td>
                  \n\t <td>".$row["username"]." </td> \n</tr>";
                
            }
        }
                
        
    }
     $conn->close();
    return  $_table_row;
}
function getInventoryLog_v2($_prod_type_id)
    {
        include "db_connect_inc.php";
        
        if($_prod_type_id!=-1)
        { $_sql =" SELECT tx.prod_id,tx.tx_type_id as tx_type_id,tx.tx_create_time,tx.amount,tx.prior_balance,tx.balance,tx.location_id,tx.remarks as remarks,tx.unit_id,tx.tx_log_time,tx.uid ".
                ",DATE_FORMAT(tx.tx_create_time,\"%d/%m/%Y\") as tx_date_1,tt.tx_code_TH as tx_code,lo.location_name as location,tx.amount as receive_amount,tx.balance as balance ,unit.unit_code as unit,user.username ".
               " ,prd.prod_code_TH as product_code_TH,tx.TM_PCT as TM_Value".
               " FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user ".
               " WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and prd.prod_type_id = $_prod_type_id order by tx.tx_log_time desc";
        } else { 
            $_sql =" SELECT tx.prod_id,tx.tx_type_id as tx_type_id,tx.tx_create_time,tx.amount,tx.prior_balance,tx.balance,tx.location_id,tx.remarks,tx.unit_id,tx.tx_log_time,tx.uid ".
                ",DATE_FORMAT(tx.tx_create_time,\"%d/%m/%Y\") as tx_date_1,tt.tx_code_TH as tx_code,lo.location_name as location,tx.amount as receive_amount,tx.balance as balance ,unit.unit_code as unit,user.username ".
            
               " FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user ".
               " WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid order by tx.tx_log_time desc";
        }
       
        
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
                else if( $row["tx_type_id"]==3)
                {   $_bagdge ="bg-blue";
                    $_tx_sign =" + ";
                }
                else if($row["tx_type_id"]==4 )
                {  
                    $_bagdge ="bg-red";
                    $_tx_sign =" - ";
                 }
                else if($row["tx_type_id"]==2 )
                {  
                    $_bagdge ="bg-orange";
                    $_tx_sign =" - ";
                 }
                
                $_table_row.="\n <tr>
                  \n\t <td>".$row["tx_date_1"]."</td>
                  \n\t <td>".$row["tx_code"]."</td>
                  \n\t <td>".$row["product_code_TH"]."</td>
                  \n\t <td>".$row["TM_Value"]." % </td>
                  \n\t <td align=\"right\"><span class=\"badge  $_bagdge\"> $_tx_sign ".number_format($row["receive_amount"],0)." ".$row["unit"]."</span></td>
                  \n\t <td align=\"right\">".$row['remarks']."</td>
                  \n\t <td align=\"right\"><span class=\"badge bg-grey\">".number_format($row["balance"],0)." ".$row["unit"]."</span></td>
                  \n\t <td>".$row["location"]."</td>
                  \n\t <td align=\"center\">".$row["username"]."</td>
                \n</tr>";
                
            }
         }
        $conn->close();
        return  $_table_row;
    }

?>