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
    <title><?php echo $page_title ?> - Innovation and Entrepreneurship Development Cell, TKM College of Engineering
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description"
        content="Official website of Innovation and Entrepreneurship Development Cell, TKM College of Engineering.">
    <meta name="keywords"
        content="IEDC,IEDC TKMCE,TKMCE,TKM College of engineering,IEDC Kerala,Kerala Startup mission,KSUM">

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
                        <a href="<?= base_url() ?>" class="logo"
                            data-src-dark="<?= base_url() ?>assets/front/images/logo.png">
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
                                    <li> <a href="<?= base_url() ?>ecell">Startups</a> </li>
                                    <li> <a href="<?= base_url() ?>stories">Stories</a> </li>
                                    <li class="dropdown"> <a href="#">Initiatives</a>
                                        <ul class="dropdown-menu" style="background-color: #181918;">
                                            <li> <a href="<?= base_url() ?>ircell">IR cell</a> </li>
                                            <li> <a href="<?= base_url() ?>ecell">E-cell</a> </li>
                                            <li> <a href="<?= base_url() ?>communities">Communities</a> </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Team</a>
                                        <ul class="dropdown-menu" style="background-color: #181918;">
                                            <li> <a href="<?= base_url() ?>excom">Excom
                                                </a> </li>
                                            <li> <a href="<?= base_url() ?>core-team">Core Team
                                                </a> </li>
                                            <li> <a href="<?= base_url() ?>web-team">Web Team</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="<?= base_url() ?>events">Events</a></li>
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
            background-position: center;
            background-size: cover;
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
        <section class="banner-img-height" id="page-title" style="background-color: #181918;"
            data-parallax-image="<?= base_url() ?>assets/front/images/banner/dare2develop.png">
        </section>
        <section class="text-white" style="background-color: #181918;">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 pr-3 ">
                        <div class="row mb-4 paragraph">
                            <div class="mt-3">
                                <span class="smalldesc">
                                    <p align="justify"> The voice of passion and sky high dreams that lies dormant in us
                                        is brought to life through Dare2Develop, your dose of inspiring tales of people
                                        who have made it big by going an extra mile. Made by IEDC TKMCE, this podcast is
                                        the perfect blend of fun and facts in each scintillating episode. Join us on
                                        this journey as we together unravel the lives of the people who always stood out
                                        from the rest.</p>
                                </span>
                            </div>

                        </div>
                        <div class="row pb-2 py-sm-3 buttons">
                            <button class="btn fadeInUp" onclick=allLang(event)
                                style="animation-duration: 600ms;">All</button>
                            <button class="btn  fadeInUp" onclick=engLang(event)
                                style="animation-duration: 600ms;">English</button>
                            <button class="btn  fadeInUp" onclick=malLang(event)
                                style="animation-duration: 600ms;">Malayalam</button>
                        </div>
                        <div class="podcasts row">
                            <?php foreach (array_reverse($podcast_series) as $row) { ?>
                            <div class=" col-lg-6">
                                <?php if ($row['lang'] == 'ml' || 'en') echo ($row['embedded_code']) ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
        </section>
        <footer id="footer" class="text-white" style="background-color: #181918;">
            <div class="footer-content">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-5">
                            <div class="widget">
                                <div class="widget-title">IEDC TKMCE</div>
                                <a>About us</a>
                                <p align="justify">The Innovation and Entrepreneurship Development Cell of TKMCE is an
                                    organisation that aims to promote the institutional vision....</p>
                                <a href="<?= base_url() ?>#about" class="item-link">Read More <i
                                        class="fa fa-arrow-right"></i></a>

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
                                            <li> <a href="<?= base_url() ?>ircell">Startups</a> </li>
                                            <li><a href="<?= base_url() ?>events">Events</a></li>
                                            <?php if ($this->session->userdata('sess_logged_in') == 0) { ?>
                                            <li> <a href="<?php echo $loginURL ?>">Login</a></li>
                                            <?php } else { ?>
                                            <li> <a href="<?= base_url() ?>user/dashboard">My Profile</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="widget">
                                        <div class="widget-title">Pages</div>
                                        <ul class="list">
                                            <li><a href="<?= base_url() ?>stories">Stories</a></li>
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
                    <div class="copyright-text text-center">&copy; <?php echo date("Y"); ?> IEDC TKMCE</div>
                </div>
            </div>
        </footer>

    </div>


    <a id="scrollTop"><i class="icon-chevron-up1"></i><i class="icon-chevron-up1"></i></a>
    <script>
    var podcasts_div = document.querySelector('.podcasts');
    window.onload = () => {
        allLang();
    }
    const allLang = (e) => {
        podcasts_div.innerHTML = '';
        var podcasts = <?= json_encode($podcast_series) ?>;
        podcasts = podcasts.reverse();

        podcasts.map(podcast => {
            var podcast_div = document.createElement('div');
            podcast_div.classList.add('col-lg-6');
            podcast_div.innerHTML = podcast['embedded_code'];
            podcasts_div.appendChild(podcast_div);



        });
    }
    const engLang = (e) => {
        podcasts_div.innerHTML = '';
        var podcasts = <?= json_encode($podcast_series) ?>;
        podcasts = podcasts.reverse();

        podcasts.map(podcast => {
            if (podcast['lang'] == 'en') {
                var podcast_div = document.createElement('div');
                podcast_div.classList.add('col-lg-6');
                podcast_div.innerHTML = podcast['embedded_code'];
                podcasts_div.appendChild(podcast_div);
            }



        });
    }
    const malLang = (e) => {
        podcasts_div.innerHTML = '';
        var podcasts = <?= json_encode($podcast_series) ?>;
        podcasts = podcasts.reverse();

        podcasts.map(podcast => {
            if (podcast['lang'] == 'ml') {
                var podcast_div = document.createElement('div');
                podcast_div.classList.add('col-lg-6');
                podcast_div.innerHTML = podcast['embedded_code'];
                podcasts_div.appendChild(podcast_div);
            }



        });
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/front/js/jquery.js"></script>
    <script src="<?= base_url() ?>assets/front/js/plugins.js"></script>
    <script src="<?= base_url() ?>assets/front/js/functions.js"></script>
    <style>
    .buttons {
        justify-content: center;
    }

    .paragraph {
        padding: 0% 5%;

    }

    .buttons button {
        border-color: #7E878C;
        background-color: #7E878C;
    }

    .buttons button:hover {
        border-color: #ca0027;
        background-color: #c31727;
    }

    .buttons button:active {
        border-color: #ca0027;
        background-color: #c31727;
    }

    .buttons button:focus {
        border-color: #ca0027;
        background-color: #c31727;
    }
    </style>

</body>

</html>