<?php
  include 'inc/header.php';
?>
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">My Account Page</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40" id="main-profile">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-3 fixed-left">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <li class="list-group-item clearfix dropdown active"><a href="javascript:;"><i
                                class="fa fa-angle-right"></i>
                            My Account</a>
                        <ul class="dropdown-menu" style="display:none;">
                            <li class="list-group-item dropdown clearfix">
                                <a class="accordion-toggle" data-parent="main-profile" data-bs-toggle="collapse"
                                    href="#profile-overview"><i class="fa fa-angle-right"></i>
                                    View my account
                                </a>
                            </li>
                            <li class="list-group-item dropdown clearfix">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-parent="main-profile"
                                    href="#profile-edit"><i class="fa fa-angle-right"></i>
                                    Change my profile
                                </a>
                            </li>
                            <li class="list-group-item dropdown clearfix">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-parent="main-profile"
                                    href="#change-password"><i class="fa fa-angle-right"></i>
                                    Change my password
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i>
                            Address book</a></li>
                    <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i>
                            My cartlist</a></li>

                    <li class="list-group-item clearfix dropdown">
                        <a href="javascript:void(0);" class="collapsed">
                            <i class="fa fa-angle-right"></i>
                            My Oder

                        </a>
                        <ul class="dropdown-menu" style="display:none;">
                            <li class="list-group-item dropdown clearfix">
                                <a href="javascript:;" class="collapsed"><i class="fa fa-angle-right"></i> View
                                    my oder
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i>
                            Returns</a></li>
                </ul>
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <section class="section profile col-md-9 col-sm-9 col-lg-9">
                <div class="row" style="justify-content: space-between;">
                    <div class="col-lg-4"
                        style="background-color: white; z-index: inherit; height: 200px; border-radius: 50px;">

                        <div class="card">
                            <div class="card-body profile-card align-items-center">

                                <img src="assets/product_img/userImgnew.png" width="120" alt="Profile"
                                    class="rounded-circle" style="margin: 20px 60px 30px 70px; text-align: center;">
                                <h2 style="text-align: center;">Kevin Anderson</h2>
                                <div style="display: flex; justify-content: space-between; margin-top: 14px;">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content"
                            style="padding: 20px;background-color: white; z-index: inherit; border-radius: 50px;">
                            <div class="tab-pane show active" id="profile-overview" role="tabpanel">
                                <span
                                    style="font-size: 3rem; font-weight: 500; color: black; margin-bottom: 20px;">Profile
                                    Details</span>

                                <div class="row" style="margin-top: 20px; font-size: 18px;">
                                    <div class="col-lg-3 col-md-4 "><label for="">Full Name</label></div>
                                    <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                                </div>

                                <div class="row" style="font-size: 18px;">
                                    <div class="col-lg-3 col-md-4"><label for="">Phone</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                                </div>

                                <div class="row" style="font-size: 18px;">
                                    <div class="col-lg-3 col-md-4"><label for="">Email</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                                </div>

                                <div class="row" style="font-size: 18px;">
                                    <div class="col-lg-3 col-md-4 "><label for="">Address</label></div>
                                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                                </div>



                            </div>

                            <div class="tab-pane fade" id="profile-edit" role="tabpanel">

                                <!-- Profile Edit Form -->
                                <form>
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assets/img/profile-img.jpg" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                            Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullName" type="text" class="form-control" id="fullName"
                                                value="Kevin Anderson">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control" id="about"
                                                style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" id="company"
                                                value="Lueilwitz, Wisoky and Leuschke">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="job" type="text" class="form-control" id="Job"
                                                value="Web Designer">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text" class="form-control" id="Country"
                                                value="USA">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address"
                                                value="A108 Adam Street, New York, NY 535022">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone"
                                                value="(436) 486-3538 x29071">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email"
                                                value="k.anderson@example.com">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="twitter" type="text" class="form-control" id="Twitter"
                                                value="https://twitter.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="facebook" type="text" class="form-control" id="Facebook"
                                                value="https://facebook.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instagram" type="text" class="form-control" id="Instagram"
                                                value="https://instagram.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="linkedin" type="text" class="form-control" id="Linkedin"
                                                value="https://linkedin.com/#">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                            <div class="tab-pane fade" id="profile-change-password" role="tabpanel">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
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