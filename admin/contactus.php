<?php
    include('config.php');
   
    if(isset($_POST['deletebtn']))
    {
        $key=$_POST['chkbox'];
        $sql="select * from contact_us where contactus_id='".$key."' ";
        $res=mysqli_query($con,$sql);
        //print_r($sql);
        //var_dump($res);
        if(mysqli_num_rows($res)>0)
        {
            $sql="delete from contact_us where contactus_id='".$key."'";
            $res=mysqli_query($con,$sql);
            echo "<script type='text/javascript'>alert('Record Deleted.');</script>";

        }
        else
        {
            echo "<script type='text/javascript'>alert('Not Delete');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin |  Contact Us Details </title>
        <?php include_once 'include-css.php';?>
    </head>
     <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php include('sidebar.php') ?>
                <div class="right_col" role="main">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Contact Us Details</h2>
                                    <div class="clearfix"></div>
                                </div>
                 <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Search</span>
                    <input type="text" name="search_text" id="search_text" placeholder="Search by contact Us" class="form-control" />
                </div>
                </div>
                <div id="result"></div>
                                <div class="x_contain">
                                       <!-- <div class="table-responsive"> 
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sr.no</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                        include('config.php');
                                                        $sql="select * from contact_us";

                                                        $res=mysqli_query($con,$sql);
                                                        $srno=1;
                                                        while($test=mysqli_fetch_array($res))
                                                        {
                                                            echo "<tr>";
                                                            echo "<form name='view_product' method='POST'>";
                                                            echo "<td>".$srno."</td>";
                                                        
                                                            echo "<td>".$test['cnt_name']."</td>";
                                                            echo "<td>".$test['email']."</td>";
                                                            echo "<td>".$test['subject']."</td>";
                                                            echo "<td>".$test['message']."</td>";
                                                            echo "<td colspan='2'><input type='hidden' name='chkbox' value='".$test['contactus_id']."'>   
                                                            <input type='submit' name='deletebtn' class='btn btn-info' value='Delete'></td>";
                                                             echo "</form>";
                                                            echo "</tr>";
                                                            $srno++;
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>
                                       </div>  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php') ?>
        <script>
$(document).ready(function(){
    load_data();
    function load_data(query)
    {
        $.ajax({
            url:"fetch_contactus.php",
            method:"post",
            data:{query:query},
            success:function(data)
            {
                $('#result').html(data);
            }
        });
    }
    
    $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
            load_data(search);
        }
        else
        {
            load_data();            
        }
    });
});
</script> 
    </body>
</html>