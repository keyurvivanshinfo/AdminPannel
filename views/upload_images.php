<?php
session_start();
require('../php_scripts/check_login.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="../assets/images/erp.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="../assets/js/jqueryCDN.js"></script>

    <title>Index</title>
</head>

<body>

    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="index.php"><img src="../assets/images/logo.jpg"
                        alt="Girl in a jacket" width="100" height="80"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                    </ul>
                </div>


                <div class='justify-content-end text-white'>
                    <?php echo "Hello :-" . $_SESSION['username']; ?>

                </div>


            </div>
        </nav>
    </div>



    <!-- side navigation bar -->

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span
                                    class="ms-1 d-none text-white d-sm-inline">Home</span>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="weather.php" class="nav-link align-middle px-0">
                                <i class="fs-4  bi-cloud-rain"></i><span
                                    class="ms-1 d-none text-white d-sm-inline">Weather</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="upload_images.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-cloud-arrow-up-fill"></i><span
                                    class="ms-1 d-none text-white d-sm-inline">Upload Images</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../views/show_images.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-images"></i><span class="ms-1 d-none text-white d-sm-inline">Show
                                    Images</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../views/raiseQuery.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-question-square-fill "></i><span
                                    class="ms-1 d-none text-white d-sm-inline">Raise query</span>
                            </a>
                        </li>

                    </ul>


                    <!-- <li> -->


                    <hr>
                    <div class="dropdown pb-4 align-self-end">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/images/erp.png" alt="hugenerd" width="30" height="30"
                                class="rounded-circle">
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
                            <li><a class="dropdown-item" onclick="return con()"
                                    href="../php_scripts/delete_user.php">Delete User</a></li>
                            </li>
                        </ul>
                    </div>
                    <!-- </li> -->
                </div>
            </div>
            <div class="col py-3">



                <form action="../php_scripts/upload_image.php" method="POST" enctype="multipart/form-data">
                    <?php
                    if ($_SESSION['error'] != "") {
                        if ($_SESSION['error'] == "Image successfully uploaded on the server") {
                            echo '<div class="alert alert-success" role="alert">' . $_SESSION['error'] . '</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                        }
                    }
                    $_SESSION['error'] = "";
                    ?>

                    <div class="input-group mb-3">
                        <input type="file" class="form-control" placeholder="Upload Image" id="image" name="image"
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>

                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Upload Image</button>

                </form>


                <br>

                <h6 class="text text-danger align-items-center mt-5">Upload the file using AJAX</h6>



                <form action="../php_scripts/upload_image2.php" method="POST" enctype="multipart/form-data">
                <?php
                    if ($_SESSION['error'] != "") {
                        if ($_SESSION['error'] == "Image successfully uploaded on the server") {
                            echo '<div class="alert alert-success" role="alert">' . $_SESSION['error'] . '</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                        }
                    }
                    $_SESSION['error'] = "";
                    ?>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" placeholder="Upload Image" id="image2" name="image2"
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>

                    <button type="submit" class="btn btn-primary" id="submit2" name="submit2">Upload Image</button>
                </form>










            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->


    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
    function con() {
        let c = confirm('Are you Sure');
        if (c) {
            return true;
        } else {
            return false;
        }
    }


    $(document).on("click", "#submit2", function() {
        file = document.getElementById("image2").files[0];
        var req =  new XMLHttpRequest();
        req.open("POST","../php_scripts/upload_image2.php",true);
        req.send(file);
    })
    </script>


    <script>

    </script>



    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>