<?php



?>


<div id="hero-section-1" class="hero-section white-section border-bottom">
    <!-- Section Container -->
    <div class="section-container">
        <!-- Background Image Block -->
        <div class="background-image-block parallax-effect lpbuilder-image">
            <div id="particles-js"></div>
            <div class="filter"></div>
            <img src="/images/bg/bg4.jpg" alt="Parallax Image" style="top: -175px; transform: translate(-50%, 0px);">

        </div><!-- /End Background Image Block -->
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Title Block -->
                <div class="col-lg-10 col-lg-offset-1 col-md-12 title-block">
                    <!-- Title Block Container -->
                    <div class="title-block-container white-content text-center">
                        <!-- Description -->
                        <p  style="height: 50px">
                            <span id="printText"></span>
                            <span class="animated flash infinite" style="vertical-align: text-bottom;">|</span>
                        </p>
                        <!-- Title -->
                        <h1 class="wow fadeIn" data-wow-delay="2s">Full Stack Developer</h1>
                        <!-- Social Icons Block -->
                        <div class="social-icons-block-mod  text-center wow bounce " data-wow-delay="3s" >
                            <ul>
                                <li><a href="#" title="Facebook" class="social-btn f "><span  class="ion-social-facebook"></span></a></li>
                                <li><a href="#" title="Google Plus" class="social-btn"><span class="ion-social-googleplus"></span></a></li>
                                <li><a href="#" title="Twitter" class="social-btn t"><span class="ion-social-twitter"></span></a></li>
                                <li><a href="#" title="git" class="social-btn git"><span class="ion-social-github"></span></a></li>
                                <li><a href="#" title="git" class="social-btn git in"><span class="ion-social-instagram"></span></a></li>
                            </ul>
                        </div><!-- /End Social Icons Block -->

                    </div><!-- /End Title Block Container -->
                </div><!-- /End Title Block -->


            </div><!-- /End row -->
        </div><!-- /End container -->


    </div><!-- /End Section Container -->
</div><!-- /End Hero 1 --><!-- Content 11
            ==================================================================== -->

<div id="team-section-11" class="team-section grey-section">
    <!-- Section Container -->
    <div class="section-container">
        <!-- Title Block -->
        <div class="col-lg-10 col-lg-offset-1 col-md-12 title-block">
            <!-- Title Block Container -->
            <div class="title-block-container text-center">

                <!-- Title -->
                <h2 id="about">Обо мне</h2>
                <!-- Line Separator -->
                <div class="line-separator"></div>
                <div class="row">
                    <div class="col-md-6 wow bounceInLeft">
                        <div class="images"><img src="images/img.jpg"  alt="rus" class="ad"/> </div>
                    </div>
                    <div class="col-md-6 wow bounceInRight">
                        <div class="content-about">
                            <h3 class="title text-left">Здравствуйте,меня зовут Руслан</h3>
                            <div class="text text-left">
                                Я web - разработчик. Занимаюсь создание сайтов.  Опыт работы  с  2010 года.  Имею ключевые  навыки<br>
                                <b>Front-end:</b>  HTML, CSS (Препроцессор LESS), javaScript/jQuery, Gulp, Webpack<br>
                                <b>Back end:</b> PHP, Mysql/SQL, фреймворк Yii2 и другие технологии.
                                <p>Осуществляю творческий подход в решении нестандартных задач.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /End Title Block Container -->
        </div><!-- /End Title Block -->
    </div><!-- /End Section Container -->
</div><!-- /End Team 11 --><!-- Portfolio 2
            ==================================================================== -->

<div id="portfolio-section-2" class="portfolio-section white-section ">

    <?=\app\components\WPortfolio::widget()?>
</div><!-- /End Portfolio 2 --><!-- Pricing 9
            ==================================================================== -->


<div id="content-section-11" class="content-section wow fadeIn">
    <div class="bg"><img src="/images/bg/bg10.jpg" alt="" class="ad"></div>
    <!-- Section Container -->
    <div class="section-container white">
        <!-- Title Block -->
        <div class="col-lg-10 col-lg-offset-1 col-md-12 title-block ">
            <!-- Title Block Container -->
            <div class="title-block-container text-center">
                <!-- Title -->
                <h2 >ПОРЯДОК РАБОТЫ</h2>
                <!-- Description -->
                <p>для заказа дизайна нужно заполнить бриф</p>
                <div class="line-separator white"></div>
            </div><!-- /End Title Block Container -->
        </div>
        <!-- container -->
        <div class="container">


            <!-- Content Block -->
            <div class="col-md-3 col-sm-6 wide-block content-block content-block-style-5 right">
                <!-- Content Block Container -->
                <div class="content-block-container text-center">
                    <!-- Icon -->
                    <i class="ion-clipboard icon-lg" ></i>
                    <!-- Title -->
                    <h4 class="white">Обсуждение задания</h4>
                </div><!-- /End Content Block Container -->
            </div><!-- /End Content Block -->


            <!-- Content Block -->
            <div class="col-md-3 col-sm-6 wide-block content-block content-block-style-5 right">
                <!-- Content Block Container -->
                <div class="content-block-container text-center">
                    <!-- Icon -->
                    <i class="fa fa-file-code-o icon-lg" aria-hidden="true"></i>
                    <!-- Title -->
                    <h4 class="white">Реализация проекта</h4>
                </div><!-- /End Content Block Container -->
            </div><!-- /End Content Block -->


            <!-- Content Block -->
            <div class="col-md-3 col-sm-6 wide-block content-block content-block-style-5 right">
                <!-- Content Block Container -->
                <div class="content-block-container text-center">
                    <!-- Icon -->
                    <i class="ion-android-laptop icon-lg"></i>
                    <!-- Title -->
                    <h4 class="white">Тестирование Проекта</h4>

                </div><!-- /End Content Block Container -->
            </div><!-- /End Content Block -->

            <!-- Content Block -->
            <div class="col-md-3 col-sm-6 wide-block content-block content-block-style-5">
                <!-- Content Block Container -->
                <div class="content-block-container text-center">
                    <!-- Icon -->
                    <i class="ion-flag icon-lg"></i>
                    <!-- Title -->
                    <h4 class="white">Утверждение и оплата</h4>
                </div><!-- /End Content Block Container -->
            </div><!-- /End Content Block -->


        </div><!-- /End container -->
    </div><!-- /End Section Container -->
</div><!-- /End Content 11 --><!-- Team 11
            ==================================================================== -->

<!-- Pricing 3 ==================================================================== -->
<div id="pricing-section-3" class="pricing-section white-section wow fadeIn">
    <!-- Section Container -->
    <div class="section-container">
        <!-- container -->
        <div class="container container-com">
            <!-- row -->
            <div class="row">
                <!-- Title Block -->
                <div class="col-lg-10 col-lg-offset-1 col-md-12 title-block">
                    <!-- Title Block Container -->
                    <div class="title-block-container text-center">
                        <!-- Title -->
                        <h2 id="price">Цены</h2>
                        <!-- Description -->
                        <p>Release bandwidth user experience research &amp; development branding termsheet business plan advisor analytics ecosystem entrepreneur freemium.</p>
                        <!-- Line Separator -->
                        <div class="line-separator"></div>
                    </div><!-- /End Title Block Container -->
                </div><!-- /End Title Block -->

                <!-- Pricing Tables Wrapper -->
                <div class="pricing-tables-wrapper ">


                    <!-- Pricing Block -->
                    <div class="col-md-4 col-sm-6 pricing-block pricing-block-style-1">
                        <!-- Pricing Block Container -->
                        <div class="pricing-block-container" >

                            <!-- Pricing Block Title -->
                            <div class="pricing-block-title">
                                <h1>Верстка макета</h1>
                                <p>Эконом</p>
                            </div><!-- /End Pricing Block Title -->

                            <!-- Pricing Block Price -->
                            <div class="pricing-block-price">
                                <h2>
                                    <span class="currency">от</span>
                                    <span class="amount">999</span>
                                    <span class="duration">р.</span>
                                </h2>
                            </div><!-- /End Pricing Block Price -->

                            <!-- Pricing Block Features -->
                            <div class="pricing-block-features">
                                <ul>
                                    <li>Адаптивная верстка</li>
                                    <li>20 Emails</li>
                                    <li>1 FTP account</li>
                                    <li>1 Domain name</li>
                                    <li>20GB Disk space</li>
                                </ul>
                            </div><!-- /End Pricing Block Features -->
                        </div><!-- /End Pricing Block Container -->
                    </div><!-- /End Pricing Block -->


                    <!-- Pricing Block -->
                    <div class="col-md-4 col-sm-6 pricing-block pricing-block-style-1">
                        <!-- Pricing Block Container -->
                        <div class="pricing-block-container">

                            <!-- Pricing Block Title -->
                            <div class="pricing-block-title">
                                <h1>Одностраничник</h1>
                                <p>Верстка макета</p>
                            </div><!-- /End Pricing Block Title -->

                            <!-- Pricing Block Price -->
                            <div class="pricing-block-price">
                                <h2>
                                    <span class="currency">$</span>
                                    <span class="amount">999</span>
                                    <span class="duration">/MO</span>
                                </h2>
                            </div><!-- /End Pricing Block Price -->

                            <!-- Pricing Block Features -->
                            <div class="pricing-block-features">
                                <ul>
                                    <li>10 Website</li>
                                    <li>200 Emails</li>
                                    <li>10 FTP account</li>
                                    <li>10 Domain name</li>
                                    <li>200GB Disk space</li>
                                </ul>
                            </div><!-- /End Pricing Block Features -->

                        </div><!-- /End Pricing Block Container -->
                    </div><!-- /End Pricing Block -->


                    <!-- Pricing Block -->
                    <div class="col-md-4 col-sm-6 pricing-block pricing-block-style-1">
                        <!-- Pricing Block Container -->
                        <div class="pricing-block-container">

                            <!-- Pricing Block Title -->
                            <div class="pricing-block-title">
                                <h1>Сайт-Визитка</h1>
                                <p>Под ключ</p>
                            </div><!-- /End Pricing Block Title -->

                            <!-- Pricing Block Price -->
                            <div class="pricing-block-price">
                                <h2>
                                    <span class="currency">$</span>
                                    <span class="amount">2 999</span>
                                    <span class="duration">/MO</span>
                                </h2>
                            </div><!-- /End Pricing Block Price -->

                            <!-- Pricing Block Features -->
                            <div class="pricing-block-features">
                                <ul>
                                    <li>30 Website</li>
                                    <li>600 Emails</li>
                                    <li>30 FTP account</li>
                                    <li>30 Domain name</li>
                                    <li>600GB Disk space</li>
                                </ul>
                            </div><!-- /End Pricing Block Features -->

                        </div><!-- /End Pricing Block Container -->
                    </div><!-- /End Pricing Block -->


                </div><!-- /End Pricing Tables Wrapper -->


            </div><!-- /End row -->
        </div><!-- /End container -->


    </div><!-- /End Section Container -->
</div><!-- /End Pricing 3 -->

<div id="hero-section-15" class="hero-section black-section wow fadeIn">
    <!-- Section Container -->
    <div class="section-container">


        <!-- Background Image Block -->
        <div class="background-image-block parallax-effect lpbuilder-background">
            <img src="images/bg/bg8.jpg" alt="" style="top: -85.5px; transform: translate(-50%, 0px);">
        </div><!-- /End Background Image Block -->

        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Title Block -->
                <div class="col-lg-10 col-lg-offset-1 col-md-12 title-block">
                    <!-- Title Block Container -->
                    <div class="title-block-container white-content text-center">

                        <!-- Title -->
                        <h2 id="contacts">ОСТАВИТЬ ЗАЯВКУ</h2>
                        <!-- Description -->
                        <p>Заполните форму заявки сейчас,<br> и я свяжусь с вами в ближайшее время</p>
                        <div class="form-contact">
                            <form role="form">
                                <div class="form-group">
                                    <input type="type" class="form-control string" id="name" placeholder="Ваше имя">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control string" id="email" placeholder="Ваш email">
                                </div>
                                <div class="form-group">
                                    <textarea  class="form-control text" rows="3" placeholder="Дополнительная информация"></textarea>
                                </div>
                                <div class="text-center"><button type="submit" class="btn btn-lpbuilder wave-effect">Отправить</button></div>
                            </form>
                        </div>

                    </div><!-- /End Title Block Container -->
                </div><!-- /End Title Block -->

            </div><!-- /End row -->
        </div><!-- /End container -->


    </div><!-- /End Section Container -->
</div><!-- /End Hero 15 --><!-- Copyright 2
            ==================================================================== -->
