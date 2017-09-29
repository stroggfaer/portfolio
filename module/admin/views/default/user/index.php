<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\module\admin\models\PostSearchUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create-user'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'   => function ($model, $key, $index, $grid) {
            $class = ($model->status == 1 ? '' : 'alert-danger');

            return [
                'key'   => $key,
                'index' => $index,
                'class' => $class
            ];
        },
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id',
                'label'=>'Id',
                'headerOptions' => ['width' => '80'],
            ],

            // 'created_at',
          //  'updated_at',
            'username',
         //   'phone',
            // 'auth_key',
            // 'email_confirm_token:email',
            // 'password_hash',
            // 'password_reset_token',
             'email:email',
            [
                'attribute'=>'status',
                'label'=>'Статус',
                // 'width'=>'50px',
                'headerOptions' => ['width' => '80'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                'headerOptions' => ['width' => '80'],
                'urlCreator'=>function($action, $model, $key, $index){
                    return Url::to([$action.'-user','id'=>$model->id]);
                }

            ],
        ],
    ]); ?>
</div>
