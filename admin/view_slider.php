<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin |  View Slider Details </title>
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
                                    <h2>Slider Details</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- <div>
                                    <button type="button" class="btn btn-info" onclick="window.location.href ='add_slider.php'" style="border: 1px solid #DDDDDD; font-weight: bold;">Add Slider &nbsp; <i class="fa fa-plus" aria-hidden="true"></i></button>
                                   </div> -->
                                 <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Search</span>
                    <input type="text" name="search_text" id="search_text" placeholder="Search by Product  Details" class="form-control" />
                </div>
                </div>
                <div id="result"></div>
                                <!-- <div class="x_contain">
                                        
                                </div> -->
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
            url:"fetch_slider.php",
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