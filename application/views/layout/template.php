<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title id="judul">SIAKAD</title>
    <meta name="description" content="Sistem Informasi Akademik Universitas Bahaudin Mudhary Madura">
    <meta name="keywords" content="SIAKAD UNIBA MADURA">
    <meta name="DC.title" content="">
    <meta name="author" content="Yosi Bagus Sadar Rasuli">

    <meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
    <meta name="setting_options" content='{&quot;saveLocal&quot;:&quot;sessionStorage&quot;,&quot;storeKey&quot;:&quot;huisetting&quot;,&quot;setting&quot;:{&quot;app_name&quot;:{&quot;value&quot;:&quot;UNIBA MADURA&quot;},&quot;theme_scheme_direction&quot;:{&quot;value&quot;:&quot;ltr&quot;},&quot;theme_scheme&quot;:{&quot;value&quot;:&quot;light&quot;},&quot;theme_style_appearance&quot;:{&quot;value&quot;:[&quot;theme-default&quot;]},&quot;theme_color&quot;:{&quot;colors&quot;:{&quot;--{{prefix}}primary&quot;:&quot;#3a57e8&quot;,&quot;--{{prefix}}info&quot;:&quot;#08B1BA&quot;},&quot;value&quot;:&quot;theme-color-default&quot;},&quot;theme_transition&quot;:{&quot;value&quot;:&quot;theme-with-animation&quot;},&quot;theme_font_size&quot;:{&quot;value&quot;:&quot;theme-fs-md&quot;},&quot;page_layout&quot;:{&quot;value&quot;:&quot;container-fluid&quot;},&quot;header_navbar&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;header_banner&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;sidebar_color&quot;:{&quot;value&quot;:&quot;sidebar-white&quot;},&quot;card_color&quot;:{&quot;value&quot;:&quot;card-default&quot;},&quot;sidebar_type&quot;:{&quot;value&quot;:[]},&quot;sidebar_menu_style&quot;:{&quot;value&quot;:&quot;left-bordered&quot;},&quot;footer&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;body_font_family&quot;:{&quot;value&quot;:null},&quot;heading_font_family&quot;:{&quot;value&quot;:null}}}'>
    <link rel="shortcut icon" href="<?= base_url('assets/logo.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/css/core/libs.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/vendor/flatpickr/dist/flatpickr.min.css" />

    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/vendor/sheperd/dist/css/sheperd.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4D1H8GTEHY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-4D1H8GTEHY');
        gtag('config', 'UA-148892048-7');
    </script>

    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/css/hope-ui.min28b5.css?v=2.0.0" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/css/pro.min28b5.css?v=2.0.0" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/css/custom.min28b5.css?v=2.0.0" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/css/dark.min28b5.css?v=2.0.0" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/css/customizer.min28b5.css?v=2.0.0" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/css/rtl.min28b5.css?v=2.0.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/fh-3.2.4/r-2.3.0/sp-2.0.2/sl-1.4.0/datatables.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/jquery-toast/dist/jquery.toast.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url('assets/core.css') ?>">

    <style>
        .card-title {
            color: #3a57e8;
        }
    </style>

    <script src="<?= base_url('assets/admin/assets/js/core/libs.min.js') ?>"></script>
    <script src="<?= base_url('assets/jquery-validation/dist/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/jquery-toast/dist/jquery.toast.min.js'); ?>"></script>
    <script src="<?= base_url('assets/sweetalert/dist/sweetalert2.all.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/fh-3.2.4/r-2.3.0/sp-2.0.2/sl-1.4.0/datatables.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="">
    <aside class="sidebar sidebar-base sidebar-white left-bordered navs-pill-all" id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="#home" class="navbar-brand">
                <!--Logo start-->
                <div class="logo-main">
                    <div class="logo-normal">
                        <img src="<?= base_url('assets/logo.png') ?>" width="25" alt="">
                    </div>
                    <div class="logo-mini">
                        <img src="<?= base_url('assets/logo.png') ?>" width="25" alt="">
                    </div>
                </div>
                <!--logo End-->
                <h4 class="logo-title" data-setting="">UNIBA MADURA</h4>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <?php $this->load->view('layout/sidebar'); ?>
        <div class="sidebar-footer"></div>
    </aside>
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-xl navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="#home" class="navbar-brand">

                        <!--Logo start-->
                        <div class="logo-main">
                            <div class="logo-normal">
                                <img src="<?= base_url('assets/logo.png') ?>" width="25" alt="">
                            </div>
                            <div class="logo-mini">
                                <img src="<?= base_url('assets/logo.png') ?>" width="25" alt="">
                            </div>
                        </div>
                        <!--logo End-->
                        <h4 class="logo-title d-block d-xl-none" data-setting="">UNIBA MADURA</h4>
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between product-offcanvas">
                        <div class="breadcrumb-title border-end me-3 pe-3 d-none d-xl-block">
                            <small class="mb-0 text-capitalize"><i>Masuk Sebagai : <?= $this->session->userdata('level_operator') ?></i></small>
                        </div>
                        <div class="offcanvas offcanvas-end shadow-none iq-product-menu-responsive" tabindex="-1" id="offcanvasBottom">
                            <div class="offcanvas-body">
                                <?php $this->load->view('layout/topbar') ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <button id="navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <span class="navbar-toggler-bar bar1 mt-1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                            <li class="nav-item dropdown me-0 me-xl-3">
                                <div class="d-flex align-items-center mr-2 iq-font-style" role="group" aria-label="First group" data-setting="radio">
                                    <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-sm" id="font-size-sm">
                                    <label for="font-size-sm" class="btn btn-border border-0 btn-icon btn-sm" data-bs-toggle="tooltip" title="Font size 14px" data-bs-placement="bottom">
                                        <span class="mb-0 h6" style="color: inherit !important;">A</span>
                                    </label>
                                    <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-md" id="font-size-md">
                                    <label for="font-size-md" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip" title="Font size 16px" data-bs-placement="bottom">
                                        <span class="mb-0 h4" style="color: inherit !important;">A</span>
                                    </label>
                                    <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-lg" id="font-size-lg">
                                    <label for="font-size-lg" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip" title="Font size 18px" data-bs-placement="bottom">
                                        <span class="mb-0 h2" style="color: inherit !important;">A</span>
                                    </label>
                                </div>
                            </li>
                            <!-- <li class="nav-item dropdown border-end pe-3 d-none d-xl-block">
                                <div class="form-group input-group mb-0 search-input">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-text">
                                        <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </circle>
                                            <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                            </li> -->
                            <li class="nav-item dropdown iq-responsive-menu border-end d-block d-xl-none">
                                <div class="btn btn-sm bg-body" id="navbarDropdown-search-11" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                        <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown-search-11" style="width: 25rem;">
                                    <li class="px-3 py-0">
                                        <div class="form-group input-group mb-0">
                                            <input type="text" class="form-control" placeholder="Search...">
                                            <span class="input-group-text">
                                                <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                                    <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown" id="itemdropdown1">
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="btn btn-primary btn-icon btn-sm rounded-pill">
                                        <span class="btn-inner">
                                            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                                <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="app/user-profile.html">Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#global_setting">Setting Global</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item iq-full-screen d-none d-xl-block" id="fullscreen-item">
                                <a href="#" class="nav-link" id="btnFullscreen" data-bs-toggle="dropdown">
                                    <div class="btn btn-primary btn-icon btn-sm rounded-pill">
                                        <span class="btn-inner">
                                            <svg class="normal-screen icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.5528 5.99656L13.8595 10.8961" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M14.8016 5.97618L18.5524 5.99629L18.5176 9.96906" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M5.8574 18.896L10.5507 13.9964" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M9.60852 18.9164L5.85775 18.8963L5.89258 14.9235" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <svg class="full-normal-screen d-none icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.7542 10.1932L18.1867 5.79319" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M17.2976 10.212L13.7547 10.1934L13.7871 6.62518" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M10.4224 13.5726L5.82149 18.1398" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M6.74391 13.5535L10.4209 13.5723L10.3867 17.2755" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--Nav End-->



            <div id="main"></div>

        </div>

    </main>
    <!-- Live Customizer start -->
    <!-- Setting offcanvas start here -->
    <div class="offcanvas offcanvas-end live-customizer" tabindex="-1" id="live-customizer" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="live-customizer-label">
        <div class="offcanvas-header">
            <div class="d-flex align-items-center">
                <h4 class="offcanvas-title" id="live-customizer-label">Live Customizer</h4>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <button class="btn btn-primary px-3" data-copy="settings" data-bs-toggle="tooltip" data-bs-placement="left" title="Copy">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5026 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0453C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.298 9.012 20.0465 9.013C19.6247 9.016 19.1168 9.021 18.8088 9.021Z" fill="currentColor"></path>
                        <path opacity="0.4" d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2792 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z" fill="currentColor"></path>
                        <path d="M14.3672 12.2364H12.6392V10.5094C12.6392 10.0984 12.3062 9.7644 11.8952 9.7644C11.4842 9.7644 11.1502 10.0984 11.1502 10.5094V12.2364H9.4232C9.0122 12.2364 8.6792 12.5704 8.6792 12.9814C8.6792 13.3924 9.0122 13.7264 9.4232 13.7264H11.1502V15.4524C11.1502 15.8634 11.4842 16.1974 11.8952 16.1974C12.3062 16.1974 12.6392 15.8634 12.6392 15.4524V13.7264H14.3672C14.7782 13.7264 15.1122 13.3924 15.1122 12.9814C15.1122 12.5704 14.7782 12.2364 14.3672 12.2364Z" fill="currentColor"></path>
                    </svg>
                    Copy Config
                </button>
                <button class="btn btn-primary btn-icon" data-reset="settings" data-bs-toggle="tooltip" data-bs-placement="left" title="Reset All Settings">
                    <span class="btn-inner">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.4">
                                <path d="M4.88076 14.6713C4.74978 14.2784 4.32504 14.066 3.93208 14.197C3.53912 14.328 3.32675 14.7527 3.45774 15.1457L4.88076 14.6713ZM20.8808 15.1457C21.0117 14.7527 20.7994 14.328 20.4064 14.197C20.0135 14.066 19.5887 14.2784 19.4577 14.6713L20.8808 15.1457ZM4.16925 14.9085C3.45774 15.1457 3.45785 15.146 3.45797 15.1464C3.45802 15.1465 3.45815 15.1469 3.45825 15.1472C3.45845 15.1478 3.45868 15.1485 3.45895 15.1493C3.45948 15.1509 3.46013 15.1528 3.46092 15.1551C3.46249 15.1597 3.46456 15.1657 3.46716 15.1731C3.47235 15.188 3.47961 15.2084 3.48902 15.2341C3.50782 15.2854 3.53521 15.3576 3.5717 15.4477C3.64461 15.6279 3.7542 15.8805 3.90468 16.1814C4.2048 16.7817 4.67223 17.5836 5.34308 18.3886C6.68942 20.0043 8.88343 21.6585 12.1693 21.6585V20.1585C9.45507 20.1585 7.64908 18.8128 6.49542 17.4284C5.91627 16.7334 5.5087 16.0354 5.24632 15.5106C5.11555 15.2491 5.02201 15.0329 4.96212 14.8849C4.9322 14.811 4.91076 14.7543 4.89733 14.7177C4.89062 14.6994 4.88593 14.6861 4.88318 14.6783C4.88181 14.6744 4.88093 14.6718 4.88053 14.6706C4.88033 14.67 4.88025 14.6698 4.88029 14.6699C4.88031 14.67 4.88036 14.6701 4.88044 14.6704C4.88047 14.6705 4.88056 14.6707 4.88058 14.6708C4.88067 14.671 4.88076 14.6713 4.16925 14.9085ZM12.1693 21.6585C15.4551 21.6585 17.6491 20.0043 18.9954 18.3886C19.6663 17.5836 20.1337 16.7817 20.4338 16.1814C20.5843 15.8805 20.6939 15.6279 20.7668 15.4477C20.8033 15.3576 20.8307 15.2854 20.8495 15.2341C20.8589 15.2084 20.8662 15.188 20.8713 15.1731C20.8739 15.1657 20.876 15.1597 20.8776 15.1551C20.8784 15.1528 20.879 15.1509 20.8796 15.1493C20.8798 15.1485 20.8801 15.1478 20.8803 15.1472C20.8804 15.1469 20.8805 15.1465 20.8805 15.1464C20.8807 15.146 20.8808 15.1457 20.1693 14.9085C19.4577 14.6713 19.4578 14.671 19.4579 14.6708C19.4579 14.6707 19.458 14.6705 19.4581 14.6704C19.4581 14.6701 19.4582 14.67 19.4582 14.6699C19.4583 14.6698 19.4582 14.67 19.458 14.6706C19.4576 14.6718 19.4567 14.6744 19.4553 14.6783C19.4526 14.6861 19.4479 14.6994 19.4412 14.7177C19.4277 14.7543 19.4063 14.811 19.3764 14.8849C19.3165 15.0329 19.223 15.2491 19.0922 15.5106C18.8298 16.0354 18.4222 16.7334 17.8431 17.4284C16.6894 18.8128 14.8834 20.1585 12.1693 20.1585V21.6585Z" fill="currentColor"></path>
                                <path d="M21.5183 19.2271C21.4293 19.2234 21.3427 19.196 21.2671 19.1465L16.3546 15.8924C16.2197 15.8026 16.1413 15.6537 16.148 15.4969C16.1546 15.34 16.2452 15.1982 16.3873 15.1202L21.5571 12.2926C21.7075 12.2106 21.8932 12.213 22.0416 12.3003C22.1907 12.387 22.2783 12.5436 22.2712 12.7096L22.014 18.7913C22.007 18.9573 21.9065 19.1059 21.7506 19.1797C21.6772 19.215 21.597 19.2305 21.5183 19.2271" fill="currentColor"></path>
                            </g>
                            <path d="M20.0742 10.0265C20.1886 10.4246 20.6041 10.6546 21.0022 10.5401C21.4003 10.4257 21.6302 10.0102 21.5158 9.61214L20.0742 10.0265ZM4.10803 8.88317C3.96071 9.27031 4.15513 9.70356 4.54226 9.85087C4.92939 9.99818 5.36265 9.80377 5.50996 9.41664L4.10803 8.88317ZM20.795 9.81934C21.5158 9.61214 21.5157 9.6118 21.5156 9.61144C21.5155 9.61129 21.5154 9.6109 21.5153 9.61059C21.5152 9.60998 21.515 9.60928 21.5147 9.60848C21.5143 9.60689 21.5137 9.60493 21.513 9.6026C21.5116 9.59795 21.5098 9.59184 21.5075 9.58431C21.503 9.56925 21.4966 9.54853 21.4882 9.52251C21.4716 9.47048 21.4473 9.39719 21.4146 9.3056C21.3493 9.12256 21.2503 8.8656 21.1126 8.55861C20.8378 7.94634 20.4044 7.12552 19.7678 6.29313C18.4902 4.62261 16.3673 2.87801 13.0844 2.74053L13.0216 4.23922C15.7334 4.35278 17.4816 5.77291 18.5763 7.20436C19.1258 7.92295 19.5038 8.63743 19.744 9.17271C19.8638 9.43949 19.9482 9.65937 20.0018 9.80972C20.0286 9.88483 20.0477 9.94238 20.0596 9.97951C20.0655 9.99808 20.0696 10.0115 20.072 10.0195C20.0732 10.0235 20.074 10.0261 20.0744 10.0273C20.0746 10.0278 20.0746 10.0281 20.0746 10.028C20.0746 10.0279 20.0745 10.0278 20.0745 10.0275C20.0744 10.0274 20.0744 10.0272 20.0743 10.0271C20.0743 10.0268 20.0742 10.0265 20.795 9.81934ZM13.0844 2.74053C9.80146 2.60306 7.54016 4.16407 6.12741 5.72193C5.42345 6.49818 4.92288 7.27989 4.59791 7.86704C4.43497 8.16144 4.31491 8.40923 4.23452 8.58617C4.1943 8.67471 4.16391 8.7457 4.14298 8.79616C4.13251 8.82139 4.1244 8.84151 4.11859 8.85613C4.11568 8.86344 4.11336 8.86938 4.1116 8.8739C4.11072 8.87616 4.10998 8.87807 4.10939 8.87962C4.10909 8.88039 4.10883 8.88108 4.1086 8.88167C4.10849 8.88196 4.10834 8.88234 4.10829 8.88249C4.10815 8.88284 4.10803 8.88317 4.80899 9.14991C5.50996 9.41664 5.50985 9.41692 5.50975 9.41719C5.50973 9.41725 5.50964 9.41749 5.50959 9.4176C5.5095 9.41784 5.50945 9.41798 5.50942 9.41804C5.50938 9.41816 5.50947 9.41792 5.50969 9.41734C5.51014 9.41619 5.51113 9.41365 5.51267 9.40979C5.51574 9.40206 5.52099 9.38901 5.52846 9.37101C5.5434 9.335 5.56719 9.27924 5.60018 9.20664C5.66621 9.0613 5.76871 8.84925 5.91031 8.59341C6.19442 8.08008 6.63084 7.39971 7.23855 6.72958C8.44912 5.39466 10.3098 4.12566 13.0216 4.23922L13.0844 2.74053Z" fill="currentColor"></path>
                            <path d="M8.78337 9.33604C8.72981 9.40713 8.65805 9.46292 8.57443 9.49703L3.1072 11.6951C2.95672 11.7552 2.78966 11.7352 2.66427 11.6407C2.53887 11.5462 2.47359 11.3912 2.48993 11.2299L3.09576 5.36863C3.11367 5.19823 3.22102 5.04666 3.37711 4.97402C3.5331 4.9005 3.71173 4.91728 3.84442 5.01726L8.70581 8.68052C8.8385 8.78051 8.90387 8.94759 8.8762 9.1178C8.86358 9.19825 8.83082 9.27308 8.78337 9.33604" fill="currentColor"></path>
                        </svg>
                    </span>
                </button>
            </div>
            <button type="button" class="btn-close px-0 text-reset shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body data-scrollbar">
            <div class="row">
                <div class="col-lg-12">
                    <div class="border border-2 rounded mb-3">
                        <div class="px-3 pt-3 text-center">
                            <h5 class="d-inline-block">Style Setting</h5>
                        </div>
                        <div class="p-3">
                            <!-- Theme start here -->
                            <div>
                                <h6 class="mb-3">Theme</h6>
                                <div class="d-grid gap-3 grid-cols-3 mb-3">
                                    <div data-setting="radio">
                                        <input type="radio" value="auto" class="btn-check" name="theme_scheme" id="color-mode-auto" checked>
                                        <label class="btn btn-border d-block" for="color-mode-auto">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" d="M7,2V13H10V22L17,10H13L17,2H7Z" />
                                            </svg>
                                            Auto
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="dark" class="btn-check" name="theme_scheme" id="color-mode-dark">
                                        <label class="btn btn-border d-block" for="color-mode-dark">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" d="M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z" />
                                            </svg>
                                            Dark
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="light" class="btn-check" name="theme_scheme" id="color-mode-light">
                                        <label class="btn  btn-border d-block" for="color-mode-light">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" d="M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z">
                                                </path>
                                            </svg>
                                            Light
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid gap-3 grid-cols-2 mb-4">
                                    <div data-setting="attribute" class="text-center">
                                        <input type="radio" value="ltr" class="btn-check" name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-ltr" checked>
                                        <label class="btn btn-border d-block p-0" for="theme-scheme-direction-ltr">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/01.png" alt="ltr" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/01.png" alt="ltr" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class=" mt-2"> LTR </span>
                                    </div>
                                    <div data-setting="attribute" class="text-center">
                                        <input type="radio" value="rtl" class="btn-check" name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-rtl">
                                        <label class="btn btn-border d-block p-0" for="theme-scheme-direction-rtl">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/02.png" alt="ltr" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/02.png" alt="ltr" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class=" mt-2"> RTL </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Theme end here -->

                            <hr class="hr-horizontal">

                            <!-- Color customizer start here -->

                            <div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mt-4 mb-3">Color Customizer</h6>
                                    <div class="d-flex align-items-center">
                                        <a href="#custom-color" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="custom-color">Custom</a>
                                        <div data-setting="radio">
                                            <input type="radio" value="theme-color-default" class="btn-check" name="theme_color" id="theme-color-default" data-colors='{"primary": "#3a57e8", "info": "#08B1BA"}'>
                                            <label class="btn bg-transparent px-2 border-0" for="theme-color-default" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Color" data-bs-original-title="Reset color">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z" fill="#31BAF1" />
                                                    <path d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z" fill="#0169CA" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="custom-color">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label class="" for="custom-primary-color">Primary</label>
                                        <input class="" name="theme_color" data-extra="primary" type="color" id="custom-primary-color" value="#3a57e8" data-setting="color">
                                    </div>
                                    <div class="form-group d-flex d-flex justify-content-between align-items-center">
                                        <label class="" for="custom-info-color">Secondary</label>
                                        <input class="" name="theme_color" data-extra="info" type="color" id="custom-info-color" value="#08B1BA" data-setting="color">
                                    </div>
                                </div>
                                <div class="grid-cols-5 mb-4 d-grid gap-3">
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-blue" class="btn-check" name="theme_color" id="theme-color-1" data-colors='{"primary": "#00C3F9", "info": "#573BFF"}'>
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Theme-1" data-bs-original-title="Theme-1">
                                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26">
                                                <circle cx="12" cy="12" r="10" fill="#00C3F9" />
                                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#573BFF" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-gray" class="btn-check" name="theme_color" id="theme-color-2" data-colors='{"primary": "#91969E", "info": "#FD8D00"}'>
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Theme-2" data-bs-original-title="Theme-2">
                                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26">
                                                <circle cx="12" cy="12" r="10" fill="#91969E" />
                                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#FD8D00" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-red" class="btn-check" name="theme_color" id="theme-color-3" data-colors='{"primary": "#DB5363", "info": "#366AF0"}'>
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Theme-3" data-bs-original-title="Theme-3">
                                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26">
                                                <circle cx="12" cy="12" r="10" fill="#DB5363" />
                                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#366AF0" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-yellow" class="btn-check" name="theme_color" id="theme-color-4" data-colors='{"primary": "#EA6A12", "info": "#6410F1"}'>
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Theme-4" data-bs-original-title="Theme-4">
                                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26">
                                                <circle cx="12" cy="12" r="10" fill="#EA6A12" />
                                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#6410F1" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-pink" class="btn-check" name="theme_color" id="theme-color-5" data-colors='{"primary": "#E586B3", "info": "#25C799"}'>
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-5" data-bs-toggle="tooltip" data-bs-placement="top" title="Theme-5" data-bs-original-title="Theme-5">
                                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26">
                                                <circle cx="12" cy="12" r="10" fill="#E586B3" />
                                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#25C799" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Color customizer end here -->

                            <hr class="hr-horizontal">

                            <!-- Menu color start here -->

                            <div>
                                <h6 class="mt-4 mb-3">Menu Color</h6>
                                <div class="d-grid gap-3 grid-cols-3 mb-3">
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-white" class="btn-check" name="sidebar_color" id="sidebar-white" checked>
                                        <label class="btn btn-border d-flex align-items-center bg-transparent" for="sidebar-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Sidebar White" data-bs-original-title="Sidebar White">
                                            <i class="text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-18" width="18" viewBox="0 0 24 24" fill="currentColor">
                                                    <circle cx="12" cy="12" r="8" fill="currentColor" stroke="black" stroke-width="3"></circle>
                                                </svg>
                                            </i>
                                            <span class="ms-2 ">Default</span>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-dark" class="btn-check" name="sidebar_color" id="sidebar-dark">
                                        <label class="btn btn-border d-flex align-items-center bg-transparent" for="sidebar-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Sidebar Dark" data-bs-original-title="Sidebar Dark">
                                            <i class="text-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-18" width="18" viewBox="0 0 24 24" fill="currentColor">
                                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </svg>
                                            </i>
                                            <span class="ms-2 "> Dark </span>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-color" class="btn-check" name="sidebar_color" id="sidebar-color">
                                        <label class="btn btn-border d-flex align-items-center bg-transparent" for="sidebar-color" data-bs-toggle="tooltip" data-bs-placement="top" title="Sidebar Colored" data-bs-original-title="Sidebar Colored">
                                            <i class="text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-18" width="18" viewBox="0 0 24 24" fill="currentColor">
                                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </svg>
                                            </i>
                                            <span class="ms-2 "> Color </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid gap-3 grid-cols-2 mb-4">
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-transparent" class="btn-check" name="sidebar_color" id="sidebar-transparent">
                                        <label class="btn btn-border d-flex align-items-center bg-transparent" for="sidebar-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Sidebar Transparent" data-bs-original-title="Sidebar Transparent">
                                            <i class="text-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-18" width="18" viewBox="0 0 24 24" fill="currentColor">
                                                    <circle cx="12" cy="12" r="8" fill="#F5F6FA" stroke="black" stroke-width="3"></circle>
                                                </svg>
                                            </i>
                                            <span class="ms-2">Transparent</span>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-glass" class="btn-check" name="sidebar_color" id="sidebar-glass">
                                        <label class="btn btn-border d-flex align-items-center bg-transparent" for="sidebar-glass" data-bs-toggle="tooltip" data-bs-placement="top" title="Sidebar Transparent" data-bs-original-title="Sidebar Transparent">
                                            <i class="text-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-18" width="18" viewBox="0 0 24 24" fill="currentColor">
                                                    <circle cx="12" cy="12" r="8" fill="#F5F6FA" stroke="black" stroke-width="3"></circle>
                                                </svg>
                                            </i>
                                            <span class="ms-2">Glass</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu color end here -->

                            <hr class="hr-horizontal">

                            <!-- Menu Style start here -->

                            <div>
                                <h6 class="mt-4 mb-3">Menu Style</h6>
                                <div class="d-grid gap-3 grid-cols-4 mb-4">
                                    <div data-setting="checkbox" class="text-center">
                                        <input type="checkbox" value="sidebar-mini" class="btn-check" name="sidebar_type" id="sidebar-mini">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="sidebar-mini">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/03.png" alt="mini" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/03.png" alt="mini" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Mini</span>
                                    </div>
                                    <div data-setting="checkbox" class="text-center">
                                        <input type="checkbox" value="sidebar-hover" data-extra="{target: '.sidebar', ClassListAdd: 'sidebar-mini'}" class="btn-check" name="sidebar_type" id="sidebar-hover">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="sidebar-hover">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/04.png" alt="hover" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/04.png" alt="hover" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Hover</span>
                                    </div>
                                    <div data-setting="checkbox" class="text-center">
                                        <input type="checkbox" value="sidebar-boxed" class="btn-check" name="sidebar_type" id="sidebar-boxed">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="sidebar-boxed">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/05.png" alt="boxed" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/05.png" alt="boxed" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Boxed</span>
                                    </div>
                                    <div data-setting="checkbox" class="text-center">
                                        <input type="checkbox" value="sidebar-soft" class="btn-check" name="sidebar_type" id="sidebar-soft">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="sidebar-soft">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/05.png" alt="boxed" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/05.png" alt="boxed" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Soft</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Style end here -->

                            <hr class="hr-horizontal">

                            <!-- Active Menu Style start here -->

                            <div>
                                <h6 class="mt-4 mb-3">Active Menu Style</h6>
                                <div class="d-grid gap-3 grid-cols-3 mb-4">
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-rounded" class="btn-check" name="sidebar_menu_style" id="navs-rounded">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="navs-rounded">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/06.png" alt="mini" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/06.png" alt="mini" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Rounded One Side</span>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-rounded-all" class="btn-check" name="sidebar_menu_style" id="navs-rounded-all">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="navs-rounded-all">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/07.png" alt="hover" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/07.png" alt="hover" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Rounded All</span>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-pill" class="btn-check" name="sidebar_menu_style" id="navs-pill">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="navs-pill">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/08.png" alt="boxed" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/08.png" alt="boxed" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Pill One Side</span>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-pill-all" class="btn-check" name="sidebar_menu_style" id="navs-pill-all">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="navs-pill-all">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/09.png" alt="boxed" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/09.png" alt="boxed" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Pill All</span>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="left-bordered" class="btn-check" name="sidebar_menu_style" id="left-bordered" checked>
                                        <label class="btn btn-border position-relative p-0 d-block overflow-hidden" for="left-bordered">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/14.png" alt="boxed" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/14.png" alt="boxed" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                            <small class="badge bg-danger position-absolute top-1 end-0 m-2">Pro</small>
                                        </label>
                                        <span class="mt-2">Left Bordered</span>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-full-width" class="btn-check" name="sidebar_menu_style" id="navs-full-width">
                                        <label class="btn btn-border position-relative p-0 d-block overflow-hidden" for="navs-full-width">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/15.png" alt="boxed" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/15.png" alt="boxed" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                            <small class="badge bg-danger position-absolute top-1 end-0 m-2">Pro</small>
                                        </label>
                                        <span class="mt-2">Full Width</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Active Menu Style end here -->

                            <hr class="hr-horizontal">
                            <!-- Navbar style start here -->
                            <div>
                                <h6 class="mt-4 mb-3">Navbar Style</h6>
                                <div class="d-grid gap-3 grid-cols-4 mb-4">
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="nav-glass" class="btn-check" name="header_navbar" id="nav-glass">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="nav-glass">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/10.png" alt="hover" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/10.png" alt="hover" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Glass</span>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="navs-sticky" class="btn-check" name="header_navbar" id="navs-sticky">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="navs-sticky">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/04.png" alt="hover" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/04.png" alt="hover" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Sticky</span>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="navs-transparent" class="btn-check" name="header_navbar" id="navs-transparent">
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="navs-transparent">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/12.png" alt="boxed" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/12.png" alt="boxed" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Transparent</span>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="navs-default" class="btn-check" name="header_navbar" id="navs-default" checked>
                                        <label class="btn btn-border p-0 d-block overflow-hidden" for="navs-default">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/dark/01.png" alt="default" class="mode dark-img img-fluid" width="200" height="200" loading="lazy">
                                            <img src="<?= base_url('assets/admin/') ?>assets/images/settings/light/01.png" alt="default" class="mode light-img img-fluid" width="200" height="200" loading="lazy">
                                        </label>
                                        <span class="mt-2">Default</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Navbar style end here -->

                            <hr class="hr-horizontal">
                            <!-- Card style start here -->
                            <div class="mb-4">
                                <div class="mt-4 mb-3">
                                    <h6 class="d-inline-block mb-0 me-2">Card Style</h6>
                                    <small class="badge bg-warning rounded-pill">Pro</small>
                                </div>
                                <div class="d-grid gap-3 grid-cols-2 mb-3">
                                    <div data-setting="radio">
                                        <input type="radio" value="card-default" class="btn-check" name="card_color" id="card-default" checked>
                                        <label class="btn btn-border d-block" for="card-default" data-bs-toggle="tooltip" data-bs-placement="top" title="Card White" data-bs-original-title="Card White">
                                            <span>Default Style</span>
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="card-glass" class="btn-check" name="card_color" id="card-glass">
                                        <label class="btn btn-border d-block" for="card-glass" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Glass" data-bs-original-title="Card Glass">
                                            <span>Glass Effect</span>
                                        </label>
                                    </div>
                                </div>
                                <div data-setting="radio">
                                    <input type="radio" value="card-transparent" class="btn-check" name="card_color" id="card-transparent">
                                    <label class="btn btn-border d-block" for="card-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Transparent" data-bs-original-title="Card Transparent">
                                        <span>Transparent Style</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Card style end here -->


                            <hr class="hr-horizontal">

                            <!-- Page Animation start here -->
                            <div class="mt-4 mb-3">
                                <h6 class="d-inline-block mb-0 me-2">Footer </h6>
                                <small class="badge bg-warning rounded-pill">Pro</small>
                            </div>
                            <div class="d-grid gap-3 grid-cols-3 mb-4">
                                <div data-setting="radio">
                                    <input type="radio" value="default" class="btn-check" name="footer" id="footer_default" checked>
                                    <label class="btn btn-border d-block" for="footer_default">Default</label>
                                </div>
                                <div data-setting="radio">
                                    <input type="radio" value="sticky" class="btn-check" name="footer" id="footer_Sticky">
                                    <label class="btn btn-border d-block" for="footer_Sticky">Sticky</label>
                                </div>
                                <div data-setting="radio">
                                    <input type="radio" value="glass" class="btn-check" name="footer" id="footer_glass">
                                    <label class="btn btn-border d-block" for="footer_glass">Glass</label>
                                </div>
                            </div>
                            <!-- Page Animation start here -->
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border border-2 rounded">
                        <div class="px-3 pt-3 d-flex align-items-center justify-content-center gap-2">
                            <h5 class="mb-0">Advanced</h5>
                            <span class="badge rounded-pill bg-warning">Pro</span>
                        </div>
                        <div class="p-3">
                            <h6 class="mb-3 d-inline-block">App Name</h6>
                            <span data-bs-toggle="tooltip" data-bs-placement="right" title="Edit the App Name with your business name to familiarize your audience. ">
                                <svg class="icon-20" width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <div class="d-grid gap-3 grid-cols-1 mb-4">
                                <div class="form-group mb-0">
                                    <input type="text" data-setting="input" maxlength="10" name="app_name" class="form-control" value="">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="d-inline-block">Font</h6>
                                <a href="javascript:void(0)" data-reset="body-heading-font">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z" fill="currentColor" />
                                        <path d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                            <div class="d-grid gap-3 grid-cols-2 mb-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="label">
                                            <label class="mb-0 d-inline-block">Body Font</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <select name="body_font_family" class="form-control" data-select="font" data-setting="select">
                                            <option value="">Select Body Font</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="label">
                                            <label class="mb-0 d-inline-block">Heading Font</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <select name="heading_font_family" class="form-control" data-select="font" data-setting="select">
                                            <option value="">Select Heading Font</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Page container start here -->
                            <div>
                                <h6 class="d-inline-block mb-3 me-2">Page Style </h6>
                                <small class="badge bg-warning rounded-pill">Pro</small>
                                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Wrap your content layout and select Full Width or Boxed styles.  ">
                                    <svg class="icon-20" width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="d-grid gap-3 grid-cols-2 mb-4">
                                <div data-setting="radio">
                                    <input type="radio" value="container" class="btn-check" name="page_layout" id="page-layout-boxed">
                                    <label class="btn btn-border d-block" for="page-layout-boxed">Boxed</label>
                                </div>
                                <div data-setting="radio">
                                    <input type="radio" value="container-fluid" class="btn-check" name="page_layout" id="page-layout-full-width" checked>
                                    <label class="btn btn-border d-block" for="page-layout-full-width">Full
                                        Width</label>
                                </div>
                            </div>
                            <!-- Page container start here -->

                            <!-- Style appearance start here -->

                            <div>
                                <h6 class="d-inline-block mb-3 me-2">Style Appearance </h6>
                                <small class="badge bg-warning rounded-pill">Pro</small>
                            </div>
                            <div class="d-grid gap-3 grid-cols-3 mb-4">
                                <div data-setting="checkbox">
                                    <input type="checkbox" value="theme-flat" class="btn-check" name="theme_style_appearance" id="theme-style-appearance-flat">
                                    <label class="btn btn-border d-block" for="theme-style-appearance-flat">Flat</label>
                                </div>
                                <div data-setting="checkbox">
                                    <input type="checkbox" value="theme-bordered" class="btn-check" name="theme_style_appearance" id="theme-style-appearance-bordered">
                                    <label class="btn btn-border d-block" for="theme-style-appearance-bordered">Bordered</label>
                                </div>
                                <div data-setting="checkbox">
                                    <input type="checkbox" value="theme-sharp" class="btn-check" name="theme_style_appearance" id="theme-style-appearance-sharp">
                                    <label class="btn btn-border d-block" for="theme-style-appearance-sharp">Sharp</label>
                                </div>
                            </div>

                            <!-- Style appearance end here -->

                            <!-- Page Animation start here -->
                            <div>
                                <h6 class="d-inline-block mb-3 me-2">Page Transition </h6>
                                <small class="badge bg-warning rounded-pill">Pro</small>
                            </div>
                            <div class="d-grid gap-3 grid-cols-2 mb-4">
                                <div data-setting="radio">
                                    <input type="radio" value="theme-with-animation" class="btn-check" name="theme_transition" id="page-animation" checked>
                                    <label class="btn btn-border d-block" for="page-animation">Animation</label>
                                </div>
                                <div data-setting="radio">
                                    <input type="radio" value="theme-without-animation" class="btn-check" name="theme_transition" id="without-page-animation">
                                    <label class="btn btn-border d-block" for="without-page-animation">No
                                        Animation</label>
                                </div>
                            </div>
                            <!-- Page Animation start here -->

                            <div>
                                <h6 class="mb-3 d-inline-block">Storage</h6>
                                <span data-bs-toggle="tooltip" data-bs-placement="right" title="You can save the setting changes you made for your project on either Local storage, Session storage.">
                                    <svg class="icon-20" width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="d-grid gap-3 grid-cols-3 mb-4">
                                <div data-setting="radio">
                                    <input type="radio" value="localStorage" class="btn-check" name="saveLocal" id="save-localstorage">
                                    <label class="btn btn-border d-block" for="save-localstorage">Local</label>
                                </div>
                                <div data-setting="radio">
                                    <input type="radio" value="sessionStorage" class="btn-check" name="saveLocal" id="save-sessionstorage">
                                    <label class="btn btn-border d-block" for="save-sessionstorage">Session</label>
                                </div>
                                <div data-setting="radio">
                                    <input type="radio" value="none" class="btn-check" name="saveLocal" id="save-none" checked>
                                    <label class="btn btn-border d-block" for="save-none">None</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Settings sidebar end here -->

    <a class="btn btn-fixed-end btn-warning btn-icon btn-setting" id="settingbutton" data-bs-toggle="offcanvas" data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
        <svg class="icon-24 animated-rotate" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
        </svg>
    </a>
    <!-- Live Customizer end -->
    <!-- Wrapper End-->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="#" autocomplete="off">
                        <h3 class="text-center">Sign In</h3>
                        <p class="text-center">Sign in to stay connected</p>
                        <div class="form-group">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control mb-0" placeholder="Enter email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control mb-0" placeholder="Enter password" autocomplete="off">
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check d-inline-block mt-2 pt-1">
                                <input type="checkbox" class="form-check-input" id="customCheck11">
                                <label class="form-check-label" for="customCheck11">Remember Me</label>
                            </div>
                            <a href="#">Forget password</a>
                        </div>
                        <div class="text-center pb-3">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sign in</button>
                        </div>
                        <p class="text-center">Or sign in with other accounts?</p>
                        <div class="d-flex justify-content-center">
                            <ul class="list-group list-group-horizontal list-group-flush">
                                <li class="list-group-item border-0 pb-0">
                                    <a href="#"><img src="https://templates.iqonic.design/hope-ui/pro/html/assets/images/brands/fb.svg" alt="fb" loading="lazy"></a>
                                </li>
                                <li class="list-group-item border-0 pb-0">
                                    <a href="#"><img src="https://templates.iqonic.design/hope-ui/pro/html/assets/images/brands/gm.svg" alt="gm" loading="lazy"></a>
                                </li>
                                <li class="list-group-item border-0 pb-0">
                                    <a href="#"><img src="https://templates.iqonic.design/hope-ui/pro/html/assets/images/brands/im.svg" alt="im" loading="lazy"></a>
                                </li>
                                <li class="list-group-item border-0 pb-0">
                                    <a href="#"><img src="https://templates.iqonic.design/hope-ui/pro/html/assets/images/brands/li.svg" alt="li" loading="lazy"></a>
                                </li>
                            </ul>
                        </div>
                        <p class="text-center">Don't have account?<a href="#"> Click here to sign up.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/admin/') ?>assets/vendor/sheperd/dist/js/sheperd.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/plugins/tour.js" defer></script>
    <script src="<?= base_url('assets/admin/') ?>assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/plugins/flatpickr.js" defer></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/plugins/slider-tabs.js"></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/plugins/select2.js" defer></script>
    <script src="<?= base_url('assets/admin/') ?>assets/vendor/lodash/lodash.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/iqonic-script/utility.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/iqonic-script/setting.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/setting-init.js"></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/core/external.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/charts/widgetcharts28b5.js?v=2.0.0" defer></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/charts/dashboard28b5.js?v=2.0.0" defer></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/hope-ui28b5.js?v=2.0.0" defer></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/hope-uipro28b5.js?v=2.0.0" defer></script>
    <script src="<?= base_url('assets/admin/') ?>assets/js/sidebar28b5.js?v=2.0.0" defer></script>
    <!-- <script src="<?= base_url('assets/core.js') ?>"></script> -->

    <script>
        var baseurl = "http://localhost/uniba-siakad/";

        function loadContent(hash) {
            if (hash == '') {
                hash = 'home';
            }
            $('#main').load(baseurl + 'admin/' + hash);
            var kode = hash.substring(hash.indexOf("/") + 1);

            $.ajax({
                type: "POST",
                url: "<?= base_url('core/aktif_menu') ?>",
                data: {
                    kode: kode
                },
                dataType: "json",
                success: function(data) {
                    $("#judul").html("SIAKAD " + data.link);
                }
            })

        }

        $(window).on('hashchange', function() {
            loadContent(location.hash.slice(1));
        });

        var url = window.location.href;
        var hash = url.substring(url.indexOf("#") + 1);

        if (hash == url) {
            hash = 'home';
        }

        $(document).ready(function() {
            $('#main').load(baseurl + 'admin/' + hash);
            console.log(hash);

            var kode = hash.substring(hash.indexOf("/") + 1);

            $.ajax({
                type: "POST",
                url: "<?= base_url('core/aktif_menu') ?>",
                data: {
                    kode: kode
                },
                dataType: "json",
                success: function(data) {
                    $("#judul").html("SIAKAD " + data.link);
                }
            });
        })
    </script>


</body>

</html>