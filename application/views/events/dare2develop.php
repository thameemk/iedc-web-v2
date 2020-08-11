<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128744750-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-128744750-1');
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title><?php echo $page_title ?> - Innovation and Entrepreneurship Development Cell, TKM College of Engineering</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Official website of Innovation and Entrepreneurship Development Cell, TKM College of Engineering.">
    <meta name="keywords" content="IEDC,IEDC TKMCE,TKMCE,TKM College of engineering,IEDC Kerala,Kerala Startup mission,KSUM">

    <link rel="shortcut icon" href="<?= base_url() ?>assets/front/images/icon.png">
    <link href="<?= base_url() ?>assets/front/css/plugins.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/front/css/responsive.css" rel="stylesheet">
    <style>
        .lines,
        .lines:after,
        .lines:before {
            background-color: #fff
        }
    </style>
</head>

<body>
    <div class="body-inner">

        <header style="background-color: #181918;" id="header" class="text-white">
            <div class="header-inner" style="background-color: #181918 !important">
                <div class="container" style="background-color: #181918;">

                    <div id="logo">
                        <a href="<?= base_url() ?>" class="logo" data-src-dark="<?= base_url() ?>assets/front/images/logo.png">
                            <img src="<?= base_url() ?>assets/front/images/logo.png" alt="IEDC Logo"> </a>
                    </div>

                    <div id="mainMenu-trigger">
                        <button class="lines-button x"> <span class="lines"></span> </button>
                    </div>

                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="<?= base_url() ?>">Home</a></li>
                                    <li class="dropdown"> <a href="#">Initiatives</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="<?= base_url() ?>ircell">IR cell</a> </li>
                                            <li> <a href="<?= base_url() ?>ecell">E-cell</a> </li>
                                            <li> <a href="<?= base_url() ?>communities">Communities</a> </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Team</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="<?= base_url() ?>excom">Excom
                                                </a> </li>
                                            <li> <a href="<?= base_url() ?>web-team">Web Team</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="<?= base_url() ?>events-and-programs">Events & Programs</a></li>
                                    <li> <a href="<?= base_url() ?>contact">Contact</a></li>
                                    <?php if ($this->session->userdata('sess_logged_in') == 0) { ?>
                                        <li> <a href="<?php echo $loginURL ?>">Login</a></li>
                                    <?php } else { ?>
                                        <li> <a href="<?= base_url() ?>user/dashboard">My Profile</a></li>
                                    <?php } ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <style>
            .banner-img-height {
                height: 380px;
            }

            @media screen and (max-width: 600px) {
                .banner-img-height {
                    height: 150px;
                }
            }

            .first-letter {
                font-size: 80px;
            }

            .custom-para {
                line-height: 40px;
            }
        </style>
        <section class="banner-img-height" id="page-title" style="background-color: #181918;" data-parallax-image="<?= base_url() ?>assets/front/images/banner/dare2develop.png">
        </section>
        <section class="text-white" style="background-color: #181918;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pr-3" style="margin:2px">
                        <div class="row mb-5">
                            <div class="mb-3 mt-5">
                                <span class="smalldesc">
                                    <h5 align="justify" class="custom-para"><span class="first-letter text-bold">T</span>he voice of innovation and passion that lies dormant in us is brought to life through Dare2Develop, your dose of inspiring tales of people who have made it big in all things entrepreneurial. Made by IEDC TKMCE, this podcast is the perfect blend of fun and facts in each scintillating episode. Join us on this journey as we unravel the how's and why's of being a successful entrepreneur.
                                    </h5>
                                    <br>
                                    <h5>
                                        Stay tuned to have some fun.
                                    </h5>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <iframe src="https://open.spotify.com/embed-podcast/episode/3mHpSE29sxsKAYJjXcflcN" width="100%" height="232" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <footer id="footer" class="text-white" style="background-color: #181918;">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="widget">
                                <div class="widget-title">IEDC TKMCE</div>
                                <a>About us</a>
                                <p align="justify">The Innovation and Entrepreneurship Development Cell of TKMCE is an organisation that aims to promote the institutional vision....</p>
                                <a href="<?= base_url() ?>#about" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="widget">
                                        <div class="widget-title">Discover</div>
                                        <ul class="list">
                                            <li><a href="<?= base_url() ?>#about">About us</a></li>
                                            <li><a href="<?= base_url() ?>#mission">Mission</a></li>
                                            <li><a href="<?= base_url() ?>#vision">Vision</a></li>
                                            <li><a href="<?= base_url() ?>events-and-programs">Events & Programs</a></li>
                                            <li><a href="<?= base_url() ?>user/dashboard">User Panel</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="widget">
                                        <div class="widget-title">Pages</div>
                                        <ul class="list">
                                            <li><a href="<?= base_url() ?>ircell">IR-Cell</a></li>
                                            <li><a href="<?= base_url() ?>ecell">E-Cell</a></li>
                                            <li><a href="<?= base_url() ?>communities">Communities</a></li>
                                            <li><a href="<?= base_url() ?>excom">Excom</a></li>
                                            <li><a href="<?= base_url() ?>web-team">Web Team</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-content" style="background-color: #181918;">
                <div class="container">
                    <div class="copyright-text text-center">&copy; 2020 IEDC TKMCE</div>
                </div>
            </div>
        </footer>

    </div>


    <a id="scrollTop"><i class="icon-chevron-up1"></i><i class="icon-chevron-up1"></i></a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/front/js/jquery.js"></script>
    <script src="<?= base_url() ?>assets/front/js/plugins.js"></script>
    <script src="<?= base_url() ?>assets/front/js/functions.js"></script>

</body>

</html>
