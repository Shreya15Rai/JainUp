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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                        <h4><img src="assets/images/brand/logo/newlogo.png"
                            alt="Nature Park"> Jain Temple</h4>
                        
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
                            <div class="navbar-heading">Festivals </div>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link   collapsed  " href="#!" data-bs-toggle="collapse"
                                data-bs-target="#navspecies" aria-expanded="false" aria-controls="navspecies">
                                <i class="nav-icon me-2 icon-xxs" data-feather="file"></i> Festivals
                            </a>
                            <div id="navspecies" class="collapse  " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link " href="add_event.php">
                                            Add Festivals
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="view_event.php">
                                           View Festivals
                                        </a>
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
                                    <h3 class="mb-0  text-white">View All Blogs</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card p-5">
                            <!-- card header  -->
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">All type of Blogs</h4>
                                
                            </div>
                            <!-- table  -->
                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table text-nowrap mb-0 table-centered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Blog Title</th>
                                                <th>Posted By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $query="SELECT * from tbl_blogs ORDER BY KeyCode Desc";
                                            $result = mysqli_query($conn,$query);
                                            $a=0;
                                            while($data = mysqli_fetch_array($result))
                                            {                               
                                        ?> 
                                        <tbody>
                                            <tr>
                                                <td><?php echo ++$a; ?></td>
                                                <td><?php echo $data['Blog_title'] ?></td>
                                                <td><?php echo $data['Posted_by'] ?></td>
                                                <td>
                                                    <span class="p-1 border"><a onClick="javascript: return confirm('Are you Sure Want To Delete');" href="AdminBack.php?action=DeleteBlog&key=<?php echo $data['KeyCode'];?>" ><i class=" fas fa-trash"></i></a></span>
                                                    <span class="p-1 border"><a href="edit_blog.php?key=<?php echo $data['KeyCode']; ?>"><i class="fas fa-edit"></i></a></span>
                                                </td>
                                            </tr>                                            
                                        </tbody>
                                        <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>

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