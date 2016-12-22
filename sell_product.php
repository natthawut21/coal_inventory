<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ขายสินค้าแปรรูป | ระบบบริหารคลังสินค้า </title>
<meta http-equiv=Content-Type content="text/html; charset=tis-620">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons/css/ionicons.min.css">
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
 .datepicker{z-index:1151 !important;}
</style>
<script>
    //function jsSubmit_SaleProduct()
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
 <body class="hold-transition skin-blue fixed sidebar-mini"  onload="jsGetSellProductTable();">
<div class="wrapper">



       <?php include "inc/nav_bar_inc.php";?>


        <?php include "inc/side_bar_inc.php"; ?>


<?php include "inc/source/Basic_Info.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          ขายสินค้าแปรรูป
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
        
        <!-- Dialog Show TX-->                      
<div class="modal fade bs-example-modal-lg" id="productModal_1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog  modal-large">
                      
                      
     <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">[&times;]</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการขายสินค้าแปรรูป</h4>
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
        
    
        
 <!-- Dialog Show TX-->                      
<div class="modal fade bs-example-modal-lg" id="productModal_1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog  modal-large">
                      
                      
     <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">[&times;]</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการขายสินค้าแปรรูป</h4>
      </div>
    
       <div class="modal-body">
           <div id="div_receive_data"> - </div>
        </div> 
           <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal"> ปิด </button>
           </div>
      </div>
     </div>
    </div>
</div>
        
        
        
               
 <!-- Dialog Save new TX-->               
 <div class="modal fade bs-example-modal-lg" id="rawmatModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
                
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">[&times;]</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการขายสินค้า</h4>
      </div>
    
       <div class="modal-body">
          <form id=form01>
           
         <div class="row">
             <div class="col-md-2"><label>วันที่ขายสินค้า</label></div>
          <div class="col-md-3 ">
               <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" id="txt_sell_date" name="txt_sell_date" class="form-control pull-right">

                </div>
              </div>
           </div>
            <div class="col-md-2 col-md-offset-2 "><label>หมายเลขเอกสาร</label></div>
             <div class="col-md-3 ">
                 <input type="text" id="txt_document_no" name="txt_document_no" class="form-control pull-right" >
                  </div>
        
        </div>
       
        <div class="row">
             <div class="col-md-12">
            
             <table class="table table-bordered table-striped">
              <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 80px">ประเภทสินค้า</th>
                  <th style="width: 20px">% TM</th>
                  <th style="width: 40px">จำนวน (Tons)</th>
                  <th style="width: 60px">ที่จัดเก็บ</th>
              </tr>
              <?php
              
               $_basic_info = new Basic_Info(); 
              
              $row_data=5;
                for($i=0;$i<$row_data;$i++)
                {
                     $_rawmat_option = $_basic_info->getSellProductList_v1(-1);
              ?>
              <tr>
                   <td><?php echo $i+1; ?></td>
                  <td>
                   <select class="form-control" id="opt_product_id_a[]" name="opt_product_id_a[]">
                           <?php echo $_rawmat_option; ?>
                  </select>
                  </td>
                  <td> <input type="text" id="txt_TM_value_a[]" name="txt_TM_value_a[]" class="form-control" placeholder="ระบุจำนวนตัวเลข %..."></td>
                  <td> <input type="text" id="txt_sell_qty_a[]" name="txt_sell_qty_a[]" class="form-control" placeholder="ระบุจำนวนตัวเลข ..."></td>
                  <td>
                   <?php
                       // $_basic_info = new Basic_Info();
                        $_location_option = $_basic_info->getLocationList(-1);
                    ?>
                  <select class="form-control" id="opt_sell_location_a[]" name="opt_sell_location_a[]">
                      <?php echo $_location_option; ?>
                  </select>
                  </td>
                  
              </tr>
              <?php } ?>
          </table>
                 
                 
            
            
            </div>
           </div>
       
       
        <div class="row">
            <div class="col-md-4"><label>รายละเอียดเพิ่มเติม</label></div>
            <div class="col-md-8 "> 
                <div class="form-group">
                  
                  <textarea id="txt_remarks" name="txt_remarks" class="form-control" rows="3" placeholder="รายละเอียดเพิ่มเติม..."></textarea>
                </div></div>
        </div>
        
      
        
           
           </form>    
      </div>
          
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="jsSubmit_SellProduct();">บันทึก</button>
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
              <h3 class="box-title">รายการขายสินค้าเปรรูป</h3>
                   </div>

              <div class="col-lg-6 col-xs-6" align="right">
                  
               
                  <a class="btn btn-app btn-primary" data-toggle="modal" onclick="jsOpenDialog()" >
                <i class="fa fa-plus-circle"></i> เพิ่มรายการขายสินค้าแปรรูป
                </a>
                   </div>
                   
                </div>
                
                
                
                
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <div id="div_sell_table">
              <table id="product_table" class="table table-bordered table-striped table-hover">
                
               <thead>
                <tr>
                  <th>วันที่</th>
                  <th>ประเภทธุรกรรม</th>
                    
                 <th>สถานที่จัดเก็บ</th>
                  <th>ประเภทสินค้าแปรรูป</th>
                  
                  <th>จำนวน</th>
                  <th>ยอดรวมสินค้าแปรรูป</th>
                  <th>ผู้ทำรายการ</th>
                </tr>
                </thead>
                <tbody>
                 <!--<tr>
                  <td>12/01/2016</td>
                  <td>ยอดรวมยกมา</td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="badge bg-light-blue">1,500 Tons</span></td>
                  <td align="right"><span class="badge bg-grey">1,500 Tons</span></td>
                  <td align="center">Username1</td>
                </tr>-->
                <tr>
                  <td>12/01/2016</td>
                  <td>รับ สินค้าแปรรูป</td>
                  <td>โกดัง # 3</td>
                  <td>สินค้าประเภท 1</td>
                  <td align="right">
                    <span class="badge bg-red">-500 Tons</span>
                   </td>
                  <td align="right">
                    
                    <span class="badge bg-grey">1,000 Tons</span>
                    </td>
                  <td align="center">Username1</td>
                </tr>
               <tr>
                  <td>12/01/2016</td>
                  <td>รับ สินค้าแปรรูป</td>
                  <td>โกดัง # 4</td>
                  <td>สินค้าประเภท 2</td>
                  <td align="right">
                    <span class="badge bg-red">-500 Tons</span>
                   </td>
                  <td align="right">
                    
                    <span class="badge bg-grey">500 Tons</span>
                    </td>
                  <td align="center">Username1</td>
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


            <!-- /.box-body -->
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
<script src="plugins/datepicker/locales/bootstrap-datepicker.th.js"></script>
<script src="inc/js/ajax_pop.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  
   //Date picker
    $('#txt_sell_date').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "th",
        todayHighlight: true
    }); 
   

  });

    function jsOpenDialog()
    {
        
        $('#rawmatModal').attr('class', 'modal fade bs-example-modal-lg')
            .attr('aria-labelledby','myLargeModalLabel');
		$('.modal-dialog').attr('class','modal-dialog modal-lg');
        $('#rawmatModal').modal('show'); 
        
    }
   function jsGetSellProductTable()
    {
      /*document.getElementById("table_loading").style.visibility = "visible";


       getData_Sync("inc/source/getProductInventoryLog.php?prod_id=1&param_table=product_table","div_sell_table");



        document.getElementById("table_loading").style.visibility = "hidden";
        $(function () {
             $("#product_table").DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false
            });

         });
        
        */
        
         document.getElementById("table_loading").style.visibility = "visible";
        
       
      getData_Sync("inc/source/getInventoryLog_v2.php?prod_type_id=1&tran_type=sell_product&param_table=sell_product_table","div_sell_table");
        document.getElementById("table_loading").style.visibility = "hidden";
       $(function () {
                     //$("#withdraw_table_1").DataTable({
                     $("#sell_product_table").DataTable({
                      "paging": true,
                         "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false
                    
                });
       }); 

    }
    
    function jsSubmit_SellProduct()
    {
        var val_sell_date ="";
       var val_document_no ="";
        var val_sell_remarks ="";
        
           
         document.getElementById("table_loading").style.visibility = "visible";
        
        var obj_txt_receive_date = document.getElementById("txt_sell_date");
        var obj_txt_document_no = document.getElementById("txt_document_no");
        var obj_txt_remarks = document.getElementById("txt_remarks");
        
        
        
        if(obj_txt_receive_date != null)
        {
            val_sell_date =obj_txt_receive_date.value;
            obj_txt_receive_date.value ="";
        }
        
        if(obj_txt_document_no != null)
        {
            val_document_no =obj_txt_document_no.value;
            obj_txt_document_no.value ="";
        }
        if(obj_txt_remarks != null)
        {
            val_sell_remarks =obj_txt_remarks.value;
            obj_txt_remarks.value ="";
        }
     
        
        var param_receive_rawmat_header ="&sell_date="+val_sell_date+"&document_no="+val_document_no+"&sell_remarks="+val_sell_remarks;
        

        var obj_opt_product_id = document.forms.form01.elements["opt_product_id_a[]"];
        var obj_txt_TM_value = document.forms.form01.elements["txt_TM_value_a[]"];
        var obj_txt_sell_qty = document.forms.form01.elements["txt_sell_qty_a[]"];
        var obj_opt_sell_location = document.forms.form01.elements["opt_sell_location_a[]"];

        var param_product="";
        for (var i = 0, len = obj_opt_product_id.length; i < len; i++) {
            if(obj_opt_product_id[i].value!=-1)
            {
                
                param_product=param_product+"&product_id[]="+obj_opt_product_id[i].value+"&TM_value[]="+obj_txt_TM_value[i].value+"&sell_qty[]="+obj_txt_sell_qty[i].value+"&sell_location[]="+obj_opt_sell_location[i].value;
                obj_opt_product_id[i].value="";
                obj_txt_TM_value[i].value="";
                obj_txt_sell_qty[i].value="";
                obj_opt_sell_location[i].value="-1";
                
            }
          
            
        }
        var update_ajax_url ="inc/source/updateInventory.php?action=add_sell_product_header&"+param_receive_rawmat_header+param_product;
        
        console.log(update_ajax_url);
        getDataXML_Sync(update_ajax_url,jsAfterSubmitSellProduct);
        document.getElementById("table_loading").style.visibility = "hidden";
        
        
        
    }
     function jsAfterSubmitSellProduct(respText)
    {
        //console.log(respText);
        if(respText==1)
        {
            jsGetSellProductTable();
        }
      
        
    }
    
     function jsOpenSellProduct(sh_id)
    {
       // console.log(rh_id);
        var url_1 ="inc/source/getTranscation_data.php?type=sell_product&sh_id="+sh_id;
        // console.log(url_1);
         getDataXML_Sync(url_1,jsShowSellDialog);
    }
    function jsShowSellDialog(respText)
    {
        
        if(respText!="")
        {
            document.getElementById("div_receive_data").innerHTML =respText;
            $('#productModal_1').attr('class', 'modal fade bs-example-modal-lg').attr('aria-labelledby','myLargeModalLabel');
            $('.modal-dialog').attr('class','modal-dialog modal-lg');
            $('#productModal_1').modal('show');
        }
    }
    
    
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>


</html>
