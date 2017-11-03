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
                'items' => [
                    [
                        'link' => '/admin/catalog/create',
                        'title' => 'Добавить категория',
                    ],
                ],
            ],
            'portfolio' => [
                'title' => 'Управление портфолио',
                'link' => '/admin/portfolio-groups/',
                'status' => 1,
                'items' => [
                    [
                        'link' => '/admin/goods/create',
                        'title' => 'Добавить товар',
                    ],
                ],
            ],
          /*  'orders' => [
                'title' => 'Управление заказами',
                'link' => '/admin/orders/',
                'status' => 1,
                'items' => [
                    [
                        'link' => '/admin/goods/create',
                        'title' => 'Заказы',
                    ],
                ],
            ],*/
            'out' => [
                'title' => 'Выйти',
                'link' => '/site/logout',
                'status' => 1,
            ],

        ];

    }
}
