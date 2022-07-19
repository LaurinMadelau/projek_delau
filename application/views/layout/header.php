<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Valorant Top Up</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="icon" href="<?= base_url('assets/') ?>/img/logo1.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/plyr.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                    <?php if ($user['role'] == 'Admin') { ?>
                        <a href="<?= base_url('Valorant') ?>">
                        <?php } else { ?>
                            <a href="<?= base_url('topup') ?>">
                            <?php } ?>
                            <img src="<?= base_url('assets/') ?>img/valorant.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <?php if ($user['role'] == 'Admin') { ?>
                                    <li class="active"><a href="<?= base_url('Valorant') ?>">Homepage</a></li>
                                    <li><a href="<?= base_url('Valorant') ?>">Categories <span class="arrow_carrot-down"></span></a>
                                        <ul class="dropdown">
                                            <li><a href="<?= base_url('pemesanan') ?>">Pemesanan</a></li>
                                        </ul>
                                    <?php } else { ?>
                                    <li class="active"><a href="<?= base_url('topup') ?>">Homepage</a></li>
                                    <li><a href="<?= base_url('topup') ?>">Categories <span class="arrow_carrot-down"></span></a>
                                        <ul class="dropdown">
                                        <li><a href="<?= base_url('auth/registrasi'); ?>">Sign Up</a></li>
                                        <li><a href="<?= base_url('topup/history'); ?>">History TopUp</a></li>
                                        <li><a href="<?= base_url('topup/gantipassword'); ?>">Change Password</a></li>
                                        </ul>
                                        
                                    <?php } ?>
                                    </li>
                                    <li><a href="#">Our Blog</a></li>
                                    <li><a href="#">Contacts</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
    <section class="normal-breadcrumb set-bg" data-setbg="<?= base_url('assets/') ?>img/Valorant1.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2><?php echo $judul; ?></h2>
                        <p>Welcome <?= $user['nama']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>