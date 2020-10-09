<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

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

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/vendors.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/forms/select/select2.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/extensions/toastr.css'); ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/bootstrap-extended.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/colors.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/components.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/themes/dark-layout.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/themes/semi-dark-layout.css'); ?>">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/core/menu/menu-types/vertical-menu.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/core/colors/palette-gradient.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/pages/authentication.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/css/plugins/extensions/toastr.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/app-assets/vendors/css/extensions/sweetalert2.min.css'); ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('vuexy/assets/css/style.css'); ?>">
    <!-- END: Custom CSS-->

    <script src="<?= base_url('vuexy/app-assets/vendors/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/extensions/toastr.min.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/vendors/js/extensions/sweetalert2.all.min.js'); ?>"></script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <?= $this->renderSection('content'); ?>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url('vuexy/app-assets/vendors/js/forms/select/select2.full.min.js'); ?>"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('vuexy/app-assets/js/core/app-menu.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/js/core/app.js'); ?>"></script>
    <script src="<?= base_url('vuexy/app-assets/js/scripts/components.js'); ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url('vuexy/app-assets/js/scripts/extensions/toastr.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            <?php
            echo $session->getFlashdata('message');
            if ($session->getFlashdata('message') != null) {
                echo "
                    Swal.fire(
                        'Kesalahan!',
                        '" . $session->getFlashdata('message') . "',
                        'error'
                    );
                    ";
            }
            ?>
        });
    </script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>