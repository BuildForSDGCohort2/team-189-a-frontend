<?php
session_start();
include ("inc/header.php");
if(!$_SESSION['username']){
    header("location:http://197.232.25.77/newagencyportal/signin.php");
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
                            <div id="map" style="height: 200px;text-align: center;"class="lead font-weight-bold">
                                <p>You can Download an Updated Ageny Apk in the Link Provided:<p>

                                    <a href="https://drive.google.com/file/d/1hR3_vyK2X6BH5bFvtSLW22Nrkdukl-wR/view?usp=sharing" download>
                                        <img src="./assets/img/spotcash.png" alt="Agency App" height="142">
                                    </a>
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
