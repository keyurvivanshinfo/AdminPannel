<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="../assets/images/erp.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    
    <title>Index</title>
</head>

<body>

    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="index.php"><img src="../assets/images/logo.jpg" alt="Girl in a jacket" width="100" height="80"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page"
                                href="../php_scripts/delete_cookies.php">Delete Cookies</a>
                        </li> -->
                        <!-- <li class="nav-item ">
                            <a class="nav-link text-white" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" text-white href="#">Pricing</a>
                        </li> -->
                    </ul>
                </div>


                <div class='justify-content-end text-white'>
                    <?php echo "Hello :-" .$_SESSION['username']; ?>

                </div>
                <!-- <div class='justify-content-end text-primary'>

                    <a class="ttext-sm-start text-primary" href="../php_scripts/logout.php">Sign out</a>
                </div> -->

            </div>
        </nav>
    </div>



    <!-- side navigation bar -->

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none text-white d-sm-inline">Home</span>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="weather.php" class="nav-link align-middle px-0">
                                <i class="fs-4  bi-cloud-rain"></i><span class="ms-1 d-none text-white d-sm-inline">Weather</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="upload_images.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-cloud-arrow-up-fill"></i><span class="ms-1 d-none text-white d-sm-inline">Upload Images</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../views/show_images.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-images"></i><span class="ms-1 d-none text-white d-sm-inline">Show Images</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../views/raiseQuery.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-question-square-fill "></i><span class="ms-1 d-none text-white d-sm-inline">Raise query</span>
                            </a>
                        </li>

                    </ul>


                    <!-- <li> -->


                    <hr>
                    <div class="dropdown pb-4 align-self-end">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/images/erp.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username']; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li> -->
                            <li><a class="dropdown-item" href="../views/profile.php">Profile
                                </a></li>
                            <li>
                            <li><a class="dropdown-item" onclick="return con()" href="../php_scripts/logout.php">Sign
                                    out</a></li>
                            <li>
                            <li><a class="dropdown-item" onclick="return con()" href="../php_scripts/delete_user.php">Delete User</a></li>
                            </li>
                        </ul>
                    </div>
                    <!-- </li> -->
                </div>
            </div>
            <div class="col py-3">