<?php
include 'inc/header.php';
?>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['change-submit'])) {
        $name = $_POST['fullName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $updateInfor = $userAct->updateInfor($name, $phone, $email, $address);
    } else if (isset($_POST['pass-change-submit'])) {
        $pass = md5($_POST['oldpassword']);
        $newpass = md5($_POST['password']);
        $reNewpass = md5($_POST['password-confirm']);
        if ((isset($reNewpass) && $newpass != null) && (isset($newpass) && $newpass != null)) {
            if ($reNewpass != $newpass) {
                $alert = "New password and re-enter new password is dificult!";
                echo '
            <script>
                if (typeof window !== "undefined") {
                    window.addEventListener("DOMContentLoaded", function() {
                        var notification = "' . $alert . '";
                        if (notification !== "") {
                            alert(notification);
                        }
                    });
                }
            </script>
            ';
            } else {
                $updatePass = $userAct->updatePass($pass, $newpass);
                echo '
            <script>
                if (typeof window !== "undefined") {
                    window.addEventListener("DOMContentLoaded", function() {
                        var notification = "' . $updatePass . '";
                        if (notification !== "") {
                            alert(notification);
                        }
                    });
                }
            </script>
            ';
            }
        }
    }
}
?>


<div class="main">
    <div class="container">
        <ul class="breadcrumb" style="font-size: 1.3rem;">
            <li><a href="index.php">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">My Account Page</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40" id="main-profile">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-3 fixed-left">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <li class="list-group-item clearfix dropdown active"><a href="javascript:;"><i class="fa fa-angle-right"></i>
                            My Account</a>
                        <ul class="dropdown-menu" style="display:none;">
                            <li class="list-group-item dropdown clearfix">
                                <a class="accordion-toggle" data-bs-parent="main-profile" data-bs-toggle="collapse" data-bs-target="#profile-overview"><i class="fa fa-angle-right"></i>
                                    View my account
                                </a>
                            </li>
                            <li class="list-group-item dropdown clearfix">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-parent="main-profile" data-bs-target="#profile-edit"><i class="fa fa-angle-right"></i>
                                    Change my profile
                                </a>
                            </li>
                            <li class="list-group-item dropdown clearfix">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-parent="main-profile" data-bs-target="#profile-change-password"><i class="fa fa-angle-right"></i>
                                    Change my password
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item clearfix"><a href="shop-cart.php"><i class="fa fa-angle-right"></i>
                            My cartlist</a></li>

                    <li class="list-group-item clearfix dropdown">
                        <a href="shop-show-order.php" class="collapsed">
                            <i class="fa fa-angle-right"></i>
                            My Oder

                        </a>
                    </li>
                    <li class="list-group-item clearfix"><a href="shop-contacts.php"><i class="fa fa-angle-right"></i>
                            Contacts</a></li>
                </ul>
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <section class="section profile col-md-9 col-sm-9 col-lg-9">
                <div class="row" style="justify-content: space-between;">
                    <div class="col-lg-4" style="background-color: white; z-index: inherit; height: 250px; border-radius: 50px;">
                        <?php
                        $showinfor = $userAct->showInforUser();
                        if ($showinfor) {
                            while ($result = $showinfor->fetch_assoc()) {


                        ?>
                                <div class="card">
                                    <div class="card-body profile-card align-items-center">

                                        <img src="assets/product_img/userImgnew.png" width="120" alt="Profile" class="rounded-circle" style="margin: 20px 60px 30px 70px; text-align: center;">
                                        <h2 style="text-align: center;"><?php echo $result['Name'] ?></h2>
                                        <div style="display: flex; justify-content: space-between; margin-top: 14px;">
                                        </div>
                                    </div>
                                </div>

                    </div>
                    <div class="col-lg-8">
                        <div id="main-profile" class="tab-content" style="padding: 20px;background-color: white; z-index: inherit; border-radius: 50px;">
                            <div class="tab-pane show active" id="profile-overview" role="tabpanel">
                                <span style="font-size: 3rem; font-weight: 500; color: black; margin-bottom: 20px;">Profile
                                    Details</span>

                                <div class="row" style="margin-top: 20px; font-size: 16px;">
                                    <div class="col-lg-3 col-md-4 "><label for="">Full Name</label></div>
                                    <div class="col-lg-9 col-md-8"><?php echo $result['Name'] ?></div>
                                </div>

                                <div class="row" style="font-size: 16px;">
                                    <div class="col-lg-3 col-md-4"><label for="">Phone</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8"><?php echo $result['Phone'] ?></div>
                                </div>

                                <div class="row" style="font-size: 16px;">
                                    <div class="col-lg-3 col-md-4"><label for="">Email</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8"><?php echo $result['Email'] ?></div>
                                </div>

                                <div class="row" style="font-size: 16px;">
                                    <div class="col-lg-3 col-md-4 "><label for="">Address</label></div>
                                    <div class="col-lg-9 col-md-8"><?php echo $result['Address'] ?></div>
                                </div>



                            </div>

                            <div class="tab-pane " id="profile-edit" role="tabpanel">

                                <!-- Profile Edit Form -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div>
                                        <div style="margin-bottom: 25px;">
                                            <span style="font-size: 3rem; font-weight: 500; color: black; margin-bottom: 20px;">Change
                                                Profile
                                                Details</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3" style="font-size: 16px;">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                            Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $result['Name'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3" style="font-size: 16px;">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="address" id="" cols="50" rows="10" class="form-control" id="Address"><?php echo $result['Address'] ?></textarea>

                                        </div>
                                    </div>

                                    <div class="row mb-3" style="font-size: 16px;">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $result['Phone'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3" style="font-size: 16px;">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="<?php echo $result['Email'] ?>">
                                        </div>
                                    </div><br>
                                    <div class="text-center">
                                        <button type="submit" name="change-submit" class="btn btn-primary">Save
                                            Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                    <?php
                            }
                        } ?>
                    <div class="tab-pane" id="profile-change-password" role="tabpanel">
                        <!-- Change Password Form -->
                        <form action="" method="post">
                            <div style="margin-bottom: 25px;">
                                <span style="font-size: 3rem; font-weight: 500; color: black; margin-bottom: 40px;">Change
                                    Password</span>
                            </div>
                            <div class="row mb-3">
                                <label for="currentPassword" class="col-md-4 col-lg-4 col-form-label">Current
                                    Password</label>
                                <div class="col-md-8 col-lg-8">
                                    <input required name="oldpassword" type="password" class="form-control" id="currentPassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="newPassword" class="col-md-4 col-lg-4 col-form-label">New
                                    Password</label>
                                <div class="col-md-8 col-lg-8">
                                    <input required name="password" type="password" oninput="checkPasswordMatch()" class="form-control" id="password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="renewPassword" class="col-md-4 col-lg-4 col-form-label">Re-enter New
                                    Password</label>
                                <div class="col-md-8 col-lg-8">
                                    <input required name="password-confirm" type="password" oninput="checkPasswordMatch()" class="form-control" id="password-confirm">
                                </div>
                            </div>
                            <hr>
                            <p id="password-match-message" style="color: red;"></p>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="pass-change-submit">Change
                                    Password</button>
                            </div>
                        </form><!-- End Change Password Form -->

                    </div>


                        </div>
                    </div>

                </div>
        </div>
        </section>
        <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
</div>
</div>




<?php
include 'inc/footer.php';
?>