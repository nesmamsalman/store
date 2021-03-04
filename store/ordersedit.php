<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"> EDIT Section Type Group</h6>
        </div>
        <div class="card-body">
            <?php
            $connection = mysqli_connect("localhost", "root", "", "store");
            if (isset($_POST['orderseditbtn'])) {
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM orders WHERE id ='$id' ";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $row) {
            ?>
                    <form action="code.php" method="POST">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                        <div class="form-group">
                        <label> Order Date </label>
                        <input type="date" name="editdate" class="form-control" value="<?php echo $row['date']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label> Customer Name </label>
                        <input type="text" name="editcustomer_name" class="form-control" value="<?php echo $row['customer_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label> Customer Mobile </label>
                        <input type="number" name="editcustomer_mobile" class="form-control" value="<?php echo $row['customer_mobile']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label> Address </label>
                        <input type="text" name="editaddress" class="form-control" value="<?php echo $row['address']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label> City </label>
                        <input type="text" name="editcity" class="form-control" value="<?php echo $row['city']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label> Total </label>
                        <input type="number" name="edittotal" class="form-control" value="<?php echo $row['total']; ?>" required>
                    </div>
                    <?php
                    $orderstatus = "SELECT * FROM orderstatus";
                    $orderstatus_run = mysqli_query($connection, $orderstatus);
                    if (mysqli_num_rows($orderstatus_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="inputState ">Order Status </label>
                            <select id="editstatus_id" class="form-control" name="editstatus_id" required>
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
                            <select id="editpayment_type_id" class="form-control" name="editpayment_type_id" required>
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
                            <select id="editpayment_status_id" class="form-control" name="editpayment_status_id" required>
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


                        <a href="orders.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" name="updateordersbtn" class="btn btn-success "> Update </button>
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