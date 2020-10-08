<?php
session_start();
    include ("inc/header.php");
    include ("inc/dblink.php");
    if(isset($_POST['btn-pwd'])) {
    }
?>
<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="blue | green | orange | red | yellow" data-active-color="danger">
        <div class="logo">
            <a href="http://www.team189.com" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="assets/img/logo-small.png">
                </div>
            </a>
            <a href="http://www.team189.com" class="simple-text logo-normal">
                Admin
            </a>
        </div>
        <?php
            include ("inc/sidebar.php");
        ?>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <?php
            include ("inc/navbar.php");
        ?>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <div id="map" style="height: 400px;text-align: center;"class="lead font-weight-bold">
                                <form action="help.php" method="post">
                                    <div class="col-md-6">
                                        <div class="form-group"><?php echo $response;?>
                                            <label>New Password:</label>
                                            <input type="password" class="form-control" placeholder="New Password" name="npassword" required>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confirm Password:</label>
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="text-center">
                                              <input type = "submit" class="btn btn-success btn-round"  name="btn-pwd" value = "Submit">
                                           </div>
                                       </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include ("inc/footer.php");
        ?>
</body>
</html>
