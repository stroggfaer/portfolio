<?php
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Портфолио', 'url' => ['portfolio']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактирования', ['update-portfolio', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete-portfolio', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'image_id',
            'title',
            'description:ntext',
            'date',
            'status',
        ],
    ]) ?>

</div>
