<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="Shortcut Icon" type=image/png href="/admin/images/logologo.png" >
    <title>SM2-Real Estate</title>
    <meta name="description" content="sm2realestate">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/admin/reg.css">
    <link rel="apple-touch-icon" href="/admin/apple-icon.png">

    <link rel="stylesheet" href="/admin/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/admin/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/admin/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/admin/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/admin/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="/admin/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">SM2</a>
                <a class="navbar-brand hidden" href="./">SM2</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="a_index"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Tables</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="manage_reg">Registertion Table</a></li>
                            <li><i class="fa fa-table"></i><a href="manage_hire">Hire</a></li>
                            <li><i class="fa fa-table"></i><a href="manage_feedback">Feedbacks</a></li>
                            <li><i class="fa fa-table"></i><a href="manage_houseier">Houseier</a></li>
                            <li><i class="fa fa-table"></i><a href="manage_buyer">Registered Home Buyer </a></li>
                            <li><i class="fa fa-table"></i><a href="manage_tenant">Registered_Tenant</a></li>



                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Dynamic Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="manage_home_latest_property">Home_latest_property</a></li>

                            <li><i class="fa fa-table"></i><a href="manage_about">About</a></li>
                            <li><i class="fa fa-table"></i><a href="manage_property_detail_buy">Property_Detail_Buy</a></li>
                            <li><i class="fa fa-table"></i><a href="manage_house_from_houseier">Property_Detail_Houseier</a></li>


                        </ul>
                    </li>




                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        {{-- <button class="search-trigger"><i class="fa fa-search"></i></button> --}}
                        {{-- <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div> --}}



                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/admin/admin.jpg" alt="User Avatar"  height="30rem" >
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="editadmin"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" href="logout"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>


                </div>
            </div>

        </header><!-- /header -->

  <script src="/admin/jquery/dist/jquery.min.js"></script>
    <script src="/admin/popper.js/dist/umd/popper.min.js"></script>
    <script src="/admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/admin/js/main.js"></script>


    <script src="/admin/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="/admin/js/dashboard.js"></script>
    <script src="/admin/js/widgets.js"></script>
    <script src="/admin/dist/jquery.vmap.min.js"></script>
    <script src="/admin/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="/admin/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
    </body>
    </html>
    @yield('master')

