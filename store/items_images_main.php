<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="additemimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Items Image Data</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST" enctype="multipart/form-data">

                <div class="modal-body">

                    <?php
                    $item = "SELECT * FROM items";
                    $item_run = mysqli_query($connection, $item);
                    if (mysqli_num_rows($item_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="inputState ">Image Item </label>
                            <select id="item_id" class="form-control" name="item_id" required>
                                <option value="">Choose Your Image Item </option>
                                <?php
                                foreach ($item_run as $row) {
                                ?>
                                    <option value="<?php echo $row['id']; ?> "><?php echo $row['title_en']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>


                    <?php

                    } else {
                        echo "No Data ";
                    }

                    ?>
                    <div class="form-group">
                        <label> Upload Image </label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="itemimagebtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Item Image Profile
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#additemimage">
                    Add Item Image
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
                $query = "SELECT * FROM items_images_main ";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item Titel</th>
                            <th>URL</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            $item_id = $row['item_id'];
                            $item = "SELECT * FROM items WHERE id = '$item_id' ";
                            $item_con = mysqli_query($connection, $item);                           
                        ?>

                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td>
                                    <?php
                                    
                                    if (is_array($item_con) || is_object($item_con)) {
                                        foreach ($item_con as $rowim) {
                                            
                                            echo $rowim['title_en'];
                                        }
                                    }
                            
                                    ?>
                                    </td>
                                <td><?php echo '<img src="upload/' . $row['image'] . '" alt="url" width="100px" height="100px" ;>' ?>
                                </td>

                                <td>
                                    <form action="items_images_main_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="items_images_edit_btn" class="btn btn-success">EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
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