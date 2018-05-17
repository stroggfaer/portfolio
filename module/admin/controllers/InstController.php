<?php

namespace app\module\admin\controllers;

use Yii;

use app\models\UploadImages;
use app\models\InstLogin;

use app\module\admin\models\PostInstLogin;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

set_time_limit(0);
date_default_timezone_set('UTC');

/**
 * DefaultController implements the CRUD actions for Pages model.
 */
class InstController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['superadmin'],
                    ],
                ],
            ],

        ];
    }

    /*------------------ИНСТОГРАММ API V 2.0.0-------------------*/

        public function actionIndex()
        {

            try {
                $accounts = InstLogin::find()->where(['status'=>1])->one();
               // $login = \Yii::$app->inst->login($accounts->login, $accounts->password);
            } catch (\Exception $e) {
                $message =  'Something went wrong: '.$e->getMessage()."\n";
                return $this->render('error/error',[
                    'message' => $message
                ]);
            }

            // Запомнить текущий URL
            return $this->render('index');
        }



        /*--------------Инстограмм Api--------------
        public function actionInstagramApi() {

            //\Yii::$app->instagram->

            return $this->render('instagram/index', [
                'model' => false,
            ]);
        }*/

    /**
     * Lists all InstLogin models.
     * @return mixed
     */
    public function actionAccounts()
    {
        $searchModel = new PostInstLogin();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('accounts/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InstLogin model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewAccounts($id)
    {
        return $this->render('accounts/view', [
            'model' => $this->findModelAccounts($id),
        ]);
    }

    /**
     * Creates a new InstLogin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateAccounts()
    {
        $model = new InstLogin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-accounts', 'id' => $model->id]);
        }

        return $this->render('accounts/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InstLogin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateAccounts($id)
    {
        $model = $this->findModelAccounts($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-accounts', 'id' => $model->id]);
        }

        return $this->render('accounts/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InstLogin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteAccounts($id)
    {
        $this->findModelAccounts($id)->delete();

        return $this->redirect(['accounts']);
    }

    /**
     * Finds the InstLogin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InstLogin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelAccounts($id)
    {
        if (($model = InstLogin::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }





}
