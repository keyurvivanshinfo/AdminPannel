<?php
session_start();
require('../php_scripts/check_login.php');
require_once('../php_scripts/adminHeader.php');
?>




<div class="container">
    <div class="row">

        <table class="table table-bordered ">
            <tbody>
                <?php
                 require('../php_scripts/dbconnect.php');

                 $sql = "SELECT DISTINCT img_name FROM images";
         
                 $result = mysqli_query($conn, $sql);
                 $columnCount = 0; // Counter for column placement
                 while ($row = mysqli_fetch_array($result)) {
                     if ($columnCount % 3 == 0) {
                         echo '<tr>';
                     }
                ?>
                    <td>
                        <img src="<?php echo "../images/" . $row['img_name']; ?>" alt="Image not available" width="250" height="200">
                        <!-- image download button -->
                        <br>

                        <a href="../images/<?php echo $row['img_name'];?>"><i class="bi bi-download"></i>view</a>
                        <br>
                        <a href="../php_scripts/download.php?file=<?php echo $row['img_name']; ?>" download><i class="bi bi-download"></i> Download</a>
                    </td>
                <?php 
                     $columnCount++;
                     if ($columnCount % 3 == 0) {
                         echo '</tr>';
                     }
                 } 
                 // Check if there's an open row tag, and close it if needed
                 if ($columnCount % 3 !== 0) {
                     echo '</tr>';
                 }
                ?>
            </tbody>
        </table>

    </div>
</div>






<?php
require_once('../php_scripts/adminFooter.php');
?>