<?php
 session_start();
 include ("inc/header.php");
 include ("inc/dblink.php");
 include ("inc/functions.php");
 $sql = "SELECT * FROM transaction";
$res = mysqli_query($dblink, $sql);

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
        <!-- End Navbar -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Complete Transactions</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        PHONE NUMBER
                                    </th>
                                    <th>
                                        TRX_ID
                                    </th>
                                    <th>
                                        AMOUNT
                                    </th>
                                    <th>
                                        CHECKOUT_REQUEST_ID
                                    </th>
                                    <th>
                                         REFERENCE NUMBER
                                    </th>
                                    <th>
                                        PROCESSING_STATUS
                                    </th>
                                    <th>
                                        MERCHANT_REQUEST_ID
                                    </th>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $count = 0;
                                         while ($row = mysqli_fetch_array($res)) {
                                             $count++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row[msisdn];?>
                                            </td>
                                            <td>
                                                <?php echo $row[bill_reference_number]; ?>
                                            </td>
                                            <td>
                                                <?php echo  $row[amount]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[checkout_request_id];?>
                                            </td>
                                            <td>
                                                <?php echo $row[bill_reference_number]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[processing_status]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[merchant_request_id]; ?>
                                            </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
