<?php
session_start();
include ("inc/dblink.php");
include ("inc/header.php");

$query ="SELECT COUNT(*) AS TRX FROM customers";

file_put_contents("log.txt","$query",FILE_APPEND);

 $row    = mysqli_fetch_array(mysqli_query($dblink,$query));
 $result = $row[TRX];

$sql = "SELECT SUM(amount) Total FROM transaction WHERE amount>0";
$rowx = mysqli_fetch_array(mysqli_query($dblink,$sql));
$rs  = $rowx[Total];

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="blue | green | orange | red | yellow" data-active-color="danger">
        <div class="logo">
            <a href="http:" class="simple-text logo-normal">
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
        <!-- End Navbar -->
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-globe text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category"><?php echo $rs? $rs: 'No Transactions';?></p>
                                        <p class="card-title"><p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-money-coins text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-title" id="balance">
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-favourite-28 text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Customers</p>
                                        <p class="card-title"><?php echo $result;?><p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h5 class="card-title"> Statistics</h5>
                            <p class="card-category">Performance</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="chartEmail"></canvas>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-primary"></i> Pending
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-calendar"></i> Number of Transactions
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h5 class="card-title">Transaction Statistics</h5>
                            <p class="card-category">Performance</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="chartEmail"></canvas>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-primary"></i> Failed
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-calendar"></i> Number of Transactions
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h5 class="card-title">Transaction Statistics</h5>
                            <p class="card-category">Performance</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="chartEmail"></canvas>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-primary"></i> Success
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-calendar"></i> Number of Transactions
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
