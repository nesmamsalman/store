<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"> EDIT Product Group</h6>
        </div>
        <div class="card-body">
            <?php
            $connection = mysqli_connect("localhost", "root", "", "store");
            if (isset($_POST['productgroupedit_btn'])) {
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM productgroup WHERE id ='$id' ";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $row) {
            ?>
                    <form action="code.php" method="POST">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                        <label> TitleAr </label>
                        <input type="text" name="edittitle_ar" class="form-control" placeholder="Enter titleAr" value="<?php echo $row['title_ar']; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label> TitleEn </label>
                        <input type="text" name="edittitle_en class="form-control" placeholder="Enter TitleEn" value="<?php echo $row['title_en']; ?>"  required>
                    </div>
                    
                    <a href="productgroup.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="updateproductgroupbtn" class="btn btn-success "> Update </button>
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