<?php
session_start();
include('db_connect.php');

$user=$_SESSION["Email"];
if($user==""){
  header("Location:sign-in.php");
}

$query="SELECT * from tbl_users WHERE Email = '$user' ";

$result = mysqli_query($conn,$query);
while($data = mysqli_fetch_array($result))
{
    $first=$data["first_name"];
    $last=$data["last_name"];
}

$key_code=$_GET["key"];
$query="SELECT * from tbl_blogs WHERE Keycode = '$key_code' ";

$result = mysqli_query($conn,$query);
while($data = mysqli_fetch_array($result))
{
    $Blog_title=$data["Blog_title"];
    $Posted_by=$data["Posted_by"];
    $Blog_desc=$data["Blog_desc"];
    $Blog_img=$data["Blog_img"];
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dashui.codescandy.com/dashuipro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 10:50:46 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>


    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/logo/newlogo.png">


    <!-- Libs CSS -->
    <link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">



    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <title>Dashboard | Shobhavana Dashboard</title>
</head>

<body>
    <main id="main-wrapper" class="main-wrapper">

        <div class="header">
            <!-- navbar -->
            <div class="navbar-custom navbar navbar-expand-lg">
                <div class="container-fluid px-0">
                    <a class="navbar-brand d-block d-md-none" href="index.php">
                        <img src="assets/images/brand/logo/logo-2.svg" alt="Image">
                    </a>

                    <a id="nav-toggle" href="#!" class="ms-auto ms-md-0 me-0 me-lg-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                            class="bi bi-text-indent-left text-muted" viewBox="0 0 16 16">
                            <path
                                d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </a>

                    <!--Navbar nav -->
                    <ul
                        class="navbar-nav navbar-right-wrap ms-lg-auto d-flex nav-top-wrap align-items-center ms-4 ms-lg-0">
                       
                        </li>

                        <!-- List -->
                        <li class="dropdown ms-2">
                            <a class="rounded-circle" href="#!" role="button" id="dropdownUser"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="assets/images/png/admin.png" class="rounded-circle">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                <div class="px-4 pb-0 pt-2">


                                    <div class="lh-1 ">
                                        <h5 class="mb-1"> <?php echo $first." ". $last ?></h5>
                                    </div>
                                    <div class=" dropdown-divider mt-3 mb-2"></div>
                                </div>

                                <ul class="list-unstyled">


                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="change_pass.php">

                                            <i class="me-2 icon-xxs dropdown-item-icon"
                                                data-feather="settings"></i>Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Sign
                                            Out
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- navbar vertical -->
        <div class="app-menu">
            <!-- Sidebar -->

            <div class="navbar-vertical navbar nav-dashboard">
                <div class="h-100" data-simplebar>
                    <!-- Brand logo -->
                    <a class="navbar-brand" href="index.php">
                        <h4><img src="assets/images/brand/logo/logo.png"
                            alt="Nature Park"> Harish Bhat Pakshi Vana</h4>
                        
                    </a>
                    <!-- Navbar nav -->
                    <ul class="navbar-nav flex-column" id="sideNavbar">

                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link has-arrow " href="index.php" >
                                <i data-feather="home" class="nav-icon me-2 icon-xxs"></i>
                                Dashboard
                            </a>

                        </li>
                       

                        <!-- Nav item -->
                        <li class="nav-item">
                            <div class="navbar-heading">Birds </div>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link   collapsed  " href="#!" data-bs-toggle="collapse"
                                data-bs-target="#navspecies" aria-expanded="false" aria-controls="navspecies">
                                <i class="nav-icon me-2 icon-xxs" data-feather="file"></i> Birds
                            </a>
                            <div id="navspecies" class="collapse  " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link " href="add_bird.php">
                                            Add Bird
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="view_bird.php">
                                           View Birds
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <div class="navbar-heading">Contacts </div>
                        </li>

                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                                data-bs-target="#navAuthentication" aria-expanded="false"
                                aria-controls="navAuthentication">
                                <i data-feather="file" class="nav-icon me-2 icon-xxs">
                                </i> Contacts
                            </a>
                            <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link " href="view_contacts.php">View Contacts</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Nav item -->
                        <li class="nav-item">
                            <div class="navbar-heading">Blogs</div>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link   collapsed  " href="#!" data-bs-toggle="collapse"
                                data-bs-target="#navlayoutPage" aria-expanded="false" aria-controls="navlayoutPage">
                                <i class="nav-icon me-2 icon-xxs" data-feather="file"></i> Blogs
                            </a>
                            <div id="navlayoutPage" class="collapse  " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link " href="add_blog.php">
                                            Add Blogs
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="view_blog.php">
                                           View Blogs
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Nav item -->
                        <li class="nav-item">
                            <div class="navbar-heading">Gallery</div>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link   collapsed  " href="#!" data-bs-toggle="collapse"
                                data-bs-target="#Gallery" aria-expanded="false" aria-controls="Gallery">
                                <i class="nav-icon me-2 icon-xxs" data-feather="file"></i> Gallery
                            </a>
                            <div id="Gallery" class="collapse  " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link " href="add_gallery.php">
                                            Add Gallery
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="view_gallery.php">
                                           View Gallery
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                   

                </div>
            </div>

        </div>


        <!-- Page content -->
        <div id="app-content">

            <!-- Container fluid -->

            <div class="app-content-area">
                <div class="bg-primary pt-10 pb-21 mt-n6 mx-n4"></div>
                <div class="container-fluid mt-n22 ">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Page header -->
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <div class="mb-2 mb-lg-0">
                                    <h3 class="mb-0  text-white">Update Blogs</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card p-5">
                            <form method="POST" action="AdminBack.php?action=EditBlog&key=<?php echo $key_code; ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="textInput">Blog Title</label>
                                            <input type="text" id="blog_ttile" class="form-control"
                                                placeholder="Blog Title" name="blog_ttile" value="<?php echo $Blog_title; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="textInput">Posted By</label>
                                            <input type="text" id="Posted" class="form-control"
                                                placeholder="Posted By" name="Posted" value="<?php echo $Posted_by; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="textInput">Blog Image</label><br>
                                            <?php 
                                                if($Blog_img==NULL){
                                                    ?>
                                                    <img src="assets/images/background/no_avatar.avif" alt="Species" class="w-10">No Image                                                    
                                                <?php }else{
                                                    ?>
                                                    <img src="assets/images/background/<?php echo $Blog_img; ?>" alt="Species" name="delete_file" class="w-10"> <?php echo $Blog_img; ?>   
                                                    <input type="hidden" id="deleteFile" class="form-control"
                                                    placeholder="deleteFile" name="deleteFile" value="<?php echo $Blog_img; ?>" hidden>                                                
                                                <?php }
                                            ?>
                                            <input type="file" id="fileDoc" class="form-control"
                                                placeholder="Image" name="fileDoc">
                                                <label for="">Only jpg, gif, and png files allowed to a max size of 1 MB</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="textInput">Blog Description</label>
                                            <textarea type="text" id="blog_desc" class="form-control"
                                                placeholder="Blog Description" rows="5" name="blog_desc"><?php echo $Blog_desc; ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button class="btn btn-primary" name="save_change" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- row  -->


                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->

    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/feather-icons/dist/feather.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.min.js"></script>




    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>
    <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="assets/js/vendors/chart.js"></script>








</body>


<!-- Mirrored from dashui.codescandy.com/dashuipro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 10:51:38 GMT -->

</html>