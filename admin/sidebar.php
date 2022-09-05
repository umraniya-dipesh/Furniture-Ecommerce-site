<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title text-center" style="border: 0;">
            <!-- <img src="images/l2.png" height="60px" width="55px" class="md"><b><font face="lemon" color="Black" size="4px">Delux Furniture</font></b> -->

            <img src="images/LOGO_FINAL.png" height="65px" width="85px" class="md"><b><font face="lemon" color="Black" size="5px">Furnish</font></b>
			
            
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
            </div>
            <div class="profile_info">
                <h2><strong>Admin Panel</strong></h2> 
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <!-- <h3>Furniture Name</h3> -->
                <ul class="nav side-menu">

                    <li><a href ="home.php"><i class="fa fa-home"></i> Home</a></li>

                    <li><a><i class="fa fa-table"></i> Product<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="add_product.php">Add Product</a></li>
                                <li><a href="view_product.php">View Product</a></li>
                            </ul>
                     </li>

                     <li><a><i class="fa fa-television" aria-hidden="true"></i> Slider<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="add_slider.php">Add Slider</a></li>
                                <li><a href="view_slider.php">View Slider</a></li>
                            </ul>
                     </li>
                     <!-- <li><a href="view_slider.php"><i class="fa fa-television"></i> Slider</a></li> -->
                     <!-- <li><a href="customer_details.php"><i class="fa fa-users"></i> Customer's </a></li> -->

                     <li><a><i class="fa fa-align-justify"></i> Category <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="add_category.php">Add Category</a></li>
                            <li><a href="manage_category.php">Manage Category</a></li>     
                        </ul>
                    </li>

                    <li><a><i class="fa fa-th-list"></i> Sub-Categoty <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="add_scategory.php">Add Sub-Category</a></li>
                            <li><a href="manage_scategory.php">Manage Sub-Category</a></li>     
                        </ul>
                    </li>

                    <li><a href="customer_details.php"><i class="fa fa-users"></i> Customer's </a></li>
                    
                    <!-- <li><a><i class="fa fa-user"></i> Supplier <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="add_supplier.php"> Add Supplier</a></li>
                            <li><a href="view_supplier.php">View Supplier Details</a></li>
                        </ul>
                    </li> -->
                    
                     <li><a><i class="fa fa-file-text"></i>Report<span class="fa fa-chevron-down"></span></a>
                         <ul class="nav child_menu">
                            <li><a href="order_details_transaction.php">View Order Details</a></li>
                            <li><a href="transaction_details.php">View Transaction's</a></li>
                            <li><a href="contactus.php">View Contact Us</a></li>
                         </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Admin
                    <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="password.php"><i class="fa fa-key pull-right"></i> Change Password</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- top navigation -->