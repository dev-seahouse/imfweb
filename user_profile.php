<?php
require_once("libraries/utilities.php");
check_auth("index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>IMF Management Application - Profile</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <!-- Application icon -->
    <!--     <link href='assets/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <link href='assets/images/meta_icons/apple-touch-icon.png' rel='apple-touch-icon-precomposed'>
    <link href='assets/images/meta_icons/apple-touch-icon-57x57.png' rel='apple-touch-icon-precomposed' sizes='57x57'>
    <link href='assets/images/meta_icons/apple-touch-icon-72x72.png' rel='apple-touch-icon-precomposed' sizes='72x72'>
    <link href='assets/images/meta_icons/apple-touch-icon-114x114.png' rel='apple-touch-icon-precomposed' sizes='114x114'>
    <link href='assets/images/meta_icons/apple-touch-icon-144x144.png' rel='apple-touch-icon-precomposed' sizes='144x144'>
    -->
    <!-- / START - page related stylesheets [optional] -->
    <!-- End of application icons -->
    <!-- ===========================================  =============================== -->
    <!-- / bootstrap-->
    <link href="assets/stylesheets/bootstrap/bootstrap.min.css" media="all" rel="stylesheet" type="text/css"/>
    <!-- / theme file -->
    <link href="assets/stylesheets/demo.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/stylesheets/imftheme.css">
    <!--- =============   Customise theme File     ================================== -->
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/main.css">
    <!--[if lt IE 9]>
    <script src="assets/javascripts/compatibility/html5shiv.js" type="text/javascript"></script>
    <script src="assets/javascripts/compatibility/response.min.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body class='contrast-blue without-footer'>
<header>
<nav class='navbar navbar-default'>
<a class='navbar-brand' href='dashboard.php'>

    <!--<img width="81" height="21" class="logo" alt="Flatty" src="assets/images/logo.svg" />
    <img width="21" height="21" class="logo-xs" alt="Flatty" src="assets/images/logo_xs.svg" />
    -->
</a>
<a class='toggle-nav btn pull-left' href='#'> <i class='icon-reorder'></i>
</a>
<!-- ====================     Nav Class      =================== -->
<ul class='nav'>
    <!-- ==================== Theme Color Changer ================== -->
    <li class='dropdown light only-icon'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'> <i class='icon-cog'></i>
        </a>
        <ul class='dropdown-menu color-settings'>
            <li class='color-settings-contrast-color'>
                <div class='color-title'>Select Theme</div>
                <a data-change-to="contrast-red" href="#">
                    <i class='icon-cog text-red'></i>
                    Red
                    <small>(default)</small>
                </a>

                <a data-change-to="contrast-blue" href="#">
                    <i class='icon-cog text-blue'></i>
                    Blue
                </a>

                <a data-change-to="contrast-orange" href="#">
                    <i class='icon-cog text-orange'></i>
                    Orange
                </a>

                <a data-change-to="contrast-purple" href="#">
                    <i class='icon-cog text-purple'></i>
                    Purple
                </a>

                <a data-change-to="contrast-green" href="#">
                    <i class='icon-cog text-green'></i>
                    Green
                </a>

                <a data-change-to="contrast-muted" href="#">
                    <i class='icon-cog text-muted'></i>
                    Muted
                </a>

                <a data-change-to="contrast-fb" href="#">
                    <i class='icon-cog text-fb'></i>
                    Facebook
                </a>

                <a data-change-to="contrast-dark" href="#">
                    <i class='icon-cog text-dark'></i>
                    Dark
                </a>

                <a data-change-to="contrast-pink" href="#">
                    <i class='icon-cog text-pink'></i>
                    Pink
                </a>

                <a data-change-to="contrast-grass-green" href="#">
                    <i class='icon-cog text-grass-green'></i>
                    Grass green
                </a>

                <a data-change-to="contrast-sea-blue" href="#">
                    <i class='icon-cog text-sea-blue'></i>
                    Sea blue
                </a>

                <a data-change-to="contrast-banana" href="#">
                    <i class='icon-cog text-banana'></i>
                    Banana
                </a>

                <a data-change-to="contrast-dark-orange" href="#">
                    <i class='icon-cog text-dark-orange'></i>
                    Dark orange
                </a>

                <a data-change-to="contrast-brown" href="#">
                    <i class='icon-cog text-brown'></i>
                    Brown
                </a>

            </li>
        </ul>
    </li>
    <!-- ================= End of theme color changer ============= -->
    <!-- ================= Notification Dropdown + Widget box ============== -->
    <li class='dropdown medium only-icon widget'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-rss'></i>

            <div class='label'>5</div>
        </a>
        <ul class='dropdown-menu'>
            <li>
                <a href='#'>
                    <div class='widget-body'>
                        <div class='pull-left icon'>
                            <i class='icon-user text-success'></i>
                        </div>
                        <div class='pull-left text'>
                            Steven Sim applied waiter position
                            <small class='text-muted'>just now</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class='divider'></li>
            <li>
                <a href='#'>
                    <div class='widget-body'>
                        <div class='pull-left icon'>
                            <i class='icon-user text-success'></i>
                        </div>
                        <div class='pull-left text'>
                            Jolin Tan applied cleaner position
                            <small class='text-muted'>1 hours ago</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class='divider'></li>
            <li>
                <a href='#'>
                    <div class='widget-body'>
                        <div class='pull-left icon'>
                            <i class='icon-user text-danger'></i>
                        </div>
                        <div class='pull-left text'>
                            Mhamd Nazrin has cancelled her waiter position.
                            <small class='text-muted'>2 hour ago</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class='divider'></li>
            <li>
                <a href='#'>
                    <div class='widget-body'>
                        <div class='pull-left icon'>
                            <i class='icon-user text-success'></i>
                        </div>
                        <div class='pull-left text'>
                            Jane applied cleaner job
                            <small class='text-muted'>last week</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class='divider'></li>
            <li>
                <a href='#'>
                    <div class='widget-body'>
                        <div class='pull-left icon'>
                            <i class='icon-suitcase text-error'></i>
                        </div>
                        <div class='pull-left text'>
                            New kichen assistant job has been created
                            <small class='text-muted'>1 month ago</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class='widget-footer'>
                <a href='#'>All notifications</a>
            </li>
        </ul>
    </li>

    <!-- ====================== End of notification dropdown + Widget Box =========== -->
    <!-- ====================== Top Right Profile menu Dropdown ===================== -->
    <li class='dropdown dark user-menu'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <!-- ==================================================================               
            <img width="23" height="23" alt="company" src="assets/images/avatar.jpg" />
            -->
            <span class='user-name'><?= $_SESSION["company_name"]; ?></span> <b class='caret'></b>
        </a>
        <ul class='dropdown-menu'>
            <li>
                <a href='user_profile.php'>
                    <i class='icon-user'></i>
                    Profile
                </a>
            </li>
            <li>
                <a href='user_profile.php'>
                    <i class='icon-cog'></i>
                    Settings
                </a>
            </li>
            <li class='divider'></li>
            <li>
                <a href='controllers/processlogin.php?logout'>
                    <i class='icon-signout'></i>
                    Sign out
                </a>
            </li>
        </ul>
    </li>
    <!-- ====================== End of Top Right Profile menu Dropdown ===================== --> </ul>
<!-- ====================== End of nav class======================== ===================== -->
<!-- ======================== Search Button ============================================== -->
<!--       <form action='search_results.html' class='navbar-form navbar-right hidden-xs' method='get'>
<button class='btn btn-link icon-search' name='button' type='submit'></button>
<div class='form-group'>
  <input value="" class="form-control" placeholder="Search..." autocomplete="off" id="q_header" name="q" type="text" />
</div>
</form>
-->
</nav>
<!-- ===================== End of nav section =================================== -->
</header>
<div id='wrapper'>
<div id='main-nav-bg'></div>
<nav id='main-nav'>
    <div class='navigation'>
        <!-- ======================= Hidden search button for mobile ====================== -->
        <!--         <div class='search'>
        <form action='search_results.html' method='get'>
          <div class='search-wrapper'>
            <input value="" class="search-query form-control" placeholder="Search..." autocomplete="off" name="q" type="text" />
            <button class='btn btn-link icon-search' name='button' type='submit'></button>
          </div>
        </form>
      </div>
      -->
        <!-- ====================  End of serach button for mobile ======================== -->
        <!-- ====================  Left side navigation starts here ======================= -->
        <ul class='nav nav-stacked'>
            <li class=''>
                <a href='dashboard.php'>
                    <i class='icon-dashboard'></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class=''>
                <a href="postjob.php">
                    <i class='icon-plus'></i>
                    <span>Post New Job</span>
                </a>
            </li>
            <li class=''>
                <a href="#">
                    <i class='icon-remove'></i>
                    <span>Cancel Job</span>
                </a>
            </li>
            <li class=''>
                <a href='viewjob.php'>
                    <i class='icon-suitcase'></i>
                    <span>View Posted Job</span>
                </a>
            </li>
            <li class=''>
                <a href="viewapplicants.php">
                    <i class='icon-user'></i>
                    <span>View Job Applications</span>
                </a>
            </li>
            <li class=''>
                <a class="dropdown-collapse" href="#">
                    <i class='icon-check'></i>
                    <span>Mark Attendance</span>
                    <i class='icon-angle-down angle-down'></i>
                </a>

                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='checkin.php'>
                            <i class='icon-caret-right'></i>
                            <span>Check in</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='checkout.php'>
                            <i class='icon-caret-right'></i>
                            <span>Checkout</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=''>
                <a href="managePay.php">
                    <i class='icon-usd'></i>
                    <span>Manage Pay</span>
                </a>
            </li>
            <li class=''>
                <a  href="managecomment.php">
                    <i class='icon-star-half-empty'></i>
                    <span>Manage Feedback</span>

                </a>

            </li>
            <li class=''>
                <a href="#">
                    <i class='icon-envelope'></i>
                    <span>Contact Support</span>
                </a>
            </li>
            <li class=''>
                <a href="controllers/processlogin.php?logout">
                    <i class='icon-signout'></i>
                    <span>Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<section id='content'>
    <div class='container'>
        <div class='row' id='content-wrapper'>
            <div class='col-xs-12'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='page-header'>
                            <h1 class='pull-left'>
                                <i class='icon-user'></i>
                                <span>Profile</span>
                            </h1>

                            <div class='pull-right'>
                                <ul class='breadcrumb'>
                                    <li>
                                        <a href='dashboard.php'>
                                            <i class='icon-dashboard'></i>
                                        </a>
                                    </li>
                                    <li class='separator'>
                                        <i class='icon-angle-right'></i>
                                    </li>
                                    <li class='active'>Profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-3 col-lg-2'>
                        <div class='box'>
                            <div class='box-content'>
                                <img class="img-responsive" src="http://placehold.it/230x230&text=Photo"/>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-9 col-lg-10'>
                        <div class='box'>
                            <div class='box-content box-double-padding'>
                                <form class='form' style='margin-bottom: 0;'>
                                    <fieldset>
                                        <div class='col-sm-4'>
                                            <div class='lead'>
                                                <i class='icon-github text-contrast'></i>
                                                Login Info
                                            </div>
                                            <small class='text-muted'>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec nisl est, vulputate at porttitor non, interdum a mauris.
                                                Phasellus imperdiet gravida pulvinar.
                                            </small>
                                        </div>
                                        <div class='col-sm-7 col-sm-offset-1'>
                                            <div class='form-group'>
                                                <label>Username</label>
                                                <input class='form-control' id='username' placeholder='Username'
                                                       type='text'>
                                            </div>
                                            <div class='form-group'>
                                                <label>E-mail</label>
                                                <input class='form-control' id='email' placeholder='E-mail' type='text'>
                                            </div>
                                            <hr class='hr-normal'>
                                            <div class='form-group'>
                                                <div class='controls'>
                                                    <div class='checkbox'>
                                                        <label>
                                                            <input data-target='#change-password' data-toggle='collapse'
                                                                   id='changepasswordcheck' type='checkbox'
                                                                   value='option1'>
                                                            Change password?
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='collapse' id='change-password'>
                                                <div class='form-group'>
                                                    <label>Password</label>
                                                    <input class='form-control' id='password' placeholder='Password'
                                                           type='password'>
                                                </div>
                                                <div class='form-group'>
                                                    <label>Password confirmation</label>
                                                    <input class='form-control' id='password-confirmation'
                                                           placeholder='Password confirmation' type='password'>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr class='hr-normal'>
                                    <fieldset>
                                        <div class='col-sm-4'>
                                            <div class='lead'>
                                                <i class='icon-user text-contrast'></i>
                                                Company info
                                            </div>
                                            <small class='text-muted'>Proin eu nibh ut urna tristique rhoncus. Sed
                                                euismod, quam sed dignissim imperdiet, nulla leo vehicula mi, a sagittis
                                                lacus augue nec sapien.
                                            </small>
                                        </div>
                                        <div class='col-sm-7 col-sm-offset-1'>
                                            <div class='form-group'>
                                                <label>Company name</label>
                                                <input class='form-control' id='txtComName' placeholder='Company name'
                                                       type='text'>
                                            </div>
                                            <div class='form-group'>
                                                <label>Company address</label>
                                                <input class='form-control' id='txtComAdd' placeholder='Company address'
                                                       type='text'>
                                            </div>
                                            <hr class='hr-normal'>
                                            <div class='form-group'>
                                                <label>Phone</label>
                                                <input class='form-control' id='txtPhone' placeholder='Contact Number'
                                                       type='text'>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class='form-actions form-actions-padding' style='margin-bottom: 0;'>
                                        <div class='text-right'>
                                            <div class='btn btn-primary btn-lg'>
                                                <i class='icon-save'></i>
                                                Save
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer id='footer'>
            <div class='footer-wrapper'>
                <div class='row'>
                    <div class='col-sm-6 text'>Copyright ? 2013 Dev Seahouse</div>
                    <div class='col-sm-6 buttons'>
                        <a class="btn btn-link" href="">Preview</a>
                        <a class="btn btn-link"
                           href="https://github.com/dev-seahouse">FYP Project</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</section>
</div>
<!-- / jquery [required] -->
<script src="assets/javascripts/jquery/jquery-2.0.3.min.js" type="text/javascript"></script>
<!-- / jquery mobile (for touch events) -->
<script src="assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
<!-- / jquery migrate (for compatibility with new jquery) [required] -->
<script src="assets/javascripts/jquery/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- / jquery ui -->
<script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
<!-- / jQuery UI Touch Punch -->
<script src="assets/javascripts/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js"
        type="text/javascript"></script>
<!-- / bootstrap [required] -->
<script src="assets/javascripts/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<!-- / modernizr -->
<script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
<!-- / retina -->
<script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
<!-- / theme file [required] -->
<script src="assets/javascripts/theme.js" type="text/javascript"></script>
<!-- / demo file [not required!] -->
<script src="assets/javascripts/demo.js" type="text/javascript"></script>
<!-- / START - page related files and scripts [optional] -->

<!-- / END - page related files and scripts [optional] -->
</body>
</html>