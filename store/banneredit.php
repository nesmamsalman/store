<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"> EDIT Banner</h6>
        </div>
        <div class="card-body">
            <?php
            $connection = mysqli_connect("localhost", "root", "", "store");
            if (isset($_POST['banner_edit_btn'])) {
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM banner WHERE id ='$id' ";
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
                        <div class="form-group">
                            <label> Sort </label>
                            <input type="number" name="editsort" id="sort" class="form-control" value="<?php echo $row['sort']; ?>" required>
                        </div>
                        <?php
                        $productgroup = "SELECT * FROM productgroup";
                        $productgroup_run = mysqli_query($connection, $productgroup);
                        if (mysqli_num_rows($productgroup_run) > 0) {
                        ?>
                            <div class="form-group">
                                <label for="inputState ">Name Product Group </label>
                                <select id="editproductgroup_id" class="form-control" name="editproductgroup_id" value="<?php echo $row['productgroup_id']; ?>" >
                                    <option value="">Choose Your Name Product Group</option>
                                    <?php
                                    foreach ($productgroup_run as $row1) {
                                    ?>
                                        <option value="<?php echo $row1['id']; ?> "><?php echo $row1['title_en']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>


                        <?php
                        } else {
                            echo "No Data ";
                        }

                        ?>
                        
                        <div class="form-group">
                            <label> Image </label>
                            <input type="url" name="editimage" id="editimage" class="form-control" value="<?php echo $row['image']; ?>" required>
                        <?php echo '<img src = "' . $row['image'] . '" alt="" width="160px"  height="160px" class="mt-5 " ;>'
                         ?>
                    </div>
                   

                        <a href=" banner.php" class="btn btn-danger">CANCEL</a>
                            <button type="submit" name="updatebannerbtn" class="btn btn-success "> Update </button>
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