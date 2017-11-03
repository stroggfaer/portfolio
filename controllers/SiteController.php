<?php

namespace app\controllers;

use app\models\Pages;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\controllers\AppController;
use app\models\Orders;
use yii\widgets\ActiveForm;
class SiteController extends AppController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $pages = Pages::find()->where(['id'=>1000])->one();
        // Сео настройки;
        if(!empty($pages)) $this->setMeta((!empty($pages->seo_title) ? $pages->seo_title : $pages->title),$pages->keywords,$pages->description);

        $order = new Orders();
        // Отправка заявка;


        if (Yii::$app->request->isAjax &&   Yii::$app->request->post('send')) {

            $order->load(Yii::$app->request->post());

            $response = Yii::$app->response;
            $response->format = \yii\web\Response::FORMAT_JSON;

            if($order->validate()) {
                $order->group_id = 1000;
                if(!$order->save(true)) print_arr($order->getErrors());
                 return $response = ['success'=>true, 'text'=>'Ваша заявка отправлена!<br> В ближайшее время свяжусь с вами!'];
            }else{
                return ActiveForm::validate($order);
            }
        }


        return $this->render('index',[
            'order'=>$order
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */

    public function actionLogin()
    {
        $this->layout = "default";

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();
    }

/*
    // Регистрация;
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
                Yii::$app->getSession()->setFlash('success', 'Подтвердите ваш электронный адрес.');
                return $this->goHome();
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    } */
    /*
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    } */

    /**
     * Displays about page.
     *
     * @return string
     */
    /*
    public function actionAbout()
    {
        return $this->render('about');
    }*/
}
