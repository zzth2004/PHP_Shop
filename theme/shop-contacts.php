<?php
  include 'inc/header.php';
?>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit-contact']))){

        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $mess = $_POST['message'];
        $sID = session_id();
        $add_contact = $userAct->add_contact($name, $email, $mess);
        if($add_contact){
               echo '
                   <script>
                       if (typeof window !== "undefined") {
                           window.addEventListener("DOMContentLoaded", function() {
                               var notification = "'. $add_contact .'";
                               if (notification !== "") {
                                   
                                   alert(notification);
                                  
                                  
                               }else{
                                   window.location.href = "404.php";
                               
                               }
                           });
                       }
                   </script>
               ';
           }else{
               echo 'Faild';
           }
        }
?>



<div class="main">
    <div class="container">
        <ul class="breadcrumb" style="font-size: 1.3rem;">
            <li><a href="index.php">Home</a></li>
            <li><a href="">Pages</a></li>
            <li class="active">Contact</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-3 fixed-left">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <li class="list-group-item clearfix dropdown active"><a href="javascript:;"><i
                                class="fa fa-angle-right"></i>
                            My Account</a>
                        <ul class="dropdown-menu" style="display:none;">
                            <li class="list-group-item dropdown clearfix">
                                <a class="accordion-toggle" data-bs-parent="main-profile" data-bs-toggle="collapse"
                                    data-bs-target="#profile-overview"><i class="fa fa-angle-right"></i>
                                    View my account
                                </a>
                            </li>
                            <li class="list-group-item dropdown clearfix">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-parent="main-profile"
                                    data-bs-target="#profile-edit"><i class="fa fa-angle-right"></i>
                                    Change my profile
                                </a>
                            </li>
                            <li class="list-group-item dropdown clearfix">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-parent="main-profile"
                                    data-bs-target="#profile-change-password"><i class="fa fa-angle-right"></i>
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
                            Contact</a></li>
                </ul>

                <h2>Our Address</h2>
                <address>
                    470 Tran Dai Nghia, Ngu Hang Son<br>
                    Da Nang, VietNam<br>
                    <abbr title="Phone">P:</abbr> +840343371338<br>
                </address>
                <address>
                    <strong>Email</strong><br>
                    <a href="mailto:info@metronic.com">info@metronic.com</a><br>
                    <a href="mailto:support@metronic.com">support@metronic.com</a>
                </address>
                <ul class="social-icons margin-bottom-10">
                    <li><a href="javascript:;" data-original-title="facebook" class="facebook"></a></li>
                    <li><a href="javascript:;" data-original-title="github" class="github"></a></li>
                    <li><a href="javascript:;" data-original-title="Goole Plus" class="googleplus"></a></li>
                    <li><a href="javascript:;" data-original-title="linkedin" class="linkedin"></a></li>
                    <li><a href="javascript:;" data-original-title="rss" class="rss"></a></li>
                </ul>
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-9">
                <h1>Contact</h1>
                <div class="content-page">
                    <div id="map" class="gmaps margin-bottom-40" style="height:400px; width: 100%;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8285.702610534601!2d108.2488107997493!3d15.973834090828237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421088e365cc75%3A0x6648fdda14970b2c!2zNDcwIMSQxrDhu51uZyBUcuG6p24gxJDhuqFpIE5naMSpYSwgSG_DoCBI4bqjaSwgTmfFqSBIw6BuaCBTxqFuLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1702398085481!5m2!1sen!2s"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <h2>Contact Form</h2>
                    <p>Please contact to us if you have any problems with us.</p>

                    <!-- BEGIN FORM-->
                    <form action="" method="post" class="default-form" role="form">
                        <?php 
                            $login_check =  CustomSession::get('Customer_login');
                            if($login_check==false){
                        ?>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="fullname" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="require">*</span></label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" rows="8" id="message" name="message"></textarea>
                        </div>
                        <div class="padding-top-20">
                            <button type="submit" name="submit-contact" class="btn btn-primary">Submit</button>
                        </div>
                        <?php        
                            } else{
                                $userContact = $userAct->showInforUser();
                                if($userContact){
                                    while($result = $userContact->fetch_assoc()){

                                 
                           
                    ?>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="fullname"
                                value="<?php echo CustomSession::get('Name'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="require">*</span></label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?php echo $result['Email'];?>">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" rows="8" id="message" name="message"></textarea>
                        </div>
                        <div class="padding-top-20">
                            <button type="submit" name="submit-contact" class="btn btn-primary">Submit</button>
                        </div>
                        <?php    }
                                } }?>

                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>


<?php
  include 'inc/footer.php';
?>