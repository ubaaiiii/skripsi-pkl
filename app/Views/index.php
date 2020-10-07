<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title><?= $title; ?> | PKL Mandalahayu</title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('images/favicon/apple-icon-57x57.png'); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('images/favicon/apple-icon-60x60.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('images/favicon/apple-icon-72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('images/favicon/apple-icon-76x76.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('images/favicon/apple-icon-114x114.png'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('images/favicon/apple-icon-120x120.png'); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('images/favicon/apple-icon-144x144.png'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('images/favicon/apple-icon-152x152.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('images/favicon/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('images/favicon/android-icon-192x192.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('images/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('images/favicon/favicon-96x96.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('images/favicon/favicon-32x32.png'); ?>">
    <link rel="manifest" href="<?= base_url('images/favicon/manifest.json'); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url('images/favicon/ms-icon-144x144.png'); ?>">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/vendors.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/tables/datatable/datatables.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/calendars/fullcalendar.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/calendars/extensions/daygrid.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/calendars/extensions/timegrid.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/pickers/pickadate/pickadate.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/forms/select/select2.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/extensions/toastr.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/extensions/sweetalert2.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/bootstrap-extended.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/colors.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/components.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/themes/dark-layout.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/themes/semi-dark-layout.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/core/menu/menu-types/vertical-menu.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/core/colors/palette-gradient.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/pages/app-todo.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/plugins/calendars/fullcalendar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/plugins/forms/validation/form-validation.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/plugins/extensions/toastr.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/assets/css/style.css'); ?>">
    <script src="<?= base_url('vuexy/app-assets/vendors/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/extensions/toastr.min.js'); ?>"></script>
    <script>
        var base_url = "<?= base_url(); ?>";
    </script>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns todo-application navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <?php if ($session->user_level == 'Siswa') { ?>
                            <ul class="nav navbar-nav bookmark-icons">
                                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Kegiatan"><i class="ficon feather icon-check-square"></i></a></li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Absensi"><i class="ficon feather icon-clock"></i></a> </li>
                            </ul>
                        <?php } ?>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"> <a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                            </div>
                                            <small> <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a> <a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6> <small class="notification-text">You got new order of goods.</small>
                                            </div>
                                            <small> <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                        </div>
                                    </a> <a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                            <div class="media-body">
                                                <h6 class="danger media-heading yellow darken-3">Warning notifixation </h6><small class="notification-text">Server have 99% CPU usage.</small>
                                            </div>
                                            <small> <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                        </div>
                                    </a> <a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                            </div>
                                            <small> <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                        </div>
                                    </a> <a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                            <div class="media-body">
                                                <h6 class="warning media-heading">Generate monthly report</h6> <small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                            </div>
                                            <small> <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                        </div>
                                    </a> </li>
                                <li class="dropdown-menu-footer"> <a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a> </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-bold-600"><?= $session->user_nama; ?></span>
                                    <span class="user-status"><?= $session->user_level; ?></span>
                                </div>
                                <span>
                                    <img class="round" style="object-fit: cover; object-position: 100% 0;" src="<?= base_url('images/users/') . "/" . $session->user_foto; ?>" alt="avatar" height="40" width="40">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?= base_url('profile'); ?>">
                                    <i class="feather icon-user"></i> Edit Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('tugas/absensi'); ?>">
                                    <i class="feather icon-clock"></i> Absensi
                                </a>
                                <a class="dropdown-item" href="<?= base_url('tugas/kegiatan'); ?>">
                                    <i class="feather icon-check-square"></i> Kegiatan
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">
                                    <i class="feather icon-power"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"> <a class="navbar-brand" href="/">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0" style="letter-spacing: -1.5px;">Mandalahayu</h2>
                    </a> </li>
                <li class="nav-item nav-toggle"> <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"> <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i> </a> </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span>Halaman Utama</span>
                <li class=" nav-item"><a href="/"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a> </li>
                <li class=" nav-item"><a href="/profile"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Profile">Profile</span></a> </li>
                <li class=" navigation-header"><span>Menu</span> </li>
                <?php
                switch ($session->user_level) {
                    case ("Siswa"):
                ?>
                        <li class=" nav-item"><a href=""><i class="fa fa-list-alt"></i><span class="menu-title" data-i18n="Tugas">Tugas</span></a>
                            <ul class="menu-content">
                                <li><a href="<?= base_url('tugas/absensi'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Absensi">Absensi</span></a> </li>
                                <li><a href="<?= base_url('tugas/kegiatan'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Agenda Kegiatan">Agenda Kegiatan</span></a> </li>
                            </ul>
                        </li>
                        <li class=" nav-item"><a href="#"><i class="fa fa-th-list"></i><span class="menu-title" data-i18n="Data">Data</span></a>
                            <ul class="menu-content">
                                <li><a href="<?= base_url('data/nilai'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Nilai">Nilai</span></a> </li>
                            </ul>
                        </li>
                    <?php
                        break;
                    case ("Pembimbing"):
                    ?>
                        <li class=" nav-item"><a href="#"><i class="feather icon-monitor"></i><span class="menu-title" data-i18n="Monitoring">Monitoring</span></a>
                            <ul class="menu-content">
                                <li><a href="<?= base_url('monitoring/absensi'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Absen Siswa">Absen Siswa</span></a> </li>
                                <li><a href="<?= base_url('monitoring/kegiatan'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Kegiatan Siswa">Kegiatan Siswa</span></a> </li>
                            </ul>
                        </li>
                    <?php
                        break;
                    case ("Admin"):
                    ?>
                        <li class=" nav-item"><a href="#"><i class="fa fa-th-list"></i><span class="menu-title" data-i18n="Data">Data</span></a>
                            <ul class="menu-content">
                                <li><a href="<?= base_url('data/siswa'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Siswa">Siswa</span></a> </li>
                                <li><a href="<?= base_url('data/nilai'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Nilai">Nilai</span></a> </li>
                                <li><a href="<?= base_url('data/pembimbing'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Pembimbing">Pembimbing</span></a> </li>
                                <li><a href="<?= base_url('data/perusahaan'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Perusahaan">Perusahaan</span></a> </li>
                                <li><a href="<?= base_url('data/admin'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Admin">Admin</span></a> </li>
                                <li><a href="<?= base_url('data/jadwal'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Jadwal PKL">Jadwal PKL</span></a> </li>
                            </ul>
                        </li>
                        <li class=" nav-item"><a href="#"><i class="fa fa-cog"></i><span class="menu-title" data-i18n="Proses">Proses</span></a>
                            <ul class="menu-content">
                                <li><a href="<?= base_url('proses/naik_kelas'); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Naik Kelas">Naik Kelas</span></a> </li>
                            </ul>
                        </li>
                <?php break;
                } ?>
            </ul>
        </div>
    </div><?= $this->renderSection('content'); ?> <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content"> </div>
        </div>
    </div>
    <div class="modal fade text-left" id="extra-large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content"> </div>
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <footer class="footer footer-static footer-light">
        <!-- <p class="clearfix blue-grey lighten-2 mb-0"> <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span> <span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span> <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button> </p>Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> -->
    </footer>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/extensions/moment.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/calendar/fullcalendar.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/calendar/extensions/daygrid.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/calendar/extensions/timegrid.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/calendar/extensions/interactions.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/pickers/pickadate/picker.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/pickers/pickadate/picker.date.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/forms/select/select2.full.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/extensions/sweetalert2.all.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/extensions/polyfill.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/js/core/app-menu.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/js/core/app.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/js/scripts/components.js'); ?>"></script>
    <script src="<?= base_url('app-assets/js/script/siswa.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/tables/datatable/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/tables/datatable/vfs_fonts.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/tables/datatable/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/tables/datatable/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/tables/datatable/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js'); ?>"> </script>
    <script src="<?= base_url('vuexy/app-assets/js/scripts/forms/validation/form-validation.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/js/scripts/forms/select/form-select2.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/js/scripts/extensions/toastr.js'); ?>"></script>
    <?php if (isset($script)) {
        echo $script;
    }; ?>
    <script>
        $(document).ready(function() {
            var $elem = $('span:contains("<?= $subtitle; ?>")').filter(function() {
                return $(this).text() === '<?= $subtitle; ?>';
            }).closest('li');
            $elem.addClass('active');
            $elem.closest('li.has-sub').addClass('open');
        });
    </script>
</body>

</html>