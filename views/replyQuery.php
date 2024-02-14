<?php

    include ('../php_scripts/check_login.php');
    require_once('../php_scripts/adminHeader.php');
    require('../php_scripts/fetchQueryDetails.php');
?>

<section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Answer the query</h3>
                            <form action="../php_scripts/sendReply.php" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                    <input type="hidden" id="queryId" name="queryId" value="<?php echo $row['queryId'];?>">

                                        <div class="form-outline">
                                            <input type="text" id="name" name="name" class="form-control form-control-lg" value="<?php echo $row['name'];?>"  required/>
                                            <label class="form-label" for="Name">Name</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" value="<?php echo $row['email'];?>"  required />
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline">
                                            <input type="text" id="queryDetails" name="queryDetails" class="form-control form-control-lg" value="<?php echo $row['queryDetails'];?>"required />
                                            <label class="form-label">queryDetails</label>
                                        </div>

                                    </div>
                                    

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline">
                                            <input type="text" id="queryReply" name="queryReply" class="form-control form-control-lg"  value="" required/>
                                            <label class="form-label" for="phoneno">Query Reply</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" name="sendQuery" id="sendQuery" value="Send" />
                                </div>

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
    require_once('../php_scripts/adminFooter.php');
?>

