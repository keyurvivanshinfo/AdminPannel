<?php require('../php_scripts/check_login.php');
    require_once('../php_scripts/adminHeader.php');
    require_once('../php_scripts/showQuery.php');
?>


<div class="card">
    <div class="card-body">

        


        <h5 class="card-title">All Query</h5>
        <table id="queryTable" name="queryTable" class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <!-- <th scope="col">User Id</th> -->
                    <th scope="col">Name</th>
                    <th scope="col"> Email</th>
                    <th scope="col"> Query details</th>
                    <th scope="col"> Reply</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row =  $result->fetch_assoc()){
                echo "<tr>";
                // echo "<td>" . $row['userId'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['queryDetails'] . "</td>";
               
                
                echo "<td><a href='../views/replyQuery.php?queryId=" . $row['queryId'] . "'>Reply</a></td>";
                echo "</tr>";
                

            }

            ?>
            </tbody>
        </table>
    </div>
</div>



<?php 
    require_once('../php_scripts/adminFooter.php');
?>