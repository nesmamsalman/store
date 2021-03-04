<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addsectiongroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Section Group Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> TitleAr </label>
                        <input type="text" name="title_ar" class="form-control" placeholder="Enter TitleAr" required>
                    </div>
                    <div class="form-group">
                        <label> TitleEn </label>
                        <input type="text" name="title_en" class="form-control" placeholder="Enter TitleEn" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="sectiongroupbtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Section Group Profile
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addsectiongroup">
                    Add Section Group
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
                $query = "SELECT * FROM sectiongroup ";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TitleAr</th>
                            <th>TitleEn</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>


                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title_ar']; ?></td>
                                    <td><?php echo $row['title_en']; ?></td>
                                    <td>
                                        <form action="sectiongroupedit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="sectiongroupedit_btn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="delete_pru_btn" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>

                                </tr>
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