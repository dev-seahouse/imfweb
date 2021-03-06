<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/controllers/processcanceljob.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>IMF Management Application - Cancel Job</title>
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
    <!-- ============= Plugin css file ====================== -->
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/plugins/datatables/dataTables.tableTools.min.css">
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
            <span class='user-name'><?= $_SESSION["company_name"] ?></span> <b class='caret'></b>
        </a>
        <ul class='dropdown-menu'>
            <li>
                <a href='user_profile.php'>
                    <i class='icon-user'></i>
                    Company Profile
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
<div class="bb-alert alert alert-info" style="display:none;">
    <span id="infor_txt">Dummy text for info alert</span>
</div>
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
                <a href="#">
                    <i class='icon-envelope'></i>
                    <span>Contact Support</span>
                </a>
            </li>
            <li class=''>
                <a href='controllers/processlogin.php?logout'>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class='page-header'>
                            <h1 class='pull-left'>
                                <i class='icon-remove'></i>
                                <span>Cancel Job</span>
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
                        <!-- col-sm-12.page-header -->

                    </div>
                    <!-- col-sm-12 wrapper row for header-->
                </div>
                <!-- Main row 1 nested indie col-xs-12, containing the header-->
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
                                                    class='data-table-column-filter dt-sort-desc1 table-hover table table-bordered table-striped'
                                                    style='margin-bottom:0;'
                                                    id="tbViewJob">
                                                    <thead>
                                                    <!-- TODO: Add hidden Id column for database -->
                                                    <tr>
                                                        <th>
                                                            Date
                                                        </th>
                                                        <th>
                                                            Job Scope
                                                        </th>
                                                        <th>
                                                            Status
                                                        </th>
                                                        <th>
                                                            Vacancies
                                                        </th>
                                                        <th>
                                                            Start Time
                                                        </th>
                                                        <th>

                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="cancel_job_data">

                                                    <?php display_cancel_job() ?>

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Job Date</th>
                                                        <th>Job Scope</th>
                                                        <th>Status</th>
                                                        <th>Vacancies</th>
                                                        <th>Start Time</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- Modal -->
                                            <!-- TODO:Add google map into modal after experimenting one google map api-->
                                            <div class='modal fade' id='modalJobDetail' tabindex='-1'>
                                                   <div class="modal-dialog">
                                                    <div class='modal-content'>
                                                        <div class='modal-header contrast' id="vacancy_header">
                                                            Vacancies
                                                        </div>
                                                        <div class='modal-body'>
                                                            <table class="table table-bordered table-stripped">
                                                                <thead>
                                                                <tr>
                                                                    <th>Total Job Vacancies Needed</th>
                                                                    <th>Job Vacancies Left</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="vacancy_data">

                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class='modal-header contrast'>
                                                            Current Applicants
                                                        </div>
                                                        <div class='modal-body' id="php_modal_data">

                                                        </div>

                                                        <div class='modal-footer'>
                                                            <button class='btn btn-danger' data-dismiss='modal'
                                                                    type='button'>Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <!-- loading indicator -->
                                            <div class="modal hide" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-header">
                                                    <h1>Processing...</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="progress progress-striped active">
                                                        <div class="bar" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End loading indicator-->

                                        </div>
                                        <!-- Box Content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                    </div>
                    <!--div.row-->
                </div>
            </div>
            <!--div.row.col-xs-12-->
        </div>
        <!--div.row -->
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
    <!--div.container -->
</section>
</div>
<!-- body wrapper -->
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
<!-- / theme file [required] -->
<script src="assets/javascripts/theme.js" type="text/javascript"></script>
<!-- / demo file [not required!] -->
<script src="assets/javascripts/demo.js" type="text/javascript"></script>
<!-- / START - page related files and scripts [optional] -->
<script src="assets/javascripts/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/datatables/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/datatables/dataTables.overrides.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/datatables/dataTables.tableTools.min.js"></script>
<script src="assets/javascripts/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script>
    //    $("#tbViewJob").dataTable().fnSort([0,'desc']);
</script>
<!-- / END - page related files and scripts [optional] -->
<script type="text/javascript">

    function loadnames(jobid, job_vac, job_vac_left) {

        $.ajax({
            type: "POST",
            url: "controllers/processcanceljob.php",
            crossDomain: true,
            data: {
                job_id: jobid,
                job_vac: job_vac,
                job_vac_left: job_vac_left,
                show_vacancy: 1
            },
            dataType: 'text',
            timeout: 5000,
            success: function (response) {

                $('#vacancy_data').html(
                    '<tr><td>' + job_vac + '<td>' + job_vac_left + '</tr>'
                )
                $('#php_modal_data').empty()
                $('#php_modal_data').append(response);
                $('#modalJobDetail').modal('show');
            }
        });
    }

    function cancel_job(jobid) {
        bootbox.dialog({
            message: "<div class='alert alert-warning'><h4><i class='icon-exclamation-sign'> Attention</i></h4>Upon cancelling job, affected job applicants would be informed."+"<br>"+" Do you want to continue this action?</div>",
            title: "Are you sure?",
            buttons: {
                success: {
                    label: "No",
                    className: "btn btn-default btn-md",
                    callback: function() {


                    }
                },
                danger: {
                    label: "Yes",
                    className: "btn btn-danger btn-md",
                    callback: function() {
                        $.ajax({
                            type: "POST",
                            url: "controllers/processcanceljob.php",
                            crossDomain: true,
                            data: {
                                job_id: jobid,
                                cancel_job: 1
                            },
                            dataType: 'text',
                            beforeSend:function(){
                                myApp.showPleaseWait();
                            },
                            complete:function(){
                                myApp.hidePleaseWait();
                            },

                            success: function (response) {

                                $('#cancel_job_data').html(response);
                                $('.bb-alert').show(function () {
                                    $(this).find("span").html("Job Cancelled!");
                                    $(this).delay(400).fadeIn().delay(2500).fadeOut();
                                });
                            },
                            error: function(response){

                                $('.bb-alert').show(function () {
                                    $(this).find("span").html("Something went wrong, please refresh page and try later.");
                                    $(this).delay(400).fadeIn().delay(2500).fadeOut();
                                });
                            }
                        });
                    }
                }
            }
        });

    }

    var myApp;
    myApp = myApp || (function () {
        var pleaseWaitDiv = $('<div class="modal fade" id="pleaseWaitDialog" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" style="position:fixed;top:40% !important;"><div class="modal-dialog center-block"><div class="modal-content"><div class="modal-header"><span class="text-sea-blue"><i class="icon-2x icon-spinner icon-spin"></i> Processing, please wait just a moment..</span></div><div class="modal-body"></div></div></div></div>');
        return {
            showPleaseWait: function() {
                pleaseWaitDiv.modal();
            },
            hidePleaseWait: function () {
                pleaseWaitDiv.modal('hide');
            }

        };
    })();



</script>
</body>
</html>