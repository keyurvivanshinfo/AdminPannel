<?php

    include ('../php_scripts/check_login.php');
    require_once('../php_scripts/header.php');
    include('../php_scripts/editUserByAdmin.php');
?>

<section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit User Form</h3>
                            <form action="../php_scripts/register.php" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                    <input type="hidden" id="userId" name="userId" value="<?php echo $user['userId'];?>">

                                        <div class="form-outline">
                                            <input type="text" id="firstname" name="firstname" class="form-control form-control-lg" value="<?php echo $user['firstname'];?>" />
                                            <label class="form-label" for="firstName">First Name</label>
                                        </div>



                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="lastname" name="lastname" class="form-control form-control-lg" value="<?php echo $user['lastname'];?>" />
                                            <label class="form-label" for="lastName">Last Name</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">


                                        <div class="form-outline">
                                            <input type="text" id="username" name="username" class="form-control form-control-lg" value="<?php echo $user['username'];?>"required disabled/>
                                            <label class="form-label">Username</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">


                                        <div class="form-outline">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" value="<?php echo $user['email'];?>" disabled required />
                                            <label class="form-label">Email</label>
                                        </div>



                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" value="<?php echo $user['password'];?>"required disabled/>
                                            <label class="form-label">Password</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <input type="date" class="form-control form-control-lg" id="birthdate" name="birthdate"  value="<?php $date = strtotime($user['birthdate']); echo date('Y-m-d', $date);?>"/>
                                            <label for="birthdate" class="form-label">Birthday</label>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline">
                                            <input type="tel" id="phoneno" name="phoneno" class="form-control form-control-lg"  value="<?php echo $user['phoneNo'];?>"/>
                                            <label class="form-label" for="phoneno">Phone Number</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline">
                                            <input type="text" id="address" name="address" class="form-control form-control-lg"  value="<?php echo $user['address'];?>"/>
                                            <label class="form-label" for="address">Address</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 ">

                                        <h6 class="mb-2 pb-1">Gender: </h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female"  <?php if($user['gender']=='female') echo 'checked';?>/>
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" <?php if($user['gender']=='male') echo 'checked';?>/>
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="otherGender" value="other" <?php if($user['gender']=='other') echo 'checked';?>/>
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>

                                    </div>
                                </div>



                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" name="update" id="update" value="Update" />
                                </div>

                                



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
    require_once('../php_scripts/footer.php');
?>

