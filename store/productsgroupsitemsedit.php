<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"> EDIT Products Groups Item</h6>
        </div>
        <div class="card-body">
            <?php
            $connection = mysqli_connect("localhost", "root", "", "store");
            if (isset($_POST['productsgroupsitemseditbtn'])) {
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM productsgroupsitems WHERE id ='$id' ";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $row) {
            ?>
                    <form action="code.php" method="POST">


                        <?php
                        $item = "SELECT * FROM items";
                        $item_run = mysqli_query($connection, $item);
                        if (mysqli_num_rows($item_run) > 0) {
                        ?>
                            <div class="form-group">
                                <label for="inputState ">Image Item </label>
                                <select id="editiitem_id" class="form-control" name="editiitem_id" required>
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
                                <select id="editiproductgroup_id" class="form-control" name="editiproductgroup_id" required>
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

                            <label for="inputState">Status</label>
                            <select name="status" id="inputState" class="form-control">

                                <?php

                                if ($row['status'] == 'Active') {

                                    echo '<option value="Active" selected>Active</option>
           <option value="Not Active">Not Active</option>';
                                } else {
                                    echo '<option value="Active">Active</option>
        <option value="Not Active" selected>Not Active</option>';
                                }
                                ?>

                            </select>
                        </div>






                        <a href=" productsgroupsitems.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" name="updateproductsgroupsitemsbtn" class="btn btn-success "> Update </button>
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