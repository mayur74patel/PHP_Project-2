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
                    <span>Airport</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_category') ? 'active' : '' ?>">
                        <a href="add_airport.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'category_list') ? 'active' : '' ?>">
                        <a href="airport_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
			                       
            <li class="treeview <?= (isset($filename) && ($filename == 'add_category') || ($filename == 'category_list') || ($filename == 'edit_category')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Airlines</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_category') ? 'active' : '' ?>">
                        <a href="add_airlines.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'category_list') ? 'active' : '' ?>">
                        <a href="airlines_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            <li class="treeview <?= (isset($filename) && ($filename == 'add_category') || ($filename == 'category_list') || ($filename == 'edit_category')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>employee</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_category') ? 'active' : '' ?>">
                        <a href="add_employee.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'category_list') ? 'active' : '' ?>">
                        <a href="employee_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            <li class="treeview <?= (isset($filename) && ($filename == 'add_category') || ($filename == 'category_list') || ($filename == 'edit_category')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Flight</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'add_category') ? 'active' : '' ?>">
                        <a href="add_flight.php"><i class="fa fa-circle-o"></i> Add</a>
                    </li>
                    <li class="<?= (isset($filename) && $filename == 'category_list') ? 'active' : '' ?>">
                        <a href="flight_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            
			<li class="treeview <?= (isset($filename) && ($filename == 'add_subcategory') || ($filename == 'subcategory_list') || ($filename == 'edit_subcategory')) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    <span>Ticket</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= (isset($filename) && $filename == 'subcategory_list') ? 'active' : '' ?>">
                        <a href="ticket_list.php"><i class="fa fa-circle-o"></i> List</a>
                    </li>                    
                </ul>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>