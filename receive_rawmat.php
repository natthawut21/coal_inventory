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
  <title>รับวัตถุดิบเข้า | ระบบบริหารคลังสินค้า </title>
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
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">
    

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>
 .datepicker{z-index:1151 !important;}
/*Bootstrap 3*/
.modal.large {
     width: 80%;
}
</style>
<script>
   
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
 <body class="hold-transition skin-blue fixed sidebar-mini" onload="jsGetReceiveTable();">
<div class="wrapper">

    <?php include "inc/nav_bar_inc.php";?>
    <?php include "inc/side_bar_inc.php"; ?>
    <?php include "inc/source/Basic_Info.php";?>
        
      


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          รับวัตถุดิบเข้า
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
<!--<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">-->

        
        
<div class="modal fade bs-example-modal-lg" id="rawmatModal_1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog  modal-large">
                      
                      
     <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">[&times;]</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการรับวัตถุดิบเข้าคลัง</h4>
      </div>
    
       <div class="modal-body">
           <div id="div_receive_data"> - </div>
        </div> 
           <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">ปิด </button>
           </div>
      </div>
     </div>
    </div>
</div>
                
                
 <div class="modal fade bs-example-modal-lg" id="rawmatModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-large">
                      
                      
              <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">[&times;]</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการรับวัตถุดิบเข้าคลัง</h4>
      </div>
    
       <div class="modal-body">
           
           
        <form id=form01>
         <div class="row">
             <div class="col-md-2"><label>วันที่รับวัตถุดิบ</label></div>
            <div class="col-md-3">
               <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" id="txt_receive_date" name="txt_receive_date" class="form-control pull-right" >
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
     
        <div class="row">
            <div class="col-md-2"><label>รายละเอียด</label></div>
            <div class="col-md-10 "> 
                <div class="form-group">
                  
                  <textarea id="txt_remarks" name="txt_remarks" class="form-control" rows="3" placeholder="รายละเอียดเพิ่มเติม..."></textarea>
                </div></div>
        </div>
         </form>   
      </div>
          
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="jsSave_AddNew_Material_v2();">บันทึก</button>
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
              <h3 class="box-title">รายการรับวัตถุดิบเข้า</h3>
                   </div>
          
              <div class="col-lg-6 col-xs-6" align="right">
                    <a class="btn btn-app btn-primary" data-toggle="modal" onclick="openDialog()">
                <i class="fa fa-plus-circle"></i> เพิ่มรายการรับวัตถุดิบ
              </a>
                       
                       
                   </div>
                   
                </div>
                
                
                
                
            </div>
            <!-- /.box-header -->
            
            <div class="box-body table-responsive no-padding">
              <div id="div_receive_table">
              <table id="receive_table_1" class="table table-bordered table-striped table-hover">
               <thead>
                <tr>
                  <th>วันที่</th>
                  <th>ธุรกรรม</th>
                  <th>ประเภทวัตถุดิบ</th>
                  <th>ค่า T.M.</th>
                  <th>จำนวน</th>
                  <th>รายละเอียด </th>
                 
                  <th>ยอดรวมวัตถุดิบ</th>
                  <th>สถานที่จัดเก็บ</th>
                  <th>ผู้ทำรายการ</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td align="right">
                    <span class="badge bg-red">+</span>
                   </td>
                  <td align="right">
                    
                    <span class="badge bg-grey">+</span>
                    </td>
                    <td>-</td>
                </tr>
                <tr>
                
 
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
      ---
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">XXXXX</a>.</strong> All rights reserved.
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
    //$("#receive_table_1").DataTable();
   
      /*$("#example_1").DataTable();
      
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
      //Date picker
    */
      
    $('#txt_receive_date').datepicker({
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
    
    function jsSave_AddNew_Material_v2()
    {
 
        document.getElementById("table_loading").style.visibility = "visible";
        
        var obj_txt_receive_date = document.getElementById("txt_receive_date");
        var obj_txt_document_no = document.getElementById("txt_document_no");
        var obj_txt_remarks = document.getElementById("txt_remarks");
        
       var val_receive_date ="";
       var val_document_no ="";
        var val_receive_remarks ="";
        if(obj_txt_receive_date != null)
        {
            val_receive_date =obj_txt_receive_date.value;
            obj_txt_receive_date.value ="";
        }
        
        if(obj_txt_document_no != null)
        {
            val_document_no =obj_txt_document_no.value;
            obj_txt_document_no.value ="";
        }
        if(val_receive_remarks != null)
        {
            val_receive_remarks =obj_txt_remarks.value;
            obj_txt_remarks.value ="";
        }
       /* var param_receive_rawmat ="product_id="+val_product_id+"&TM_value="+val_TM_value+"&receive_date="+val_receive_date+"&receive_qty="+val_receive_qty+"&store_location="+val_store_location+"&receive_remark="+val_receive_remarks;
        */
        
        var param_receive_rawmat_header ="&receive_date="+val_receive_date+"&document_no="+val_document_no+"&receive_remark="+val_receive_remarks;
        
        
       // console.log("inc/source/updateInventory.php?action=receive_rawmat&"+param_receive_rawmat);
      
       var obj_txt_receive_qty = document.getElementById("opt_rawmat_type_a");
        var obj_opt_receive_location = document.getElementById("opt_receive_location");
        
        
        

        var obj_opt_rawmat_type = document.forms.form01.elements["opt_rawmat_type_a[]"];
        var obj_txt_TM_value = document.forms.form01.elements["txt_TM_value_a[]"];
        var obj_txt_receive_qty = document.forms.form01.elements["txt_receive_qty_a[]"];
        var obj_opt_receive_location = document.forms.form01.elements["opt_receive_location_a[]"];

        var param_product="";
        for (var i = 0, len = obj_opt_rawmat_type.length; i < len; i++) {
            if(obj_opt_rawmat_type[i].value!=-1)
            {
                
                param_product=param_product+"&product_id[]="+obj_opt_rawmat_type[i].value+"&TM_value[]="+obj_txt_TM_value[i].value+"&receive_qty[]="+obj_txt_receive_qty[i].value+"&store_location[]="+obj_opt_receive_location[i].value;
                obj_opt_rawmat_type[i].value="";
                obj_txt_TM_value[i].value="";
                obj_txt_receive_qty[i].value="";
                obj_opt_receive_location[i].value="-1";
                
            }
          
            
        }
        var update_ajax_url ="inc/source/updateInventory.php?action=add_receive_rawmat_header&"+param_receive_rawmat_header+param_product;
        
        console.log(update_ajax_url);
        getDataXML_Sync(update_ajax_url,jsAfterSubmitReceiveRawmat_v2);
        
        document.getElementById("table_loading").style.visibility = "hidden";
        
    }
   function jsSave_AddNew_Material_NotUse()
    {
 
        var obj_txt_receive_date = document.getElementById("txt_receive_date");
        var obj_txt_receive_qty = document.getElementById("txt_receive_qty");
        var obj_opt_receive_location = document.getElementById("opt_receive_location");
        var obj_opt_rawmat_type = document.getElementById("opt_rawmat_type");
        var obj_txt_TM_value = document.getElementById("txt_TM_value");
        var obj_txt_remarks = document.getElementById("txt_remarks");
        var val_receive_date ="";
        var val_receive_qty ="";
        var val_store_location ="";
        var val_receive_remarks ="";
        var val_product_id ="";
        var val_TM_value ="";
        if(obj_txt_receive_date != null)
        {
            val_receive_date =obj_txt_receive_date.value;
            obj_txt_receive_date.value ="";
        }
        
        if(obj_txt_receive_qty != null)
        {
            val_receive_qty =obj_txt_receive_qty.value;
            obj_txt_receive_qty.value ="";
        }
        
        if(obj_opt_receive_location != null)
        {
            val_store_location =obj_opt_receive_location.value;
            obj_opt_receive_location.value ="";
        }
        
        if(val_receive_remarks != null)
        {
            val_receive_remarks =obj_txt_remarks.value;
            obj_txt_remarks.value ="";
        }
        if(obj_opt_rawmat_type != null)
        {
            val_product_id =obj_opt_rawmat_type.value;
            obj_opt_rawmat_type.value ="";
        } 
         if(obj_txt_TM_value != null)
        {
            val_TM_value =obj_txt_TM_value.value;
            obj_txt_TM_value.value ="";
        } 
        
        var param_receive_rawmat ="product_id="+val_product_id+"&TM_value="+val_TM_value+"&receive_date="+val_receive_date+"&receive_qty="+val_receive_qty+"&store_location="+val_store_location+"&receive_remark="+val_receive_remarks;
        
       // console.log("inc/source/updateInventory.php?action=receive_rawmat&"+param_receive_rawmat);
        document.getElementById("table_loading").style.visibility = "hidden";
        getDataXML_Sync("inc/source/updateInventory.php?action=receive_rawmat&"+param_receive_rawmat,jsAfterSubmitReceiveRawmat);
        
    }
   function jsGetReceiveTable()
    {
        document.getElementById("table_loading").style.visibility = "visible";
        //getData_Sync("inc/source/getInventoryLog.php?prod_id=1&table_name=receive_table_1","div_receive_table");
        getData_Sync("inc/source/getInventoryLog_v2.php?prod_type_id=1&tran_type=receive_rawmat&param_table=receive_table_1","div_receive_table");
        document.getElementById("table_loading").style.visibility = "hidden";
        $(function () {
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
    function jsAfterSubmitReceiveRawmat_v2(respText)
    {
        
        document.getElementById("table_loading").style.visibility = "hidden";
        
        
        //console.log("response text = "+respText);
        if(respText==1)
        {
            jsGetReceiveTable();
          
        }
        
    }
    function jsAfterSubmitReceiveRawmat(respText)
    {
        //console.log(respText);
        if(respText==1)
        {
            jsGetReceiveTable();
        }
    }
    function jsOpenReceiveRawmat(rh_id)
    {
       // console.log(rh_id);
        var url_1 ="inc/source/getTranscation_data.php?type=receive_rawmat&rh_id="+rh_id;
         getDataXML_Sync(url_1,jsShowReceiveDialog);
    }
    function jsShowReceiveDialog(respText)
    {
        
        if(respText!="")
        {
            document.getElementById("div_receive_data").innerHTML =respText;
            $('#rawmatModal_1').attr('class', 'modal fade bs-example-modal-lg').attr('aria-labelledby','myLargeModalLabel');
            $('.modal-dialog').attr('class','modal-dialog modal-lg');
            $('#rawmatModal_1').modal('show');
        }
    }
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>


</html>
