

<?php 
//echo "<BR>".$_GET['rh_id'];

    if($_GET['type']=="receive_rawmat")
    {
        $_receive_data = getReceiveRawmat_Heder($_GET['rh_id'],$_receive_date,$_document_no,$_remarks,$_username);
        
        
?>

        <div class="row">
             <div class="col-md-2"><h4><span class="label label-default" align="center"><B>วันที่รับวัตถุดิบ</B></span></h4></div>
            <div class="col-md-3">
                <h4><span class="label label-info" align="center"><B> <?php echo $_receive_date;?> </B></span></h4>
           </div>
             <div class="col-md-2"> &nbsp;</div>
             
             
             <div class="col-md-2"><h4><span class="label label-default" align="center"><B>หมายเลขเอกสาร</B></span></h4></div>
             <div class="col-md-3">
                 <h4><span class="label label-info" align="center"><B><?php echo $_document_no;?></B></span></h4>
            </div>
        
        </div>

            <div class="row">
          <table class="table table-bordered table-striped">
              <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 80px" align="center">ชนิดถ่านหิน</th>
                  <th style="width: 20px" align="center">% TM</th>
                  <th style="width: 40px" align="center">จำนวน (Tons)</th>
                  <th style="width: 60px" align="center">ที่จัดเก็บ</th>
              </tr>
              <?php echo $_receive_data;?>
         </table>
           </div>
           
           <div class="row">
            <div class="col-md-2"><label>รายละเอียด</label></div>
            <div class="col-md-10 "> 
                <div class="form-group">
                  
                  <textarea id="txt_remarks" name="txt_remarks" class="form-control" rows="3" placeholder="รายละเอียดเพิ่มเติม..."><?php echo "$_remarks";?></textarea>
                    
                   
                </div></div>
            </div>

            <div class="row">
                <div class="col-md-2"><label>ผู้ทำรายการ</label></div>
                <div class="col-md-10 "><h4><div class="label label-info" align="center"><b> <?php echo $_username;?></b></div></h4></div>
           </div>
           
           
        </div>   

<?php }  
 if($_GET['type']=="withdraw_rawmat")
    {
        $_withdraw_data = getWithdrawRawmat_Heder($_GET['wh_id'],$_withdraw_date,$_document_no,$_remarks,$_username);
 ?>
  <div class="row">
             <div class="col-md-2"><h4><span class="label label-default" align="center"><B>วันที่เบิกวัตถุดิบ</B></span></h4></div>
            <div class="col-md-3">
                <h4><span class="label label-info" align="center"><B> <?php echo $_withdraw_date;?> </B></span></h4>
           </div>
             <div class="col-md-2"> &nbsp;</div>
             
             
             <div class="col-md-2"><h4><span class="label label-default" align="center"><B>หมายเลขเอกสาร</B></span></h4></div>
             <div class="col-md-3">
                 <h4><span class="label label-info" align="center"><B><?php echo $_document_no;?></B></span></h4>
            </div>
        
        </div>

            <div class="row">
          <table class="table table-bordered table-striped">
              <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 80px" align="center">ชนิดถ่านหิน</th>
                  <th style="width: 20px" align="center">% TM</th>
                  <th style="width: 40px" align="center">จำนวน (Tons)</th>
                  <th style="width: 60px" align="center">ที่จัดเก็บ</th>
              </tr>
              <?php echo $_withdraw_data; ?>
         </table>
           </div>
           
           <div class="row">
            <div class="col-md-2"><label>รายละเอียด</label></div>
            <div class="col-md-10 "> 
                <div class="form-group">
                  
                  <textarea id="txt_remarks" name="txt_remarks" class="form-control" rows="3" placeholder="รายละเอียดเพิ่มเติม..."><?php echo "$_remarks";?></textarea>
                    
                   
                </div></div>
            </div>

            <div class="row">
                <div class="col-md-2"><label>ผู้ทำรายการ</label></div>
                <div class="col-md-10 "><h4><div class="label label-info" align="center"><b> <?php echo $_username;?></b></div></h4></div>
           </div>
           
           
        </div>   


<?php
 
 
 }
?>


<?php

function getWithdrawRawmat_Heder($wh_id,&$_receive_date,&$_document_no,&$_remarks,&$_username)
{
    
     include "db_connect_inc.php";
    //if($trans_type=="receive_rawmat")
    
        
        $_receive_date="";
        $_document_no="";
        $_remarks="";
        
        
        $_sql_header ="SELECT h1.wh_id as wh_id,DATE_FORMAT(h1.document_date,'%d-%b-%Y') as document_date,h1.document_no,h1.remarks as remarks,h1.create_by_uid,u1.username as username
        ,( select sum(amount) from withdraw_document_detail d1 where d1.wh_id = h1.wh_id) as sum_receive
        
        FROM withdraw_document_header h1,mgnt_user u1 ".
            "where h1.wh_id = $wh_id and h1.create_by_uid =u1.uid order by h1.create_date desc ";
       
       //echo "<BR>".$_sql_header;
        
       $result = $conn->query($_sql_header);
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()){
            $_receive_date= $row["document_date"];
            $_document_no=$row["document_no"];
            $_remarks=$row["remarks"];
            $_username= $row["username"];
            }
          
            
        }
      
        $_receive_detail_table ="";
        $_sql_get_receive_detail="SELECT prd.prod_code_TH as prod_code,wd.amount as amount,loc.location_name as location ,wd.TM_PCT as TM".
                                 " FROM withdraw_document_detail wd,product_code prd ,location loc ".
                                 " Where wd.prod_id = prd.prod_id and loc.location_id = wd.location_id and wd.wh_id = $wh_id order by wd.w_id";
                
        //echo "<BR>$_sql_get_receive_detail";
        $result_detail = $conn->query($_sql_get_receive_detail);
        if ($result_detail->num_rows > 0) {
            $_i=0;
            
            while($row = $result_detail->fetch_assoc()){
                $_i++;
                $_receive_detail_table .= "\n <tr>".
                                        "\n\t <td align=\"right\">$_i</td>".
                                        "\n\t <td align=\"left\">".$row["prod_code"]."</td>".
                                        "\n\t <td align=\"center\">".$row["TM"]."</td>".
                                        "\n\t <td align=\"right\">".number_format($row["amount"])."</td>".
                                        "\n\t <td align=\"center\">".$row["location"]."</td>".
                                        "\n </tr>";
            }
        }
        
       return $_receive_detail_table;         
    
     $conn->close();
   
    //return  $_table_row;
}

function getReceiveRawmat_Heder($rh_id,&$_receive_date,&$_document_no,&$_remarks,&$_username)
{
    
     include "db_connect_inc.php";
    //if($trans_type=="receive_rawmat")
    {
        
        $_receive_date="";
        $_document_no="";
        $_remarks="";
        
        
        $_sql_header ="SELECT h1.rh_id as rh_id,DATE_FORMAT(h1.document_date,'%d-%b-%Y') as document_date,h1.document_no,h1.remarks as remarks,h1.create_by_uid,u1.username as username
        ,( select sum(amount) from receive_rawmat_document_detail d1 where d1.rh_id = h1.rh_id) as sum_receive
        
        FROM receive_rawmat_document_header h1,mgnt_user u1 ".
            "where h1.rh_id = $rh_id and h1.create_by_uid =u1.uid order by h1.create_date desc ";
       
       // echo "<BR>".$_sql_header;
        
        $result = $conn->query($_sql_header);
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()){
            $_receive_date= $row["document_date"];
            $_document_no=$row["document_no"];
            $_remarks=$row["remarks"];
            $_username= $row["username"];
            }
            // output data of each row
           /* $_table_row="";
            while($row = $result->fetch_assoc()) {
                 $_table_row.="\n <tr onclick=\"jsOpenReceiveRawmat(".$row['rh_id'].")\">
                  \n\t <td>".$row["document_date"]."</td>
                  \n\t <td>".$row["document_no"]."</td>
                  \n\t <td>".$row["remarks"]."</td>
                  \n\t <td align=\"right\">".number_format($row["sum_receive"])."</td>
                  \n\t <td>".$row["username"]." </td> \n</tr>";
                
            }*/
            
        }
        
        $_receive_detail_table ="";
        $_sql_get_receive_detail="SELECT prd.prod_code_TH as prod_code,rd.amount as amount,loc.location_name as location ,rd.TM_PCT as TM".
                                 " FROM receive_rawmat_document_detail rd,product_code prd ,location loc ".
                                 " Where rd.prod_id = prd.prod_id and loc.location_id = rd.location_id and rd.rh_id = $rh_id order by rd.r_id";
                
       // echo "<BR>$_sql_get_receive_detail";
        $result_detail = $conn->query($_sql_get_receive_detail);
        if ($result_detail->num_rows > 0) {
            $_i=0;
            
            while($row = $result_detail->fetch_assoc()){
                $_i++;
                $_receive_detail_table .= "\n <tr>".
                                        "\n\t <td align=\"right\">$_i</td>".
                                        "\n\t <td align=\"left\">".$row["prod_code"]."</td>".
                                        "\n\t <td align=\"center\">".$row["TM"]."</td>".
                                        "\n\t <td align=\"right\">".number_format($row["amount"])."</td>".
                                        "\n\t <td align=\"center\">".$row["location"]."</td>".
                                        "\n </tr>";
            }
        }
        
       return $_receive_detail_table;         
    }
     $conn->close();
    //return  $_table_row;
}


?>