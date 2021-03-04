<?php

session_start(); 

include('includes/header.php');
?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block ">
                            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                                <img src="img/Play.png" height="350px" width="350px">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                                    <?php
                                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                        echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                                        unset($_SESSION['status']);
                                    }
                                    ?>

                                </div>
                                <form class="user" action="code.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" name="login_btn" class="btn btn-success btn-user btn-block"> Login </button>
                                    <hr>
                                         
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>



<?php
include('includes/script.php');
?>