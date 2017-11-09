<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600|Roboto:100,100i,300,300i,400,400i,500,700&amp;subset=cyrillic',
        'js/plugins/wow/css/animate.min.css',
        'js/plugins/fancybox/fancybox.css',
         'fonts/font-awesome/css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/social-icons.css',
        'css/global.css',
        'css/style.css',
        'css/responsive.css',
        'css/mod.css',

    ];
    public $js = [
        'js/plugins/filter/filter.js',
        'js/plugins/mobile/mobile.min.js',
        'js/plugins/particles/particles.min.js',
        'js/plugins/wow/js/wow.min.js',
        'js/plugins/fancybox/fancybox.js',
        'js/global.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',

    ];
    // Подключаем в шапку;
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

}
