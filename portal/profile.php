<?php
session_start();
include ("inc/header.php");
if(!isset($_SESSION)){
    header("location:http://197.232.25.77/newagencyportal/signin.php");
}
?>
<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="http://www.team189.com" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="../assets/img/logo-small.png">
                </div>
            </a>
            <a href="http://www.team189.com" class="simple-text logo-normal">
                Admin
                <!-- <div class="logo-image-big">
                  <img src="../assets/img/logo-big.png">
                </div> -->
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
        <!-- End Navbar -->
        <!-- <div class="panel-header panel-header-sm" -->
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Paper Table Heading</h5>
                            <p class="category">Created using Montserrat Font Family</p>
                        </div>
                        <div class="card-body">
                            <div class="typography-line">
                                <h1>
                                    <span>Header 1</span>The Life of Paper Dashboard </h1>
                            </div>
                            <div class="typography-line">
                                <h2>
                                    <span>Header 2</span>The Life of Paper Dashboard </h2>
                            </div>
                            <div class="typography-line">
                                <h3>
                                    <span>Header 3</span>The Life of Paper Dashboard </h3>
                            </div>
                            <div class="typography-line">
                                <h4>
                                    <span>Header 4</span>The Life of Paper Dashboard </h4>
                            </div>
                            <div class="typography-line">
                                <h5>
                                    <span>Header 5</span>The Life of Paper Dashboard </h5>
                            </div>
                            <div class="typography-line">
                                <h6>
                                    <span>Header 6</span>The Life of Paper Dashboard </h6>
                            </div>
                            <div class="typography-line">
                                <p>
                                    <span>Paragraph</span>
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.
                                </p>
                            </div>
                            <div class="typography-line">
                                <span>Quote</span>
                                <blockquote>
                                    <p class="blockquote blockquote-primary">
                                        "I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at."
                                        <br>
                                        <br>
                                        <small>
                                            - Noaa
                                        </small>
                                    </p>
                                </blockquote>
                            </div>
                            <div class="typography-line">
                                <span>Muted Text</span>
                                <p class="text-muted">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...
                                </p>
                            </div>
                            <div class="typography-line">
                                <span>Primary Text</span>
                                <p class="text-primary">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...</p>
                            </div>
                            <div class="typography-line">
                                <span>Info Text</span>
                                <p class="text-info">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                            </div>
                            <div class="typography-line">
                                <span>Success Text</span>
                                <p class="text-success">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                            </div>
                            <div class="typography-line">
                                <span>Warning Text</span>
                                <p class="text-warning">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...
                                </p>
                            </div>
                            <div class="typography-line">
                                <span>Danger Text</span>
                                <p class="text-danger">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                            </div>
                            <div class="typography-line">
                                <h2>
                                    <span>Small Tag</span>
                                    Header with small subtitle
                                    <br>
                                    <small>Use "small" tag for the headers</small>
                                </h2>
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
