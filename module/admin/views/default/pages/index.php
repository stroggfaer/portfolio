<?php
use yii\helpers\Html;
use yii\grid\GridView;
//use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\module\admin\models\PostSearchPages */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'url:url',
            'title',
            'title_seo',
            'keywords',
            // 'description:ntext',
            // 'text:ntext',
            // 'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                'headerOptions' => ['width' => '80'],
                'urlCreator'=>function($action, $model, $key, $index){
                    return Url::to([$action.'-pages','id'=>$model->id]);
                }

            ],
        ],
    ]); ?>
</div>
