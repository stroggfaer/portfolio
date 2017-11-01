<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\module\admin\models\PostSearchPortfolio */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Портфолио';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create-portfolio'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'image_id',
                'label'     => 'Изображение',
                'content'   => function ($data) {
                    $html = '';
                    foreach($data->images as $image) {
                        $html .= '<div><img width="70px" class="pull-left images_t '.(!empty($image->main) ? 'main' : '').'  " src="'.$image->getPathImage('min').'" /></div>';
                    }
                    return  $html;
                }
            ],
            'title',
            'description:ntext',
            'date',
            // 'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                'headerOptions' => ['width' => '80'],
                'urlCreator'=>function($action, $model, $key, $index){
                    return Url::to([$action.'-portfolio','id'=>$model->id]);
                }

            ],
        ],
    ]); ?>
</div>
