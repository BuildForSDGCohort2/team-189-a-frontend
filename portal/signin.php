<?php
    session_start();
    include ("inc/header.php");
    include ("inc/dblink.php");

        if (isset($_POST['btn-login'])) {
            $contact_msisdn = $_POST['contact_msisdn'];
            $pin            = hash('sha256', $_POST['pin']);
            $sql = "SELECT * FROM CUSTOMERS WHERE MSISDN ='".$contact_msisdn."' AND PIN = '".$pin."'";
            if(mysql_query($dblink,$sql)){
            file_put_contents("log.txt","$sql",FILE_APPEND);
            if(mysql_fetch_array(mysql_query($dblink,$sql))[pin]==$pin){;
            $response = '<div class="alert alert-success">Admin Portal</div>';
             header("location:dashboard.php");

            } else {
                $response = '<div class="alert alert-danger">Wrong Pin</div>';
            }
        }
    }
?>
<link href="assets/css/signin.css"rel="stylesheet"/>
<div class="container">
    <div  class="signin-card">
        <div class="logo-image">
            <img src="assets/img/fb.jpg" alt="Admin Portal" title="Spotcash" style="width: 200px; height: auto;">
        </div>
        <div class="clearfix"></div>
        <form action="signin.php"method ="POST">
            <div class="form-group">
                <label for="Phone Number">Phone Number:</label>
                <input id="contact_msisdn" class="form-control" name="contact_msisdn" type="text" size="18" alt="Phone Number" required />
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label for="pin">Pin:</label>
                <input id="pin" class="form-control" name="pin" type="password" size="18" alt="Agent Pin" required>
            </div>
            <div class="clearfix"></div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <input type="submit"   name="btn-login" class="btn btn-success btn-round" value="Sign In">
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
    <footer class="navbar navbar-fixed-bottom">
        <div class="row" style="background-color: #1372A3;">
            <div class="container">
                <div class="row" style="margin-top:20px">
                    <div class="col-lg-7 col-sm-8  pull-left">
                        <div class="copyright pull-left">
                            <p><a href="https://" style="color:#fff;" data-toggle="modal" data-target="#myModal">About Team189</a> | <a href="https://" style="color:#fff;" data-toggle="modal" data-target="#Contact">Contact Us</a></p>
                        </div>
                    </div>
                    <div class="col-md-5 pull-left">
                        <div class="copyright">
                            <p>&copy; Copyright <?php echo date("Y");?>- Team189 Limited | All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
