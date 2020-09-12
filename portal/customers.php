<?php
 session_start();
 error_reporting(0);
 include ("inc/header.php");
 //include ("inc/dblink.php");
 $dblink = mysqli_connect('localhost','team189','team189','team189');
 $sql = "SELECT * FROM customers";
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
            <a href="" class="simple-text logo-normal">
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
                            <h4 class="card-title">CHAMA MEMBERS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        FIRSTNAME
                                    </th>
                                    <th>
                                        SURNAME
                                    </th>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                         PHONE NUMBER
                                    </th>
                                    <th>
                                        LOCATION
                                    </th>
                                    <th>
                                        MARITAL_STATUS
                                    </th>
                                    <th>
                                        GENDER
                                    </th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($row = mysqli_fetch_array(mysqli_query($dblink,$sql))){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row[firstname];?>
                                            </td>
                                            <td>
                                                <?php echo $row[surname]; ?>
                                            </td>
                                            <td>
                                                <?php echo  $row[idno]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[msisdn];?>
                                            </td>
                                            <td>
                                                <?php echo $row[location]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[marital_status]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[gender]; ?>
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
