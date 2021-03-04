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

            if (isset($_POST['cartitemseditbtn'])) {
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM cartitems WHERE id ='$id' ";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $row) {
            ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

                        <div class="modal-body">
                            <div class="form-group">
                        <label> Price</label>
                        <input type="number" name="editprice" class="form-control" value="<?php echo $row['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label> Quantity</label>
                        <input type="number" name="editquantity" class="form-control" value="<?php echo $row['quantity']; ?>" required>
                    </div>

                    <?php
                    $orders = "SELECT * FROM orders";
                    $orders_run = mysqli_query($connection, $orders);
                    if (mysqli_num_rows($orders_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="inputState ">Order </label>
                            <select id="editorders_id" class="form-control" name="editorders_id" required>
                                <option value="">Choose Your Order </option>
                                <?php
                                foreach ($orders_run as $rowo) {
                                ?>
                                    <option value="<?php echo $rowo['id']; ?> "><?php echo $rowo['customer_name']; ?> </option>
                                <?php } ?>
                            </select>

                        </div>
                    <?php

                    } else {
                        echo "No Data ";
                    }

                    ?>
                    <?php
                    $item = "SELECT * FROM items";
                    $item_run = mysqli_query($connection, $item);
                    if (mysqli_num_rows($item_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="inputState ">Image Item </label>
                            <select id="edititem_id" class="form-control" name="edititem_id">
                                <option value="">Choose Your  Item </option>
                                <?php
                                foreach ($item_run as $rowi) {
                                ?>
                                    <option value="<?php echo $rowi['id']; ?> "><?php echo $rowi['title_en']; ?> </option>
                                <?php } ?>
                            </select>
                            
                        </div>
                        <a href=" cartitems.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" name="updatecartitemsbtn" class="btn btn-success "> Update </button>
                    </form>

                    <?php

                    } else {
                        echo "No Data ";
                    }
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