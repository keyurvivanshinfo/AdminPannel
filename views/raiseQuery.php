<?php
    require('../php_scripts/check_login.php');
    require_once('../php_scripts/header.php');
?>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-90">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Raise your query</h3>
                        <form action="../php_scripts/registerQuery.php" method="post">

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="name" name="name" class="form-control form-control-lg"
                                            value="" required />
                                        <label class="form-label" for="city">Name</label>
                                    </div>

                                    <div class="form-outline">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg"
                                            value="" required />
                                        <label class="form-label" for="city">E-mail</label>
                                    </div>

                                    
                                    <div class="form-outline">
                                        <input type="text" id="queryDetails" name="queryDetails" height="50px" width="100px"
                                            class="form-control form-control-lg" value="" required />
                                        <label class="form-label" for="city">Query</label>
                                    </div>
                                </div>                                
                            </div>


                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-sm mb-5" type="submit" name="raiseQuery"
                                    value="Submit" />
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