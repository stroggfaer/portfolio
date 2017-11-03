<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Pages;
use app\models\Options;
use yii\bootstrap\Modal;


AppAsset::register($this);


if (!Yii::$app->user->isGuest) {
    //  print_arr(Yii::$app->user);
   // echo '++';
}else{
  //  echo '-';
}
$menu = Pages::find()->where(['status'=>1])->all();
$options = Options::find()->where(['id'=>1000,'status'=>1])->one();
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<!--[if IE 9 ]>    <html lang="ru" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="ru" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Ruslan Z">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <link rel="shortcut icon" href="/favicon.ico">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head><!-- /End head -->

<body class="full-width-page">
<?php $this->beginBody() ?>
<?php

?>
<?php if(Yii::$app->request->url == Yii::$app->homeUrl): ?>
    <div id="loader" class="overlay-loader">
        <div class="loader-background color-flip"></div>
        <img class="loader-icon spinning-cog " src="/images/cog03.svg" data-cog="cog03">
    </div>

    <?php Modal::begin(['header' => '<h4></h4>',
        'id' => 'orders-modal',
        'size'=>'modal-sm',
    ]);?>
    <div class="alert alert-success"></div>
    <?php Modal::end(); ?>
<?php endif; ?>


<!-- UP Button
======================================================================== -->
<div id="up-button"><a href="#" title="To Top"><i class="fa fa-angle-up"></i></a></div>

<!-- Main Wrapper
======================================================================== -->
<div class="loader-block">
    <div class="loader-block-container">
        <div class="circle-block circle-block-style-4"></div>
    </div>
</div>
<div id="main-wrapper">

    <header id="header-section-1" class="header-section header-style-1">
        <!-- Header Section Container -->
        <div class="header-section-container">
            <!-- Header Menu -->
            <!-- Header Menu Container -->
            <div class="header-menu">
                <div class="header-menu-container header-menu-stuck ">
                    <!-- Navbar -->
                    <nav class="navbar">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <!-- col-md-12 -->
                                <div class="col-md-12">
                                    <!-- Navbar Header -->
                                    <div class="navbar-header">
                                        <!-- Logo -->
                                        <a href="#" class="navbar-brand" title="">
                                            <div class="desctop"><img src="/images/logo.png" alt="" class="logo wow tada" data-wow-delay="5s"></div>
                                            <div class="mobile profi">
                                                <img src="/images/logo-m.png" alt="" class="logo logo-m">
                                                <span class="name"><?=$options->title?></span>
                                            </div>
                                        </a><!-- /End Logo -->

                                        <!-- Toggle Menu Button -->
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                            <span><i class="lines"></i></span>
                                        </button><!-- /End Toggle Menu Button -->

                                    </div><!-- /End Navbar Header -->

                                    <!-- Navbar Collapse ( Menu ) -->
                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav navbar-right js-anchor">
                                            <li ><a href="#about" title="Обо мне"> Обо мне</a></li>
                                            <li><a href="#portfolio" title="Портфолио">Портфолио</a></li>
                                            <li><a href="#price " title="Цены">Цены</a></li>
                                            <li><a href="#contacts" title="Контакты">Контакты</a></li>
                                        </ul>
                                    </div><!-- /End Navbar Collapse ( Menu ) -->
                                </div><!-- /End col-md-12 -->
                            </div><!-- /End row -->
                        </div><!-- /End container -->
                    </nav><!-- /End Navbar -->
                </div>
            </div><!-- /End Header Menu Container -->

        </div><!-- /End Header Section Container -->
    </header><!-- /End Header 1 --><!-- Hero 1-->
    <?=$content?>
    <footer id="copyright-section-2" class="copyright-section black-section">
        <!-- Section Container -->
        <div class="section-container">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <!-- Copyright Block Container -->
                <div class="copyright-block-container">
                    <!-- Title -->
                    <p class="text-center">© <?= date('Y') ?> <a href="#" title="<?=$options->title?>"><?=$options->title?></a> Все права защищены</p>
                </div><!-- /End Copyright Block Container -->
            </div><!-- /End container -->
        </div><!-- /End Section Container -->
    </footer><!-- /End Copyright 2 -->

</div><!-- /End Main Wrapper -->

<?php $this->endBody() ?>
<script type="application/javascript" >
    jQuery(document).ready(function () {

        particlesJS('particles-js',

            {
                "particles": {
                    "number": {
                        "value": 160,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#ffffff"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 1,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 1,
                            "opacity_min": 0,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 4,
                            "size_min": 0.3,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": false,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 1,
                        "direction": "none",
                        "random": true,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 600
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": false,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 250,
                            "size": 0,
                            "duration": 2,
                            "opacity": 0,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 400,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            }
        );
    });

</script>
</body>
</html>
<?php $this->endPage() ?>