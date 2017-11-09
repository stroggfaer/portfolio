<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\module\admin\models\PostSearchOrders */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки из формы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'   => function ($model, $key, $index, $grid) {
            $class = ($model->status == 1 ? '' : 'danger-com');

            return [
                'key'   => $key,
                'index' => $index,
                'class' => $class
            ];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label'     => 'Дата заявки',
                'attribute' => 'date',
                'format' =>  ['date', 'php:d.m.Y'],
                //'options' => ['width' => '100']
            ],
            'name',
            'email:email',
            'text:ntext',
            // 'date',
            // 'status',
            [
                'attribute' => 'Пометить',
                'format' => 'raw',
                'contentOptions' => ['class'=>'text-center'],
                'value' => function ($model, $index, $widget) {
                    return Html::checkbox('status', $model->status, ['value'=>$index,'class'=>'js-checkbox-column', 'disabled' => false]);
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;{delete}',
                'headerOptions' => ['width' => '80'],
                'urlCreator'=>function($action, $model, $key, $index){
                    return Url::to(['call','id'=>$model->id]);
                }

            ],
        ],
    ]); ?>
</div>
