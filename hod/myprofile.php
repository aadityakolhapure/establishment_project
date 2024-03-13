<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');
if (strlen($_SESSION['hodlogin']) == 0) {
    header('location:index.php');
} else {
    $eid = $_SESSION['hodlogin'];
    if (isset($_POST['update'])) {

        $id = $_POST['id'];
        $EmpId = $_POST['EmpId'];
        $UserName = $_POST['UserName'];
        $Password = $_POST['Password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $updationDate = $_POST['updationDate'];
        // $publication = $_POST['publication'];
        // $journal = $_POST['journal'];
        // $patent = $_POST['patent'];
        // $award = $_POST['award'];
        $sql = "update hod set id=:id,EmpId=:EmpId,UserName=:UserName,Password=:Password,fullname=:fullname,email=:email,city=:city,updationDate=:updationDate where email=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':EmpId', $EmpId, PDO::PARAM_STR);
        $query->bindParam(':UserName', $UserName, PDO::PARAM_STR);
        $query->bindParam(':Password', $Password, PDO::PARAM_STR);
        $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $query->bindParam(':updationDate', $updationDate, PDO::PARAM_STR);
        // $query->bindParam(':publication', $publication, PDO::PARAM_STR);
        // $query->bindParam(':journal', $journal, PDO::PARAM_STR);
        // $query->bindParam(':patent', $patent, PDO::PARAM_STR);
        // $query->bindParam(':award', $award, PDO::PARAM_STR);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Your record has been updated Successfully";
    } ?>

    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Employee Leave Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/themify-icons.css">
        <link rel="stylesheet" href="../assets/css/metisMenu.css">
        <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../assets/css/slicknav.min.css">
        <!-- amchart css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <!-- Start datatable css -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
        <!-- others css -->
        <link rel="stylesheet" href="../assets/css/typography.css">
        <link rel="stylesheet" href="../assets/css/default-css.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!-- preloader area start -->
        <div id="preloader">
            <div class="loader"></div>
        </div>
        <!-- preloader area end -->
        <!-- page container area start -->
        <div class="page-container">
            <!-- sidebar menu area start -->
            <div class="sidebar-menu">
                <div class="sidebar-header">
                    <div class="logo">
                        <a href="dashboard.php"><img src="../assets/images/icon/logo_w.png" alt="logo"></a>
                    </div>
                </div>
                <div class="main-menu">
                    <div class="menu-inner">
                        <?php
                        $page = 'manage-leave';
                        include '../includes/hod-sidebar.php';
                        ?>
                    </div>
                </div>
            </div>
            <!-- sidebar menu area end -->
            <!-- main content area start -->
            <div class="main-content">
                <!-- header area start -->
                <div class="header-area">
                    <div class="row align-items-center">
                        <!-- nav and search button -->
                        <div class="col-md-6 col-sm-8 clearfix">
                            <div class="nav-btn pull-left">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                        </div>
                        <!-- profile info & task notification -->
                        <div class="col-md-6 col-sm-4 clearfix">
                            <ul class="notification-area pull-right">
                                <li id="full-view"><i class="ti-fullscreen"></i></li>
                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>



                            </ul>
                        </div>
                    </div>
                </div>
                <!-- header area end -->
                <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">My Profile</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix">

                            <?php include '../includes/employee-profile-section.php' ?>

                        </div>
                    </div>
                </div>
                <!-- page title area end -->
                <div class="main-content-inner">
                    <div class="row">
                        <div class="col-lg-6 col-ml-12">
                            <div class="row">
                                <!-- Textual inputs start -->
                                <div class="col-12 mt-5">
                                    <?php if ($error) { ?><div class="alert alert-danger alert-dismissible fade show"><strong>Info: </strong><?php echo htmlentities($error); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                        </div><?php } else if ($msg) { ?><div class="alert alert-success alert-dismissible fade show"><strong>Info: </strong><?php echo htmlentities($msg); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div><?php } ?>
                                    <div class="card">
                                        <form name="addemp" method="POST">

                                            <div class="card-body">
                                                <h4 class="header-title">Update My Profile</h4>
                                                <p class="text-muted font-14 mb-4">Please make changes on the form below in order to update your profile</p>

                                                <?php
                                                $eid = $_SESSION['hodlogin'];
                                                $sql = "SELECT * from  hod where email;=:eid";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                ?>
                                                        <h5 class="header-title">Personal Details</h5>

                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-form-label">Id</label>
                                                            <input class="form-control" name="id" value="<?php echo htmlentities($result->id); ?>" type="text" required id="example-text-input">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-form-label">User Name</label>
                                                            <input class="form-control" name="UserName" value="<?php echo htmlentities($result->UserName); ?>" type="text" autocomplete="off" required id="example-text-input">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-form-label">Full Name</label>
                                                            <input class="form-control" name="fullname" value="<?php echo htmlentities($result->fullname); ?>" type="text" autocomplete="off" required id="example-text-input">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="example-email-input" class="col-form-label">Email</label>
                                                            <input class="form-control" name="email" type="email" value="<?php echo htmlentities($result->email); ?>" readonly autocomplete="off" required id="example-email-input">
                                                        </div>

                                                       

                                                        
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-form-label">City</label>
                                                            <input class="form-control" name="city" type="text" value="<?php echo htmlentities($result->city); ?>" autocomplete="off" required>
                                                        </div>

                                                        

                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-form-label">Employee ID</label>
                                                            <input class="form-control" name="EmpId" type="text" autocomplete="off" readonly required value="<?php echo htmlentities($result->EmpId); ?>" id="example-text-input">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-form-label">Date of joining</label>
                                                            <input class="form-control" name="updationDate" type="text" autocomplete="off" readonly required value="<?php echo htmlentities($result->updationDate); ?>" id="example-text-input">
                                                        </div>




                                                
                                                       



                                                <?php }
                                                } ?>

                                                <button class="btn btn-primary" name="update" id="update" type="submit">MAKE CHANGES</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main content area end -->
            <!-- footer area start-->
            <?php include '../includes/footer.php' ?>
            <!-- footer area end-->
        </div>
        <!-- page container area end -->
        <!-- offset area start -->
        <div class="offset-area">
            <div class="offset-close"><i class="ti-close"></i></div>


        </div>
        <!-- offset area end -->
        <!-- jquery latest version -->
        <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
        <!-- bootstrap 4 js -->
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/owl.carousel.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="../assets/js/jquery.slimscroll.min.js"></script>
        <script src="../assets/js/jquery.slicknav.min.js"></script>

        <!-- Start datatable js -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

        <!-- others plugins -->
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/scripts.js"></script>
    </body>

    </html>

<?php } ?>