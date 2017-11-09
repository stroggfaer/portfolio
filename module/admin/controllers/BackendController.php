<?php

namespace app\module\admin\controllers;
use Yii;
use yii\web\Controller;
use app\assets\CmsAsset;
/**
 * Default controller for the `admin` module
 */
class BackendController extends Controller
{

    public $actionNavigation;

    public function init()
    {
        parent::init();

        $this->actionNavigation = [
            'main' => [
                'title' => 'Панель управления',
                'link' => '/admin/',
                'status' => 1,
            ],
            'pages' => [
                'title' => 'Управление страницами',
                'link' => '/admin/pages/',
                'status' => 1,
            ],
            'category' => [
                'title' => 'Пользователи',
                'link' => '/admin/user/',
                'status' => 1,
            ],
            'portfolio' => [
                'title' => 'Управление портфолио',
                'link' => '/admin/portfolio-groups/',
                'status' => 1,
                'items' => [
                    [
                        'link' => '/admin/portfolio-groups',
                        'title' => 'Добавить группы портфолио',
                    ],
                    [
                        'link' => '/admin/portfolio',
                        'title' => 'Добавить портфолио',
                    ],
                ],
            ],
            'orders' => [
                'title' => 'Заявки',
                'link' => '/admin/orders/',
                'status' => 1,
            ],
            'out' => [
                'title' => 'Выйти',
                'link' => '/site/logout',
                'status' => 1,
            ],

        ];

    }
}
