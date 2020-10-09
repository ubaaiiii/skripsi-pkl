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
   <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
         <div class="content-header row">
         </div>
         <div class="content-body">
            <section class="row flexbox-container">
               <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
                  <div class="card bg-authentication rounded-0 mb-0">
                     <div class="row m-0">
                        <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                           <img src="<?= base_url('vuexy/app-assets/images/pages/forgot-password.png'); ?>" alt="branding logo">
                        </div>
                        <div class="col-lg-6 col-12 p-0">
                           <div class="card rounded-0 mb-0 px-2 py-1">
                              <div class="card-header pb-1">
                                 <div class="card-title">
                                    <h4 class="mb-0">Pulihkan Katasandi</h4>
                                 </div>
                              </div>
                              <p class="px-2 mb-0">Harap masukkan email yang terdaftar, akan kami kirim link ubah katasandi.</p>
                              <div class="card-content">
                                 <div class="card-body">
                                    <form action="index.html">
                                       <div class="form-label-group">
                                          <input type="email" id="inputEmail" class="form-control" placeholder="Email">
                                          <label for="inputEmail">Email</label>
                                       </div>
                                    </form>
                                    <div class="float-md-left d-block mb-1">
                                       <a href="<?= base_url('auth'); ?>" class="btn btn-outline-primary btn-block px-75">Kembali ke Login</a>
                                    </div>
                                    <div class="float-md-right d-block mb-1">
                                       <a href="#" class="btn btn-primary btn-block px-75">Kirim</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
         </section>

      </div>
   </div>
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

</body>
<!-- END: Body-->

</html>