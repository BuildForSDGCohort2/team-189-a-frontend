<?php
 session_start();
 include ("inc/header.php");
 include ("inc/dblink.php");
 include ("inc/functions.php");
 $dblink = mysqli_connect('localhost','team189','team189','team189');
 $sql = "SELECT * FROM transaction";

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
                            <form class="form-inline text-right" action="reports.php" method="POST">
                                <button type="submit" id ="exportExcel" name='exportExcel' value="Export to Excel"  class="btn btn-info btn-xs">Excel</button>
                                <button type="submit" id ="exportPdf"   name='exportPdf'   value="Export to Pdf"    class="btn btn-info btn-xs">PDF  </button>
                            </form>
                            <?php

//                            if (isset($_POST["exportExcel"])) {

                            if(isset($_POST['exportExcel'])) {
                                $fp = fopen("php://output", 'w') or die("Can't open php://output");
                                header("Content-Type:application/csv");
                                header("Content-Disposition:attachment;filename=Transactions.csv");

                                $header = array("ID" => "ID", "REF_ID" => "REF_ID", "Request_Time" => "Request_Time", "Time_Complicated" => "Time_Completed", "Service_Name" => "Service_Name", "Phone_Number" => "Phone_Number",
                                    "CUSTOMER_NAME" => "CUSTOMER_NAME", "AMOUNT" => "AMOUNT", "DESC" => "DESC");

                                fputcsv($fp, $header);
                                while ($row = oci_fetch_array($result)) {
                                    fputcsv($fp, array("ID" => $row[ID], "REF_ID" => $row[REF_ID], "Request_Time" => $row[Request_Time], "Time_Complicated" => $row[Time_Completed], "Service_Name" => $row[Service_Name], "Phone_Number" => $row[Phone_Number],
                                        "CUSTOMER_NAME" => $row[CUSTOMER_NAME], "AMOUNT" => $row[AMOUNT], "DESC" => $row[DESC]));
                                }
                                fclose($fp);
                                exit();
                            }
                            ?>
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
                                        while($row = mysqli_fetch_array(mysqli_query($dblink,$sql))){
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
                                            $count++;
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
