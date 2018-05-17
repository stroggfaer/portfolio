<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\admin\models\PostInstLogin */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inst Logins';
$this->params['breadcrumbs'][] = $this->title;
/*
$username = 'rendzhi@mail.ru';
$password = '1024531rendzhi+';

try {
     $login = \Yii::$app->inst->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
    exit(0);
}
print_arr($login);*/
?>
<div class="inst-login-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inst Login', ['create-accounts'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'login',
            //'password',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
