<?php include "parts/header.php"; ?>
        <div class="row align-items-center">
            <div class="col-md-9"><h2 class="text-capitalize p-3">all category</h2></div>
            <div class="col-md-3"><a href="add_category.php" class="btn btn-dark">add category</a></div>
        </div>
        <div class="row">
            <table class="table text-center table-hover text-capitalize">
                <thead>
                    <tr>
                        <th>s.no</th>
                        <th>name</th>
                        <th>post under category</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $limit = 5;
                    $page = (!empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page']:1;
                    $offset = ($page - 1) * $limit;
                    $result = mysqli_query($conn,"SELECT * FROM category ORDER BY cid DESC LIMIT $offset,$limit");
                    if($err = mysqli_error($conn)){
                        die($err);
                    }else{
                        if(mysqli_num_rows($result) > 0){
                            while($rows = mysqli_fetch_assoc($result)){
                                echo "<tr>
                                <td>{$rows['cid']}</td>
                                <td>{$rows['cname']}</td>
                                <td>{$rows['post_under_cat']}</td>
                                <td><a href='edit_category.php?cid={$rows['cid']}&cname={$rows['cname']}' class='btn btn-success mx-2 text-capitalize'>edit</a><a href='delete_category.php?cid={$rows['cid']}&puc={$rows['post_under_cat']}' class='btn btn-danger text-capitalize'>delete</a></td>
                            </tr>";
                            }
                        }else{
                            echo "<tr><td colspan='4'>no records found.</td></tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        
        </div>
    </div>
</body>
</html>