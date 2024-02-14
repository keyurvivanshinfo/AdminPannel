<?php
    require('../php_scripts/check_login.php');
    require_once('../php_scripts/header.php');
    include('../php_scripts/show_weather.php');
?>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-90">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Show weather</h3>
                        <form action="weather.php" method="get">

                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" id="city" name="city" class="form-control form-control-lg"
                                            value="" required />
                                        <label class="form-label" for="city">Enter city name</label>
                                    </div>

                                </div>

                            </div>


                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-sm mb-5" type="submit" name="weather"
                                    value="Show weather" />
                            </div>
                        </form>

                        <div class="card">
                            <div class="card-body">
                                <table class="table ">
                                    <tr>
                                        <th>City</th>
                                        <th>Tempreture</th>
                                        <th>Humidity</th>
                                        <th>Wind Speed</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $city; ?></td>
                                        <td><?php echo $decoded->temp; ?></td>
                                        <td><?php echo $decoded->humidity; ?></td>
                                        <td><?php echo $decoded->wind_speed; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
    require_once('../php_scripts/footer.php');
?>