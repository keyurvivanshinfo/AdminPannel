<?php
    
    require_once('../php_scripts/adminHeader.php');
    require '../php_scripts/allUsers.php';
    
?>

<input type="text" id="search" name="" class="form-control  form-control-lg mb-3" placeholder="Search here" />
<div class="card">
    <div class="card-body">


        <!-- input -->

        <h5 class="card-title">All Users</h5>
        <table id="usersTable" class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <!-- <th scope="col">User Id</th> -->
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col"> Username</th>
                    <th scope="col"> Email</th>
                    <th scope="col"> Birthdate</th>
                    <th scope="col"> Phone No</th>
                    <th scope="col"> Address</th>
                    <th scope="col"> Gender</th>
                    <th scope="col"> Edit</th>
                    <th scope="col"> Delete</th>
                </tr>
            </thead>
            <tbody id="users">
                <?php while($row =  $result->fetch_assoc()){
                echo "<tr>";
                // echo "<td>" . $row['userId'] . "</td>";
                echo "<td>" . $row['firstname'] . "</td>";
                echo "<td>" . $row['lastname'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['birthdate'] . "</td>";
                echo "<td>" . $row['phoneNo'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td><a href='../views/editUserByAdmin.php?userId=" . $row['userId'] . "'>Edit</a></td>";
                echo "<td><a href='../php_scripts/deleteUserByAdmin.php?userId=" . $row['userId'] . "' onclick='return con()'>Delete</a></td>";     
                // echo "<td>" . $row['lastName'] . "</td>";
                echo "</tr>";
                

            }

            ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation example mt-1">
            <ul class="pagination justify-content-center">
                <li class="page-item ">
                    <a class="page-link" id="prev-user" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" id="prev-user1" href="#">1</a></li>
                <li class="page-item"><a class="page-link" id="prev-user2" href="#">2</a></li>
                <li class="page-item"><a class="page-link" id="prev-user3" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" id="next-user" href="#">Next</a>
                </li>
            </ul>
        </nav>





    </div>




</div>





<?php
    require_once('../php_scripts/adminFooter.php');
?>