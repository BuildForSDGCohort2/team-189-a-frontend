<?php
/**
*
*Coded With Love by Moha Polycarp
*/
    include ("inc/header.php");
    include ("inc/functions.php");
   // include ("inc/dblink.php");
    // if(!isset($_SESSION['CONTACT_MSISDN'])){
    //     header("location:signin.php");
    // }
 $dblink = mysqli_connect('localhost','team189','team189','team189');
    if(isset($_POST['btn-users'])){
        $fname          =$_POST['firstname'];
        $sname          =$_POST['surname'];
        $phone_number   =$_POST['msisdn'];
        $chama_id       =$_POST['chama_id'];
        $location       =$_POST['location'];
        $dob            =$_POST['dob'];
        $marital_status    =$_POST['marital_status'];
        $gender            =$_POST['gender'];
        $idno              =$_POST['idno'];
        $newpin            =rand(1000, 9999);
     
         $sql    = "INSERT INTO customers(FIRSTNAME,SURNAME,DOB,MARITAL_STATUS,MSISDN,PIN,CHAMA_ID,GENDER,IDNO)
                             VALUES ('$fname','$sname','$dob','$marital_status','$phone_number','".hash('sha256', $newpin)."','$chama_id','$gender','$idno')";

        file_put_contents("log.txt","$sql",FILE_APPEND);
        if (mysqli_query($dblink,$sql)) {
            $response ="<div class='alert alert-success'>User Created Successfully</div>";
        }else{
            $response ="<div class='alert alert-danger'>Failed to Create User</div>";
        }
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
            <a href="http://" class="simple-text logo-normal">
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
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                            <img src="assets/img/damir-bosnjak.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="author">
                                <a href="#">
                                    <img class="avatar border-gray" src="assets/img/mike.jpg" alt="...">
                                    <h5 class="title">Awesome Team189</h5>
                                </a>
                            </div>
                            <p class="description text-center">
                                <?php echo "Awesome 16";?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <hr>
                            <div class="button-container">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                        <?php echo "You're an amazing Person";?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-user">
                        <div class="card-header bg-info">
                            <h5>ADD USERS</h5>
                        </div>
                        <div class="card-body">
                            <form action="users.php" method="POST" name="agent_store_users"><?php echo $response;?>
                                <div class="row">
        
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Firstname:</label>
                                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="firstname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Surname:</label>
                                            <input type="text" class="form-control" name="surname" id="surname" placeholder="surname" required>
                                        </div>
                                    </div>
                                </div>
                                   <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Phone Number:</label>
                                            <input type="text" class="form-control" name="msisdn" id="msisdn" placeholder="msisdn" required>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Location:</label>
                                            <input type="text" class="form-control" name="location" id="location" placeholder="location" required>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label>IDNO:</label>
                                            <input type="text" class="form-control" name="idno" id="idno" placeholder="ID NO" required>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input type="text" class="form-control" name="dob" id="dob" placeholder="dob" required>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>CHAMA :</label>
                                                    <select name="chama_id" id="chama_id" class="form-control">
                                                        <option value="1">TEST1</option>
                                                        <option value="2">TEST2</option>
                                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>GENDER :</label>
                                                    <select name="gender" id="gender" class="form-control">
                                                        <option value="MALE">MALE</option>
                                                        <option value="FEMALE">FEMALE</option>
                                                    </select>
                                        </div>
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>MARITAL STATUS :</label>
                                                    <select name="marital_status" id="marital_status" class="form-control">
                                                        <option value="MARRIED">MARRIED</option>
                                                        <option value="SINGLE">SINGLE</option>
                                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="update ml-auto mr-auto">
                                        <input type="submit" class="btn btn-primary btn-round" name="btn-users" id="btn-users" value="Continue">
                                    </div>
                                </div>
                            </form>
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
