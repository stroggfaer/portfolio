<?php

namespace app\module\admin\controllers;

use Yii;
use app\models\Pages;
use app\module\admin\models\PostSearchPages;

use app\models\User;
use app\module\admin\models\PostSearchUser;

use app\models\Portfolio;
use app\module\admin\models\PostSearchPortfolio;

use app\models\PortfolioGroups;
use app\module\admin\models\PostSearchPortfolioGroup;

use app\models\UploadImages;

use app\models\PortfolioDetails;

use app\models\Orders;
use app\module\admin\models\PostSearchOrders;

use app\models\Options;
use app\module\admin\models\PostSearchOptions;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * DefaultController implements the CRUD actions for Pages model.
 */
class DefaultController extends BackendController
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

    public function actionIndex()
    {
        // Запомнить текущий URL

        return $this->render('index');
    }


    /**
     * Lists all Pages models.
     * @return mixed
     */
    public function actionPages()
    {
        $searchModel = new PostSearchPages();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('pages/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pages model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewPages($id)
    {
        return $this->render('pages/view', [
            'model' => $this->findModelPages($id),
        ]);
    }

    /**
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatePages()
    {
        $model = new Pages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-pages', 'id' => $model->id]);
        } else {
            return $this->render('pages/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatePages($id)
    {
        $model = $this->findModelPages($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-pages', 'id' => $model->id]);
        } else {
            return $this->render('pages/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletePages($id)
    {
        $this->findModelPages($id)->delete();

        return $this->redirect(['pages']);
    }

    /**
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelPages($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    /*--------------Управление пользователи;---------------*/
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionUser()
    {
        $searchModel = new PostSearchUser();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('user/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewUser($id)
    {
        return $this->render('user/view', [
            'model' => $this->findModelUser($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateUser()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                $model->setPassword($model->password);
                $model->generateAuthKey();
                $model->generateEmailConfirmToken();
                if ($model->save()) {
                    // нужно добавить следующие три строки:
                    //   $auth = Yii::$app->authManager;
                    //  $authorRole = $auth->getRole('superadmin');
                    //  $auth->assign($authorRole, $user->getId());
                    return $this->redirect(['view-user', 'id' => $model->id]);
                }else{
                    print_arr($model->errors);
                    die('A');
                }
        } else {
            return $this->render('user/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateUser($id)
    {
        $model = $this->findModelUser($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                $model->setPassword($model->password);
                $model->generateAuthKey();
                $model->generateEmailConfirmToken();
                if ($model->save()) {
                    // нужно добавить следующие три строки:
                    //   $auth = Yii::$app->authManager;
                    //  $authorRole = $auth->getRole('superadmin');
                    //  $auth->assign($authorRole, $user->getId());
                    return $this->redirect(['view-user', 'id' => $model->id]);
                }else{
                    print_arr($model->errors);
                    die('A');
                }
        } else {
            return $this->render('user/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteUser($id)
    {
        $this->findModelUser($id)->delete();

        return $this->redirect(['user']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelUser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * *************Портфолио группа*************************
     * Lists all PortfolioGroups models.
     * @return mixed
     */
    public function actionPortfolioGroups()
    {
        $searchModel = new PostSearchPortfolioGroup();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('portfolio-groups/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PortfolioGroups model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewPortfolioGroups($id)
    {
        return $this->render('portfolio-groups/view', [
            'model' => $this->findModelPortfolioGroups($id),
        ]);
    }

    /**
     * Creates a new PortfolioGroups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatePortfolioGroups()
    {
        $model = new PortfolioGroups();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-portfolio-groups', 'id' => $model->id]);
        } else {
            return $this->render('portfolio-groups/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PortfolioGroups model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatePortfolioGroups($id)
    {
        $model = $this->findModelPortfolioGroups($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-portfolio-groups', 'id' => $model->id]);
        } else {
            return $this->render('portfolio-groups/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PortfolioGroups model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletePortfolioGroups($id)
    {
        $this->findModelPortfolioGroups($id)->delete();

        return $this->redirect(['portfolio-groups']);
    }

    /**
     * Finds the PortfolioGroups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PortfolioGroups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelPortfolioGroups($id)
    {
        if (($model = PortfolioGroups::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Lists all Portfolio models.
     * @return mixed
     */
    public function actionPortfolio()
    {
        $searchModel = new PostSearchPortfolio();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('portfolio/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Portfolio model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewPortfolio($id)
    {
        return $this->render('portfolio/view', [
            'model' => $this->findModelPortfolio($id),
        ]);
    }

    /**
     * Creates a new Portfolio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatePortfolio()
    {
        $model = new Portfolio();

        // Изображения;
        $images = new UploadImages();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            // Добавляем запись;
            if(!empty($model->checkboxList)) {
                foreach ($model->checkboxList as $group_id) {
                    $portfolioDetails =  new PortfolioDetails();
                    $portfolioDetails->group_id = $group_id;
                    $portfolioDetails->portfolio_id = $model->id;
                    if (!$portfolioDetails->save()) {
                        print_arr($portfolioDetails->getErrors());
                        die('Валидация');
                    }
                }
            }

            return $this->redirect(['view-portfolio', 'id' => $model->id]);
        } else {
            return $this->render('portfolio/create', [
                'model' => $model,
                'images' => $images,
            ]);
        }
    }

    /**
     * Updates an existing Portfolio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatePortfolio($id)
    {

        $model = $this->findModelPortfolio($id);

        // Изображения;
        $images = new UploadImages();

        // Добавляем запись;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                // Загрузка Связная табоица;
                $PortfolioDetailsAll =  PortfolioDetails::findAll(['portfolio_id'=>$id]);

                // Удаляем старые записи;
                if(!empty($PortfolioDetailsAll)) {
                    foreach ($PortfolioDetailsAll as $item) {
                        $item->delete();
                    }
                }
                // Добавляем запись;
                if(!empty($model->checkboxList)) {
                    foreach ($model->checkboxList as $group_id) {
                        $portfolioDetails =  new PortfolioDetails();
                        $portfolioDetails->group_id = $group_id;
                        $portfolioDetails->portfolio_id = $model->id;
                        if (!$portfolioDetails->save()) {
                            print_arr($portfolioDetails->getErrors());
                            die('Валидация');
                        }
                    }
                }
            return $this->redirect(['view-portfolio', 'id' => $model->id]);
        } else {
            return $this->render('portfolio/update', [
                'model' => $model,
                'images'=>$images,
            ]);
        }
    }


    /**
     * Deletes an existing Portfolio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletePortfolio($id)
    {
        $this->findModelPortfolio($id)->delete();

        return $this->redirect(['portfolio']);
    }

    /**
     * Finds the Portfolio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portfolio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelPortfolio($id)
    {
        if (($model = Portfolio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*--------Заявки-----------*/
    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionOrders()
    {
        $searchModel = new PostSearchOrders();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Пометить как отмечень;
        if (Yii::$app->request->post('checkboxColumn')) {
            $id = Yii::$app->request->post('id');
            $status = Yii::$app->request->post('status');
            $model =  $this->findModelOrders($id);
            $model->status = $status;
            $model->save(false);
            return $this->render('orders/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }


        return $this->render('orders/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewOrders($id)
    {
        return $this->render('orders/view', [
            'model' => $this->findModelOrders($id),
        ]);
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteOrders($id)
    {
        $this->findModelOrders($id)->delete();

        return $this->redirect(['orders']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelOrders($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*-------------НАСТРОЙКА САЙТ И МОДУЛИ-----------------*/
    /**
     * Lists all Options models.
     * @return mixed
     */
    public function actionOptions()
    {

        $searchModel = new PostSearchOptions();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('options/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Options model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewOptions($id)
    {
        return $this->render('options/view', [
            'model' => $this->findModelOptions($id),
        ]);
    }

    /**
     * Creates a new Options model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateOptions()
    {
        $model = new Options();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-options', 'id' => $model->id]);
        } else {
            return $this->render('options/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Options model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateOptions($id)
    {
        $model = $this->findModelOptions($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-options', 'id' => $model->id]);
        } else {
            return $this->render('options/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Options model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteOptions($id)
    {
        $this->findModelOptions($id)->delete();

        return $this->redirect(['options']);
    }

    /**
     * Finds the Options model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Options the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelOptions($id)
    {
        if (($model = Options::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
