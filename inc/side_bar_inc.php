

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Guest</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
        
    <?php 
        
        $_menu_id =1;
        $_sub_menu_id =-1;
        if(isset($_GET['menu_id']))    $_menu_id =$_GET['menu_id'];
        if(isset($_GET['sub_menu_id']))    $_sub_menu_id =$_GET['sub_menu_id'];
            
       
        
        ?>
      <ul class="sidebar-menu">
      <!--  <li class="header">HEADER</li>-->
        <!-- Optionally, you can add icons to the links -->
        <li <?php if($_menu_id==1) echo "class=\"active\"";?>><a href="index.php?menu_id=1"><i class="fa fa-dashboard fa-lg"></i> <span>หน้าหลัก</span></a></li>
        <li <?php if($_menu_id==2) echo "class=\"active\"";?>><a href="receive_rawmat.php?menu_id=2"><i class="fa fa-ship fa-lg"></i> <span>รับวัตถุดิบ เข้าคลัง</span></a></li>
        <li <?php if($_menu_id==3) echo "class=\"active\"";?>><a href="withdraw_rawmat.php?menu_id=3"><i class="fa fa-industry fa-lg"></i> <span>เบิกวัถุดิบ สำหรับแปรรูป</span></a></li>

        <li <?php if($_menu_id==4) echo "class=\"active\"";?>><a href="receive_product.php?menu_id=4"><i class="fa fa-cube fa-lg"></i> <span>ผลิตสินค้า</span></a></li>
        <li <?php if($_menu_id==5) echo "class=\"active\"";?>><a href="sell_product.php?menu_id=5"><i class="fa fa-truck fa-lg"></i> <span>ขายสินค้า</span></a></li>
        <li class="treeview <?php if($_menu_id==6) echo "active";?>">
          <a href="#"><i class="fa fa-sticky-note"></i> <span>รายงาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li <?php if(isset($_GET['sub_menu_id'])) { if($_sub_menu_id ==1 && $_menu_id==6) echo "class=\"active\""; } ?>><a href="report_receive_rawmat.php?menu_id=6&sub_menu_id=1"><i class="fa fa-sticky-note"></i>รายงานรับวัตถุดิบ</a></li>
            <li <?php if(isset($_GET['sub_menu_id'])) { if($_sub_menu_id ==2 && $_menu_id==6) echo "class=\"active\""; }?>><a href="report_withdraw_rawmat.php?menu_id=6&sub_menu_id=2"><i class="fa fa-sticky-note"></i>รายงานเบิกวัตถุดิบ</a></li>
            <li <?php  if(isset($_GET['sub_menu_id'])) {if($_sub_menu_id ==3 && $_menu_id==6) echo "class=\"active\""; }?>><a href="report_sell_product.php?menu_id=6&sub_menu_id=3"><i class="fa fa-sticky-note"></i>รายงานขายสินค้า</a></li>
          </ul>
        </li>

         <!--<li><a href="index.html"><i class="fa fa-cog fa-lg text-danger"></i><span>กำหนดค่า</span></a></li>-->
         <li <?php if( $_menu_id==7) echo "class=\"active\"";?>><a href="master_config.php?menu_id=7"><i class="fa fa-cog fa-lg "></i><span>กำหนดค่า</span></a></li>
         <li <?php if( $_menu_id==8) echo "class=\"active\"";?>><a href="user_mgnt.php?menu_id=8"><i class="fa fa-users fa-lg"></i> <span>กลุ่มผู้ใช้งาน</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
