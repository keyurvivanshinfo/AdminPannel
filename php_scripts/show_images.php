<?php

require('../php_scripts/dbconnect.php');

$sql = "SELECT  img_name FROM images";

$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='col-md-4'>\n";
?>


        <div class="container">
            <div class="row">
                <img src="<?php echo "../images/" . $row['img_name']; ?>" alt="Image not available" width="200" height="200">
            </div>
        </div>

<?php
    }
}
?>