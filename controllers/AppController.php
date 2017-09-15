<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AppController extends Controller
{

    public function init()
    {
        parent::init(); // TODO: Главный контроллер;


    }
    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }

}
