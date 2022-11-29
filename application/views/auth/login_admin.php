<!DOCTYPE html>
<html lang="en" data-brk-skin="brk-blue.html">

<head>
    <title>Login Administrator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1,maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="<?= base_url('assets/logo.png') ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/logo.png') ?>">
    <meta name="theme-color" content="#2775FF">
    <meta name="keywords" content="uniba, siakad-uniba">
    <meta name="description" content="uniba, siakad-uniba">
    <link rel="stylesheet" id="brk-direction-bootstrap" href="<?= base_url('assets/login/') ?>css/assets/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" id="brk-skin-color" href="<?= base_url('assets/login/') ?>css/skins/brk-blue.css">
    <link id="brk-base-color" rel="stylesheet" href="<?= base_url('assets/login/') ?>css/skins/brk-base-color.css">
    <link rel="stylesheet" id="brk-direction-offsets" href="<?= base_url('assets/login/') ?>css/assets/offsets.css">
    <link id="brk-css-min" rel="stylesheet" href="<?= base_url('assets/login/') ?>css/assets/styles.min.css">
</head>

<body>
    <div class="brk-loader">
        <div class="brk-loader__loader"></div>
    </div>
    <div class="main-wrapper">
        <main class="main-container">
            <section>
                <div class="row no-gutters">
                    <div class="col-12 col-lg-5 d-lg-block d-none">
                        <div class="full-screen position-relative d-flex flex-column justify-content-center align-items-center z-index-2">
                            <div class="brk-backgrounds brk-base-bg-gradient-15 brk-abs-overlay" data-brk-library="component__backgrounds_css,component__backgrounds_js,assets_particleground">
                                <div class="brk-backgrounds__canvas brk-particles-standart"></div>
                            </div>
                            <a href="<?= base_url('auth') ?>" class="z-index-2 mb-60 pl-15 pr-15">
                                <img src="<?= base_url('assets/logo.png') ?>" width="250" alt="logo" class="">
                            </a>
                            <a href="<?= base_url('auth') ?>" class="btn-backgrounds btn-backgrounds_transparent btn-backgrounds_left-icon font__family-montserrat font__weight-normal text-uppercase font__size-13 z-index-2 text-center" style="padding-left:85px; padding-right: 60px;" data-brk-library="component__button">
                                <span class="text">Ruang Admin</span>
                                <span class="before"><i class="fas fa-arrow-left"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="full-screen d-flex align-items-center pt-30 pb-30 pt-lg-0 pb-lg-0">
                            <div class="container-fluid">
                                <div class="row justify-content-lg-start justify-content-center">
                                    <div class="col-lg-2 d-none d-lg-block"></div>
                                    <div class="col-12 col-lg-10">
                                        <h1 class="font__family-montserrat font__weight-bold font__size-42 line__height-42 mt-0 mb-45 text-center text-lg-left">
                                            LOGIN</h1>
                                        <form action="" method="post" class="brk-form brk-form-strict maxw-570 mx-auto mx-lg-0" data-brk-library="component__form">
                                            <input type="text" placeholder="Username" name="username">
                                            <input type="password" placeholder="Password" name="password">
                                            <div class="no-margin pl-10 pr-10 mb-30 mt-40 d-flex flex-wrap justify-content-between align-items-center">
                                                <div>
                                                    <input id="checkbox-strict-1" name="checkbox" type="checkbox" value="1" checked="checked">
                                                    <label class="brk-form-checkbox-label" for="checkbox-strict-1">Remember Me</label>
                                                </div>
                                                <div>
                                                    <a class="font__size-14 line__height-24 brk-base-font-color text-decoration_underline" href="#">Forgot password?</a>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-between align-items-center flex-column flex-lg-row">
                                                <button class="btn-backgrounds btn-backgrounds btn-backgrounds_280 btn-backgrounds_white btn-backgrounds_left-icon font__family-montserrat font__weight-bold text-uppercase font__size-13 z-index-2 text-center letter-spacing-20 mt-10" data-brk-library="component__button">
                                                    <span class="text">Login Now</span>
                                                    <span class="before"><i class="far fa-hand-point-right"></i></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <a href="#top" id="toTop"></a>
    <script defer="defer" src="<?= base_url('assets/login/') ?>js/scripts.min.js"></script>
</body>

</html>