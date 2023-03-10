<?php include "parts/header.php"; ?>
        <div class="row align-items-center">
            <div class="col-md-9"><h2 class="text-capitalize p-3">all users</h2></div>
            <div class="col-md-3"><a href="add_user.php" class="btn btn-dark">add user</a></div>
        </div>
        <div class="row">
            <table class="table text-center table-hover text-capitalize">
                <thead>
                    <tr>
                        <th>s.no</th>
                        <th>full name</th>
                        <th>username</th>
                        <th>role</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $limit = 5;
                    $page = (!empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page']:1;
                    $offset = ($page - 1) * $limit;
                    $result = mysqli_query($conn,"SELECT * FROM users ORDER BY uid DESC LIMIT $offset,$limit");
                    if($err = mysqli_error($conn)){
                        die($err);
                    }else{
                        if(mysqli_num_rows($result) > 0){
                            while($rows = mysqli_fetch_assoc($result)){
                                $role = ($rows['role'] == 0)? "normal user":"admin";
                                echo "<tr>
                                <td>{$rows['uid']}</td>
                                <td>{$rows['fname']} {$rows['lname']}</td>
                                <td>{$rows['uname']}</td>
                                <td>$role</td>
                                <td><a href='edit_user.php?uid={$rows['uid']}' class='btn btn-success mx-2 text-capitalize'>edit</a><a href='delete_user.php?uid={$rows['uid']}' class='btn btn-danger text-capitalize'>delete</a></td>
                            </tr>";
                            }
                        }else{
                            echo "<tr><td colspan='5'>no records found.</td></tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
         
        </div>
    </div>
</body>
</html>