<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/controllers/processManagementComment.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>IMF Management Application - Manage Feedback</title>
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
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/plugins/datatables/dataTables.tableTools.min.css">
    <link rel="stylesheet" type="text/css"
          href="assets/stylesheets/plugins/bootstrap_modal/bootstrap-modal-bs3patch.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/plugins/bootstrap_modal/bootstrap-modal.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/plugins/alertify/alertify.core.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/plugins/alertify/alertify.default.css">

    <!--[if lt IE 9]>
    <script src="assets/javascripts/compatibility/html5shiv.js" type="text/javascript"></script>
    <script src="assets/javascripts/compatibility/response.min.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body class='contrast-blue without-footer fixed-header fixed-navigation'>
<header>
<nav class='navbar navbar-default navbar-fixed-top'>
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
            <span class='user-name'><?= $_SESSION["company_name"] ?></span> <b class='caret'></b>
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
<nav id='main-nav' class="main-nav-fixed">
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
                <a href="canceljob.php">
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
                <a href="managecomment.php">
                    <i class='icon-star-half-empty'></i>
                    <span>Manage Feedback</span>
                </a>

            </li>
            <li class=''>
                <a href="contact.php">
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

            <!-- Main Column -->
            <div class='col-xs-12'>

                <!--col-sm-12 div sitting inside main row so that all contents inside stacked when screen change-->
                <div class="row"><!--col-xs-12 > row inside responsive column-xs-12, -->
                    <div class="col-sm-12"><!--col-sm-12 This is for main header -->
                        <div class='page-header'>
                            <h1 class='pull-left'>
                                <i class='icon-table'></i>
                                <span>Manage Feedback</span>
                            </h1>

                            <div class='pull-right'>
                                <ul class='breadcrumb'>
                                    <li>
                                        <a href='viewjob.php'>
                                            <i class='icon-suitcase'>
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Header -->
                    </div>
                    <!-- Wrapper col-sm-12 for header div -->
                </div>
                <!--Content two columns layout-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='box bordered-box orange-border' style='margin-bottom:0;'>
                                    <div class='box-header contrast-background'>
                                    </div>
                                    <div class='box-content box-no-padding'>
                                        <div class='responsive-table'>
                                            <div class='scrollable-area'>
                                                <table
                                                    class='table-bordered table-striped'
                                                    style='margin-bottom:0;'
                                                    id="tbViewComment">
                                                    <thead>
                                                    <!-- TODO: Add hidden Id column for database -->
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>IC</th>
                                                        <th>Comment Date</th>
                                                        <th>Comment Time</th>
                                                        <th>Rating</th>
                                                        <th>Comment</th>
                                                        <th></th>

                                                    </tr>
                                                    </thead>
                                                    <tbody id="display_comment">


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>IC</th>
                                                        <th>Comment Date</th>
                                                        <th>Comment Time</th>
                                                        <th>Rating</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Comment modal -->
                                        <div class='modal fade' id='modalEditComment' tabindex='-1'
                                             style="display: none;">

                                            <div class='modal-content'>
                                                <div class='modal-header contrast' id="vacancy_header">
                                                    Edit Comment -<span class="text-muted" id="name_text"></span>
                                                </div>
                                                <div class='modal-body'>
                                                    <div class='box box-bordered contrast-border  box-nomargin'>
                                                        <div class='box-header box-header-small contrast-background'>
                                                            <div class='title'>Rating</div>
                                                        </div>
                                                        <div class='box-content box-transparent'>
                                                            <div class="edit_rating">
                                                            </div>
                                                            <small class="error text-red"></small>
                                                        </div>
                                                    </div>


                                                    <div class='box box-bordered contrast-border box-nomargin'>
                                                        <div class='box-header box-header-small contrast-background'>
                                                            <div class='title'>Comment</div>
                                                        </div>
                                                        <div class='box-content'>
                                                            <textarea
                                                                class='comment-content form-control char-max-length autosize '
                                                                maxlength='400'

                                                                placeholder='This field has limit of 400 chars'
                                                                rows='4' style='margin-bottom: 0;'></textarea>
                                                            <small class="text-red error1"></small>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- button field -->
                                                <div class='modal-footer'>
                                                    <button class='btn btn-danger' data-dismiss='modal'
                                                            type='button'>Close
                                                    </button>
                                                    <button class='btn btn-success update'
                                                            type='button'>Update
                                                    </button>
                                                </div>
                                                <!-- button field -->
                                            </div>

                                        </div>
                                        <!-- Comment modal -->
                                        <!-- Box Content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                    </div>

                </div>

                <!-- Content two columns layout -->
                <!-- End col-xs-12 > row -->
            </div>
            <!--End Main Column-->
            <!-- End container.row.col-xs-12-->
        </div>

        <!-- End container.row -->
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
        <!--Footer -->
    </div>
    <!-- Container -->
</section>
</div>
<!-- Wrapper -->
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
<script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
<!-- / modernizr -->
<script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
<!-- / retina -->
<script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/autosize/jquery.autosize-min.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/bootstrap_maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- / demo file [not required!] -->
<script src="assets/javascripts/demo.js" type="text/javascript"></script>
<!-- / START - page related files and scripts [optional] -->
<script src="assets/javascripts/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/datatables/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/bootstrap_modal/bootstrap-modal.js"></script>
<script src="assets/javascripts/plugins/bootstrap_modal/bootstrap-modalmanager.js"></script>
<script src="assets/javascripts/plugins/datatables/dataTables.overrides.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/alertify/alertify.min.js"></script>
<script src="assets/javascripts/plugins/datatables/dataTables.tableTools.min.js"></script>
<script src="assets/javascripts/plugins/rating/jquery.raty.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).ready(function () {
            var body, click_event, content, nav, nav_toggler;
            nav_toggler = $("header .toggle-nav");
            nav = $("#main-nav");
            content = $("#content");
            body = $("body");
            click_event = (jQuery.support.touch ? "tap" : "click");
            $('#main-nav .dropdown-collapse').on(click_event, function (e) {
                var link, list;
                e.preventDefault();
                link = $(this);
                list = link.parent().find("> ul");
                if (list.is(":visible")) {
                    if (body.hasClass("main-nav-closed") && link.parents("li").length === 1) {
                        false;
                    } else {
                        link.removeClass("in");
                        list.slideUp(300, function () {
                            return $(this).removeClass("in");
                        });
                    }
                } else {
                    if (list.parents("ul.nav.nav-stacked").length === 1) {
                        $(document).trigger("nav-open");
                    }
                    link.addClass("in");
                    list.slideDown(300, function () {
                        return $(this).addClass("in");
                    });
                }
                return false;
            });
            if (jQuery.support.touch) {
                nav.on("swiperight", function (e) {
                    return $(document).trigger("nav-open");
                });
                nav.on("swipeleft", function (e) {
                    return $(document).trigger("nav-close");
                });
            }
            nav_toggler.on(click_event, function () {
                if (nav_open()) {
                    $(document).trigger("nav-close");
                } else {
                    $(document).trigger("nav-open");
                }
                return false;
            });
            $(document).bind("nav-close", function (event, params) {
                var nav_open;
                body.removeClass("main-nav-opened").addClass("main-nav-closed");
                return nav_open = false;
            });
            return $(document).bind("nav-open", function (event, params) {
                var nav_open;
                body.addClass("main-nav-opened").removeClass("main-nav-closed");
                return nav_open = true;
            });
        });

        nav_open = function () {
            return $("body").hasClass("main-nav-opened") || $("#main-nav").width() > 50;
        };


            $("body").on("mouseenter", ".has-popover", function () {
                var el;
                el = $(this);
                if (el.data("popover") === undefined) {
                    el.popover({
                        placement: el.data("placement") || "top",
                        container: "body"
                    });
                }
                return el.popover("show");
            });
            $("body").on("mouseleave", ".has-popover", function () {
                return $(this).popover("hide");
            });


        setMaxSize();
        setAutoSize();
        loadComments();
        $('#tbViewComment').on('click', '.btn-add-comment', addComment);
        $('#tbViewComment').on('click', '.btn-edit-comment', editComment);

    });

    //    function addComments(myButton){
    //        var user_id=$(myButton).data("user_id");
    //        var tr=$(myButton).closest('tr');
    //        var username=($(tr).children(".user_name").text());
    //
    //    }

    function editComment(){
        var currentRow = ($(this).closest('tr'));
        var user_name = $(currentRow).children(".td_user_name").text();
        var jobapp_id = ($(this).data("jobapp_id"));
        var raty_div= $(currentRow).children("td").find(".raty");
        //get existing rating score
        var rating=$(raty_div).data("score");
        //set existing rating score
        var $modal = $("#modalEditComment");
        $('#name_text').html(user_name);
        $('#modalEditComment').modal('show');
        $('.edit_rating').raty({

            half: true,
            path: 'assets/images/plugins/rating',
            score:rating
        });
        //get existing comments
        var comment_original= $(currentRow).children(".td_comment").data("comment");
        //set new comment box value;
        var comment_content = $('.comment-content').val(comment_original);
        //trigger autosize
        $(".comment-content").fadeIn(function(){
            $(this).autosize();
        });


        $modal.one('click', '.update', function () {
            //get new rating
            rating = $(".edit_rating").find("input[name='score']").val();
            //get new comment
            comment_content = $('.comment-content').val();
            //error handling
            if (!rating) {
                var error_container = $(".edit_rating").siblings(".error");
                error_container.html(" Rating cannot be empty!");
                error_container.addClass('icon-remove');
                error_container.fadeOut(2000);
                return false;
            }
            if (!comment_content) {
                var error_container = $(".comment-content").siblings(".error1");
                error_container.html(" Comment cannot be empty!!");
                error_container.addClass('icon-remove');
                error_container.fadeOut(2000);
                return false;
            }

            // Ajax call here
            $.ajax({
                type: "POST",
                url: "controllers/processManagementComment.php",
                data: {
                    update_comment: 1,
                    jobapp_id: jobapp_id,
                    comment_content: comment_content,
                    rating: rating
                },
                crossDomain: true,
                success: function (result) {

                    if (result.trim() == "success") {

                        alertify.success("Comment updated!");
                        $modal.modal("hide");

                        loadComments();
                        //clear comment textarea for new input


                    }else{
                        alertify.error("An error has occurred, please try again.");
                        $modal.modal("hide");
                    }
                }

            });
            // ajax call ends
        });
    }

    function addComment() {
        var currentRow = ($(this).closest('tr'));
        var user_name = $(currentRow).children(".td_user_name").text();
        var jobapp_id = ($(this).data("jobapp_id"));
        var user_id=($(this).data("userid"));

        var $modal = $("#modalEditComment");
        $('#name_text').html(user_name);
        $('#modalEditComment').modal('show');
        $('.edit_rating').raty({
            half: true,
            path: 'assets/images/plugins/rating',
            score: function () {
                return $(this).attr('data-score');
            }
        });
        // the one method is something important to take note and look into in detail in future.It is related to javascript
        // even handling.
        $modal.one('click', '.update', function () {
            var rating = $(".edit_rating").find("input[name='score']").val();
            var comment_content = $('.comment-content').val();

            if (!rating) {
                var error_container = $(".edit_rating").siblings(".error");
                error_container.html(" Rating cannot be empty!");
                error_container.addClass('icon-remove');
                error_container.fadeOut(2000);
                return false;
            }
            if (!comment_content) {
                var error_container = $(".comment-content").siblings(".error1");
                error_container.html(" Comment cannot be empty!!");
                error_container.addClass('icon-remove');
                error_container.fadeOut(2000);
                return false;
            }

            // Ajax call here
            $.ajax({
                type: "POST",
                url: "controllers/processManagementComment.php",
                data: {
                    add_comment: 1,
                    user_id:user_id,
                    jobapp_id: jobapp_id,
                    user_name: user_name,
                    comment_content: comment_content,
                    rating: rating
                },
                crossDomain: true,
                success: function (result) {
                    if (result.trim() == "success") {
                        alertify.success("New comment added!");
                        $modal.modal("hide");

                        loadComments();
                        //clear comment textarea for new input
                        $('.comment-content').val("");

                    }else{

                        alertify.error("An error has occurred, please try again.");
                        $modal.modal("hide");

                    }
                }

            });

            // ajax call ends
        });
    }


    function loadComments() {
        $.ajax({
            type: "POST",
            url: "controllers/processManagementComment.php",
            data: {

                display_comment: 1

            },
            crossDomain: true,
            success: function (result) {

                $("#display_comment").html(result);
                $('.raty').raty({
                    half: true,
                    readOnly: true,
                    path: 'assets/images/plugins/rating',
                    score: function () {
                        return $(this).attr('data-score');
                    }
                });
                loadDataTable();


            }

        });
    }

    function loadDataTable() {

        var sdom = "<'row'<'col-sm-12'T>><'row datatables-top'<'col-sm-6'l><'col-sm-6 text-right'f>r>t<'row datatables-bottom'<'col-sm-6'i><'col-sm-6 text-right'p>>";
        $("#tbViewComment").addClass("table table-hover data-table-column-filter ");
        var dt = $("#tbViewComment").dataTable(
            {
                "aaSorting": [
                    [ 2, "desc" ]
                ],
                sDom: sdom,
                "oTableTools": {
                    "aButtons": ["copy",
                        "print", {
                            "sExtends": "collection",
                            "sButtonText": 'Save <span class="caret" />',
                            "aButtons": [ "csv", "xls", "pdf" ]
                        }],
                    "sSwfPath": "libraries/swf/copy_csv_xls_pdf.swf"
                },

                sPaginationType: "bootstrap",
                bRetrieve:true,
                bDestroy:true,
                "iDisplayLength": $(this).data("pagination-records") || 10,
                oLanguage: {
                    sLengthMenu: "_MENU_ records per page"}
            }
        );
        dt.columnFilter();
        dt.closest('.dataTables_wrapper').find('div[id$=_filter] input').css("width", "200px");
        dt.closest('.dataTables_wrapper').find('input').addClass("form-control input-sm").attr('placeholder', 'Search');

    }

    function setMaxSize() {
        $(".char-max-length").maxlength();

    }

    function setAutoSize() {
        $(".autosize").autosize();
    }
</script>

<!-- / END - page related files and scripts [optional] -->
</body>
</html>