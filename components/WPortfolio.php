<?php

namespace app\components;
use app\models\Portfolio;
use app\models\PortfolioGroups;
use yii\base\Widget;
use  app\models\Images;

class WPortfolio extends Widget{

    public function run()
    {
        $portfolio = Portfolio::find()->where(['status'=>1])->orderBy('position ASC')->all();
        $portfolioGroups = PortfolioGroups::find()->where(['status'=>1])->all();

        ?>
            <!-- Section Container -->
            <div class="section-container">

                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- Title Block -->
                        <div class="col-lg-10 col-lg-offset-1 col-md-12 title-block">
                            <!-- Title Block Container -->
                            <div class="title-block-container text-center">
                                <!-- Title -->
                                <h2 id="portfolio" class="wow fadeIn">Портфолио</h2>
                                <!-- Description -->
                                <p>Небольшой список моих работ.</p>
                                <!-- Line Separator -->
                                <div class="line-separator"></div>

                            </div><!-- /End Title Block Container -->
                        </div><!-- /End Title Block -->
                    </div><!-- /End row -->
                </div><!-- /End container -->

                <!-- Filter Section -->
                <div class="col-md-12 filter-section ">
                    <div class="container">
                        <!-- Filter Controls - Simple Mode -->
                        <div class="row">
                            <ul class="simplefilter">
                                <li class="active" data-filter="all">Все</li>
                                <?php foreach($portfolioGroups as $key=>$group): ?>
                                    <li data-filter="<?=$group->id?>"><?=$group->title?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="filtr-container">
                                <?php foreach($portfolio as $key=>$item): ?>
                                    <div class="col-xs-6 col-sm-4 filtr-item" data-category="<?=$item->lineArray?>" data-sort="">
                                        <img class="img-responsive" src="<?=Portfolio::getImageHref($item->id,true)?>" alt="<?=$item->title?>">
                                        <div class="item-desc">
                                            <h3><?=$item->title?></h3>
                                            <p><?=$item->description?></p>
                                            <a href="<?=Portfolio::getImageHref($item->id)?>" data-fancybox="gallery" class="top no_focus"><div class="ion-android-search show"></div></a>
                                            <div class="button-t">
                                                <?php if($item->url):?><a href="<?=$item->url?>" target="_blank" class="ion-android-exit link no_focus" title=""></a><?php endif;?>
                                                <?php if($item->git):?><a href="<?=$item->git?>" target="_blank" class="ion-social-octocat link no_focus" title=""></a><?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div><!-- /End Filter Section -->

                <!-- button-block -->
                <div class="col-md-12 button-block hidden">
                    <div class="button-block-container text-center">
                        <a href="#" title="View All Projects" class="btn btn-lpbuilder wave-effect">Загрузить еще</a>
                    </div>
                </div><!-- /End button-block -->

            </div><!-- /End Section Container -->
            <?php
        }

}

