<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv=Content-Type content="text/html; charset=tis-620">

  <title>เบิกวัตถุดิบ | ระบบบริหารคลังสินค้า </title>
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
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>
 
  @media (min-width: 992px)
.modal-lg
{
    width: 120px;
    height: 1000px; /* control height here */
}
    
    
 .datepicker{z-index:1151 !important;}
    

   
</style>
<script>
    function jsSave_AddNew_Material()
    {
    //    alert("After Save");
       // console.log("After Save");
        
    }
   
</script>
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
 <body class="hold-transition skin-blue fixed sidebar-mini"  onload="jsGetWithDrawTable();">
<div class="wrapper">



       <?php include "inc/nav_bar_inc.php";?>


        <?php include "inc/side_bar_inc.php"; ?>

  <?php include "inc/source/Basic_Info.php";?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          เบิกวัตถุดิบ
        <!-- <small>รายงานสรุป</small> -->
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->

        
        
         <div class="modal fade bs-example-modal-lg" id="rawmatModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                
                      
<!-- <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">-->
    
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">[&times;]</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการเบิกวัตถุดิบ</h4>
      </div>
    
        
        
        
       <div class="modal-body">
         <div class="row">
             <div class="col-md-2"><label>วันที่เบิกวัตุถุดิบ</label></div>
          <div class="col-md-3 ">
               <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="txt_withdraw_date" name="txt_withdraw_date" >
                </div>
              </div>
           </div>
               <div class="col-md-2 col-md-offset-2 "><label>หมายเลขเอกสาร</label></div>
             <div class="col-md-3 ">
                 <input type="text" id="txt_document_no" name="txt_document_no" class="form-control pull-right" >
                  </div>
                
        
        </div>
         <div class="row">
          <table class="table table-bordered table-striped">
              <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 80px">ชนิดถ่านหิน</th>
                  <th style="width: 20px">% TM</th>
                  <th style="width: 40px">จำนวน (Tons)</th>
                  <th style="width: 60px">ที่จัดเก็บ</th>
              </tr>
              <?php
              
               $_basic_info = new Basic_Info(); 
              
              $row_data=5;
                for($i=0;$i<5;$i++)
                {
                     $_rawmat_option = $_basic_info->getRawMatList_v1(-1);
              ?>
              <tr>
                   <td><?php echo $i+1; ?></td>
                  <td>
                   <select class="form-control" id="opt_rawmat_type_a[]" name="opt_rawmat_type_a[]">
                           <?php echo $_rawmat_option; ?>
                  </select>
                  </td>
                  <td> <input type="text" id="txt_TM_value_a[]" name="txt_TM_value_a[]" class="form-control" placeholder="ระบุจำนวนตัวเลข %..."></td>
                  <td> <input type="text" id="txt_receive_qty_a[]" name="txt_receive_qty_a[]" class="form-control" placeholder="ระบุจำนวนตัวเลข ..."></td>
                  <td>
                   <?php
                       // $_basic_info = new Basic_Info();
                        $_location_option = $_basic_info->getLocationList(-1);
                    ?>
                  <select class="form-control" id="opt_receive_location_a[]" name="opt_receive_location_a[]">
                      <?php echo $_location_option; ?>
                  </select>
                  </td>
                  
              </tr>
              <?php } ?>
          </table>
      </div>
       <!--    
         <div class="row">
            <div class="col-md-4"><label>ชนิดถ่านหิน</label></div>
            <div class="col-md-8 ">
                <div class="form-group">
                 
                  <?php
                        $_basic_info = new Basic_Info();
                        $_rawmat_option = $_basic_info->getRawMatList(-1);
                    ?>
                  <select class="form-control" id="opt_rawmat_type" name="opt_rawmat_type">
                      <?php echo $_rawmat_option; ?>
                  </select>
                </div>
            </div>
       </div>
           
          
        <div class="row">
            <div class="col-md-4"><label>ค่า T.M. </label></div>
            <div class="col-md-7 "><div class="form-group">
                 
                
                 <input type="text" id="txt_TM_value" name="txt_TM_value" class="form-control" placeholder="ระบุจำนวนตัวเลข %...">
                </div>
               
            </div>
             <div class="col-md-1">
                 <label> % </label>
            </div>
       </div>
           
        <div class="row">
            <div class="col-md-4"><label>จำนวน</label></div>
            <div class="col-md-7 "><div class="form-group">
                  
                  <input id="txt_withdraw_qty" name="txt_withdraw_qty"  type="text" class="form-control" placeholder="ระบุจำนวนตัวเลข ...">
               
                </div>
            </div>
            <div class="col-md-1">
                 <label>Tons</label>
            </div>
         </div>
        <div class="row">
            <div class="col-md-4"><label>สถานที่จัดเก็บ</label></div>
            <div class="col-md-8 ">
           
                <div class="form-group">
                  
                 
                    
                  <?php
                      //  $_basic_info = new Basic_Info();
                        $_location_option = $_basic_info->getLocationList(-1);
                    ?>
                  <select class="form-control" id="opt_withdraw_location" name="opt_withdraw_location">
                      <?php echo $_location_option; ?>
                  </select>
                </div>
            
            </div>
        </div>-->
        <div class="row">
            <div class="col-md-3"><label>รายละเอียด</label></div>
            <div class="col-md-9 "> 
                <div class="form-group">
                  
                  <textarea  id="txt_remarks" name="txt_remarks" class="form-control" rows="3" placeholder="รายละเอียดเพิ่มเติม..."></textarea>
                </div></div>
        </div>
        
      
       <!--    
         <div class="row">
          <div class="col-md-4">.col-md-4</div>
          <div class="col-md-4 col-md-offset-4">.col-md-4 .col-md-offset-4</div>
        </div>
        <div class="row">
          <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
          <div class="col-md-2 col-md-offset-4">.col-md-2 .col-md-offset-4</div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>
        </div>
        <div class="row">
          <div class="col-sm-9">
            Level 1: .col-sm-9
            <div class="row">
              <div class="col-xs-8 col-sm-6">
                Level 2: .col-xs-8 .col-sm-6
              </div>
              <div class="col-xs-4 col-sm-6">
                Level 2: .col-xs-4 .col-sm-6
              </div>
            </div>
          </div>
        </div>
           
        -->   
           
           
      </div>
          
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="jsSave_Withdraw_Material();">บันทึก</button>
      </div>
    </div>
  </div>
            </div>
         </div>
        
       <div class="row">

        <!-- ./col -->
        <div class="col-lg-12 col-xs-12">
            
        <div class="box">
            <div class="box-header">
              <div class="row">
                <div class="col-lg-6 col-xs-6" >
              <h3 class="box-title">รายการเบิกวัตถุดิบ</h3>
                   </div>
            <!--  <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>-->
              <div class="col-lg-6 col-xs-6" align="right">
                <!-- <a class="btn btn-app btn-primary" data-toggle="modal" data-target="#bs-example-modal-lg">-->
                <a class="btn btn-app btn-primary" data-toggle="modal" onclick="openDialog()">
                <i class="fa fa-plus-circle"></i> เพิ่มรายการเบิก
              </a>
                       
                       
                   </div>
                   
                </div>
                
                
                
                
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <div id="div_withdraw_table">
              <table id="withdraw_table_1" class="table table-bordered table-striped table-hover">
                
               <thead>
                <tr>
                  <th>วันที่</th>
                  <th>หมายเลขเอกสาร</th>
                  <th>จำนวนรับทั้งหมด</th>
                  <th>ผู้ทำรายการ</th>
                </tr>
                </thead>
                <tbody>
               
                <tr>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                 <!--<td align="right">
                    <span class="badge bg-yellow">-</span>
                   </td>
                  <td align="right">
                    
                    <span class="badge bg-grey">-</span>
                    </td>-->
                  <td align="center">-</td>
                </tr>
                    
                </tbody>
               
              </table>
            </div>
              <div id="table_loading" class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
            
          </div>
          <!-- /.box -->    
            
            
            
            
      
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
 
     
<script src="plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="plugins/datepicker/locales/bootstrap-datepicker.th.js"></script>
<script src="inc/js/ajax_pop.js"></script>
     
     
     
<script>
  $(function () {
   // $("#withdraw_table_1").DataTable();
    /* $("#example_1").DataTable();
    $('#example_2 ').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });*/
      
      //Date picker
    $('#txt_withdraw_date').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "th",
        todayHighlight: true
    }); 
      
  });
  function openDialog()
    {
        
        $('#rawmatModal').attr('class', 'modal fade bs-example-modal-lg')
            .attr('aria-labelledby','myLargeModalLabel');
		$('.modal-dialog').attr('class','modal-dialog modal-lg');
        $('#rawmatModal').modal('show');
        
    }
    
  function jsSave_Withdraw_Material()
  {
    
      
       var obj_txt_withdraw_date = document.getElementById("txt_withdraw_date");
        var obj_txt_withdraw_qty = document.getElementById("txt_withdraw_qty");
        var obj_opt_withdraw_location = document.getElementById("opt_withdraw_location");
        var obj_txt_remarks = document.getElementById("txt_remarks");
      
      
      var obj_opt_rawmat_type = document.getElementById("opt_rawmat_type");
      var obj_txt_TM_value = document.getElementById("txt_TM_value");
       
           
        var val_withdraw_date ="";
        var val_withdrawe_qty ="";
        
        var val_store_location ="";
        var val_withdraw_remarks ="";
      
      var val_rawmat_type_id ="";
        var val_TM_value ="0";
        if(obj_txt_withdraw_date != null)
        {
            val_withdraw_date =obj_txt_withdraw_date.value;
            obj_txt_withdraw_date.value ="";
        }
        
        if(obj_txt_withdraw_qty != null)
        {
            val_withdraw_qty =obj_txt_withdraw_qty.value;
            obj_txt_withdraw_qty.value ="";
        }
        
        if(obj_opt_withdraw_location != null)
        {
            val_store_location =obj_opt_withdraw_location.value;
            obj_opt_withdraw_location.value ="";
        }
        
      
       if(obj_opt_rawmat_type != null)
        {
            val_rawmat_type_id =obj_opt_rawmat_type.value;
            obj_opt_rawmat_type.value ="";
        }
       if(obj_txt_TM_value != null)
        {
            val_TM_value =obj_txt_TM_value.value;
            obj_txt_TM_value.value ="";
        }
      
      
      
        if(val_withdraw_remarks != null)
        {
            val_withdraw_remarks =obj_txt_remarks.value;
            obj_txt_remarks.value ="";
        }
        var param_withdraw_rawmat="product_id="+val_rawmat_type_id+"&TM_value="+val_TM_value+"&withdraw_date="+val_withdraw_date+"&withdraw_qty="+val_withdraw_qty+"&store_location="+val_store_location+"&withdraw_remark="+val_withdraw_remarks;
        
       // console.log("inc/source/updateInventory.php?action=withdraw_rawmat&"+param_withdraw_rawmat);
        getDataXML_Sync("inc/source/updateInventory.php?action=withdraw_rawmat&"+param_withdraw_rawmat,jsAfterSubmitWithdrawRawmat);
        document.getElementById("table_loading").style.visibility = "hidden";
  }
  function jsAfterSubmitWithdrawRawmat(respText)
  {
         //console.log(respText);
      /*  if(respText==1)
        {
           
            document.getElementById("table_loading").style.visibility = "visible";
            //getData_Sync("./inc/source/getInventoryLog.php?prod_id=1&table_name=withdraw_table_1","div_withdraw_table");
            getData_Sync("./inc/source/getInventoryLog.php?prod_id=1","div_withdraw_table");
            document.getElementById("table_loading").style.visibility = "hidden";
            
            $(function () {
                       //$("#withdraw_table_1").DataTable({
                       $("#receive_table_1").DataTable({
                      "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false
                    
                });
            });
        }*/
      jsGetWithDrawTable();
      
  }
  function jsGetWithDrawTable()
  {
        document.getElementById("table_loading").style.visibility = "visible";
        //getData_Sync("./inc/source/getInventoryLog.php?prod_id=1&table_name=withdraw_table_1","div_withdraw_table");
       // getData_Sync("./inc/source/getInventoryLog.php?prod_id=1","div_withdraw_table");
        getData_Sync("./inc/source/getInventoryLog.php?prod_type_id=1","div_withdraw_table");
        document.getElementById("table_loading").style.visibility = "hidden";
       $(function () {
                     //$("#withdraw_table_1").DataTable({
                     $("#receive_table_1").DataTable({
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
