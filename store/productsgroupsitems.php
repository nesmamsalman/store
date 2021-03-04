<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addproductsgroupsitems" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Products Groups Item Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">


                    <?php
                    $item = "SELECT * FROM items";
                    $item_run = mysqli_query($connection, $item);
                    if (mysqli_num_rows($item_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="inputState ">Image Item </label>
                            <select id="item_id" class="form-control" name="item_id" required>
                                <option value="">Choose Your Item </option>
                                <?php
                                foreach ($item_run as $rowit) {
                                ?>
                                    <option value="<?php echo $rowit['id']; ?> "><?php echo $rowit['title_en']; ?> </option>
                                <?php } ?>
                            </select>

                        </div>


                    <?php

                    } else {
                        echo "No Data ";
                    }

                    ?>
                    <?php
                    $productgroup = "SELECT * FROM productgroup";
                    $productgroup_run = mysqli_query($connection, $productgroup);
                    if (mysqli_num_rows($productgroup_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="inputState ">Name Product Group </label>
                            <select id="productgroup_id" class="form-control" name="productgroup_id" required>
                                <option value="">Choose Your Name Product Group</option>
                                <?php
                                foreach ($productgroup_run as $rowpg) {
                                ?>
                                    <option value="<?php echo $rowpg['id']; ?> "><?php echo $rowpg['title_en']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>


                    <?php

                    } else {
                        echo "No Data ";
                    }

                    ?>




                    <div class="form-group">
                        <label for="inputState ">Status</label>
                        <select id="inputState" class="form-control" name="status" required>
                            <option selected>Choose...</option>
                            <option value="Active">Active</option>
                            <option value="Not Active">Not Active</option>

                        </select>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="productsgroupsitembtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Products Groups Item Profile
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addproductsgroupsitems">
                    Add Products Groups Items
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
                $query = "SELECT * FROM productsgroupsitems ";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item </th>
                            <th>Product Group</th>
                            <th>Status</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($row= mysqli_fetch_assoc($query_run)) {
                            $item_id = $row['item_id'];
                            $item = "SELECT * FROM items WHERE id = '$item_id' ";
                            $item_con = mysqli_query($connection, $item);
                            $productgroup_id = $row['productgroup_id'];
                            $productgroup = "SELECT * FROM productgroup WHERE id = '$productgroup_id' ";
                            $productgroup_con = mysqli_query($connection, $productgroup);
                        ?>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php
                                if (is_array($item_con) || is_object($item_con)) {
                                    foreach ($item_con as $rowit) {

                                        echo $rowit['title_en'];
                                    }
                                }
                                ?>
                            </td>
                            <td><?php
                                if (is_array($productgroup_con) || is_object($productgroup_con)) {
                                    foreach ($productgroup_con as $rowpg) {

                                        echo $rowpg['title_en'];
                                    }
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['status']; ?> </td>
                            <td>
                                <form action="productsgroupsitemsedit.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="productsgroupsitemseditbtn" class="btn btn-success">EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_pgi_btn" class="btn btn-danger">DELETE</button>
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