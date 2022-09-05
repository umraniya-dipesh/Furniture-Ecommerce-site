<ul>
                        <?php
                            include('config.php');
                            $res=mysqli_query($con,"select * from category");
                            while($row=mysqli_fetch_array($res))
                            {
			            ?>
                            <li><a href="category.php?id=<?php echo $row['category_id'];?>&<?php echo $row['category_name'];?>"><?php echo $row['category_name']; ?></a></li>
                            
                        <?php		
				            }
			            ?>    
</ul>