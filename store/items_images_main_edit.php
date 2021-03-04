<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"> EDIT Image Item School</h6>
        </div>
        <div class="card-body">
            <?php
            $connection = mysqli_connect("localhost", "root", "", "store");

            if (isset($_POST['items_images_edit_btn'])) {
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM items_images_main WHERE id ='$id' ";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $row) {
            ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

                        <div class="modal-body">
                            <?php
                            $item = "SELECT * FROM items";
                            $item_run = mysqli_query($connection, $item);
                            if (mysqli_num_rows($item_run) > 0) {
                            ?>
                                <div class="form-group">
                                    <label for="inputState ">Image Item </label>
                                    <select id="item_id" class="form-control" name="item_id"  >
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
                                <input type="file" name="image" id="image"class="form-control" value="<?php echo $row['image'] ?>"  required>
                            </div>

                            <a href="items_images_main.php" class="btn btn-danger">CANCEL</a>
                            <button type="submit" name="updateitemimagebtn" class="btn btn-success "> Update </button>
                        </div>
                    </form>
            <?php
                }
            }

            ?>


        </div>
    </div>

</div>
<?php
include('includes/script.php');
include('includes/footer.php');
?>