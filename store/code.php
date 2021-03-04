<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "store");

//login
if (isset($_POST['login_btn'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login'  ";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_fetch_array($query_run)) {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    } else {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
    }
}

//logout
if (isset($_POST['logout_btn'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
}



//register profile

if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if (mysqli_num_rows($email_query_run) > 0) {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    } else {
        if ($password === $cpassword) {
            $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            } else {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
            }
        } else {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');
        }
    }
}





if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE register SET username='$username' , email='$email' , password='$password' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: register.php');
    }
}


if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}


//categories 

if (isset($_POST['categoriesbtn'])) {
    $name_en = $_POST['name_en'];
    $name_ar = $_POST['name_ar'];
    $sort = $_POST['sort'];
    $status = $_POST['status'];
    $query = "INSERT INTO categories (name_en , name_ar ,sort, status  ) VALUES ('$name_en' , '$name_ar' ,'$sort','$status' )";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Categorie Added";

        header('Location: categories.php');
    } else {
        $_SESSION['status'] = " Categorie NOT Added ";

        header('Location: categories.php');
    }
}


if (isset($_POST['updatecategoriebtn'])) {
    $id = $_POST['edit_id'];
    $name_en = $_POST['editname_en'];
    $name_ar = $_POST['editname_ar'];
    $sort = $_POST['editsort'];
    $status = $_POST['editstatus'];
    $query = "UPDATE categories SET  name_en='$name_en' , name_ar='$name_ar' , sort= '$sort',status='$status'  WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: categories.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:categories.php');
    }
}

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM categories WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: categories.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: categories.php');
    }
}
//item 
if (isset($_POST['itemsbtn'])) {
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];
    $description_en = $_POST['description_en'];
    $description_ar = $_POST['description_ar'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $quantity = $_POST['quantity'];
    $sort = $_POST['sort'];
    $category_id = $_POST['category_id'];
    $thumnailimage_url = $_POST['thumnailimage_url'];
    $video_url = $_POST['video_url'];
    $status = $_POST['status'];
    $query = "INSERT INTO items (title_en , title_ar , description_en , description_ar , price ,
         discount , quantity , sort , category_id  , thumnailimage_url  , video_url, status ) 
         VALUES ('$title_en' , '$title_ar' ,'$description_en' ,'$description_ar','$price','$discount',
         '$quantity','$sort' , '$category_id','$thumnailimage_url','$video_url' , '$status'  )";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Items NOT Added";
        header('Location: items.php');
    } else {
        $_SESSION['status'] = $title_en;
        $_SESSION['status'] = $title_ar;
        $_SESSION['status'] = $description_en;
        $_SESSION['status'] = $description_ar;
        $_SESSION['status'] = $price;
        $_SESSION['status'] = $quantity;
        $_SESSION['status'] = $sort;
        $_SESSION['status'] = $category_id;
        $_SESSION['status'] = $thumnailimage_url;
        $_SESSION['status'] = $video_url;
        $_SESSION['status'] = $status;
        $_SESSION['status'] = $id;
        header('Location: items.php');
    }
}


if (isset($_POST['delete_cat_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM items WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: items.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: items.php');
    }
}







//image item 
if (isset($_POST['itemimagebtn'])) {
    $item_id = $_POST['item_id'];
    $image = $_FILES["image"]['name'];
    if (file_exists("upload/" . $_FILES["image"]['name'])) {
        $store = $_FILES["image"]['name'];
        $_SESSION['status'] = "Image Already '.$image.' ";
        header('Location: items_images_main.php');
    } else {

        $query = "INSERT INTO items_images_main (item_id , image) VALUES ( '$item_id' , '$image')";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]['name']);
            $_SESSION['success'] = "Image Item Added";
            header('Location: items_images_main.php');
        } else {
            $_SESSION['status'] = " '.$image.'";
            header('Location: items_images_main.php');
        }
    }
}

if (isset($_POST['updateitemimagebtn'])) {
    $id = $_POST['edit_id'];
    $edit_item_id = $_POST['item_id'];
    $image = $_FILES["image"]['name'];

    $item_image_query = "SELECT * FROM items_images_main WHERE id='$id' ";
    $item_image_query_run = mysqli_query($connection, $item_image_query);
    foreach ($item_image_queryrun as $fa_row) {
        if ($image == NULL) {
            $image_data = $fa_row['image'];
        } else {
            if ($img_path = "upload/" . $fa_row['image']) {
                unlink($img_path);
                $image_data = $image;
            }
        }
    }
    $query = "UPDATE items_images_main SET item_id='$edit_item_id' , image='$image'  WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);


    if ($query_run) {
        //update with existing image
        if ($image == NULL) {
            $_SESSION['success'] = "Image Item Updated With Existing Image";
            header('Location: items_images_main.php');
        } else {
            //update with new image and deleted with old image
            move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
            $_SESSION['success'] = "Image Item Updated";
            header('Location: items_images_main.php');
        }
    } else {
        $_SESSION['status'] = " Image Item NOT Updated";
        header('Location: items_images_main.php');
    }
}

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM items_images_main WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: items_images_main.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: items_images_main.php');
    }
}
//productgroup

if (isset($_POST['productgroupbtn'])) {
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];

    $query = "INSERT INTO productgroup (title_en , title_ar   ) VALUES ('$title_en' , '$title_ar'  )";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Product Group Added";

        header('Location: productgroup.php');
    } else {
        $_SESSION['status'] = " Product Group NOT Added ";

        header('Location: productgroup.php');
    }
}
if (isset($_POST['updateproductgroupbtn'])) {
    $id = $_POST['edit_id'];
    $title_en = $_POST['edittitle_en'];
    $title_ar = $_POST['edittitle_ar'];

    $query = "UPDATE productgroup SET  title_en='$title_en' , title_ar='$title_ar'   WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: productgroup.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:productgroup.php');
    }
}
if (isset($_POST['delete_pru_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM productgroup WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: productgroup.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: productgroup.php');
    }
}
//banner
if (isset($_POST['bannerbtn'])) {
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];
    $productgroup_id = $_POST['productgroup_id'];
    $sort = $_POST['sort'];
    $image = $_POST['image'];
    $status = $_POST['status'];

    $query = "INSERT INTO banner (title_en , title_ar , productgroup_id,sort ,image,status   ) VALUES
     ('$title_en' , '$title_ar' ,'$productgroup_id','$sort','$image','$status' )";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Banner Added";

        header('Location: banner.php');
    } else {
        $_SESSION['status'] = " Banner NOT Added ";

        header('Location: banner.php');
    }
}
if (isset($_POST['updatebannerbtn'])) {
    $id = $_POST['edit_id'];
    $title_en = $_POST['edittitle_en'];
    $title_ar = $_POST['edittitle_ar'];
    $productgroup_id = $_POST['editproductgroup_id'];
    $sort = $_POST['editsort'];
    $image = $_POST['editimage'];
    $status = $_POST['editstatus'];
    $query = "UPDATE banner SET  title_en='$title_en' , title_ar='$title_ar' , productgroup_id = '$productgroup_id'
     , sort='$sort' , image='$image', status = '$status' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: banner.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:banner.php');
    }
}



if (isset($_POST['delete_banner_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM banner WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: banner.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: banner.php');
    }
}



//productsgroupsitems
if (isset($_POST['productsgroupsitembtn'])) {

    $item_id = $_POST['item_id'];
    $productgroup_id = $_POST['productgroup_id'];
    $status = $_POST['status'];

    $query = "INSERT INTO productsgroupsitems (item_id ,productgroup_id ,status) VALUES ('$item_id' ,'$productgroup_id','$status')";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Products Groups Items Added";

        header('Location: productsgroupsitems.php');
    } else {
        $_SESSION['status'] = $item_id;
        $_SESSION['status'] = $productgroup_id;
        $_SESSION['status'] =  $status;

        header('Location: productsgroupsitems.php');
    }
}

if (isset($_POST['updateproductsgroupsitemsbtn'])) {
    $id = $_POST['edit_id'];;
    $item_id = $_POST['edititem_id'];
    $productgroup_id = $_POST['editproductgroup_id'];
    $status = $_POST['status'];
    $query = "UPDATE productsgroupsitems SET item_id='$item_id' , productgroup_id = '$productgroup_id'
    , status = '$status' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = $status;
        header('Location: productsgroupsitems.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:productsgroupsitems.php');
    }
}



if (isset($_POST['delete_pgi_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM productsgroupsitems WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: productsgroupsitems.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: productsgroupsitems.php');
    }
}
//sectiontype
if (isset($_POST['sectiontypebtn'])) {
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];

    $query = "INSERT INTO sectiontype (title_en , title_ar   ) VALUES ('$title_en' , '$title_ar'  )";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Section Type Added";

        header('Location: sectiontype.php');
    } else {
        $_SESSION['status'] = " Section Type NOT Added ";

        header('Location: sectiontype.php');
    }
}
if (isset($_POST['updatesectiontypebtn'])) {
    $id = $_POST['edit_id'];
    $title_en = $_POST['edittitle_en'];
    $title_ar = $_POST['edittitle_ar'];

    $query = "UPDATE sectiontype SET  title_en='$title_en' , title_ar='$title_ar'   WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: sectiontype.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:sectiontype.php');
    }
}
if (isset($_POST['delete_pru_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM sectiontype WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: sectiontype.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: sectiontype.php');
    }
}
//sectiongroup
if (isset($_POST['sectiongroupbtn'])) {
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];

    $query = "INSERT INTO sectiongroup (title_en , title_ar   ) VALUES ('$title_en' , '$title_ar'  )";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Section Group Added";

        header('Location: sectiongroup.php');
    } else {
        $_SESSION['status'] = " Section Group NOT Added ";

        header('Location: sectiongroup.php');
    }
}
if (isset($_POST['updatesectiongroupbtn'])) {
    $id = $_POST['edit_id'];
    $title_en = $_POST['edittitle_en'];
    $title_ar = $_POST['edittitle_ar'];

    $query = "UPDATE sectiongroup SET  title_en='$title_en' , title_ar='$title_ar'   WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: sectiongroup.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:sectiongroup.php');
    }
}
if (isset($_POST['delete_pru_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM sectiongroup WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: sectiongroup.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: sectiongroup.php');
    }
}
//homesections
if (isset($_POST['homesectionsbtn'])) {
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];
    $sectiongroup_id = $_POST['sectiongroup_id'];
    $sectiontype_id = $_POST['sectiontype_id'];
    $sort = $_POST['sort'];
    $status = $_POST['status'];


    $query = "INSERT INTO homesections (title_en , title_ar, sectiongroup_id, sectiontype_id,sort ,status ) 
    VALUES ('$title_en' , '$title_ar' ,'$sectiongroup_id' , '$sectiontype_id' , '$sort' ,'$status')";
    $query_run = mysqli_query($connection, $query);
    // echo $title_ar;
    if ($query_run) {
        $_SESSION['success'] = "Home Section Added";
        header('Location: homesections.php');
    } else {
        $_SESSION['success'] = "Home Section  Not Added";

        header('Location: homesections.php');
    }
}
if (isset($_POST['updatehomesectionsbtn'])) {
    $id = $_POST['edit_id'];
    $title_en = $_POST['edittitle_en'];
    $title_ar = $_POST['edittitle_ar'];
    $sectiongroup_id = $_POST['editsectiongroup_id'];
    $sectiontype_id = $_POST['editsectiontype_id'];
    $sort = $_POST['editsort'];
    $status = $_POST['editstatus'];

    $query = "UPDATE homesections SET  title_en='$title_en' , title_ar='$title_ar', sectiongroup_id='$sectiongroup_id' , 
     sectiontype_id ='$sectiontype_id',sort='$sort' , status='$status' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: homesections.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:homesections.php');
    }
}
if (isset($_POST['delete_homesections_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM homesections WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: homesections.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: homesections.php');
    }
}
//pagesmanagemet
if (isset($_POST['pagesmanagemetbtn'])) {
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];
    $description_en = $_POST['description_en'];
    $description_ar = $_POST['description_ar'];
    $sort = $_POST['sort'];
    $status = $_POST['status'];


    $query = "INSERT INTO pagesmanagemet (title_en , title_ar, description_en, description_ar,sort ,status ) 
    VALUES ('$title_en' , '$title_ar' ,'$description_en' , '$description_ar' , '$sort' ,'$status')";
    $query_run = mysqli_query($connection, $query);
    // echo $title_ar;
    if ($query_run) {
        $_SESSION['success'] = "Home Section Added";
        header('Location: pagesmanagemet.php');
    } else {
        $_SESSION['success'] = "Home Section  Not Added";

        header('Location: pagesmanagemet.php');
    }
}
if (isset($_POST['updatepagesmanagemetbtn'])) {
    $id = $_POST['edit_id'];
    $title_en = $_POST['edittitle_en'];
    $title_ar = $_POST['edittitle_ar'];
    $description_en = $_POST['editdescription_en'];
    $description_ar = $_POST['editdescription_ar'];
    $sort = $_POST['editsort'];
    $status = $_POST['editstatus'];

    $query = "UPDATE pagesmanagemet SET  title_en='$title_en' , title_ar='$title_ar', description_en = '$description_en' , 
     description_ar ='$description_ar', sort='$sort' , status='$status' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: pagesmanagemet.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:pagesmanagemet.php');
    }
}
if (isset($_POST['delete_pagesmanagemet_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM pagesmanagemet WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: pagesmanagemet.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: pagesmanagemet.php');
    }
}
//orderstatus
if (isset($_POST['orderstatusbtn'])) {
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];

    $query = "INSERT INTO orderstatus (title_en , title_ar   ) VALUES ('$title_en' , '$title_ar'  )";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Order Status Added";

        header('Location: orderstatus.php');
    } else {
        $_SESSION['status'] = " Order Status NOT Added ";

        header('Location: orderstatus.php');
    }
}
if (isset($_POST['updateorderstatusbtn'])) {
    $id = $_POST['edit_id'];
    $title_en = $_POST['edittitle_en'];
    $title_ar = $_POST['edittitle_ar'];

    $query = "UPDATE orderstatus SET  title_en='$title_en' , title_ar='$title_ar'   WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: orderstatus.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:orderstatus.php');
    }
}
if (isset($_POST['delete_orderstatus_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM orderstatus WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: orderstatus.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: orderstatus.php');
    }
}
//paymentstatus
if (isset($_POST['paymentstatusbtn'])) {
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];

    $query = "INSERT INTO paymentstatus (title_en , title_ar   ) VALUES ('$title_en' , '$title_ar'  )";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Payment Status Added";

        header('Location: paymentstatus.php');
    } else {
        $_SESSION['status'] = " Payment Status NOT Added ";

        header('Location: paymentstatus.php');
    }
}
if (isset($_POST['updatepaymentstatusbtn'])) {
    $id = $_POST['edit_id'];
    $title_en = $_POST['edittitle_en'];
    $title_ar = $_POST['edittitle_ar'];

    $query = "UPDATE paymentstatus SET  title_en='$title_en' , title_ar='$title_ar'   WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: paymentstatus.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:paymentstatus.php');
    }
}
if (isset($_POST['delete_paymentstatus_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM paymentstatus WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: paymentstatus.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: paymentstatus.php');
    }
}
//paymenttype
if (isset($_POST['paymenttypebtn'])) {
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];

    $query = "INSERT INTO paymenttype (title_en , title_ar   ) VALUES ('$title_en' , '$title_ar'  )";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Payment Type Added";

        header('Location: paymenttype.php');
    } else {
        $_SESSION['status'] = " Payment Type NOT Added ";

        header('Location: paymentpaymenttype.php');
    }
}
if (isset($_POST['updatepaymenttypebtn'])) {
    $id = $_POST['edit_id'];
    $title_en = $_POST['edittitle_en'];
    $title_ar = $_POST['edittitle_ar'];

    $query = "UPDATE paymenttype SET  title_en='$title_en' , title_ar='$title_ar'   WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: paymenttype.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:paymenttype.php');
    }
}
if (isset($_POST['delete_paymenttype_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM paymenttype WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: paymenttype.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: paymenttype.php');
    }
}
//ordersbtn
if (isset($_POST['ordersbtn'])) {
    $date = $_POST['date'];
    $status_id = $_POST['status_id'];
    $customer_name = $_POST['customer_name'];
    $customer_mobile = $_POST['customer_mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $total = $_POST['total'];
    $payment_type_id = $_POST['payment_type_id'];
    $payment_status_id = $_POST['payment_status_id'];

    $query = "INSERT INTO orders ( date , status_id , customer_name , customer_mobile,address,city, total, payment_type_id, payment_status_id)
     VALUES ('$date' , '$status_id' ,'$customer_name' , '$customer_mobile','$address' , '$city','$total' , '$payment_type_id' ,'$payment_status_id' )";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Payment Type Added";

        header('Location: orders.php');
    } else {
        $_SESSION['status'] = " Payment Type NOT Added ";

        header('Location: orders.php');
    }
}
if (isset($_POST['updateordersbtn'])) {
    $id = $_POST['edit_id'];
    $date = $_POST['editdate'];
    $status_id = $_POST['editstatus_id'];
    $customer_name = $_POST['editcustomer_name'];
    $customer_mobile = $_POST['editcustomer_mobile'];
    $address = $_POST['editaddress'];
    $city = $_POST['editcity'];
    $total = $_POST['edittotal'];
    $payment_type_id = $_POST['editpayment_type_id'];
    $payment_status_id = $_POST['editpayment_status_id'];


    $query = "UPDATE orders SET  date='$date' , status_id='$status_id' , customer_name='$customer_name'
     ,address='$address' , city='$city' , total ='$total',
     payment_type_id='$payment_type_id',payment_status_id='$payment_status_id'  WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
       header('Location: orders.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:orders.php');
    }
}
if (isset($_POST['delete_orders_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM orders WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: orders.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: orders.php');
    }
}
//cartitems

if (isset($_POST['cartitemsbtn'])) {
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $orders_id = $_POST['orders_id'];
    $item_id = $_POST['item_id'];

    $query = "INSERT INTO cartitems ( price , quantity , orders_id , item_id)
     VALUES ('$price' , '$quantity' ,'$orders_id' , '$item_id')";
    $query_run = mysqli_query($connection, $query);


    if ($query_run) {
        $_SESSION['success'] = "Cart Items Added";

        header('Location: cartitems.php');
    } else {
        $_SESSION['status'] = " Cart Items NOT Added ";

       header('Location: cartitems.php');
    }
}

if (isset($_POST['updatecartitemsbtn'])) {
    $id = $_POST['edit_id'];
    $price = $_POST['editprice'];
    $quantity = $_POST['editquantity'];
    $orders_id = $_POST['editorders_id'];
    $item_id = $_POST['edititem_id'];


    $query = "UPDATE cartitems SET  price='$price' , quantity='$quantity' , orders_id='$orders_id'
     ,item_id='$item_id'  WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
       header('Location: cartitems.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:cartitems.php');
    }
}
if (isset($_POST['delete_cartitems_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM cartitems WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: cartitems.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: cartitems.php');
    }
}