<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>รับสินค้าแปรรูป | ระบบบริหารคลังสินค้า </title>
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
<style>
 .datepicker{z-index:1151 !important;}
</style>
<script>
    function jsSave_AddNew_Material()
    {
    //    alert("After Save");
        console.log("After Save");
        
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
 <body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">



       <?php include "inc/nav_bar_inc.php";?>


        <?php include "inc/side_bar_inc.php"; ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          รับสินค้าแปรรูป
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
<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">[&times;]</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการรับสินค้าแปรรูป</h4>
      </div>
    
       <div class="modal-body">
         <div class="row">
             <div class="col-md-4"><label>วันที่รับสินค้าแปรรูป</label></div>
          <div class="col-md-8 ">
               <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
              </div>
           </div>
        
        </div>
        <div class="row">
            <div class="col-md-4"><label>จำนวน</label></div>
            <div class="col-md-7 "><div class="form-group">
                  
                  <input type="text" class="form-control" placeholder="ระบุจำนวนตัวเลข ...">
               
                </div>
            </div>
            <div class="col-md-1">
                 <label>Tons</label>
            </div>
           </div>
        <div class="row">
            <div class="col-md-4"><label>กลุ่มสินค้า</label></div>
            <div class="col-md-8 ">
              <div class="form-group">
                  
                  <select class="form-control">
                    <option value="product_1">สินค้าประเภท 1</option>
                    <option value="product_2">สินค้าประเภท 2</option>
                    <option value="product_3">สินค้าประเภท 3</option>
                    <option value="product_4">สินค้าประเภท 4</option>
                    
                  </select>
                </div>
            
            </div>
        </div> <div class="row">
            <div class="col-md-4"><label>สถานที่จัดเก็บ</label></div>
            <div class="col-md-8 ">
             <!-- Select multiple-->
                <div class="form-group">
                  
                  <!--<select multiple class="form-control">-->
                  <select  class="form-control">
                    <option value="store_1">โกดัง 1</option>
                    <option value="store_2">โกดัง 2</option>
                    <option value="store_3">โกดัง 3</option>
                    <option value="store_4">โกดัง 4</option>
                    <option value="store_5">โกดัง 5</option>
                  </select>
                </div>
            
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"><label>รายละเอียดเพิ่มเติม</label></div>
            <div class="col-md-8 "> 
                <div class="form-group">
                  
                  <textarea class="form-control" rows="3" placeholder="รายละเอียดเพิ่มเติม..."></textarea>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="jsSave_AddNew_Material();">บันทึก</button>
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
              <h3 class="box-title">รายการรับสินค้าเปรรูป</h3>
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
                <a class="btn btn-app btn-primary" data-toggle="modal" data-target="#bs-example-modal-lg">
                <i class="fa fa-plus-circle"></i> เพิ่มรายการรับสินค้าแปรรูป
              </a>
                       
                       
                   </div>
                   
                </div>
                
                
                
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                
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
                    <span class="badge bg-green">+500 Tons</span>
                   </td>
                  <td align="right">
                    
                    <span class="badge bg-grey">500 Tons</span>
                    </td>
                  <td align="center">Username1</td>
                </tr>
               <tr>
                  <td>12/01/2016</td>
                  <td>รับ สินค้าแปรรูป</td>
                  <td>โกดัง # 4</td>
                  <td>สินค้าประเภท 2</td>
                  <td align="right">
                    <span class="badge bg-green">+500 Tons</span>
                   </td>
                  <td align="right">
                    
                    <span class="badge bg-grey">1,000 Tons</span>
                    </td>
                  <td align="center">Username1</td>
                </tr>
                 <tr>
                  <td>12/01/2016</td>
                  <td>รับ สินค้าแปรรูป</td>
                  <td>โกดัง # 5</td>
                  <td>สินค้าประเภท 3</td>
                  <td align="right">
                    <span class="badge bg-green">+500 Tons</span>
                   </td>
                  <td align="right">
                    
                    <span class="badge bg-grey">1,500 Tons</span>
                    </td>
                  <td align="center">Username1</td>
                </tr>
 <!--
 <!--
                <tr>
                  <td>13/01/2016</td>
                  <td>เบิก วัตถุดิบ</td>
                  <td>Location#1</td>
                  <td align="right">- 1,000 Tons</td>
                  <td align="right">2,000 Tons</td>
                  <td align="center">Username1</td>
                </tr>

                <tr>
                  <td>13/01/2016</td>
                  <td>ผลิต สินค้าแปรรูป กลุ่ม 1</td>
                  <td>Location#1</td>
                  <td align="right">+ 200 Tons</td>
                  <td align="right">2,200 Tons</td>
                  <td align="center">Username1</td>
                </tr>

                <tr>
                  <td>13/01/2016</td>
                  <td>ผลิต สินค้าแปรรูป กลุ่ม 2</td>
                  <td>Location#1</td>
                  <td align="right">+ 250 Tons</td>
                  <td align="right">2,450 Tons</td>
                  <td align="center">Username1</td>
                </tr>

                 <tr>
                  <td>13/01/2016</td>
                  <td>ผลิต สินค้าแปรรูป กลุ่ม 3</td>
                  <td>Location#1</td>
                  <td align="right">+ 250 Tons</td>
                  <td align="right">2,700 Tons</td>
                  <td align="center">Username1</td>
                </tr>

                 <tr>
                  <td>13/01/2016</td>
                  <td>ผลิต สินค้าแปรรูป กลุ่ม 3</td>
                  <td>Location#1</td>
                  <td align="right">+ 300 Tons</td>
                  <td align="right">3,000 Tons</td>
                  <td align="center">Username1</td>
                </tr>

                 <tr>
                  <td>13/01/2016</td>
                  <td>จำหน่าย สินค้าแปรรูป กลุ่ม 3</td>
                  <td>Location#1</td>
                  <td align="right">- 200 Tons</td>
                  <td align="right">2,800 Tons</td>
                  <td align="center">Username1</td>
                </tr>-->
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
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
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
    $('#datepicker').datepicker({
      autoclose: true
    }); 
      
  });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>


</html>
