<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addorders" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Order Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Order Date </label>
                        <input type="date" name="date" class="form-control" placeholder="Enter Order Date" required>
                    </div>
                    <div class="form-group">
                        <label> Customer Name </label>
                        <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" required>
                    </div>
                    <div class="form-group">
                        <label> Customer Mobile </label>
                        <input type="number" name="customer_mobile" class="form-control" placeholder="Enter Customer Mobile" required>
                    </div>
                    <div class="form-group">
                        <label> Address </label>
                        <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                    </div>
                    <div class="form-group">
                        <label> City </label>
                        <input type="text" name="city" class="form-control" placeholder="Enter City" required>
                    </div>

                    <div class="form-group">
                        <label> Total </label>
                        <input type="number" name="total" class="form-control" placeholder="Enter Total" required>
                    </div>
                    <?php
                    $orderstatus = "SELECT * FROM orderstatus";
                    $orderstatus_run = mysqli_query($connection, $orderstatus);
                    if (mysqli_num_rows($orderstatus_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="inputState ">Order Status </label>
                            <select id="status_id" class="form-control" name="status_id" required>
                                <option value="">Choose Your Order Status </option>
                                <?php
                                foreach ($orderstatus_run as $rowos) {
                                ?>
                                    <option value="<?php echo $rowos['id']; ?> "><?php echo $rowos['title_en']; ?> </option>
                                <?php } ?>
                            </select>

                        </div>
                    <?php

                    } else {
                        echo "No Data ";
                    }

                    ?>
                    <?php
                    $paymenttype = "SELECT * FROM paymenttype";
                    $paymenttype_run = mysqli_query($connection, $paymenttype);
                    if (mysqli_num_rows($paymenttype_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="inputState ">Name Payment Type </label>
                            <select id="payment_type_id" class="form-control" name="payment_type_id" required>
                                <option value="">Choose Your Name Payment Type</option>
                                <?php
                                foreach ($paymenttype_run as $rowpt) {
                                ?>
                                    <option value="<?php echo $rowpt['id']; ?> "><?php echo $rowpt['title_en']; ?> </option>
                                <?php }
                                ?>
                            </select>
                        </div>


                    <?php

                    } else {
                        echo "No Data ";
                    }

                    ?>

                    <?php
                    $paymentstatus = "SELECT * FROM paymentstatus";
                    $paymentstatus_run = mysqli_query($connection, $paymentstatus);
                    if (mysqli_num_rows($paymentstatus_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="inputState ">Name Payment Status </label>
                            <select id="payment_status_id" class="form-control" name="payment_status_id" required>
                                <option value="">Choose Your Name Payment Status</option>
                                <?php
                                foreach ($paymentstatus_run as $rowps) {
                                ?>
                                    <option value="<?php echo $rowps['id']; ?> "><?php echo $rowps['title_en']; ?> </option>
                                <?php }
                                ?>
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
                    <button type="submit" name="ordersbtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Orders Profile
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addorders">
                    Add Orders
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
                $query = "SELECT * FROM orders ";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order Date</th>
                            <th>Customer Name</th>
                            <th>Customer Mobile</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Total</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $status_id = $row['status_id'];
                                $orderstatus = "SELECT * FROM orderstatus WHERE id = '$status_id' ";
                                $orderstatus_con = mysqli_query($connection, $orderstatus);
                                $payment_type_id = $row['payment_type_id'];
                                $paymenttype = "SELECT * FROM paymenttype WHERE id = '$payment_type_id' ";
                                $paymenttype_con = mysqli_query($connection, $paymenttype);
                                $payment_status_id = $row['payment_status_id'];
                                $paymentstatus = "SELECT * FROM paymenttype WHERE id = '$payment_status_id' ";
                                $paymentstatus_con = mysqli_query($connection, $paymentstatus);
                        ?>


                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['customer_name']; ?></td>
                                    <td><?php echo $row['customer_mobile']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td><?php echo $row['total']; ?></td>
                                    <td><?php
                                        if (is_array($orderstatus_con) || is_object($orderstatus_con)) {
                                            foreach ($orderstatus_con as $rowos) {

                                                echo $rowos['title_en'];
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?php
                                        if (is_array($paymenttype_con) || is_object($paymenttype_con)) {
                                            foreach ($paymenttype_con as $rowpt) {

                                                echo $rowpt['title_en'];
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?php
                                        if (is_array($paymentstatus_con) || is_object($paymentstatus_con)) {
                                            foreach ($paymentstatus_con as $rowps) {

                                                echo $rowps['title_en'];
                                            }
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <form action="ordersedit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="orderseditbtn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="delete_orders_btn" class="btn btn-danger">DELETE</button>
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