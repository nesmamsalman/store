<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Items Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> TitleAr </label>
                        <input type="text" name="title_ar" class="form-control" placeholder="Enter TitleAr"required>
                    </div>
                    <div class="form-group">
                        <label> TitleEn </label>
                        <input type="text" name="title_en" class="form-control" placeholder="Enter TitleEn" required>
                    </div>
                    <div class="form-group">
                        <label> DescriptionAr </label>
                        <input type="text" name="description_ar" class="form-control" placeholder="Enter DescriptionAr" required>
                    </div>
                    <div class="form-group">
                        <label> DescriptionEn </label>
                        <input type="text" name="description_en" class="form-control" placeholder="Enter DescriptionEn" required>
                    </div>
                    <div class="form-group">
                        <label> Price </label>
                        <input type="number" name="price" class="form-control" placeholder="Enter Price" required>
                    </div>
                    <div class="form-group">
                        <label> Discount </label>
                        <input type="text" name="discount" class="form-control" placeholder="Enter Discount" required>
                    </div>
                    <div class="form-group">
                        <label> Quantity </label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" required>
                    </div>
                    <div class="form-group">
                        <label> Sort </label>
                        <input type="number" name="sort" id="sort" class="form-control" placeholder="Enter Sort" required>
                    </div>
                    <?php
                    $category = "SELECT * FROM categories";
                    $category_run = mysqli_query($connection, $category);
                    if (mysqli_num_rows($category_run) > 0) {
                    ?>
                        <div class="form-group" >
                            <label for="inputState ">Name Categories </label>
                            <select id="category_id" class="form-control" name="category_id " required>
                                <option value="" >Choose Your Name Category</option>
                                <?php
                                foreach ($category_run as $rowcat) {
                                ?>
                                    <option value="<?php echo $rowcat['id']; ?> "><?php echo $rowcat['name_en']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>


                    <?php

                    } else {
                        echo "No Data ";
                    }

                    ?>



                    <div class="form-group" >
                        <label for="inputState ">Status</label>
                        <select id="inputState" class="form-control" name="status" required>
                            <option selected >Choose...</option>
                            <option value="Active">Active</option>
                            <option value="Not Active">Not Active</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label> Thumnail Image </label>
                        <input type="url" name="thumnailimage_url" id="thumnailimage_url" class="form-control" placeholder="Enter Thumnail Image" required>
                    </div>
                    <div class="form-group">
                        <label> Video URL </label>
                        <input type="url" name="video_url" id="video_url" class="form-control" placeholder="Enter Video URL" required>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="itemsbtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Items Profile
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#additem">
                    Add Item
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
        
                <?php
                $connection = mysqli_connect("localhost", "root", "", "store");
                $query = "SELECT * FROM items ";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TitleAr</th>
                            <th>TitleEn</th>
                            <th>DescriptionAr</th>
                            <th>DescriptionEn</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>Sort</th>
                            <th>Category Id</th>
                            <th>Thumnail Image</th>
                            <th>Video Url</th>
                            <th>Status</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
               

                        <?php
                       while ($row = mysqli_fetch_assoc($query_run)) {
                        $category_id = $row['category_id'];
                        $category = "SELECT * FROM categories WHERE id = '$category_id' ";
                        $category_run = mysqli_query($connection, $category); 
                        ?>


                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title_ar']; ?></td>
                                    <td><?php echo $row['title_en']; ?></td>
                                    <td><?php echo $row['description_en']; ?></td>
                                    <td><?php echo $row['description_ar']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['discount']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['sort']; ?></td>
                                    <td><?php 
                                        foreach ($category_run as $rowcat) {
                                            
                                            echo $rowcat['name_en'];;
                                        }
                                    
                            
                                    ?>
                                     </td>
                                    <td><?php echo '<img src="' . $row['thumnailimage_url'] . '" alt="url" width="100px" height="100px" ;>' ?>
                                    <td><?php echo '<iframe width="100" height="100"  src ="https://www.youtube.com/embed/' . $row['video_url'] . '" >
                                  </iframe> '?> </td>
 
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <form action="items_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="items_edit_btn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="delete_item_btn" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>

                                </tr>
                        <?php

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