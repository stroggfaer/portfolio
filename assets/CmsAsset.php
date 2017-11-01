<?php

namespace app\assets;

use yii\web\AssetBundle;

class CmsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css;
    public $js;
    public function init()
    {
        $this->css = [
            'css/site.css?'.time(),
            'css/global.css?'.time(),
        ];
        $this->js = [
          //  '/js/global.js?'.time(),
            '/js/admin/cms.js?'.time(),
        ];
        parent::init(); // TODO: Change the autogenerated stub

    }
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}