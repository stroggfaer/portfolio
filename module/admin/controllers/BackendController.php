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

        // Заявки из формы;
        $ordersCount = \app\models\Orders::find()->where(['status'=>0])->count();

        $this->actionNavigation = [
            'main' => [
                'title' => 'Главная',
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
                'count'=> $ordersCount,
                'link' => '/admin/orders/',
                'status' => 1,
            ],
            'service' => [
                'title' => 'Сервис',
                'link' => '/admin/services/',
                'status' => 1,
                'items' => [
                    [
                        'link' => '/admin/service-api/',
                        'title' => 'Телеграмм бот',
                    ],
                    [
                        'link' => '/admin/instagram-api',
                        'title' => 'Инстограмм Api',
                    ],
                ],
            ],
            'options' => [
                'title' => 'Настройка',
                'link' => '/admin/options/',
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
