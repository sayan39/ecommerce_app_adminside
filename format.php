<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="assets/img/find_user.png" class="img-responsive" />
                     
                    </li>


                    <li>
                        <a href="dashboard.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                    <a href="category.php"><i class="fa fa-plus"></i>add category </a>
                    </li>
                    <li>
                        <a href="category.php"><i class="fa fa-list"></i>category <span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                        <?php
                        $response = display_cat();

                        $records = mysqli_num_rows($response);  //count no. of records
          
                        if($records > 0)
                        {
                            while($data = mysqli_fetch_assoc($response))   //One By One records insert into data
                            {
                              echo'
                            <li>
                                <a href="#">'.$data["category_name"].'</a>
                            </li>
                                ';  
                            }
                        }    
                        ?>
                    
                            
                        </ul>
                    </li>

                    <li>
                        <a href="products.php"><i class="fa fa-edit"></i>products</a>
                    </li>

                    <li>
                        <a href="user.php"><i class="fa fa-user"></i>users</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-shopping-cart"></i>orders</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-paste"></i>profile</a>
                    </li>
                </ul>

            </div>

        </nav>