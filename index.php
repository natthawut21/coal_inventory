<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบบริหารคลังสินค้า | หน้าหลัก</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
 <body class="hold-transition skin-blue fixed sidebar-mini" onload="jsGetInventoryTable();">
<div class="wrapper">



       <?php include "inc/nav_bar_inc.php";?>


        <?php include "inc/side_bar_inc.php"; ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Dashboard
        <small>รายงานสรุป</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->

<?php// echo number_format(getReceiveRawMat(30),0);?> 
        <!-- Small boxes (Stat box) -->
      <div class="row">


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray-active">
            <div class="inner">
              <h3><?php echo number_format(getReceiveRawMat(30),0);?>  <sup style="font-size: 20px">Tons</sup></h3>

              <p>ยอดรับวัตถุดิบ</p>
            </div>
            <div class="icon">
              <i class="fa fa-ship"></i>

            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <!--<div class="small-box bg-yellow">-->
          <div class="small-box bg-gray-active">
            <div class="inner">
              <h3><?php echo number_format(getWithdrawRawMat(30),0);?><sup style="font-size: 20px">Tons</sup></h3>

              <p>ยอดเบิกวัตถุดิบ</p>
            </div>
            <div class="icon">
              <i class="fa fa-industry"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         <!-- <div class="small-box bg-red">-->
            <div class="small-box bg-gray-active">
            <div class="inner">
              <h3><?php echo number_format(getReceiveFinishGoods(30));?><sup style="font-size: 20px">Tons</sup></h3>

              <p>ยอดผลิตสินค้าแปรรูป</p>
            </div>
            <div class="icon">
              <i class="fa fa-cube"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <!--<div class="small-box bg-aqua">-->
          <div class="small-box bg-light-blue disabled">
            <div class="inner">
              <h3><?php echo number_format(getSellFinishGoods(30));?> <sup style="font-size: 20px">Tons</sup></h3>

              <p>ยอดขายสินค้า</p>
            </div>
            <div class="icon">
              <!--<i class="ion ion-bag"></i>-->
              <i class="fa fa-truck"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
        <div class="row">


        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray-active">
            <div class="inner">
              <h3><?php echo number_format(getBalance(1),0);?><sup style="font-size: 20px">Tons</sup></h3>

              <p>ยอดวัตถุดิบคงเหลือ</p>
            </div>
            <div class="icon">
              <i class="fa fa-ship"></i>

            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray-active">
            <div class="inner">
              <h3><?php echo number_format(getBalance(2),0);?><sup style="font-size: 20px">Tons</sup></h3>

              <p>ยอดสินค้าคงเหลือ</p>
            </div>
            <div class="icon">
              <i class="fa fa-cube"></i>

            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
             <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow-active">
            <div class="inner">
              <h3><?php echo number_format(getBalance(3),0);?><sup style="font-size: 20px">Tons</sup></h3>

              <p>ยอดคงเหลือรวม</p>
            </div>
            <div class="icon">
              <i class="fa fa-flag"></i>

            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       </div>

       <div class="row">

        <!-- ./col -->
        <div class="col-lg-12 col-xs-12">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">ประวัติธุรกรรม</h3>

            <!--  <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <div id="div_inventory_table">
                    
              <table id="inventory_table_1"  class="table table-bordered table-striped  table-hover">
                <thead>
                <tr>
                  <th>วันที่</th>
                  <th>ประเภท</th>
                  <th>สถานที่จัดเก็บ</th>
                  <th>จำนวน</th>
                  <th>ยอดรวม</th>
                  <th>ผู้ทำรายการ</th>
                </tr>
                </thead>
                <tbody>
                 <tr>
                  <td>--</td>
                  <td>--</td>
                  <td>--</td>
                  <td align="right">--</td>
                  <td align="right">--</td>
                  <td align="center">--</td>
                </tr>
              
                </tbody>
                <!--<tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>-->
              </table>
                </div>
                  <div id="table_loading" class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
            </div>

<!--
                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Reason</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
              </table>
            </div>
           
          </div>
-->
            </div>

         
          </div>

         </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>






</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
     
 <script src="inc/js/ajax_pop.js"></script>
<script>
  $(function () {
    $("#inventory_table_1").DataTable();

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
    
    
 function jsGetInventoryTable()
    {
        document.getElementById("table_loading").style.visibility = "visible";
        //getData_Sync("inc/source/getInventoryLog.php?prod_id=1&table_name=receive_table_1","div_receive_table");
        getData_Sync("inc/source/getInventoryLog.php?prod_id=-1&param_table=inventory_table_1","div_inventory_table");
        document.getElementById("table_loading").style.visibility = "hidden";
        $(function () {
             $("#inventory_table_1").DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false
            });
            
         });
        
    }  
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>


</html>
<?php
function getBalance($_option_id)
{
     include "inc/source/db_connect_inc.php";
    if($_option_id==1)
        $_sql ="select sum(balance) as balance from product_code prd,product_type prd_t where prd.prod_type_id = prd_t.prod_type_id and prd.prod_type_id =1 ";
    else if($_option_id==2)
        $_sql ="select sum(balance) as balance from product_code prd,product_type prd_t where prd.prod_type_id = prd_t.prod_type_id and prd_t.prod_type_id =2 ";
     else if($_option_id==3)
        $_sql ="select sum(balance) as balance from product_code prd,product_type prd_t where prd.prod_type_id = prd_t.prod_type_id and (prd_t.prod_type_id =2  or prd.prod_type_id =1) ";
     $_sum_raw_mat=0;
     $result = $conn->query($_sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $_sum_raw_mat= $row['balance'];
                
            }
        }
    return $_sum_raw_mat;
}
function getReceiveRawMat($_day_prev)
{
    
     include "inc/source/db_connect_inc.php";
     $_prod_type_id=1;
     $_sql =" SELECT sum(tx.amount) as sum_raw_mat  ".
               " FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user ".
               " WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and prd.prod_type_id = $_prod_type_id and tx.tx_type_id  =1 ".
            "and  tx.tx_create_time >= (CURDATE() - INTERVAL $_day_prev DAY)  ";
    
    /*
    SELECT tx.prod_id,tx.tx_type_id as tx_type_id,tx.tx_create_time,tx.amount,tx.prior_balance,tx.balance,tx.location_id,tx.remarks,tx.unit_id,tx.tx_log_time,tx.uid ,DATE_FORMAT(tx.tx_create_time,"%d/%m/%Y") as tx_date_1,tt.tx_code_TH as tx_code,lo.location_name as location,tx.amount as receive_amount,tx.balance as balance ,unit.unit_code as unit,user.username FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and tx.prod_id =1 and tx.tx_type_id =1 order by tx.tx_log_time desc
    */
    /*
    SELECT tx.* 
FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user 
WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id
and tx.unit_id=unit.unit_id and tx.uid = user.uid and tx.prod_id = 1 and tx.tx_type_id =1
and tx.tx_create_time >= (CURDATE() - INTERVAL -30 DAY)
    */
    //echo $_sql ;
    $_sum_raw_mat=0;
     $result = $conn->query($_sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $_sum_raw_mat= $row['sum_raw_mat'];
                
            }
        }
    return $_sum_raw_mat;
}

function getReceiveFinishGoods($_day_prev)
{
    
     include "inc/source/db_connect_inc.php";
     $_prod_id=1;
     $_sql =" SELECT sum(tx.amount) as sum_raw_mat  ".
               " FROM tx_log tx ,product_code prd,product_type prd_t , location lo,tx_type tt,unit ,mgnt_user user ".
               " WHERE tx.prod_id = prd.prod_id and prd.prod_type_id= prd_t.prod_type_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and prd_t.prod_type_id=2 and tx.tx_type_id  =3 ".
            "and  tx.tx_create_time >= (CURDATE() - INTERVAL $_day_prev DAY) " ;
    
    /*
    SELECT tx.prod_id,tx.tx_type_id as tx_type_id,tx.tx_create_time,tx.amount,tx.prior_balance,tx.balance,tx.location_id,tx.remarks,tx.unit_id,tx.tx_log_time,tx.uid ,DATE_FORMAT(tx.tx_create_time,"%d/%m/%Y") as tx_date_1,tt.tx_code_TH as tx_code,lo.location_name as location,tx.amount as receive_amount,tx.balance as balance ,unit.unit_code as unit,user.username FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and tx.prod_id =1 and tx.tx_type_id =1 order by tx.tx_log_time desc
    */
    
    //echo $_sql ;
    $_sum_raw_mat=0;
     $result = $conn->query($_sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $_sum_raw_mat= $row['sum_raw_mat'];
                
            }
        }
    return $_sum_raw_mat;
}
function getWithdrawRawMat($_day_prev)
{
    
     include "inc/source/db_connect_inc.php";
     $_prod_id=1;
   /*  $_sql =" SELECT sum(tx.amount) as sum_raw_mat  ".
               " FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user ".
               " WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and tx.prod_id = $_prod_id and tx.tx_type_id  =2 ".
            "and  tx.tx_create_time >= (CURDATE() - INTERVAL $_day_prev DAY)  ";
    */
    /*
    SELECT tx.prod_id,tx.tx_type_id as tx_type_id,tx.tx_create_time,tx.amount,tx.prior_balance,tx.balance,tx.location_id,tx.remarks,tx.unit_id,tx.tx_log_time,tx.uid ,DATE_FORMAT(tx.tx_create_time,"%d/%m/%Y") as tx_date_1,tt.tx_code_TH as tx_code,lo.location_name as location,tx.amount as receive_amount,tx.balance as balance ,unit.unit_code as unit,user.username FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and tx.prod_id =1 and tx.tx_type_id =1 order by tx.tx_log_time desc
    */
    
      $_sql =" SELECT sum(tx.amount) as sum_raw_mat  ".
               " FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user ".
               " WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and prd.prod_type_id = $_prod_id and tx.tx_type_id  =2 ".
            "and  tx.tx_create_time >= (CURDATE() - INTERVAL $_day_prev DAY)  ";
    
    //echo $_sql ;
    $_sum_raw_mat=0;
     $result = $conn->query($_sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $_sum_raw_mat= $row['sum_raw_mat'];
                
            }
        }
    return $_sum_raw_mat;
}
function getSellFinishGoods($_day_prev)
{
    
     include "inc/source/db_connect_inc.php";
     $_prod_id=1;
     $_sql =" SELECT sum(tx.amount) as sum_raw_mat  ".
               " FROM tx_log tx ,product_code prd,product_type prd_t , location lo,tx_type tt,unit ,mgnt_user user ".
               " WHERE tx.prod_id = prd.prod_id and prd.prod_type_id= prd_t.prod_type_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and prd_t.prod_type_id=2 and tx.tx_type_id  =4 and  tx.tx_create_time >= (CURDATE() - INTERVAL $_day_prev DAY) ";
    
    /*
    SELECT tx.prod_id,tx.tx_type_id as tx_type_id,tx.tx_create_time,tx.amount,tx.prior_balance,tx.balance,tx.location_id,tx.remarks,tx.unit_id,tx.tx_log_time,tx.uid ,DATE_FORMAT(tx.tx_create_time,"%d/%m/%Y") as tx_date_1,tt.tx_code_TH as tx_code,lo.location_name as location,tx.amount as receive_amount,tx.balance as balance ,unit.unit_code as unit,user.username FROM tx_log tx ,product_code prd,location lo,tx_type tt,unit ,mgnt_user user WHERE tx.prod_id = prd.prod_id and tx.location_id = lo.location_id and tx.tx_type_id = tt.tx_type_id and tx.unit_id=unit.unit_id and tx.uid = user.uid and tx.prod_id =1 and tx.tx_type_id =1 order by tx.tx_log_time desc
    */
    
    //echo $_sql ;
    $_sum_raw_mat=0;
     $result = $conn->query($_sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $_sum_raw_mat= $row['sum_raw_mat'];
                
            }
        }
    return $_sum_raw_mat;
}

?>