<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addbanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Banner Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> TitleAr </label>
                        <input type="text" name="title_ar" class="form-control" placeholder="Enter TitleAr"required>
                    </div>
                    <div class="form-group">
                        <label> TitleEn </label>
                        <input type="text" name="title_en" class="form-control" placeholder="Enter TitleEn" required>
                    </div>
                   
                    <div class="form-group">
                        <label> Sort </label>
                        <input type="number" name="sort" id="sort" class="form-control" placeholder="Enter Sort" required>
                    </div>
                    <?php
                    $productgroup = "SELECT * FROM productgroup";
                    $productgroup_run = mysqli_query($connection, $productgroup);
                    if (mysqli_num_rows($productgroup_run) > 0) {
                    ?>
                        <div class="form-group" >
                            <label for="inputState ">Name Product Group </label>
                            <select id="productgroup_id" class="form-control" name=" productgroup_id" required>
                                <option value="" >Choose Your Name Product Group</option>
                                <?php
                                foreach ($productgroup_run as $row1) {
                                ?>
                                    <option value="<?php echo $row1['id']; ?> "><?php echo $row1['title_en']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>


                    <?php

                    } else {
                        echo "No Data ";
                    }

                    ?>

                    <div class="form-group" >
                        <label for="inputState ">Status</label>
                        <select id="inputState" class="form-control" name="status" required>
                            <option selected >Choose...</option>
                            <option value="Active">Active</option>
                            <option value="Not Active">Not Active</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>  Image </label>
                        <input type="url" name="image" id="image" class="form-control" placeholder="Enter Image" required>
                    </div>
                   



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="bannerbtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Banner Profile
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addbanner">
                    Add Banner
                </button>
            </h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo '<h2 class="bg-success text-white"> ' . $_SESSION['success'] . ' </h2>';
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo '<h2 class = "bg-danger text-white" > ' . $_SESSION['status'] . ' </h2>';
                unset($_SESSION['status']);
            }
            ?>
            <div class="table-responsive">

                <?php
                $connection = mysqli_connect("localhost", "root", "", "store");
                $query = "SELECT * FROM banner ";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TitleAr</th>
                            <th>TitleEn</th>
                            <th>Product Group Id</th>
                            <th>Sort</th>
                            <th> Image</th>
                            <th>Status</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                    
                        
                       while ($row = mysqli_fetch_assoc($query_run)) {
                        $productgroup_id = $row['productgroup_id'];
                        $productgroup = "SELECT * FROM productgroup WHERE id = '$productgroup_id' ";
                        $productgroup_con = mysqli_query($connection, $productgroup); 
                        ?>


                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title_ar']; ?></td>
                                    <td><?php echo $row['title_en']; ?></td>
                                    <td> <?php
                                    
                                    if (is_array($productgroup_con) || is_object($productgroup_con)) {
                                        foreach ($productgroup_con as $rowim) {
                                            
                                            echo $rowim['title_en'];
                                        }
                                    }
                            ?>
                         </td>
                                    <td><?php echo $row['sort']; ?></td>
                                    
                                    <td><?php echo '<img src = "' . $row['image'] . '" alt="url" width="100px"  height="100px" ;>' ?>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <form action="banneredit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="banner_edit_btn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="delete_banner_btn" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>

                                </tr>
                        <?php

                            }
                     
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/script.php');
include('includes/footer.php');
?>