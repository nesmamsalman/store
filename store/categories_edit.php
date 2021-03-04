<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-success"> EDIT Categorie pagee </h6>
    </div>
    <div class="card-body">
      <?php
      $connection = mysqli_connect("localhost", "root", "", "store");

      if (isset($_POST['categories_edit_btn'])) {
        $id = $_POST['edit_id'];
        $query = "SELECT * FROM categories WHERE id ='$id' ";
        $query_run = mysqli_query($connection, $query);
        foreach ($query_run as $row) {
      ?>
          <form action="code.php" method="POST">

            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">


            <div class="form-group">
              <label> NameAr </label>
              <input type="text" name="editname_ar" class="form-control" value="<?php echo $row['name_ar']; ?>"  required>
            </div>
            <div class="form-group">
              <label> NameEn </label>
              <input type="text" name="editname_en" class="form-control" value="<?php echo $row['name_en']; ?>"  required>
            </div>
            <div class="form-group">
              <label> Sort </label>
              <input type="number" name="editsort" class="form-control" value="<?php echo $row['sort']; ?>">
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




            <a href="categories.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="updatecategoriebtn" class="btn btn-success "> Update </button>
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