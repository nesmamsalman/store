<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="modal fade" id="addcartitems" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Cart Items Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter Price" required>
                    </div>
                    <div class="form-group">
                        <label> Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" required>
                    </div>

                    <?php
                    $orders = "SELECT * FROM orders";
                    $orders_run = mysqli_query($connection, $orders);
                    if (mysqli_num_rows($orders_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="inputState ">Order </label>
                            <select id="orders_id" class="form-control" name="orders_id" required>
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
                            <select id="item_id" class="form-control" name="item_id">
                                <option value="">Choose Your  Item </option>
                                <?php
                                foreach ($item_run as $rowi) {
                                ?>
                                    <option value="<?php echo $rowi['id']; ?> "><?php echo $rowi['title_en']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>


                    <?php

                    } else {
                        echo "No Data ";
                    }

                    ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="cartitemsbtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Cart Items Profile
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addcartitems">
                    Add Cart Items
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
                $query = "SELECT * FROM cartitems ";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Order</th>
                            <th>Item</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $orders_id = $row['orders_id'];
                                $orders = "SELECT * FROM orders WHERE id = '$orders_id' ";
                                $orders_con = mysqli_query($connection, $orders);
                                $item_id = $row['item_id'];
                                $item = "SELECT * FROM items WHERE id = '$item_id' ";
                                $item_con = mysqli_query($connection, $item);
                        ?>


                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php
                                        if (is_array($orders_con) || is_object($orders_con)) {
                                            foreach ($orders_con as $rowo) {

                                                echo $rowo['customer_name'];
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?php
                                        if (is_array($item_con) || is_object($item_con)) {
                                            foreach ($item_con as $rowpt) {

                                                echo $rowpt['title_en'];
                                            }
                                        }
                                        ?>
                                    </td>
                                   
                                    <td>
                                        <form action="cartitemsedit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="cartitemseditbtn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="delete_cartitems_btn" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>

                                <tr>
                            <?php
                            }
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