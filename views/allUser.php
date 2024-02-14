<?php

include('../php_scripts/check_login.php');

?>

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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="../assets/js/jqueryCDN.js"></script>
    <!-- <script src="../assets/js/jquery.js"></script> -->



    <title>Index</title>
</head>

<body>

    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="adminDashboard.php"><img src="../assets/images/logo.jpg" alt="Girl in a jacket" width="100" height="80"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="adminDashboard.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none  d-sm-inline">Home</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="allUser.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-people-fill"></i> <span class="ms-1 d-none  d-sm-inline">All
                                    Users</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="adminUploadImage.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-cloud-arrow-up-fill"></i> <span class=" ms-1 d-none d-sm-inline">Upload Images</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="../views/adminShowImage.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-images"></i> <span class="ms-1 d-none  d-sm-inline">Show Images</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="../views/showAllQuery.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-question-octagon-fill"></i> <span class="ms-1 d-none  d-sm-inline">Show Query</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../views/queryHistory.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-clock-history"></i> <span class="ms-1 d-none  d-sm-inline">Query
                                    History</span>
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
                            <li><a class="dropdown-item" onclick="return con()" href="../php_scripts/logout.php">Sign
                                    out</a></li>
                            <li>

                        </ul>
                    </div>
                    <!-- </li> -->
                </div>
            </div>


            <div class="col py-3">
                <input type="text" id="search" name="" class="form-control  form-control-lg mb-3" value="" placeholder="Search here" />
                <div class="card">
                    <div class="card-body">


                        <!-- input -->




                        <h5 class="card-title">All Users</h5>
                        <table id="usersTable" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr id="h-tr">
                                    <th scope="col" class="asc" id="firstname">First name</th>
                                    <th scope="col" class="asc" id="lastname">Last name</th>
                                    <th scope="col" class="asc" id="username"> Username</th>
                                    <th scope="col" class="asc" id="email"> Email</th>
                                    <th scope="col" class="asc" id="birthdate"> Birthdate</th>
                                    <th scope="col" class="asc" id="phoneNo"> Phone No</th>
                                    <th scope="col" class="asc" id="address"> Address</th>
                                    <th scope="col" class="asc" id="gender"> Gender</th>
                                    <th scope="col" id="editUser"> Edit</th>
                                    <th scope="col" id="deleteUser"> Delete</th>
                                </tr>
                            </thead>

                            <tbody id="users">

                            </tbody>
                        </table>




                        <nav aria-label="Page navigation example mt-1">
                            <ul class="pagination justify-content-center">
                                <li class="page-item ">
                                    <a class="page-link" id="prev-user" href="#" tabindex="-1">Previous</a>
                                </li>

                                <li class="page-item">
                                    <a class="page-link" id="next-user" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function con() {
            let c = confirm("Are you Sure");
            if (c) {
                return true;
            } else {
                return false;
            }
        }

        $(document).ready(function() {

            $("#editUser").on("click", function(event) {
                event.stopPropagation();
            });
            $("#deleteUser").on("click", function(event) {
                event.stopPropagation();
            });


            $(document).on("click", "#deleteUserButton", function() {

                if (confirm("Are you sure ?") == false) {
                    return;
                }

                // console.log($(this).children().val());
                var userId = $(this).find("i").attr("value");
                $.ajax({
                    url: "../apis/deleteUserapi.php?userId=" + userId,
                    method: "GEt",
                    data: "",
                    dataType: "json",
                    success: function() {
                        // alert('Delete Successfully');
                        location.reload();
                    },
                    error(jqHXR, testStatus, errorThrown) {
                        console.log(jqHXR + " " + testStatus + " " + errorThrown);
                    }
                })
                console.log("ok");
            })



            function getdata(page = 0, key = "", orderBy = "firstname", order = "asc") {
                $.ajax({
                    url: "../apis/searchUserapi.php?page=" + page + "&key=" + key + "&order=" + order + "&orderBy=" + orderBy,
                    method: "GET",
                    data: "",
                    dataType: "json",
                    success: function(data) {
                        $("#usersTable tbody").empty();
                        appendToTable(data);
                    },

                    error(jqHXR, testStatus, errorThrown) {
                        console.log(testStatus);
                        // alert("Error!".errorThrown);
                    },
                });
            }


            function appendToTable(data) {
                data.forEach((element) => {
                    var a = $("<tr></tr>");
                    var firstName = $("<td></td>").text(element[3]);
                    var lastName = $("<td></td>").text(element[4]);
                    var username = $("<td></td>").text(element[1]);
                    var email = $("<td></td>").text(element[5]);
                    var birthDate = $("<td></td>").text(element[6]);
                    var phoneNo = $("<td></td>").text(element[7]);
                    var address = $("<td></td>").text(element[8]);
                    var gender = $("<td></td>").text(element[9]);
                    var userEdit =
                        "<td ><a href='../views/editUserByAdmin.php?userId=" +
                        element[0] +
                        "'>Edit</a></td>";
                    var userDelete = $("<td id='deleteUserButton' onclick=''>Delete<i type='hidden' value=" + element[0] + "></i></td>");

                    a.append(
                        firstName,
                        lastName,
                        username,
                        email,
                        birthDate,
                        phoneNo,
                        address,
                        gender,
                        userEdit,
                        userDelete,
                    );

                    $("#usersTable tbody").append(a);
                });
            }

            function nextUser(obj) {
                obj.page += 1;
                getdata(obj.page, obj.key, obj.orderBy, obj.order);
            }

            function prevUser(obj) {
                obj.page -= 1;
                if (obj.page < 0) {
                    obj.page = 0;
                }
                getdata(obj.page, obj.key, obj.orderBy, obj.order);
            }

            // default data
            getdata(undefined, undefined, undefined, undefined);

            var obj = {
                page: 0,
                key: undefined,
                order: "asc",
                orderBy: "firstname"
            };


            // case -1 when there is data in the input field
            $("#search").on("keyup", function(event) {

                obj.page = 0;
                obj.key = $("#search").val();

                getdata(obj.page, obj.key, obj.orderBy, obj.order);

            });


            // case - 2 When there is no data in the input field
            $(document).on("click", "#h-tr th", function(event) {

                obj.page = 0;
                obj.orderBy = $(this).prop('id');

                if ($(this).hasClass("asc")) {
                    obj.order = "desc";
                    $(this).removeClass("asc");
                    $(this).addClass("desc");
                } else {
                    obj.order = "asc"
                    $(this).addClass("asc");
                    $(this).removeClass("desc");
                }

                getdata(obj.page, obj.key, obj.orderBy, obj.order);

            })


            $("#next-user").on("click", function(event) {
                nextUser(obj);
            });

            $("#prev-user").on("click", function(event) {
                prevUser(obj);
            });


        });
    </script>


</body>

</html>
