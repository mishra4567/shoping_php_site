<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="./css/custom.css">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php  ?></h6>
                        <span><?php  ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div> -->
                    <a href="./product.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Product Master</a>
                    <?php  ?>
                    <a href="./order_vendor.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>order Master</a>
                    <?php   ?>
                    <a href="./order.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>order Master</a>
                    <?php  ?>
                    <?php  ?>
                    <a href="./categories.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Categories Master</a>
                    <a href="./sub_categories.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Sub Categories</a>
                    <a href="./coupon.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Coupon Master</a>
                    <a href="./user-master.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>User Master</a>
                    <a href="./vendor.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Vendor Master</a>
                    <a href="./contact.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Contact Us</a>
                    <?php  ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="./blankProductAdd.php" class="dropdown-item">Product add</a>
                            <!-- <a href="signup.html" class="dropdown-item">Sign Up</a> -->
                            <!-- <a href="404.html" class="dropdown-item">404 Error</a> -->
                            <a href="./blank.php" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->

            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php  ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="./logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <!-- Blank Start -->
            <!-- main from start -->
            <div class="container-fluid pt-4 px-4">
                <div class=" row bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="mt-3">Product <a href="#" class="text-primary ">../privais</a></div>
                    <div class="text-start mt-3">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body card-block">
                                            <div class="form-group mt-3 ">
                                                <label for="product" class="from-control-label fw-bold">Product name</label>
                                                <input type="text" name="name" class="form-control" id="" placeholder="Enter product name" value="">
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="mrp" class="from-control-label fw-bold">Mrp</label>
                                                <input type="text" name="mrp" class="form-control" id="" placeholder="Enter product mrp" value="">
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="price" class="from-control-label fwold">Product price</label>
                                                <input type="text" name="price" class="form-control" id="" placeholder="Enter product price" value="">
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="qty" class="from-control-label fw-bold">Qty</label>
                                                <input type="text" name="qty" class="form-control" id="" placeholder="Enter product qty" value="">
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="short_desc" class="from-control-label fw -bold">Short description</label>
                                                <textarea name="short_desc" class="form-control" id="" rows="5" placeholder="Enter Short description"></textarea>
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="description" class="from-control-label fw-bold">Product description</label>
                                                <textarea name="description" class="form-control" id="" rows="10" placeholder="Enter Product description"></textarea>
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="meta_title" class="from-control-label fw -bold">Mete Title</label>
                                                <textarea name="meta_title" class="form-control" id="" rows="3" placeholder="Enter Product meta title"></textarea>
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="meta_desc" class="from-control-label fwold">Product Meta Description</label>
                                                <textarea name="meta_desc" class="form-control" id="" rows="5" placeholder="Enter product Meta Description"></textarea>
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="meta_keyword" class="from-control-label fwbold">Product Meta Keyword</label>
                                                <textarea name="meta_keyword" class="form-control" id="" rows="3" placeholder="Enter product Meta Keyword"></textarea>
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="tex" class="from-control-label fw-bold">Product tex</label>
                                                <input type="number" name="tex" class="form-control" id="" placeholder="Enter product tex" value="">
                                            </div>
                                            <div class="field_error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body card-block">
                                            <div class="form-group mt-3 ">
                                                <label class="from-control-label fwold" for="input-img">Product Image</label>

                                                <!-- <img class="defolt-img" src="" alt="Product" id="profilePic"> -->

                                                <img class="defolt-img" src="img/default_image.jpg" alt="Product" id="profilePic">

                                                <input type="file" name="image" class="form-control" id="input-img" accept="image/jpg, image/png, image/jpeg">
                                                <label class="input-img" for="input-img">Update Image...</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body card-block">
                                            <div class="form-group mt-3 ">
                                                <label for="categories" class="from-control-label fw-bold">Categories</label>
                                                <select name="categories_id" id="categories_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    <option value="trdfg">iuhj</option>
                                                    <option value="tygdf">kjhn</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="sub_categories" class="from-control-label fw-bold">Sub Categories</label>
                                                <select name="sub_categories_id" id="sub_categories_id" class="form-control" required>
                                                    <option value="">Select Sub Category</option>
                                                    <option value="">ytgh</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body card-block">
                                            <div class="form-group mt-3 ">
                                                <label for="categories" class="from-control-label fw -bold">Best Seller</label>
                                                <select name="best_seller" id="" class="form-control" required>
                                                    <option value="">Select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body card-block">
                                            <div class="form-group mt-3">
                                                <button type="submit" name="submit" class="form-control">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- main from start -->
            <?php
            ?>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, Copyright ©<?php ?> Pomosweb.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="#">Pnosweb Codex</a>
                            </br>
                            Distributed By <a class="border-bottom" href="#" target="_blank">Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <!-- custom js -->
    <script>
        // select img
        let profilePic = document.getElementById("profilePic");
        let InputFile = document.getElementById("input-img");

        InputFile.onchange = function() {
            profilePic.src = URL.createObjectURL(InputFile.files[0]);
        }
    </script>
</body>

</html>