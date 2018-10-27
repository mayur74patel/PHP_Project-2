<?php 
$filename = '';
$current_file_name = basename($_SERVER['PHP_SELF']);
$filename = explode('.', $current_file_name);
$filename = $filename[0];
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user-default.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo $_SESSION['name'];
                    }
                    ?>   
                </p>               
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>            
            <li class="<?= (isset($filename) && $filename == 'dashboard') ? 'active' : '' ?>">
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>                       
            <li class="treeview <?= (isset($filename) && ($filename == 'add_category') || ($filename == 'category_list') || ($filename == 'edit_category')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_category') ? 'active' : '' ?>">
                        <a href="add_category.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'category_list') ? 'active' : '' ?>">
                        <a href="category_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            <li class="treeview <?= (isset($filename) && ($filename == 'add_subcategory') || ($filename == 'subcategory_list') || ($filename == 'edit_subcategory')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    <span>Sub Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_subcategory') ? 'active' : '' ?>">
                        <a href="add_subcategory.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'subcategory_list') ? 'active' : '' ?>">
                        <a href="subcategory_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            
            <li class="treeview <?= (isset($filename) && ($filename == 'add_subcategory_detail') || ($filename == 'subcategory_detail_list') || ($filename == 'edit_subcategory_detail')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <span>Sub Category Details</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_subcategory_detail') ? 'active' : '' ?>">
                        <a href="add_subcategory_detail.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'subcategory_detail_list') ? 'active' : '' ?>">
                        <a href="subcategory_detail_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            
            <li class="treeview <?= (isset($filename) && ($filename == 'add_slider') || ($filename == 'slider_list') || ($filename == 'edit_slider')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-sliders" aria-hidden="true"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_slider') ? 'active' : '' ?>">
                        <a href="add_slider.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'slider_list') ? 'active' : '' ?>">
                        <a href="slider_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            
            <li class="treeview <?= (isset($filename) && $filename == 'user_list') ? 'active' : '' ?>">
                <a href="user_list.php">
                    <i class="fa fa-users"></i>
                    <span>User List</span>                   
                </a>                
            </li>
             <li class="treeview <?= (isset($filename) && ($filename == 'add_faq') || ($filename == 'faq_list') || ($filename == 'edit_faq')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <span>Faqs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_faq') ? 'active' : '' ?>">
                        <a href="add_faq.php"><i class="fa fa-circle-o"></i> Add Faq</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'faq_list') ? 'active' : '' ?>">
                        <a href="faq_list.php"><i class="fa fa-circle-o"></i> Faq List</a>
                    </li>                    
                </ul>
            </li>
            
            <li class="treeview <?= (isset($filename) && $filename == 'contact_list') ? 'active' : '' ?>">
                <a href="contact_list.php">
                    <i class="fa fa-list"></i>
                    <span>Contact List</span>                   
                </a>                
            </li>
            
            <li class="treeview <?= (isset($filename) && $filename == 'reg_service_list') ? 'active' : '' ?>">
                <a href="reg_service_list.php">
                    <i class="fa fa-list"></i>
                    <span>Regular Cleaning List</span>                   
                </a>                
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>