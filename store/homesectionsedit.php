<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"> EDIT Home Sections</h6>
        </div>
        <div class="card-body">
            <?php
            $connection = mysqli_connect("localhost", "root", "", "store");
            if (isset($_POST['homesectionseditbtn'])) {
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM homesections WHERE id ='$id' ";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $row) {
            ?>
                    <form action="code.php" method="POST">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                            <label> TitleAr </label>
                            <input type="text" name="edittitle_ar" class="form-control" value="<?php echo $row['title_ar']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label> TitleEn </label>
                            <input type="text" name="edittitle_en" class="form-control" value="<?php echo $row['title_en']; ?>" required>
                        </div>
                        <?php
                        $sectiongroup = "SELECT * FROM sectiongroup";
                        $sectiongroup_run = mysqli_query($connection, $sectiongroup);
                        if (mysqli_num_rows($sectiongroup_run) > 0) {
                        ?>
                            <div class="form-group">
                                <label for="inputState ">Section Group </label>
                                <select id="editsectiongroup_id" class="form-control" name="editsectiongroup_id" required>
                                    <option value="">Choose Your Section Group </option>
                                    <?php
                                    foreach ($sectiongroup_run as $rowsg) {
                                    ?>
                                        <option value="<?php echo $rowsg['id']; ?> "><?php echo $rowsg['title_en']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php
                        } else {
                            echo "No Data ";
                        }
                        ?>
                        <?php
                        $sectiontype  = "SELECT * FROM sectiontype";
                        $sectiontype_run = mysqli_query($connection, $sectiontype);
                        if (mysqli_num_rows($sectiontype_run) > 0) {
                        ?>
                            <div class="form-group">
                                <label for="inputState ">Name Section Type </label>
                                <select id="editsectiontype_id" class="form-control" name="editsectiontype_id" required>
                                    <option value="">Choose Your Name Section Type</option>
                                    <?php
                                    foreach ($sectiontype_run as $rowst) {
                                    ?>
                                        <option value="<?php echo $rowst['id']; ?> "><?php echo $rowst['title_en']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>

                        <?php

                        } else {
                            echo "No Data ";
                        }

                        ?>
                        <div class="form-group">
                            <label> Sort </label>
                            <input type="number" name="editsort" id="sort" class="form-control" value="<?php echo $row['sort']; ?>" required>
                        </div>
                        <div class="form-group">

                            <label for="inputState">Status</label>
                            <select name="editstatus" id="inputState" class="form-control">

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




                        <a href=" homesections.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" name="updatehomesectionsbtn" class="btn btn-success "> Update </button>
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